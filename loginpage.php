<?php
session_start();
include ("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header ("Location: homepage.php");
    }
}
if(isset($_SESSION['username'])){
    $msg="Welcome " . $_SESSION['username'] . "!";
}else{
    $msg ="You're not logged in!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <?php if (isset($msg)): ?>
        <h1><?php echo $msg ?> </h1>
        <?php endif ?>
    <form method="post" action="loginpage.php">
       <label type="username">Username: </label>
       <input  type="text" name="username" id="username" required><br><br>
       <label type="password">Password: </label>
       <input  type="text" name="password" id="password" required><br><br>
       <p>Dont have an account?<a href="registerpage.php">Register</a></p>
       <input type="submit" value="Login">
    </form>
    <form method="post" action="logout.php"><br>
    <input type="submit" value="Logout">
    </form>
</body>
</html>