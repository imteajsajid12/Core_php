<?php
//pdo connection

$servername = "db";
$username = "user";
$password = "pass";
$dbname = "database";

try {
    $Conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //assoc array
    $Conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
/** @var mixed $Conn */
$stmt = $Conn->prepare("SELECT * FROM users");

$stmt->execute();

$users = $stmt->fetchAll();


//pdo insert database
$name = "John Doe";
$email = "john.doe@example.com";
$password = "password123";
/**
 * Create database
 * pdo prepare statement
 * pdo bind param
 * pdo execute
 *
 */
//$sql = "INSERT INTO users (users, email, password) VALUES (:name, :email, :password)";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':name', $name);
//$stmt->bindParam(':email', $email);
//$stmt->bindParam(':password', $password);
//
//$stmt->execute();
//echo "Data inserted successfully";
                    //pdo prepare statement data insert





