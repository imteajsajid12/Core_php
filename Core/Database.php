<?php

namespace Core;


class Database
{

    protected mixed $connection;
    protected mixed $statement;


    public function __construct($username = "user", $password = "pass")
    {
        $config = [
            'host' => 'db',
            'user' => 'user',
            'password' => 'pass',
            'dbname' => 'database'
        ];
        $con = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new \PDO($con, $username, $password, [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

//add query
    public function query($query, $data = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($data);
        return $this;


    }
//    get statement
    public function get()
    {
        return $this->statement->fetch();
    }
    //get all statement
    public function all(){
        return $this->statement->fetchAll();
    }
//    find statement
    public function find(){
        return $this->statement->fetch();
    }
//    findOrFail statement
    public function FindOrFail(){
        $result=$this->statement->fetch();
        if($result) {
            http_response_code(404);
            echo "404";
            die();
        }
        return $result;
    }
}