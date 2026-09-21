<?php
session_start();
include "../config/db.php";

$error="";

if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $result=$conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if($result->num_rows>0){
        $_SESSION['admin']=true;
        header("Location: dashboard.php");
        exit();
    }else{
        $error="Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h1>Admin Login</h1>

<p style="color:red;"><?php echo $error; ?></p>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

</div>

</body>
</html>