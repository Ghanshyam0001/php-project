<?php
$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$student_id = $_POST["studentid"];

$sql = "DELETE FROM students WHERE id = {$student_id}";

if(mysqli_query($conn,$sql)){
    echo 1;
  
  }else{
    echo 0;
  }

?>