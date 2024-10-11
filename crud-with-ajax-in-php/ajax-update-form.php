<?php

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];


$sql = "UPDATE students SET first_name = '{$fname}', last_name = '{$lname}' WHERE id = {$id}";

if(mysqli_query($conn,$sql)){
    echo 1;

} else{
    echo 0;
}

?>