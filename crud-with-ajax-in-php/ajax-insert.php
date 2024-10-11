<?php 

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$fname = $_POST['fname'];
$lname = $_POST['lname'];

$sql = "INSERT INTO students(first_name,last_name) VALUES('{$fname}','{$lname}')";

if(mysqli_query($conn,$sql)){
  echo 1;

}else{
  echo 0;
}

?>