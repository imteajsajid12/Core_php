<?php

//
//$user= $_GET['email'];
//$passwords = trim(strtolower($_GET['password']));
//
////mysqli connection
//$servername = "db";
//$username = "user";
//$password = "pass";
//$dbname = "database";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//echo "Connected successfully";
//
//
////insert data
//$sql = "INSERT INTO users (name, email, password) VALUES ('imteaj', '$user' , '$passwords')";
//if ($conn->query($sql) === TRUE) {
//    echo "Data inserted successfully";
//} else {
//    echo "Error inserting data: " . $conn->error;
//}

// pdo connection
$servername = "db";
$username = "user";
$password = "pass";
$dbname = "database";


try {
    $Conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //assoc array//
    $Conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

/**
 * @var mixed $Conn
 * fetch user data from database
 */
$stmt = $Conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();

//post == submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['email'];
    $email = $_POST['password'];
    $password = $_POST['password'];
    /** @var  mixed $sql */
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

    /** @var mixed $Conn */
    $stmt = $Conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    echo "Data inserted successfully";
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <h1>Hello, world!</h1>
    <!--input grup  -->
    <form class="row g-3" action="/" method="Post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="inputPassword4">
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
    <!--    table-->
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $key => $user): ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                </td>

            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <!--    table-->
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>