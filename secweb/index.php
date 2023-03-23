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

$email = htmlspecialchars($_POST["email"] ?? "");

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

    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

    <div align="center">
        <form method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $email ?>">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            <button>Log in</button>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>

</body>
</html>
