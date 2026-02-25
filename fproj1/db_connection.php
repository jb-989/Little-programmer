<?php
$host = "localhost";         // أو 127.0.0.1
$username = "root";          // اسم المستخدم
$password = "";              // كلمة المرور (اتركها فاضية إذا ما عندك كلمة مرور)
$database = "little_programmer"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = mysqli_connect($host, $username, $password, $database);

// التحقق من الاتصال
if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>
