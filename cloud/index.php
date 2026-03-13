<?php
session_start();
include("db.php");

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

if($role=="admin")
{
if($username=="admin" && $password=="admin123")
{
$_SESSION['admin']=$username;
header("Location:admin/dashboard.php");
}
else
{
echo "<script>alert('Invalid Admin Login');</script>";
}
}

if($role=="user")
{
$query="SELECT * FROM users WHERE name='$username' AND password='$password'";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
$row=mysqli_fetch_assoc($result);

$_SESSION['user_id']=$row['user_id'];
$_SESSION['name']=$row['name'];

header("Location:user_dashboard.php");
}
else
{
echo "<script>alert('Invalid User Login');</script>";
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Cloud Login</title>

<style>

body{
background:#355C9B;
font-family:Arial;
}

.login-box{
width:350px;
background:white;
padding:30px;
margin:120px auto;
border-radius:8px;
text-align:center;
}

input,select{
width:100%;
padding:10px;
margin:10px 0;
}

button{
background:#355C9B;
color:white;
border:none;
padding:10px;
width:100%;
cursor:pointer;
}

</style>
</head>

<body>

<div class="login-box">

<h2>Cloud Management Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Enter Name" required>

<input type="password" name="password" placeholder="Enter Password" required>

<select name="role">
<option value="admin">Admin</option>
<option value="user">User</option>
</select>

<button type="submit" name="login">Login</button>

<p>New User? <a href="user_register.php">Register Here</a></p>

</form>

</div>

</body>
</html>