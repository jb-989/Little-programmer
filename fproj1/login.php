<?php
session_start();
include 'db.php'; // ملف اتصال قاعدة البيانات الذي قدمته

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تنظيف المدخلات
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // التحقق من عدم وجود حقول فارغة
    if (empty($email) || empty($password)) {
        echo "<script>alert('الرجاء ملء جميع الحقول.'); window.location.href = 'login.php';</script>";
        exit();
    }

    // استعلام آمن باستخدام prepared statements مع MySQLi
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        die("Erorr conn: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // التحقق من كلمة المرور (يفضل استخدام password_verify إذا كنت تستخدم التشفير)
        if ($password === $user['password']) {
            // تم تسجيل الدخول بنجاح
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;
            
            header("Location: start_video.php"); // توجيه إلى الصفحة الرئيسية
            exit();
        } else {
            // كلمة المرور غير صحيحة
            echo "<script>alert('Incorrect Email or password'); window.location.href = 'login.php';</script>";
            exit();
        }
    } else {
        // اسم المستخدم غير موجود
        echo "<script>alert('Incorrect username or password'); window.location.href = 'login.php';</script>";
        exit();
    }
    
    $stmt->close();
} 

$conn->close();
?>

<?php include('header1.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <title>Login Page</title>
    <style>
      input.real-input {
        width: 100%;
        border: none;
        background: transparent;
        outline: none;
        font-size: inherit;
        font-family: inherit;
        padding: 10px;
        z-index: 2;
        position: relative;
      }
  
      .clickable {
        cursor: pointer;
        pointer-events: auto !important;
        z-index: 1000;
        position: relative;
      }
    </style>
</head>
<body>
    <div class="log-in-page">
      <div class="overlap-wrapper">
        <div class="overlap">
          <!-- ✅ صورة الطفل -->
          <img src="v1_75.png" alt="Child on pencil"
               style="position: absolute; left: 40px; top: 250px; width: 250px; height: auto; z-index: 10;" />

          <!-- ✅ صورة القفل -->
          <img src="v1_57.png" alt="Locks"
               style="position: absolute; left: 280px; top: 160px; width: 100px; height: auto; z-index: 11;" />
          
          <div class="cer">
            <div class="overlap-group">
              <div class="ellipse"></div>
              <div class="div"></div>
            </div>
          </div>

          <div class="overlap-group-wrapper">
            <div class="overlap-2">
              <div class="ellipse-2"></div>
              <div class="ellipse-3"></div>
            </div>
          </div>

          <div class="rectangle-2"></div>

          <!-- نموذج تسجيل الدخول -->
          <form method="POST" action="login.php">
            <div class="box">
              <div class="div-wrapper">
                <input type="text" name="email" placeholder="Enter Your Email" class="real-input" required />
              </div>
            </div>

            <div class="text-wrapper-4">Log In</div>
            <div class="text-wrapper-5">Student Email</div>

            <div class="text-wrapper-7">Password</div>
            <div class="box-2">
              <div class="overlap-4">
                <input type="password" name="password" placeholder="Enter Password" class="real-input" required />
              </div>
            </div>

            <div class="LI">
              <button type="submit" class="overlap-5 clickable" style="background: none; border: none; cursor: pointer;">
                <div class="text-wrapper-9">Log In</div>
              </button>
            </div>
          </form>

          <div class="subscription">
            <div class="overlap-group-2 clickable" onclick="location.href='sign4.php'">
              <div class="text-wrapper-10">Subscribe</div>
            </div>
          </div>

          <p class="p">Subscribe Now To Unlock All the Level!</p>

          <div class="frame">
            <div class="overlap-6">
              <div class="overlap-7">
                <div class="rectangle-3"></div>
                <div class="rectangle-4"></div>
                <div class="rectangle-5"></div>
                <div class="rectangle-6"></div>
              </div>
              <div class="subscription-2">
                <div class="overlap-group-2 clickable" onclick="location.href='sign1.php'">
                  <div class="text-wrapper-11">Register</div>
                </div>
              </div>
              <p class="text-wrapper-12">Register now if you haven't already!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>