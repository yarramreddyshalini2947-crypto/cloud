<!DOCTYPE html>
<html>
<head>
<title>Cloud Admin Dashboard</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f4f6f9;
}

.sidebar{
width:220px;
height:100vh;
background:#1f2937;
position:fixed;
color:white;
}

.sidebar h2{
text-align:center;
padding:20px;
border-bottom:1px solid #444;
}

.sidebar a{
display:block;
padding:15px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#374151;
}

.main{
margin-left:220px;
padding:20px;
}

iframe{
width:100%;
height:600px;
border:none;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>Cloud Admin</h2>

<a href="manage_vm.php" target="content">Virtual Machines</a>

<a href="manage_storage.php" target="content">Storage</a>

<a href="manage_network.php" target="content">Network</a>

<a href="manage_billing.php" target="content">Billing</a>

<a href="manage_users.php" target="content">Users</a>

<a href="manage_requests.php" target="content">Resource Requests</a>

<a href="manage_monitor.php" target="content">Usage Monitor</a>

</div>

<div class="main">

<h2>Admin Dashboard</h2>

<iframe name="content"></iframe>

</div>

</body>
</html>