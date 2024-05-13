<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $newPassword = $_POST["new_password"]; 
    $confirmPassword = $_POST["confirm_password"];

    if ($newPassword !== $confirmPassword) {
        header("Location: resetpass.php?token=" . urlencode($token) . "&error=password_mismatch");
        exit();
    }

    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT id, email FROM user WHERE reset_token = ? AND reset_token_expiration > NOW()";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET password_hash = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $hashedPassword, $user["id"]);
        $stmt->execute();

        $sql = "UPDATE user SET reset_token = NULL WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $user["id"]);
        $stmt->execute();

        header("Location: login.php"); 
        exit();
    } else {
        header("Location: resetpass.php?token=" . urlencode($token) . "&error=invalid_token");
        exit();
    }
}
?>
