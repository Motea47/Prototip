<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="container">
        <h2>Verify Code</h2>
        <form action="process-verify-code.php" method="post">
            <div class="form-group">
                <label for="verification_code">Enter OTP:</label>
                <input type="text" id="verification_code" name="verification_code" required>
            </div>
            <p>Please check your email address for the required OTP to verify your account.</p>
            <div class="form-group">
                <button type="submit">SUBMIT</button>
                <button type="submit" name="resend">RESEND OTP</button>
            </div>
        </form>
    </div>
</body>
</html>
