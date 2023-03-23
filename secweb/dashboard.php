<?php
session_start();

// Require database connection
$mysqli = require __DIR__ . "/database.php";

// Redirect to login page if user is not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

// Retrieve user information from the database
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle logout form submission
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1 align=center>Welcome, <?= $user["fname"]." ".$user["lname"]  ?>!</h1>
    <br>
    <br>
    <h2 align=center>User Information:</h2>
    <br>
    <table>
        <tr>
            <td><strong>First Name:</strong></td>
            <td><?= $user["fname"] ?></td>
        </tr>
        <tr>
            <td><strong>Last Name:</strong></td>
            <td><?= $user["lname"] ?></td>
        </tr>
        <tr>
            <td><strong>Date of Birth:</strong></td>
            <td><?= $user["dob"] ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?= $user["email"] ?></td>
        </tr>
        <tr>
            <td><strong>Mobile Number:</strong></td>
            <td><?= $user["mobile"] ?></td>
        </tr>
    </table>
    </br>
    <form method="post" align=center>
        <button type="submit" name="logout">Log out</button>
    </form>
</body>
</html>
