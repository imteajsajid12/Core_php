<?php

namespace Http\Controller;

use Core\Database;

class CartController
{
    public function index()
    {
        $db= new Database();
        $auth = (int)$_SESSION['auth']['id'];
       $data= $db->query("SELECT carts.* ,shops.* FROM carts INNER JOIN shops ON carts.product_id = shops.id where carts.user_id = $auth")->all();
        return $data;

 }

 public function create(){
     try {

         $db = new Database();
         $data = $db->find('shops', $_POST['id']);
         $carts = $db->query('select * from carts where product_id = :id', [
             'id' => $_POST['id'],
         ])->get();
//         var_dump($carts);
         $cart = empty($carts) ? $db->insert('carts', [
             'product_id' => $data['id'],
             'user_id' => $_SESSION['auth']['id'],
             'quantity' => 1,
         ]) : $db->query('update carts set quantity = quantity + 1 where product_id = :id', [
             'id' => $_POST['id'],
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