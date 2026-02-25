<?php
header('Content-Type: application/json');
//require 'db_connection.php'; // ملف الاتصال بقاعدة البيانات
require 'db.php'; // ملف الاتصال بقاعدة البيانات

$query = "SELECT Lassons_id, Title, Content, video_url FROM lassons";
$result = mysqli_query($conn, $query);

$lessons = [];

while ($row = mysqli_fetch_assoc($result)) {
    $lessons[$row['Lassons_id']] = [
        'title' => $row['Title'],
        'video' => $row['video_url'],
        'content' => $row['Content']
    ];
}

echo json_encode($lessons);
?>
