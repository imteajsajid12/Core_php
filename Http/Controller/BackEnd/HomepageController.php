<?php

namespace Http\Controller\BackEnd;

use Core\Config;
use Core\Database;
use Core\Validation;

class HomepageController
{
    public array $errors = [];

    public function index(): void
    {
        $data = new Database();
        $datas = $data->query('SELECT * FROM homepages')->all();
        view('BackEnd/Homepage/index.view.php',
            [
                'homepages' => $datas,
                'Errors' => \Core\Session::get('Errors'),
                'Delete' => \Core\Session::get('Delete'),
                'Success' => \Core\Session::get('Success'),
            ]);
    }

    public function create()
    {

        $errors = [];
        if (!Validation::string($_POST['title'], 1, 255)) {
            $errors['errors'] = 'title is required';
        }
        if (!Validation::string($_POST['banner_title'], 1, 255)) {
            $errors['errors'] = 'banner_title is required';
        }
        if (!Validation::file($_FILES['banner_image'], 1, 255)) {
            $errors['errors'] = 'banner_image is required';
        }
        if (!Validation::file($_FILES['title_image'], 1, 255)) {
            $errors['errors'] = 'title_image is required';
        }

        if (!empty($errors)) {
            \Core\Session::flash('Errors', $errors);
            return header('location: /Admin/homepage');
        }

        $banner_image = Config::File("banner_image/", $_FILES['banner_image']);
        $title_image = Config::File("title_image/", $_FILES['title_image']);
        $data = new \Core\Database();

        $data->insert("homepages", [
            'title' => $_POST['title'],
            'banner_title' => $_POST['banner_title'],
            'banner_image' => $banner_image,
            'title_image' => $title_image
        ]);
        \Core\Session::flash('Success', 'Homepage created successfully');

        return header('location: /Admin/homepage');
    }

    public function edit()
    {
        $data = new Database();
        $value = $data->find('homepages', $_GET['id']);
        $datas = $data->query('SELECT * FROM homepages')->all();
        view('BackEnd/Homepage/update.php',
            ['value' => $value,
                'homepages' => $datas,
                'Errors' => \Core\Session::get('Errors'),
                'Delete' => \Core\Session::get('Delete'),
                'Success' => \Core\Session::get('Success'),
            ]);


    }

    public function update()
    {
        $errors = [];
        $data = new \Core\Database();
        $value = $data->find('homepages', $_GET['id']);

        if (!Validation::string($_POST['title'], 1, 255)) {
            $errors['errors'] = 'title is required';
        }
        if (!Validation::string($_POST['banner_title'], 1, 255)) {
            $errors['errors'] = 'banner_title is required';
        }
        if (!Validation::file($_FILES['banner_image'], 1, 255)) {
            $errors['errors'] = 'banner_title is required';
        }
        if (!Validation::file($_FILES['title_image'], 5, 255)) {
            $errors['errors'] = 'banner_title is required';
        }

        if (!empty($errors)) {
            \Core\Session::flash('Errors', $errors);
            return header('location: /Admin/homepage');
        }

        if ($value['banner_image'] !== $_POST['banner_image']) {
            (new Config())->unlinkFile('banner_image/', $_POST['banner_image']);
        }
        if ($value['title_image'] !== $_POST['title_image']) {
            (new Config())->unlinkFile('title_image/', $_POST['title_image']);
        }
        $title_image = Config::File("title_image/", $_FILES['banner_image']);
        $banner_image = Config::File("title_image/", $_FILES['banner_image']);

        $datas = $data->update('homepages', ['
        id' => $_POST['id'],
            'title' => $_POST['title'],
            'banner_title' => $_POST['banner_title'],
            'banner_image' => $banner_image,
            'title_image' => $title_image
        ]);
        \Core\Session::flash('Success', 'Homepage created successfully');
        return header('location: /Admin/homepage');
    }

    public function delete()
    {
        $data = new \Core\Database();
        $value = $data->find('homepages', $_POST['id']);

            (new Config())->unlinkFile('title_image/', $value['title_image']);
            (new Config())->unlinkFile('banner_image/', $value['banner_image']);

        $data->delete('homepages', [
            "id" => $_POST['id']
        ]);
        \Core\Session::flash('Delete', 'Role Delete successfully');
        header('location:/Admin/homepage');
    }
}
