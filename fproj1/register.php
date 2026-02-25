<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($email) || empty($password)) {
        echo "❌ الرجاء تعبئة جميع الحقول!";
    } else {
    
        echo "✅ تم التسجيل بنجاح!";
    }
}
?>
