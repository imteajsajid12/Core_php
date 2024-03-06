<?php

namespace Core;

// create a new database class
class  Database
{
    public $connection;
    public $statment;
//    delete
   public  $Delete;
   public  $table;
    public function __construct($username = 'user', $password = 'pass')
    {
        $config = [
            'host' => 'db',
            'port' => '3306',
            'user' => 'user',
            'password' => 'pass',
            'dbname' => 'database',
            'charset' => 'utf8'
        ];

        $con = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new \PDO($con, $username, $password, [
            // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_SILENT
//            assoc array
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC


        ]);

    }

    public function query($data, $perams = [])
    {
        $this->statment = $this->connection->prepare($data);
        $this->statment->execute($perams);
        return $this;
    }

    public function insert($table, $params= []){
   $this->query("insert into $table (".implode(',',array_keys($params)).") values(:".implode(',:',array_keys($params)).")" , $params);
     return true;
    }

    public function update($table, $params =[] )
    {
        $this->query("update $table where ".implode('=:,',array_keys($params))."=:" , array_values($params));
        return true;
    }

    public function delete( $table, $id = [])
    {
        $this->query("delete from $table where id = :id" , $id);
//        var_dump( implode('=? AND ',array_keys($params)));
//        die();
//       $data= $this->query("delete from $table where ".implode('=? AND ',array_keys($params))."=?" , array_values($params));
//        var_dump($data);
    }

    public function find($table,$id)
    {
        $ids= (int)$id;
       $data= $this->query("select * from $table where id = :id",
            ['id'=> $ids])->get();
        return $data;
    }

    public function FindOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abord(404);
        }
        return $result;
    }

    public function get()
    {
        return $this->statment->fetch();
    }

    //all
    public function all()
    {
        return $this->statment->fetchAll();
    }


}