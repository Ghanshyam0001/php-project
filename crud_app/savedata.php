<?php

$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_sclass = $_POST['sclass'];
$stu_phone = $_POST['sphone'];

include 'config.php';
$sql = "INSERT INTO student(sname,saddress,sclass,sphone) VALUES ('{$stu_name}','{$stu_address}','{$stu_sclass}','{$stu_phone}')";

$result = mysqli_query($conn,$sql);

header("Location: http://localhost/crud/index.php");

?>