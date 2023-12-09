<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Connect to the WampServer MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vta";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert data into the database
    $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
