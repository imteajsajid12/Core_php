<?php
//use Core\Routes;

function index1()
{
//    $_SESSION['name'] = "imteaj";
    view('BackEnd/login.php');
}
function  create()
{
    $data = new \Core\Database();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!\Core\Validation::string
        ($_POST['email'], 1, 255)) {
            $Errors['errors']['name'] = 'Name is required';
            echo "<>Name is required";
        }
        if (!\Core\Validation::string($_POST['password'], 5, 255)) {
            $Errors['errors'] = 'slug is required';
        }
//        print_r($Errors);
        //insert roles
        if (empty($Errors)) {

            $data->query('Select * from users WHERE email =:email ', [
                'email' => $_POST['email'],
            ])->find();
            print_r($data);
            $Success ['message'] = "Role created successfully";
//            header('/Admin/role',['Errors' => $Errors])

//            view('/BackEnd/Role/Role.view.php', ['Errors' =>$Errors ]);
        }
    }
}