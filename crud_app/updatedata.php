<?php
$stu_id = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_sclass = $_POST['sclass'];
$stu_phone = $_POST['sphone'];

include 'config.php';
$sql = "UPDATE student SET sname='{$stu_name}',saddress='{$stu_address}',sclass='{$stu_sclass}',sphone='{$stu_phone}' WHERE sid = {$stu_id}";

$result = mysqli_query($conn,$sql)or die("Faild");

header("Location: http://localhost/crud/index.php");


?>