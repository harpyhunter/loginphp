<?php

// Check if required fields are empty
if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["dob"]) || empty($_POST["mobile"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirm_password"])) {
    die("Please fill in all required fields");
}

// Validate mobile number
if (!preg_match("/^[0-9]{10}$/", $_POST["mobile"])) {
    die("Mobile number should be 10 digits long");
}

// Validate email
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

// Validate password
if (strlen($_POST["password"]) < 8 || !preg_match("/[A-Z]+/", $_POST["password"]) || !preg_match("/[a-z]+/", $_POST["password"]) || !preg_match("/[!@#\$%\^&\*\(\)\[\]{}\-_=+<>,\.\|]+/", $_POST["password"])) {
    die("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one special character.");
}

// Check if passwords match
if ($_POST["password"] != $_POST["confirm_password"]) {
    die("Passwords must match");
}

// Hash the password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Connect to the database
$mysqli = require __DIR__ . "/database.php";

// Check if email already exists
$email = $mysqli->real_escape_string($_POST["email"]);
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    die("Email already exists, please use a different email address.");
}

// Check if mobile number already exists
$mobile = $mysqli->real_escape_string($_POST["mobile"]);
$sql = "SELECT * FROM user WHERE mobile = '$mobile'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    die("Mobile number already exists, please use a different mobile number.");
}

// Insert user data into database
$sql = "INSERT INTO user (fname, lname, dob, mobile, email, password_hash) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssss", $_POST["fname"], $_POST["lname"], $_POST["dob"], $_POST["mobile"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    header("Location: index.php?registration=success");
    exit;
}