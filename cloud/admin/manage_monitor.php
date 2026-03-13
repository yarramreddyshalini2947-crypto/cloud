<?php
include("../db.php");

if(isset($_POST['add'])){

$vm = $_POST['vm'];
$cpu = $_POST['cpu'];
$memory = $_POST['memory'];
$date = $_POST['date'];

mysqli_query($conn,"INSERT INTO usage_monitor(vm_id,cpu_usage,memory_usage,monitor_date)
VALUES('$vm','$cpu','$memory','$date')");
}

if(isset($_GET['delete'])){
$id = $_GET['delete'];
mysqli_query($conn,"DELETE FROM usage_monitor WHERE monitor_id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Usage Monitor</title>

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

<h2>Usage Monitoring</h2>

<form method="POST">

<input type="number" name="vm" placeholder="VM ID" required>

<input type="number" name="cpu" placeholder="CPU Usage %" required>

<input type="number" name="memory" placeholder="Memory Usage %" required>

<input type="date" name="date" required>

<button name="add">Add Monitor</button>

</form>

<table>

<tr>
<th>ID</th>
<th>VM ID</th>
<th>CPU Usage</th>
<th>Memory Usage</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM usage_monitor");

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['monitor_id']."</td>
<td>".$row['vm_id']."</td>
<td>".$row['cpu_usage']."</td>
<td>".$row['memory_usage']."</td>
<td>".$row['monitor_date']."</td>
<td><a href='?delete=".$row['monitor_id']."'>Delete</a></td>
</tr>";

}

?>

</table>

</body>
</html>