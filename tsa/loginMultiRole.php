<?php

include "../koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username= '$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$fechResult = mysqli_fetch_assoc($result);

if ($fechResult['role'] == 'admin') {
    echo "You are logged in as ";
    echo "<a href='adminDashboard.html'>Admin</a>";
} else if ($fechResult['role'] == 'user') {
    echo "You are logged in as ";
    echo "<a href='userDashboard.html'>User</a>";
} else {
    echo "Login failed ";
    echo "<a href='loginForm.html'>Login Form</a>";
}

mysqli_close($conn);
?>