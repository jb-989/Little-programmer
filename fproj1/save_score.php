<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die(json_encode(['success' => false, 'message' => 'يجب تسجيل الدخول أولاً']));
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $correctAnswers = isset($data['correct_answers']) ? intval($data['correct_answers']) : 0;
    $totalQuestions = isset($data['total_questions']) ? intval($data['total_questions']) : 0;
    $score = isset($data['score']) ? intval($data['score']) : 0;
    $percentage = isset($data['percentage']) ? intval($data['percentage']) : 0;

    if ($correctAnswers < 0 || $correctAnswers > $totalQuestions || 
        $percentage < 0 || $percentage > 100) {
        die(json_encode(['success' => false, 'message' => 'بيانات غير صالحة']));
    }

    $userId = intval($_SESSION['user_id']);

    $query = "INSERT INTO user_reward (name_reward, result_reward, user_id) 
            VALUES ('game', ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $score, $userId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'تم حفظ النتيجة بنجاح']);
    } else {
        echo json_encode(['success' => false, 'message' => 'خطأ في حفظ النتيجة']);
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>
