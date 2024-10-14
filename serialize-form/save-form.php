<?php

$conn = mysqli_connect("localhost", "root", "", "ajax-form");

$name = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$sql = "INSERT INTO students (name,age,gender,country) VALUES ('{$name}','{$age}','{$gender}','{$country}')";


if(mysqli_query($conn,$sql)){
	echo "Hi {$name} Record is saved";
}else{
	echo "can't Save";
}

?>
