<?php
include("../db.php");

if(isset($_POST['add'])){

$name = $_POST['name'];
$ip = $_POST['ip'];

mysqli_query($conn,"INSERT INTO network(network_name,ip_range)
VALUES('$name','$ip')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM network WHERE network_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Network Management</title>

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

<h2>Network Management</h2>

<form method="POST">

<input type="text" name="name" placeholder="Network Name" required>

<input type="text" name="ip" placeholder="IP Range" required>

<button name="add">Add Network</button>

</form>

<table>

<tr>
<th>ID</th>
<th>Network Name</th>
<th>IP Range</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM network");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['network_id']."</td>
<td>".$row['network_name']."</td>
<td>".$row['ip_range']."</td>
<td><a href='?delete=".$row['network_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>