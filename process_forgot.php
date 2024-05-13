<?php
function generateOTP() {
    return rand(100000, 999999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT id, email FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $resetToken = generateOTP();
        $sql = "UPDATE user SET reset_token = ? WHERE email = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $resetToken, $email);
        $stmt->execute();
       
        $to = $email;
        $subject = "Password Reset OTP";
        $message = "We have received your request for a single-use code to reset your password.\n\nYour single-use code is: $resetToken\n\nIf you didn't request this code, you can safely ignore this email. Someone else might have typed your email address by mistake.\n\nCordially yours,\nSulit and Bagasan Dental Office\n[This is an automated email. Do not reply. For inquiries, contact: email]";

        $headers = "From: your@example.com\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

        mail($to, $subject, $message, $headers);
        
        header("Location: verifycode.php?email=" . urlencode($email)); 
        exit();
    } else {
        $error = "User not found";
        header("Location: forgotpass.php?error=" . urlencode($error));
        exit();
    }
}
?>
