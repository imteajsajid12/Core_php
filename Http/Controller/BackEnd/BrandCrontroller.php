<?php

namespace Http\Controller\BackEnd;

use Core\Database;
use Core\Validation;

class BrandCrontroller
{

    public function index()
    {
        $db= new Database();
        view('BackEnd/Shop/Brand/index.php',
        [
            'brands' => $db->query('SELECT * FROM brands ')->all()
        ]);
    }

    public function create()
    {
        $db= new Database();
        $validations = Validation::validation([
            'name' => 'required',
        ]);
        if (empty($validations)) {
            $db->insert('brands', [
                'name' => $_POST['name'],
            ]);
            \Core\Session::flash('Success', 'Item Add successfully');
            header('location:/Admin/shop');
        }

    }

    public function delete(){
        $db= new Database();
        $db->delete('brands', [
            'id' => $_POST['id']
        ]);
        \Core\Session::flash('Delete', 'Item Delete successfully');
        header('location:/Admin/shop');
    }
}