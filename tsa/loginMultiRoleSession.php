<?php

include "../koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$fechResult = mysqli_fetch_assoc($result);
$rowCount = mysqli_num_rows($result);

if ($rowCount > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
}

if ($fechResult['role'] == 'admin') {
    echo "You are logged in as ";
    echo "<a href='adminDashboard.php'>Admin</a>";
} else if ($fechResult['role'] == 'user') {
    echo "You are logged in as ";
    echo "<a href='userDashboard.php'>User</a>";
} else {
    echo "Login failed ";
    echo "<a href='loginForm.php'>Login Form</a>";
}

mysqli_close($conn);
?>
