function login(){

let username = document.getElementById("username").value;
let password = document.getElementById("password").value;
let role = document.getElementById("role").value;

if(role === "admin" && username === "admin" && password === "admin123"){
window.location.href = "admin/manage_vm.php";
}
else if(role === "user"){
window.location.href = "user-dashboard.html";
}
else{
alert("Invalid Login");
}

}