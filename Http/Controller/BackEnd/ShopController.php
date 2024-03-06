<?php

namespace Http\Controller\BackEnd;

use Core\Config;
use Core\Database;
use Core\Validation;

class ShopController
{

    public function index()
    {

        $data = new Database();
        $datas = $data->query('SELECT * FROM shops')->all();
        view('BackEnd/Shop/index.php',
            [   'categorys'=> $data->query('SELECT * FROM category')->all(),
                'homepages' => $datas,
                'Errors' => \Core\Session::get('Errors'),
                'Delete' => \Core\Session::get('Delete'),
                'Success' => \Core\Session::get('Success'),
            ]);
    }

    public function create()
    {

        $image = [];
        $errors = [];
        $validations = Validation::validation([
            'name' => 'required',
            'color' => 'required',
            'price'=>'required',
            'new_price' => 'required',
            'size' => 'required',
            'details'=>'required',
            'discount'=>'nullable',
        ]);
        if ($validations['errors']) {
            \Core\Session::flash('Errors', $validations['errors']);
            return header('location: /Admin/shop');
        }
//        file update
        if (count($_FILES['images']['name']) > 0) {
            $total = count($_FILES['images']['name']);
            for ($i = 0; $i < $total; $i++) {
                $images = Config::Files($_FILES['images'], 'shop/');
                $image[] = $images;
            }
        }
        else{
            $errors["images"] =  "Required Is Unique Value Exists";
            \Core\Session::flash('Errors', $errors);
        }
        try {
            $data= new Database();
            $validations['data']['image'] =serialize($image);

            $data->insert('shops', $validations['data']);
            \Core\Session::flash('Success', 'Homepage created successfully');
            header("Location:/Admin/shop");
        }catch (\Exception $exception){
            var_dump($exception);
            \Core\Session::flash('Errors', $exception);
        }
    }

    public function edit()
    {
        $data = new Database();
        $show =$data->find('shops', $_GET['id']);
        $datas = $data->query('SELECT * FROM shops')->all();

        view('BackEnd/Shop/update.php',
            [
                'datas' => $datas,
                'show'=> $show,
                'Errors' => \Core\Session::get('Errors'),
                'Delete' => \Core\Session::get('Delete'),
                'Success' => \Core\Session::get('Success'),
            ]);
    }

    public function update()
    {
        $image = [];
        $errors = [];
        $validations = Validation::validation([
            'name' => 'required',
            'color' => 'required',
            'price'=>'required',
            'new_price' => 'required',
            'size' => 'required',
            'details'=>'required',
            'discount'=>'nullable',
        ]);
        if ($validations['errors']) {
            \Core\Session::flash('Errors', $validations['errors']);
            return header('location: /Admin/shop');
        }
//        file update
        if (count($_FILES['images']['name']) !== 0) {
            $total = count($_FILES['images']['name']);
            $images = unserialize($_POST['old_images']);
            foreach ($images as $key => $value) {
                (new Config())->unlinkFile('shop/', $images[$key]);
            }
            for ($i = 0; $i < $total; $i++) {
                $images = Config::Files($_FILES['images'], 'shop/');
                $image[] = $images;
            }
        }
        try {
            $data= new Database();
            $validations['data']['id'] = $_POST['id'];
            $validations['data']['image'] =serialize($image);
            $data->update('shops', $validations['data']);
            header("Location:/Admin/shop");
        }catch (\Exception $exception){
            var_dump($exception);
            \Core\Session::flash('Errors', $exception);
        }
    }

    protected function validation()
    {
        //validate the form
        $errors = [];
        $validations = Validation::validation([
            'name' => 'required',
            'color' => 'required',
            'price'=>'required',
            'new_price' => 'required',
            'size' => 'required',
            'details'=>'required',
            'discount'=>'nullable',
        ]);
        if ($validations['errors']) {
            \Core\Session::flash('Errors', $validations['errors']);
            return header('location: /Admin/shop');
        }
    }

    public function delete()
    {
        $data = new \Core\Database();
        $values = $data->find('shops', $_POST['id']);
        $images = unserialize($values['image']);
       foreach ($images as $key => $value) {
           (new Config())->unlinkFile('shop/', $images[$key]);
       }

        $data->delete('shops', [
            "id" => $_POST['id']
        ]);
        \Core\Session::flash('Delete', 'Item Delete successfully');
        header('location:/Admin/shop');
    }

    public function test()

    {

        $validation = [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|image',
            'email' => 'required|email',
        ];

        var_dump(Validation::validation($validation));

        $errors = [];
        $all_data = [];
        $daata = [
            'name' => 'required|min:1|max:255|unique:roles',
            'email' => 'required',
            'publish_at' => 'nullable|date',
        ];
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $result = str_replace('"', '', $_GET);
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $result = $_POST;
            } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                // handle PUT request
            } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $result = $_POST;
            }
            $value1 = array_keys($daata);
            $i = 0;
            foreach ($daata as $key => $data) {
                $value = explode('|', $data);
                $index = $i++;
                $required = preg_match('/required/', $data, $matches) ? $matches[0] : null;
                $image = preg_match('/image/', $data, $matches) ? $matches[0] : null;
                $email = preg_match('/email/', $data, $matches) ? $matches[0] : null;
                $max = preg_match('/max:(\d+)/', $data, $matches) ? $matches[1] : null;
                $min = preg_match('/min:(\d+)/', $data, $matches) ? $matches[1] : null;
                $unique = preg_match('/unique:(\w+)/', $data, $matches) ? $matches[1] : null;
                if ($required === $value[0]) {
                    if (empty($result[$key])) {
                        $errors[$key] = $key . "Is required";
                    } else {
                        if ((int)$min >= strlen($result[$key]) || (int)$max <= strlen($result[$key])) $errors[$key] = $key . "Min required or Max required";
//                         if ($email=== $value[0]) {
                        if (!filter_var($result[$key], FILTER_VALIDATE_EMAIL)) {
                            $errors[$key] = $key . "Is Email Not Valid";
                        }
//                         }
                        if ($unique !== null) {
                            $data = (new Database())->query("select * from $unique where $key = '$result[$key]'")->get();

                            if ($data === null) {
                                $errors[$key] = $key . "Is Unique Value Exists";
                            }
                        }
                        $all_data[$key]= $result[$key];
                    }
                }

            }
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
          var_dump($all_data);
        }

    }
}