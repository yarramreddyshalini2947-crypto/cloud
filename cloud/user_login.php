<?php
include("db.php");
session_start();

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");

if(mysqli_num_rows($result)>0){

$row=mysqli_fetch_assoc($result);

$_SESSION['user_id']=$row['user_id'];
$_SESSION['name']=$row['name'];

header("Location:user_dashboard.php");

}else{

echo "<script>alert('Invalid Login');</script>";

}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>

<style>

body{
font-family: Arial;
background: #355C9B;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
margin:0;
}
.container{
width:400px;
margin:100px auto;
background:white;
padding:30px;
border-radius:5px;
}

h2{
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
}

button{
padding:10px;
background:#2563eb;
color:white;
border:none;
width:100%;
}

a{
text-decoration:none;
color:#2563eb;
}

</style>

</head>

<body>

<div class="container">

<h2>User Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button name="login">Login</button>

</form>

<br>

<center>
New User? <a href="register.php">Register</a>
</center>

</div>

</body>

</html>