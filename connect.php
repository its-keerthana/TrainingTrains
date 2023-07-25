<?php 
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn = new mysqli('localhost','root','','connecttest');
if($conn->connect_error){
    die('connection failed:'.$conn->connect_error);
}else{
    $stmt = $conn-> prepare ("insert into contact(name, phonenumber, email, message)
    value(?,?,?,?)");
    $stmt->bind_param("siss", $name, $phonenumber, $email, $message);
    $stmt->execute();
    echo "Thanks for contacting us...";
    $stmt->close();
    $conn->close();
}
?>