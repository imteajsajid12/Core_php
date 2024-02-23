<?php

namespace Core;

class Validation
{
    public $errors = [];

    public static function string($value, $min = 1, $max = 255)
    {
//        echo $value;
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;

    }

    public static function file($values = [], $type = "image", $size = 100)
    {

        return !empty($values['name']);

    }

    public static function Email($value, $min = 1, $max = 255)
    {
        //validation email
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function validation($rules)
    {
        $errors = [];
        $all_data = [];
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $result = str_replace('"', '', $_GET);
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $result = str_replace('"', '', $_POST);
            } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                $result = str_replace('"', '', $_GET);
            } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $result = str_replace('"', '', $_POST);
            }
            foreach ($rules as $key => $data) {
                $value = explode('|', $data);
                $required = preg_match('/required/', $data, $matches) ? $matches[0] : null;
                $max = preg_match('/max:(\d+)/', $data, $matches) ? $matches[1] : 256;
                $min = preg_match('/min:(\d+)/', $data, $matches) ? $matches[1] : 1;
                $unique = preg_match('/unique:(\w+)/', $data, $matches) ? $matches[1] : null;
                $email = preg_match('/email/', $data, $matches) ? $matches[0] : null;


                if ($required === $value[0]) {
                    if (empty($result[$key])) {
                        $errors[$key] = $key . " Is required";
                    } else {
                        if ((int)$min >= strlen($result[$key]) || (int)$max <= strlen($result[$key])) $errors[$key] = $key . "Min required or Max required";

                        if ($email=== $value[0]) {
                            if (!filter_var($result[$key], FILTER_VALIDATE_EMAIL)) {
                                $errors[$key] = $key . "Is Email Not Valid";
                            }
                        }
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
        }
       return [
           'errors' => $errors,
           'data' => $all_data
       ];
    }



}