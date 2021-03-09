<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['ad'];
$email = $_POST['email'];
$subject = $_POST['konu'];
$feedback = $_POST['mesaj'];

$id=uniqid();
$date=date("Y-m-d");
$time=date("h:i:sa");
$q=mysqli_query($con,"INSERT INTO misafir VALUES  ('$id' , '$name', '$email' , '$feedback' , '$date' , '$time')")or die ("Error");


header("location:index.php");





?>


