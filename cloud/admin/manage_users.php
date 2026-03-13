<?php
include("../db.php");

if(isset($_POST['add'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($conn,"INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM users WHERE user_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Management</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

h2{
margin-top:0;
}

input{
padding:8px;
margin:5px;
}

button{
padding:8px 15px;
background:#2563eb;
color:white;
border:none;
}

table{
border-collapse:collapse;
width:100%;
margin-top:20px;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

th{
background:#1f2937;
color:white;
}

a{
color:red;
text-decoration:none;
}

</style>

</head>

<body>

<h2>User Management</h2>

<form method="POST">

<input type="text" name="name" placeholder="User Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="password" placeholder="Password" required>

<button name="add">Add User</button>

</form>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM users");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['user_id']."</td>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['password']."</td>
<td><a href='?delete=".$row['user_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>