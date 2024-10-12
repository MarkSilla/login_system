<?php
session_start();
include ("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $content = $_POST['content'];

    $sql = "INSERT INTO post (username, content) VALUES ('$username', '$content')";

    if ($conn->query($sql)) {
       $msg ="Comment Success";
    }
}
if(isset($_SESSION['username'])){
    $msg="Welcome " . $_SESSION['username'] . "!";
}

$postcom="SELECT*FROM post";
$postresult=$conn->query($postcom);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Write your comments here!</h1>
    <?php if (isset($msg)): ?>
        <h1><?php echo $msg ?> </h1>
        <?php endif ?>
        <form method="post" action="homepage.php">
            Post Content: <input type ="text" name="content" require>
                <input type="submit" value="Comment">
    </form>
    <form method="post" action="logout.php"><br>
    <input type="submit" value="Logout">
    </form>

    <?php while($post=$postresult->fetch_assoc()): ?>
    <p><b><?php echo $post['username'] ?></b></p><?php echo $post['content'] ?>
    <?php endwhile ?>
</body>
</html>