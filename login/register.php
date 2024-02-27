<?php

require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");

}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $sql = "SELECT * FROM tbuser WHERE username = '$username' OR email = '$email'";
    $duplicate = mysqli_query($conn,$sql);
    if(mysqli_num_rows($duplicate)>0){
        echo 
        "<script>alert('username or email already taken');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tbuser VALUES('','$name','$username','$email','$password')";
            $result = mysqli_query($conn,$query);
        echo 
        "<script>alert('Registration successful');</script>";

    


        }
        else{
        echo "<script>alert('password not match')</script>";


        }
    }



}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Registration</h1>
    <form class="" action="" method="post">
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" required value=""><br>
        <label for="name">Username :</label>
        <input type="text" name="username" id="username" required value=""><br>
        <label for="name">Email :</label>
        <input type="text" name="email" id="email" required value=""><br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""><br>
        <label for="Confirmpassword">ConfirmpasswordPassword :</label>
        <input type="Confirmpassword" name="confirmpassword" id="confirmpassword" required value=""><br>
        <button type="submit" name="submit">Registration</button><br>
        <a href="login.php">login</a>


    </form>
    
</body>
</html>