<?php
require 'vendor/autoload.php'; // تحميل ملف PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("connect.php");

if(isset($_GET['token'])) {
    $token = $_GET['token'];

    // التحقق من وجود رمز التفعيل في قاعدة البيانات
    $sql = "SELECT * FROM verification WHERE token = '$token'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // إذا تم العثور على رمز التفعيل، قم بتفعيل الحساب
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $sql = "UPDATE users SET is_active = 1 WHERE id = '$user_id'";
        mysqli_query($conn, $sql);

        // حذف رمز التفعيل من قاعدة البيانات
        $sql = "DELETE FROM verification WHERE token = '$token'";
        mysqli_query($conn, $sql);

        // إرسال البريد الإلكتروني
        $mail = new PHPMailer(true);

        try {
            // إعداد الخادم
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // استبدل بعنوان خادم SMTP الخاص بك
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com'; // استبدل ببريدك الإلكتروني
            $mail->Password = 'your_email_password'; // استبدل بكلمة مرور بريدك الإلكتروني
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // إعداد محتوى البريد
            $mail->setFrom('your_email@example.com', 'Your Name'); // استبدل ببريدك الإلكتروني واسمك
            $mail->addAddress($row['email']); // أدخل عنوان البريد الإلكتروني للمستخدم
            $mail->isHTML(true);
            $mail->Subject = 'تفعيل الحساب';
            $mail->Body    = 'يرجى النقر على الرابط التالي لتفعيل حسابك: <a href="http://www.example.com/activate.php?token=' . $token . '">تفعيل الحساب</a>';

            $mail->send();
            echo 'تم تفعيل الحساب بنجاح وتم إرسال رابط التفعيل إلى بريدك الإلكتروني.';
        } catch (Exception $e) {
            echo 'حدث خطأ أثناء إرسال البريد الإلكتروني: ', $mail->ErrorInfo;
        }
    } else {
        echo "رمز التفعيل غير صحيح!";
    }
} else {
    echo "لا يوجد رمز تفعيل مقدم!";
}
?>
