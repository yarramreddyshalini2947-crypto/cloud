<?php
include("../db.php");

if(isset($_POST['add'])){

$name = $_POST['name'];
$cpu = $_POST['cpu'];
$ram = $_POST['ram'];
$storage = $_POST['storage'];

mysqli_query($conn,"INSERT INTO virtual_machines(vm_name,cpu,ram,storage)
VALUES('$name','$cpu','$ram','$storage')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM virtual_machines WHERE vm_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Virtual Machines</title>

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

<h2>Virtual Machine Management</h2>

<form method="POST">

<input type="text" name="name" placeholder="VM Name" required>

<input type="number" name="cpu" placeholder="CPU" required>

<input type="number" name="ram" placeholder="RAM" required>

<input type="number" name="storage" placeholder="Storage" required>

<button name="add">Add VM</button>

</form>

<table>

<tr>
<th>ID</th>
<th>VM Name</th>
<th>CPU</th>
<th>RAM</th>
<th>Storage</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM virtual_machines");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['vm_id']."</td>
<td>".$row['vm_name']."</td>
<td>".$row['cpu']."</td>
<td>".$row['ram']."</td>
<td>".$row['storage']."</td>
<td><a href='?delete=".$row['vm_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>