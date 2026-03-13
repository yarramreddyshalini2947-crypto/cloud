<?php
include("db.php");
session_start();

if(!isset($_SESSION['user_id'])){
header("Location:user_login.php");
}

$name=$_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>

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
font-size:16px;
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

<h3>Cloud Management System</h3>

<p>
From here you can manage your cloud services, request resources, view billing,
and monitor your usage.
</p>

</div>

</div>

</body>
</html>