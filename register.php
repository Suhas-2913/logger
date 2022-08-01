<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

//database connection
if (!empty($username) || !empty($email) || !empty($password) || !empty($password2))

    $host = "http://bikvxmbqvd2gfw2b6mvd-mysql.services.clever-cloud.com:3306/";
$dbUsername = "root";
$dbPassword = "";
$dbname = "bikvxmbqvd2gfw2b6mvd";
// create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die('connection failed :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(username,email,password,password2)
    values(?,?,?,?)");
    $stmt->bind_param("ssss", $username, $email, $password, $password2);
    $stmt->execute();
    echo "registration Successfully ...";
    $stmt->close();
    $conn->close();
}
