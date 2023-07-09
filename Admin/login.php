<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tridentform";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];}
$username1 = mysqli_real_escape_string($conn, $_POST['username']);
$password1 = mysqli_real_escape_string($conn, $_POST['password']);


$sql = "SELECT * FROM adminuser WHERE username = '$username1' AND password = '$password1'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User is authenticated, set session variable and redirect to admin page
    $_SESSION['authenticated'] = true;
    header("Location: admin.php");
} else {
    // Invalid credentials, redirect to login page with error message
    header("Location: admin.html?error=1");
}



mysqli_close($conn);
?>