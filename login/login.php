<?php
include 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");

}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM tbuser WHERE username = '$usernameemail' OR email = '$usernameemail'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");



        }else{
        echo "<script>alert('wrong password');</script>";

        }
       
    }else{
        echo "<script>alert('user not registered');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="" action="" method="post">
<label for="name">Username or Email :</label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""><br>
        <button type="submit" name="submit">Login</button><br>
        <a href="register.php">register</a>
    </form>

    
</body>
</html>