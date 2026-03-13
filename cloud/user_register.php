<?php
include("db.php");

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

mysqli_query($conn,"INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");

echo "<script>alert('Registration Successful');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>

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
margin:80px auto;
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
padding:10px 20px;
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

<h2>User Registration</h2>

<form method="POST">

<input type="text" name="name" placeholder="Enter Name" required>

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button name="register">Register</button>

</form>

<br>

<center>
Already registered? <a href="user_login.php">Login</a>
</center>

</div>

</body>
</html>