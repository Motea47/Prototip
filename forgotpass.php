<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="password">
        <form action="process_forgot.php" method="post" class="form">
            <h2>Forgot Password</h2>
            <div class="textfields">
                <input type="email" id="email" name="email" placeholder="Email Address/Username" required>
            </div>
            <div class="textfields">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
