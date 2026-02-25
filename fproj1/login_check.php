<?php
session_start();
include 'db.php'; // تأكد أن ملف db.php يحتوي على الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    if ($stmt->rowCount() > 0) {
        // تم تسجيل الدخول
        $_SESSION['username'] = $username;
        header("Location: home.html"); // الصفحة الرئيسية
        exit();
    } else {
        // بيانات خاطئة
        echo "<script>alert('Incorrect username or password.'); window.location.href = 'login.html';</script>";
        exit();
    }
}
?>
