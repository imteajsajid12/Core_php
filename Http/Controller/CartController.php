<?php

namespace Http\Controller;

use Core\Database;

class CartController
{
    public function index()
    {
        $db = new Database();
        $auth=(isset($_SESSION['auth']))? (int)$_SESSION['auth']['id'] :0;

       $data= $db->query("SELECT carts.id,shops.name,carts.quantity,shops.price,shops.image,carts.product_id,shops.color,shops.size 
                             FROM carts INNER    JOIN shops ON carts.product_id = shops.id where carts.user_id = $auth")->all();
        return $data;

 }
 public function count_cart(){
     $db= new Database();
     $auth=(isset($_SESSION['auth']))? (int)$_SESSION['auth']['id'] :0;
    $data=$db->query("SELECT * FROM carts where user_id = $auth")->all();
return array_sum(array_column($data, "quantity"));
 }

 public function create(){
     try {
         $db = new Database();
         $data = $db->find('shops', $_POST['id']);
         $carts = $db->query('select * from carts where product_id = :id and color = :color and size = :size', [
             'id' => $_POST['id'],
             'color' => $_POST['color'],
             'size' => $_POST['size'],
         ])->get();

         $cart = empty($carts) ? $db->insert('carts', [
             'product_id' => $data['id'],
             'user_id' => $_SESSION['auth']['id'],
             'color' => $_POST['color'],
             'size' => $_POST['size'],
             'quantity' => $_POST['quantity'],
         ]) : $db->query('update carts set quantity = :quantity where product_id = :id', [
             'id' => $_POST['id'],
             'quantity' => $carts['quantity'] + $_POST['quantity'],
         ]);
         \Core\Session::flash('Success', 'Product Add successfully');
         header('location:/shop');
     }catch (\PDOException $e){
         echo 'Error: ' . $e->getMessage();
     }
 }

    public  function delete()
    {
        $db = new Database();
        $carts = $db->query("DELETE FROM carts WHERE product_id = ?", [$_POST['id']]);
        \Core\Session::flash('Delete', 'Product Delete Successfully');
        header('Location:/shop');
        

 }
}