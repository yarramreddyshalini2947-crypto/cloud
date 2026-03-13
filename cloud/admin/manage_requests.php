<?php
include("../db.php");

if(isset($_POST['add'])){

$user = $_POST['user'];
$type = $_POST['type'];
$date = $_POST['date'];
$status = $_POST['status'];

mysqli_query($conn,"INSERT INTO resource_request(user_id,resource_type,request_date,status)
VALUES('$user','$type','$date','$status')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM resource_request WHERE request_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Resource Requests</title>

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

<h2>Resource Requests</h2>

<form method="POST">

<input type="number" name="user" placeholder="User ID" required>

<input type="text" name="type" placeholder="Resource Type" required>

<input type="date" name="date" required>

<input type="text" name="status" placeholder="Status" required>

<button name="add">Add Request</button>

</form>

<table>

<tr>
<th>ID</th>
<th>User ID</th>
<th>Resource</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM resource_request");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['request_id']."</td>
<td>".$row['user_id']."</td>
<td>".$row['resource_type']."</td>
<td>".$row['request_date']."</td>
<td>".$row['status']."</td>
<td><a href='?delete=".$row['request_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>