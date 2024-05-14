<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbdoDatabase";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $usernameOrEmail = $_POST["username_or_email"];
    $password = $_POST["password"];
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
   
    $sql = "SELECT User_ID, Email, Password FROM ACCOUNT WHERE Email = ? OR Username = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["Password"])) { 
            $_SESSION["user_id"] = $user["User_ID"];
            $_SESSION["email"] = $user["Email"];
            
            echo "<div class='success'>Login successful!</div>";
        } else {
            
            echo "<div class='error'>Incorrect password</div>";
        }
    } else {
        
        echo "<div class='error'>User not found</div>";
    }
    
    $stmt->close();
    $conn->close();
}
?>
