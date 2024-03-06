<?php

namespace Http\Controller;

use Core\Database;
use Core\Validation;

class checkoutController
{

    protected $datas = array();
    public function index()
    {
        $price = 0;
        $db = new Database();
        $auth = (isset($_SESSION['auth'])) ? (int)$_SESSION['auth']['id'] : 0;
        $data = $db->query("SELECT carts.id,carts.quantity,shops.price  FROM carts INNER    JOIN shops ON carts.product_id = shops.id where carts.user_id = $auth")->all();

        foreach ($data as $key => $value) {
            $price += $value['price'] * $value['quantity'];
        }
        view('Frontend/checkout.php', [
            'data' => $price,
            'Errors' => \Core\Session::get('Errors'),
            'Delete' => \Core\Session::get('Delete'),
            'Success' => \Core\Session::get('Success'),
        ]);
    }

    public function create()
    {
        $db = new Database();
        $auth = (isset($_SESSION['auth'])) ? (int)$_SESSION['auth']['id'] : 0;
        $datas = $db->query("SELECT carts.id,carts.quantity,shops.price,shops.name,carts.product_id FROM carts INNER    JOIN shops ON carts.product_id = shops.id where carts.user_id = $auth")->all();
        $errors = [];

        $validations = Validation::validation([
            'name' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'payment_method' => 'nullable',
            'price' => 'nullable',
            'session_id' => 'nullable',
            'total_quantity' => 'nullable',
        ]);

        if ($validations['errors']) {
            \Core\Session::flash('Errors', $validations['errors']);
            return header('location: /checkout');
        }


        if ($_POST['payment'] === '1') {
            $stripeSecretKey = 'sk_test_51HnZYFKGuQVYWj3vknF3j7CIkfJAmbFTFBGEJDEB9hBcFcYtEkm4D51mT7WsTTIAEgYqSBauyh3mG3kSR8DiazCu00riyQDmMS';
            \Stripe\Stripe::setApiKey($stripeSecretKey);
            $items = [];
            $products = [];
            foreach ($datas as $key => $value) {
                $items[] =
                    [
                        'price_data' => [
                            "currency" => "usd",
                            "unit_amount" => $value['price'] * 100,
                            "product_data" => [
                                "name" => $value['name'],
                            ]
                        ],
                        'quantity' => $value['quantity'],
                    ];
            }
//            var_dump($products);
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $items,
                'mode' => 'payment',
                'success_url' => 'http://localhost/success/payment?session_id={CHECKOUT_SESSION_ID}',
//                'cancel_url' => STRIPE_CANCEL_URL,
            ]);
        }

        foreach ($datas as $key => $value) {
            $validations['data']['payment'] = "unpaid";
            $validations['data']['session_id'] = $checkout_session->id;
            $validations['data']['payment_method'] = $_POST['payment'] ;
            $validations['data']['user_id'] = $auth;
            $validations['data']['product_id'] = $value['product_id'];
            $validations['data']['total_quantity'] = $value['quantity'];
            $db->insert('orders', $validations['data']);// insert into orders
            $db->query('DELETE FROM carts WHERE id =:id', ['id' => $value['id']]);//Delete from cards table
        }
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    }


    public function payment()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51HnZYFKGuQVYWj3vknF3j7CIkfJAmbFTFBGEJDEB9hBcFcYtEkm4D51mT7WsTTIAEgYqSBauyh3mG3kSR8DiazCu00riyQDmMS');
        try {
            $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
            $db = new Database();
            $value = $db->query('SELECT * FROM orders WHERE session_id = :session_id', [
                'session_id' => $_GET['session_id'],
            ])->get();
            $db->query('UPDATE orders SET payment = :payment WHERE session_id = :session_id', [
                'session_id' => $_GET['session_id'],
                'payment' => 'paid',
            ]);

            \Core\Session::flash('Success', 'Payment Success');
            http_response_code(200);
            header('location:/shop');
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }

    }


}