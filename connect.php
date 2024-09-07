<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cyber_nest"; 

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
