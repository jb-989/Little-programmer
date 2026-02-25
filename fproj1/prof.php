<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];

// 1. استعلام بيانات المستخدم الأساسية
$user_query = "SELECT 
                user_id, 
                child_first_name, 
                child_last_name, 
                age, 
                email, 
                mobile_number, 
                grade
              FROM user 
              WHERE email = ?";
$user_stmt = $conn->prepare($user_query);
$user_stmt->bind_param("s", $email);
$user_stmt->execute();
$user_result = $user_stmt->get_result();

if ($user_result->num_rows === 0) {
    die("المستخدم غير موجود!");
}

$user = $user_result->fetch_assoc();

// 2. استعلام لأعلى نتيجة في الفيديوهات
$video_query = "SELECT MAX(result_reward) as max_video 
                FROM user_reward 
                WHERE user_id = ? AND name_reward = 'video'";
$video_stmt = $conn->prepare($video_query);
$video_stmt->bind_param("i", $user_id);
$video_stmt->execute();
$video_result = $video_stmt->get_result();
$video_data = $video_result->fetch_assoc();
$videosCompleted = $video_data['max_video'] ?? 0;

$game_query = "SELECT result_reward 
               FROM user_reward 
               WHERE user_id = ? AND name_reward = 'game' 
               ORDER BY date_earned DESC 
               LIMIT 1";
$game_stmt = $conn->prepare($game_query);
$game_stmt->bind_param("i", $user_id);
$game_stmt->execute();
$game_result = $game_stmt->get_result();
$game_data = $game_result->fetch_assoc();
$progressLevel = $game_data['result_reward'] ?? 0;

// إغلاق جميع الاتصالات
$user_stmt->close();
$video_stmt->close();
$game_stmt->close();
$conn->close();

// echo $progressLevel. $videosCompleted;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Progress Dashboard</title>
    <!-- <link rel="stylesheet" href="cp.css" /> -->
