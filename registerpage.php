<?php
session_start();
include ("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql)) {
       $msg ="Your Registration is successful!";
    }else{
        $msg="Regsitration Failed";
    }
}
if(isset($_SESSION['username'])){
    $msg="Welcome " . $_SESSION['username'] . "!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <h1>REGISTER PAGE</h1>
    <?php if (isset($msg)): ?>
        <h1><?php echo $msg ?> </h1>
        <?php endif ?>
    <form method="post" action="registerpage.php">
       <label type="username">Username: </label>
       <input  type="text" name="username" id="username" required><br><br>
       <label type="password">Password: </label>
       <input  type="text" name="password" id="password" required><br><br>
       <p>Already have an account?<a href="loginpage.php">Login</a></p>
       <input type="submit" value="Register">
    </form>

    </form>
</body>
</html>