<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="password">
        <form action="process_reset.php" method="post" class="form">
            <h2>Reset Password</h2>
            <div class="textfields">
                <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
            </div>
            <div class="textfields">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required>
            </div>
            <div class="textfields">
                <input type="submit" value="Reset Password">
            </div>
        </form>
    </div>
</body>
</html>