<style>
  body {
    background-color: #FFF8E4;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    min-height: 100vh;
    border: 10px solid;
    border-color: #F2C6DE #C6DEF1 #DBCDF0 #C9E4DE;
    box-sizing: border-box;
    position: relative;
    }

    .oval-nav-container {
        display: flex;
        justify-content: center;
        padding: 1rem 0;
        width: 100%;
    }

    .oval-navbar {
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border-radius: 50px;
        padding: 1rem 3rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        display: inline-flex;
        border: 1px solid #DBCDF0;
        position: relative;
        overflow: hidden;
        min-width: 70%;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .row {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .box {
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }

    .box1 {
        background-color: #C9E4DE;
        width: 100%;
        height: 300px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .box2 {
        background-color: #f68787;
        width: 250px;
        height: 300px;
    }

    .box3 {
        background-color: #F2C6DE;
        width: 250px;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #de6599;
        text-align: center;
    }

    .box4 {
        background-color: #FFE8A3;
        width: 250px;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        color: #f7dd9a;
        text-align: center;
    }

    .box5 {
        background-color: #DBCDF0;
        width: 250px;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        color: #b081f8;
    }

    .video-img {
        width: 80%;
        max-width: 150px;
        height: auto;
        margin: 10px 0;
    }

    .level-completion {
        font-size: 18px;
        margin-top: 10px;
        color: #b081f8;
        font-weight: bold;
    }

    .imgc {
        width: 80%;
        max-width: 150px;
        margin: auto;
        display: block;
    }

    .button {
        background-color: #ffd772;
        color: #f2f0ec;
        border: none;
        border-radius: 5px;
        padding: 5px 5px;
        cursor: pointer;
        margin-top: 35px;
        font-size: 30px;
        text-align: center;
    }

    .button:hover {
        background-color: #FFDA79;
    }

    .box6 {
        background-color: #C6DEF1;
        width: 250px;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        color: #62b5f9;
    }

    .rewards-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .reward-img {
        width: 70%;
        max-width: 200px;
        height: auto;
        margin: 10px 0;
    }

    .option {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
        width: 100%;
    }

    .option:hover {
        background-color: #f0f0f0;
    }

    .radio-btn {
        width: 20px;
        height: 20px;
        border: 2px solid #ccc;
        border-radius: 50%;
        margin-left: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: border-color 0.3s;
    }

    .option.selected .radio-btn {
        border-color: #f5006e;
    }

    .radio-btn::after {
        content: "";
        width: 10px;
        height: 10px;
        background-color: #f5006e;
        border-radius: 50%;
        display: none;
    }

    .option.selected .radio-btn::after {
        display: block;
    }

    .option-label {
        flex-grow: 1;
        font-size: 16px;
        text-align: right;
    }

    .imgc img {
        width: 100%;
        height: auto;
    }

    .ch {
        text-align: center;
        color: #f8e1e1;
        font-size: 20px;
    }

    .form-container {
        background-color: #C9E4DE;
        border-radius: 20px;
        padding: 20px;
        width: 100%;
        height: 100%;
        max-width: none;
        display: flex;
        align-items: center;
    }

    .profile-image-container {
        width: 120px;
        margin-right: 20px;
        margin-bottom: 0;
        margin-left: 10px;
    }

    .profile-image {
        width: 100%;
        border-radius: 50%;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
    }

    .form-fields {
        flex-grow: 1;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 14px;
        color: #555;
        margin-bottom: 3px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
    }

    .form-group input {
        padding: 8px 12px;
        border: none;
        border-radius: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        font-size: 14px;
        background-color: #ffffff;
        color: #333;
        outline: none;
    }

    .form-group input:focus {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    }

    /* .form-group.grade {
        grid-column: 1 / span 2;
    } */

    @media (max-width: 600px) {
        .form-container {
            flex-direction: column;
            align-items: stretch;
        }

        .profile-image-container {
            width: 100%;
            margin-bottom: 15px;
        }

        .form-fields {
            grid-template-columns: 1fr;
        }

        .form-group.grade {
            grid-column: 1;
        }
    }

    /* Progress Bar Styles */
    .level-wrapper {
        width: 100%;
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
    }

    .level-label {
        font-size: 16px;
        font-weight: bold;
        color: #b7a9e0;
        margin-bottom: 8px;
    }

    .progress-bar {
        position: relative;
        background: #cfc8f9;
        height: 20px;
        border-radius: 10px;
        box-shadow: inset 0 0 5px #b3a5e1;
        width: 100%;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: #b7a9e0;
        border-radius: 10px;
        transition: width 0.5s ease-in-out;
        width: 0;
    }

    .star {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        transition: left 0.5s ease-in-out;
        left: 0;
        z-index: 2;
        color: gold;
        text-shadow: 0 0 2px rgba(0,0,0,0.3);
    }
</style>
</head>
<body>
   <?php include 'header2.php'; ?>

    <div class="container">
        <!-- الصف الأول -->
        <div class="row">
            <!-- الصندوق الأول - النموذج -->
            <div class="box box1">
                <div class="form-container">
                    <div class="profile-image-container">
                        <img src="https://i.ibb.co/qMKVqNK3/prof.jpg" alt="Profile" class="profile-image" />
                    </div>
                    <div class="form-fields">
                        <div class="form-group"><label>First Name</label><input type="text" name="firstName" value="<?= htmlspecialchars($user['child_first_name']) ?>" readonly/></div>
                        <div class="form-group"><label>Last Name</label><input type="text" name="lastName" value="<?= htmlspecialchars($user['child_last_name']) ?>" readonly/></div>
                        <div class="form-group"><label>Age</label><input type="number" name="age" value="<?= htmlspecialchars($user['age']) ?>" readonly/></div>
                        <!-- <div class="form-group"><label>Birth Date</label><input type="date" name="date" /></div> -->
                        <div class="form-group"><label>Email</label><input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" readonly/></div>
                        <div class="form-group"><label>Phone Number</label><input type="tel" name="phoneNumber" value="<?= htmlspecialchars($user['mobile_number']) ?>" readonly/></div>
                        <div class="form-group "><label>Grade</label><input type="text" name="grade" value="<?= htmlspecialchars($user['grade']) ?>" readonly/></div>
                    </div>
                </div>
            </div>

            <!-- الصندوق الثاني - الشهادة -->
            <div class="box box2">
                <div class="imgc">
                   <img
  src="https://storage.googleapis.com/figment-image-store/tiny-zebra-r74o_586:369.png"
 alt="Certificate" />
                    <p>Each certificate tells your success story! Open it now! 🎉</p>
                </div>
            </div>
        </div>

        <!-- الصف الثاني -->
        <div class="row">
            <!-- الصندوق الثالث - خيارات اللغات -->
            <div class="box box3">
                <h3>Select Your Favorite Programming Language</h3>
                <div class="options">
                    <div class="option" onclick="selectOption(this)"><span class="option-label">HTML + CSS</span><div class="radio-btn"></div></div>
                    <div class="option" onclick="selectOption(this)"><span class="option-label">PHP</span><div class="radio-btn"></div></div>
                    <div class="option" onclick="selectOption(this)"><span class="option-label">Java</span><div class="radio-btn"></div></div>
                </div>
            </div>

            <!-- الصندوق الرابع - المكافآت -->
            <div class="box box6">
                <div class="rewards-container">
                    <h2>Rewards</h2>
                    <img src="https://storage.googleapis.com/figment-image-store/dazzling-grandmother-5pm5_223:137.png" />
                    <h3><?= $progressLevel ?>%</h3>
                </div>
            </div>

            <!-- الصندوق الخامس - التقدم -->
            <div class="box box5">
                <div class="level-wrapper">
                    <div class="level-label">Level Progress</div>
                    <div class="progress-bar">
                        <!-- <div class="progress-fill" id="progress"></div> -->
                        <div class="progress-fill" id="progress" style="width: <?= ($videosCompleted / 3) * 100 ?>%"></div>
                        <!-- <div class="star" id="star">⭐</div> -->
                        <div class="star" id="star" style="left: <?= ($videosCompleted / 3) * 100 ?>%">⭐</div>
                    </div>
                </div>
                <img src="tv.png" alt="Video" class="video-img" />
                <p class="level-completion" id="progress-text"><?= $videosCompleted ?>/3 Videos Completed</p>
                <!-- <button onclick="completeVideo()">Complete Video</button> -->
</div>


            <!-- الصندوق السادس - الاشتراك -->
            <div class="box box4">
                <img
  src="https://storage.googleapis.com/figment-image-store/tiny-zebra-r74o_597:278.png"
alt="Manage Subscription" class="imgc" />
                <a href="subscription.html" class="button">Manage Your Subscription</a>

</div>
</div>
<div>
    
    <!-- سكربت التفاعل -->
    <script>
        let videosCompleted = 0;
        let progressPercent = 0;

        function completeVideo() {
            if (videosCompleted < 3) {
                videosCompleted++;
                progressPercent = Math.min(100, (videosCompleted / 3) * 100);
                updateProgress();
            }
        }

        function updateProgress() {
            document.getElementById('progress-text').innerText = videosCompleted + '/3 Videos Completed';
            document.getElementById('progress').style.width = progressPercent + '%';
            document.getElementById('star').style.left = `calc(${progressPercent}% - 8px)`;
            if (videosCompleted === 3) {
                alert('Congratulations! You have completed all videos!');
            }
        }

        function selectOption(option) {
            document.querySelectorAll('.option').forEach(el => el.classList.remove('selected'));
            option.classList.add('selected');
        }

        //updateProgress();
    </script>
   
</body>
</html>
