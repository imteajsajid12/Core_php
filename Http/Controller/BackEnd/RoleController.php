<?php

namespace Http\Controller\BackEnd;

use Core\Validation;
class RoleController
{



    /** @var mixed $data */

    /**
     * @return void
     */
   public function index()
    {
        $data = new \Core\Database();
        $roles = $data->query('select * from roles')->all();
        view('Backend/Role/Role.view.php');
//        var_dump($roles);
//        view('/BackEnd/Role/Role.view.php', [
//            'notes' => $roles,
//            'Errors' => \Core\Session::get('Errors'),
//            'Success' => \Core\Session::get('Success'),
//        ]);
    }

//pdo_database

   public function create()
    {
        $errors = [];
        $data = new \Core\Database();


        if (!Validation::string
        ($_POST['name'], 1, 255)) {
            $errors['errors'] = 'Name is required';
        }
        if (!Validation::string($_POST['slug'], 5, 255)) {
            $errors['errors'] = 'slug is required';
        }
        if (empty($errors)) {
            $data->query('insert into roles(name,slug) values(:name,:slug)', [
                'name' => $_POST['name'],
                'slug' => $_POST['slug'],
            ]);
            \Core\Session::flash('Success', 'Role created successfully');
        }
        var_dump($errors);
//    \Core\Session::flash('Errors', $errors);
//    header('location: /Admin/role');


    }


   public function views()
    {
        echo "Hello";
    }


   public function edit()
    {
        $data = new \Core\Database();
        $roles = $data->query('select * from roles')->all();
        $show = $data->query('select * from roles where id = :id', [
            'id' => $_GET['id'],
        ])->find();
        view('/BackEnd/Role/Update.view.php', [
            'notes' => $roles,
            'data' => $show,
            'Errors' => ""
        ]);
    }

   public function update()
    {
        $errors = [];
        if (!Validation::string($_POST['name'], 1, 255)) {
            $errors['errors'] = 'Name is required';
        }
        if (!Validation::string($_POST['slug'], 5, 255)) {
            $errors['errors'] = 'slug is required';
        }
        if (empty($errors)) {
            $data = new \Core\Database();
            $data->query('update roles set name = :name, slug = :slug where id = :id', [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'slug' => $_POST['slug'],
            ]);
            \Core\Session::flash('Success', 'Role update successfully');
        }
        \Core\Session::flash('Errors', $errors);
        header('location: /Admin/role');

    }


   public function delete()
    {
        $data = new \Core\Database();
        $data->query('delete from roles where id = :id', [
            'id' => $_POST['id'],
        ]);
        \Core\Session::flash('Dlete', 'Role Delete successfully');
        header('location:/Admin/role');
    }


}