<?php
session_start();
unset($_SESSION['authenticated']);

// Redirect to the login page
header("Location: admin.html");
//exit;
?>