<?php

session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = trim(strtolower($_POST['email']));
    $password = $_POST['password'];

    // التحقق من صحة البريد الإلكتروني وكلمة المرور
    if (empty($email)) {
        $email_error = 'Please insert email <br>';
        $err_s = 1;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Invalid email format <br>';
        $err_s = 1;
    }
    
    if (empty($password)) {
        $pass_error = 'Please insert Password <br>';
        $err_s = 1;
    }
    
    // إذا لم يكن هناك أخطاء
    if (!isset($err_s)) {
        // استخدم الإستعلام المحضر (Prepared Statement) لمنع حقن SQL
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header('Location: home.php');
            exit();
        } else {
            $login_error = 'Invalid email or password <br>';
            include('index.html');
        }
    } else {
        include('index.html');
    }
}
?>
