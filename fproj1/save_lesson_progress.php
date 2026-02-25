<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "Not logged in";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lesson_id'])) {
    $lessonId = intval($_POST['lesson_id']);
    if($lessonId > 3){
        $lessonId = 3 ;
    }
    $userId = $_SESSION['user_id'];

    // الاتصال بقاعدة البيانات
    include 'db.php'; // تأكد من وجود هذا الملف وإعداده بشكل صحيح

    // نحفظ أول شي في جدول user
    $query = "INSERT INTO user_reward (name_reward, result_reward, user_id) 
             VALUES ('video', ?, ?)";

    // حفظ تقدم الفيديو (نتأكد ألا يتم التكرار)
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii",$lessonId, $userId);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'تم حفظ النتيجة بنجاح']);
    } else {
        echo json_encode(['success' => false, 'message' => 'خطأ في حفظ النتيجة']);
    }
    $stmt->close();


}
?>
