<?php
include("db.php");
session_start();

if(!isset($_SESSION['user_id'])){
header("Location:user_login.php");
}

$user_id=$_SESSION['user_id'];
$name=$_SESSION['name'];

$result=mysqli_query($conn,"SELECT * FROM resource_allocation WHERE user_id='$user_id'");

?>

<!DOCTYPE html>
<html>
<head>

<title>My Allocations</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f4f6f9;
}

.sidebar{
position:fixed;
left:0;
top:0;
width:220px;
height:100%;
background:#355C9B;
color:white;
}

.sidebar h2{
text-align:center;
padding:20px;
border-bottom:1px solid rgba(255,255,255,0.2);
}

.sidebar a{
display:block;
padding:15px 20px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#2c4c85;
}

.main{
margin-left:220px;
padding:30px;
}

.card{
background:white;
padding:25px;
border-radius:6px;
box-shadow:0 2px 8px rgba(0,0,0,0.2);
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

table th, table td{
border:1px solid #ddd;
padding:10px;
text-align:center;
}

table th{
background:#355C9B;
color:white;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>User Panel</h2>

<a href="user_dashboard.php">Dashboard</a>
<a href="user_requests.php">Resource Request</a>
<a href="user_allocations.php">My Allocations</a>
<a href="user_billing.php">Billing</a>
<a href="user_usage.php">Usage Monitor</a>
<a href="logout.php">Logout</a>

</div>

<div class="main">

<h2>Welcome <?php echo $name; ?></h2>

<div class="card">

<h3>My Resource Allocations</h3>

<table>

<tr>
<th>ID</th>
<th>Resource Type</th>
<th>Status</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

echo "<tr>
<td>".$row['allocation_id']."</td>
<td>".$row['resource_type']."</td>
<td>".$row['status']."</td>
</tr>";

}

?>

</table>

</div>

</div>

</body>
</html>