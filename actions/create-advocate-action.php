<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $servername = "your_server";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate random ID
    $randomId = bin2hex(random_bytes(8));

    // Get form data
    $name = $_POST['name'];
    $court = $_POST['court'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    // Handle file upload
    $photo = $_FILES['photo'];
    $photoPath = './uploads/' . basename($photo['name']);
    move_uploaded_file($photo['tmp_name'], $photoPath);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO advocates (id, name, photo, court, address, mobile_number, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $randomId, $name, $photoPath, $court, $address, $mobile_number, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
