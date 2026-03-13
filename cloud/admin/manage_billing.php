<?php
include("../db.php");

if(isset($_POST['add'])){

$user = $_POST['user'];
$amount = $_POST['amount'];

mysqli_query($conn,"INSERT INTO billing(user_name,amount)
VALUES('$user','$amount')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM billing WHERE bill_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Billing Management</title>

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

<h2>Billing Management</h2>

<form method="POST">

<input type="text" name="user" placeholder="User Name" required>

<input type="number" name="amount" placeholder="Amount" required>

<button name="add">Add Bill</button>

</form>

<table>

<tr>
<th>ID</th>
<th>User</th>
<th>Amount</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM billing");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['bill_id']."</td>
<td>".$row['user_name']."</td>
<td>".$row['amount']."</td>
<td><a href='?delete=".$row['bill_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>