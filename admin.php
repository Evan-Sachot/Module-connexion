<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = new mysqli("localhost", "root", "", "moduleconnexion",3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SESSION['user_id'] === 1)
{
    require_once 'admin-content.php';
} 
else
{
    echo "user";
}

?>
