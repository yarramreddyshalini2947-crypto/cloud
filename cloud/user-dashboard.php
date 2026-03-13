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
width:220px;
height:100vh;
background:#355C9B;
position:fixed;
color:white;
}

.sidebar h2{
text-align:center;
padding:20px;
border-bottom:1px solid #ddd;
}

.sidebar a{
display:block;
padding:15px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#2b4c82;
}

.main{
margin-left:220px;
padding:30px;
}

.card{
background:white;
padding:20px;
border-radius:5px;
box-shadow:0 2px 5px rgba(0,0,0,0.2);
margin-bottom:20px;
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
<p>Use the sidebar to manage your cloud resources.</p>
</div>

</div>

</body>
</html>