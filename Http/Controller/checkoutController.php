<?php

namespace Http\Controller;

use Core\Database;
use Core\Validation;

class checkoutController
{
    public function index()
    {
        $price =0;
        $db= new Database();
        $auth= (isset($_SESSION['auth']))? (int)$_SESSION['auth']['id'] :0;
        $data = $db->query("SELECT carts.id,carts.quantity,shops.price  FROM carts INNER    JOIN shops ON carts.product_id = shops.id where carts.user_id = $auth")->all();

        foreach ($data as $key => $value) {
            $price +=  $value['price'] *$value['quantity'];
        }
        view('Frontend/checkout.php',[
            'data' => $price,
            'Errors' => \Core\Session::get('Errors'),
            'Delete' => \Core\Session::get('Delete'),
            'Success' => \Core\Session::get('Success'),
        ]);
    }

    public function create($data)
    {




        $errors = [];
        $validations = Validation::validation([
            'name' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
//            'payment_method'=>'required|max:10|min:1',

        ]);
        if ($validations['errors']) {
            \Core\Session::flash('Errors', $validations['errors']);
            return header('location: /checkout');
        }
        if ($_POST['payment'] === '1') {

            $data=$_POST['price'];
            $stripeSecretKey = 'sk_test_51HnZYFKGuQVYWj3vknF3j7CIkfJAmbFTFBGEJDEB9hBcFcYtEkm4D51mT7WsTTIAEgYqSBauyh3mG3kSR8DiazCu00riyQDmMS';

            \Stripe\Stripe::setApiKey($stripeSecretKey);
//        header('Content-Type: application/json');

//        $YOUR_DOMAIN = 'http://localhost';

            $checkout_session = \Stripe\Checkout\Session::create([
                "success_url" => "http://localhost/shop",

                'line_items' => [
                    [
                        'price_data' => [
                            "currency" => "usd",
                            "unit_amount" => $data,
                            "product_data" => [
                                "name" => "Stubborn Attachments",
                            ]
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
//            'success_url' => var_dump("success"),
//            'cancel_url' => var_dump("cancel"),
            ]);

            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);
//
        }




    }

    protected function payment($data)
    {


    }

}