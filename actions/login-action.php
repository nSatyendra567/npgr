<?php
session_start(); // Start the session at the beginning
require '../config/database.php'; // Adjusted path to require database.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare a select statement
    $sql = "SELECT id, email, password FROM users WHERE email = '$email'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if email exists
        if (mysqli_num_rows($result) == 1) {
            // Fetch user data
            $row = mysqli_fetch_assoc($result);

            // Verify password
            if ($password === $row['password']) {
                // Password is correct, so start a new session
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row['id'];
                $_SESSION["email"] = $row['email'];

                // Redirect user to welcome page
                header("location: ../admin/posts.php");
                exit;
            } else {
                // Set password error message
                $_SESSION["message"] = "The password you entered was not valid.";
            }
        } else {
            // Set email error message
            $_SESSION["message"] = "No account found with that email.";
        }
    } else {
        // Set general error message
        $_SESSION["message"] = "Oops! Something went wrong. Please try again later.";
    }

    // Close connection
    mysqli_close($conn);

    // Redirect back to login page
    header("location: ../login.php");
    exit;
}
?>
