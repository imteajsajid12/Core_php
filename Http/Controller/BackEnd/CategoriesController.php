<?php

namespace Http\Controller\BackEnd;

use Core\Database;
use Core\Validation;

class CategoriesController
{
    public function index()
    {
        $db = new Database();
        view('Backend/Shop/Category/index.php', [
            'category' => $db->query('SELECT * FROM category')->All(),
            'Errors' => \Core\Session::get('Errors'),
            'Delete' => \Core\Session::get('Delete'),
            'Success' => \Core\Session::get('Success'),
        ]);
    }

    public function create()
    {
        $db = new Database();
        $validations = Validation::validation([
            'name' => 'required',
        ]);
        if ($validations['errors']) {
            \Core\Session::flash('Errors', $validations['errors']);
            return header('location: /Admin/category');
        }

        $db->insert('category', $validations['data']);
        \Core\Session::flash('Success', 'Item Add successfully');
        header('location:/Admin/category');

    }

    public function delete()
    {
        $db = new Database();
        $db->delete('category', [
            'id' => $_POST['id']
        ]);
        \Core\Session::flash('Delete', 'Item Delete successfully');
        header('location:/Admin/category    ');
    }


}