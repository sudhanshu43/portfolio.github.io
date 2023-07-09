<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Welcome to the Admin Page</h1>
    <!-- Logout form -->
    <form action="" method="post">
    <a href="logout.php">Logout 
        <input type="submit" name="logout" value="Logout">
</a>
    </form>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not authenticated, redirect to login page
    header("Location: admin.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tridentform";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM data";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    echo "<table><tr><th>Form Name</th><th>Name</th><th>Email</th><th>Phone</th><th>City</th><th>Query</th></tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>". $row["form"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["city"]. "</td><td>" . $row["query"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>


