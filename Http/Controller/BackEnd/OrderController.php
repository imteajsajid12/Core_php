<?php

namespace Http\Controller\BackEnd;

use Core\Database;

class OrderController
{

    public function     index()
    {
        $db= new Database();
         $data=$db->query("SELECT * FROM orders INNER    JOIN shops ON orders.product_id = shops.id")->all();
//         var_dump($data);
            view("BackEnd/order/index.php", [
                "title" => "Orders",
                "orders" =>  $data,
            ]);
    }

}