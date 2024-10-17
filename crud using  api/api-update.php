<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:PUT');

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"),true);
$sid = $data["sid"];
$sname = $data["sname"];
$sage = $data["sage"];
$scity = $data["scity"];




include "config.php";

$sql = "UPDATE students SET student_name = '{$sname}', age = {$sage}, city = '{$scity}' WHERE id = {$sid}";

if(mysqli_query($conn,$sql)){
echo json_encode(array('message'=>'Student Record Updated','status'=>true));


}else{
echo json_encode(array('message'=>'Student Record Not Updated','status'=>false));

}


?>
