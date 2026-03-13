<?php
include("../db.php");

if(isset($_POST['add'])){

$type = $_POST['type'];
$capacity = $_POST['capacity'];

mysqli_query($conn,"INSERT INTO storage(storage_type,capacity)
VALUES('$type','$capacity')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM storage WHERE storage_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Storage Management</title>

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

<h2>Storage Management</h2>

<form method="POST">

<input type="text" name="type" placeholder="Storage Type" required>

<input type="number" name="capacity" placeholder="Capacity (GB)" required>

<button name="add">Add Storage</button>

</form>

<table>

<tr>
<th>ID</th>
<th>Storage Type</th>
<th>Capacity</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM storage");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['storage_id']."</td>
<td>".$row['storage_type']."</td>
<td>".$row['capacity']."</td>
<td><a href='?delete=".$row['storage_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>