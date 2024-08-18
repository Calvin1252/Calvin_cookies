<?php

include "../koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = mysqli_query($conn, $query);
$rowcount = mysqli_num_rows($result);

if ($rowcount > 0) {
    echo "You are logged in ";
    echo "<a href='adminDashboard.html'>Admin</a>";
} else {
    echo "Login failed ";
    echo "<a href='loginForm.html'>Login Form</a>";
}

mysqli_close($conn);
?>


