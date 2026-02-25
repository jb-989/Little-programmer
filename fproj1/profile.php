<?php
session_start();
include 'db.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        echo "<h2>Welcome, " . htmlspecialchars($user['child_first_name']) . " " . htmlspecialchars($user['child_last_name']) . "</h2>";
        echo "<p>Age: " . htmlspecialchars($user['child_birthdate']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
        echo "<p>Parent: " . htmlspecialchars($user['parent_name']) . "</p>";
        echo "<p>Grade: " . htmlspecialchars($user['grade']) . "</p>";
        echo "<p>User Type: " . htmlspecialchars($user['user_type']) . "</p>";
        // تضيف أو تشيل اللي تبي حسب الحاجة
    } else {
        echo "No user data found.";
    }
} else {
    echo "You are not logged in.";
}
?>
