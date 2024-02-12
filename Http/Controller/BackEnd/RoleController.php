<?php

global $Errors;
global $data;

use Core\Validation;


/** @var mixed $data */

/**
 * @return void
 */
function index()
{
    $data = new \Core\Database();
    $roles = $data->query('select * from roles')->all();
    view('/BackEnd/Role/Role.view.php', ['notes' => $roles]);
}

//pdo_database

function create()
{

    $Errors = [];
    $data = new \Core\Database();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!Validation::string
        ($_POST['name'], 1, 255)) {
            $Errors['errors']['name'] = 'Name is required';
            echo "<>Name is required";
        }
        if (!Validation::string($_POST['slug'], 5, 255)) {
            $Errors['errors'] = 'slug is required';
        }
//        print_r($Errors);
        //insert roles
        if (empty($Errors)) {

            $data->query('insert into roles(name, slug) values(:name, :slug)', [
                'slug' => $_POST['slug'],
                'name' => $_POST['name']
            ]);
            $Success ['message'] = "Role created successfully";
//            header('/Admin/role',['Errors' => $Errors])

                  view('/BackEnd/Role/Role.view.php', ['Errors' =>$Errors ]);
        }
    }


}




