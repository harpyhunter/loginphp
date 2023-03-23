<?php

$mysqli = require __DIR__ . "/database.php";

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_SESSION["user_id"]);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if ($user) {
        return;
    }
}

$is_invalid = false;

//$conn = mysqli_connect("localhost", "root", "", "login_db");

$conn = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE email = '$email' AND password_hash = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"];
        header("Location: dashboard.php");
        exit;
    } else {
        $is_invalid = true;
    }
}

/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if ($user && password_verify($_POST["password"], $user["password_hash"])) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"];
        header("Location: dashboard.php");
        exit;
    } else {
        $is_invalid = true;
    }
}
*/
$email = $_POST["email"] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <div align=center>
        <?php if (isset($_GET["registration"]) && $_GET["registration"] === "success"): ?>
            <p>Registration successful!</p>
        <?php endif; ?>
    </div>
    <h1 align=center>Welcome!</h1>

    <h1 align=center>Login</h1>

    

    <div align="center">
        <form method="post" novalidate>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $email ?>">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            <button>Log in</button>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
        <?php if ($is_invalid): ?>
        <em>Invalid login</em>
        <?php endif; ?>
    </div>

</body>
</html>
