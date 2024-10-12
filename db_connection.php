<?php 
$host='localhost';
$username='root';
$password='';
$db_name='login_system';

$conn = new mysqli($host, $username, $password, $db_name);

if($conn->connect_error){
    die("Connection Error");
}
?>