<?php
$database_host = "localhost";
$database_user = "root";
$database_pass = "";
$database_name = "portfoliojaypee";

$conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
// Evaluate the connection
if (mysqli_connect_errno()) {
die("Failed to connect with MySQL: ". mysqli_connect_error());  
echo mysqli_connect_error();
exit(); 
}  

// Set parameters
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare and bind

$stmt = $conn->prepare("INSERT INTO inquiry (firstname, lastname, email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $email, $message);

// Execute
if ($stmt->execute()) {
      echo "<script>
      alert('Thank you for messaging! We will get back to you shortly!');
      window.location.href='../src/index.html';
      </script>";
} else {
      echo "Error: " . $stmt->error;
}

$conn->close();

?>
