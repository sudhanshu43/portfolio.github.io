 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tridentform";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $emails = $_POST['emails'];
  $query = $_POST['query'];
  

  $sql = "INSERT INTO data (name, email, phone, emails, query ) VALUES ('$name', '$email', '$phone', '$emails', '$query')";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.html");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>