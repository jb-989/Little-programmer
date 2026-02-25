<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود user_id في الجلسة
    if (!isset($_SESSION['user_id'])) {
        die("المستخدم غير مسجل دخوله");
    }

    $user_id = $_SESSION['user_id'];
    $user_type = $_POST['user_type'] ?? '';
    $signup_reason = $_POST['signup_reason'] ?? '';
    $action = $_POST['action'] ?? '';

    // بدء transaction لإدارة العمليات
    $conn->begin_transaction();

    try {
        // 1. تحديث بيانات المستخدم
        $sql_update = "UPDATE user SET 
                      user_type = ?, 
                      signup_reason = ? 
                      WHERE user_id = ?";
        
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssi", $user_type, $signup_reason, $user_id);
        
        if (!$stmt_update->execute()) {
            throw new Exception("خطأ في تحديث بيانات المستخدم: " . $stmt_update->error);
        }

        // 2. تنفيذ استعلام الدفع حسب الشرط
        if ($action === "submit" || $action === "subscribe") {
            $is_free = ($action === "submit") ? 1 : 0;
            
            $sql_payment = "INSERT INTO payment (free, user_id) VALUES (?, ?)";
            $stmt_payment = $conn->prepare($sql_payment);
            $stmt_payment->bind_param("ii", $is_free, $user_id);
            
            if (!$stmt_payment->execute()) {
                throw new Exception("خطأ في تسجيل الدفع: " . $stmt_payment->error);
            }
        }

        // تأكيد العمليات إذا نجحت كلها
        $conn->commit();

        // التوجيه بعد النجاح
        $redirect_url = ($action === "submit") ? "start_video.php" : "sign4.php";
        header("Location: " . $redirect_url);
        exit();

    } catch (Exception $e) {
        // التراجع عن العمليات في حالة خطأ
        $conn->rollback();
        die("حدث خطأ: " . $e->getMessage());
    } finally {
        // إغلاق جميع الاتصالات
        if (isset($stmt_update)) $stmt_update->close();
        if (isset($stmt_payment)) $stmt_payment->close();
        $conn->close();
    }
}
?>

<?php include __DIR__ . '/head.html'; ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="siig3.css" />
    <style>
      .text-wrapper-3.selected,
      .text-wrapper-5.selected,
      .text-wrapper-7.selected {
        border: 2px solid #f5c2e7;
        background-color: #fff1fb;
        color: #e08acb;
      }
    </style>
  </head>
  <body>
 
    <div class="sign-in-page">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="overlap-group">
            
             <!-- SVG النجمة -->
<div style="position: absolute; top: 250px; left: 115px;  z-index: 10; width: 32px;">
 <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M52.8771 70.4261C53.5035 73.1299 54.037 75.4175 54.615 77.2161L27.8026 69.4359C27.6247 69.3833 27.164 69.1812 26.5294 67.512C25.907 65.8792 25.3412 63.4825 24.5329 59.9986L24.0479 57.9131C23.9401 57.4496 23.8337 57.0077 23.7286 56.5874L48.0271 63.3208L49.2557 64.016C50.9937 65.0062 51.3089 65.2366 51.5352 65.5518C51.7858 65.8994 51.9354 66.3844 52.4244 68.5022L52.8771 70.4261ZM39.0344 56.6359L18.7937 51.0301L17.565 50.3309C14.7116 48.7021 12.7837 47.5987 11.5308 46.5964C10.3305 45.6345 10.1243 45.0606 10.1082 44.5675C10.088 44.0542 10.2739 43.4075 11.4298 42.2516C12.618 41.0593 14.4651 39.6811 17.1811 37.6603L18.7977 36.4639C19.5576 35.8981 20.2487 35.3889 20.8267 34.8149L48.3302 42.7932L46.8833 43.8683C44.333 45.7638 42.2354 47.3199 40.8087 48.7506C39.3254 50.2379 38.2301 51.9152 38.3109 54.0694C38.3442 54.9703 38.5922 55.8503 39.0344 56.6359ZM51.03 39.3659L22.6899 31.1451C22.8003 30.5766 22.9041 29.9609 23.0011 29.2981L23.3284 27.1681C23.6397 25.1473 24.1004 23.3406 24.5895 21.8129C25.4503 19.1252 25.6726 18.7493 26.3193 18.3775C26.5941 18.2158 26.8568 18.1511 27.4065 18.2118C28.0774 18.2845 28.9383 18.527 30.4054 18.9554L53.8228 25.7454C53.5426 26.3436 53.3122 26.9687 53.1317 27.6208C52.5457 29.6295 52.1213 32.3697 51.5999 35.7526L51.2968 37.7249C51.1877 38.4282 51.1028 38.9576 51.03 39.3659Z" fill="#FFE8A3"/>
<path d="M67.0673 72.455C64.7555 75.0376 63.1712 76.7957 61.894 77.8627C60.6007 78.9378 60.1763 78.8287 60.0429 78.7923C59.8691 78.7398 59.4084 78.5337 58.7698 76.8645C58.1474 75.2316 57.5856 72.8349 56.7732 69.355L56.2882 67.2695C55.9123 65.6407 55.6011 64.2868 54.817 63.1955C54.0128 62.072 52.8447 61.4091 51.511 60.6493L51.2523 60.5078L49.8094 59.6833C46.952 58.0545 45.0281 56.9512 43.7752 55.9488C42.5748 54.9869 42.3647 54.413 42.3485 53.924C42.3283 53.4066 42.5183 52.764 43.6701 51.604C44.8584 50.4117 46.7095 49.0335 49.4255 47.0127L51.0381 45.8164C52.3193 44.8666 53.3984 44.0663 54.0936 42.874C54.7766 41.706 54.9828 40.3399 55.2414 38.6505L55.5688 36.5205C56.1225 32.9477 56.5065 30.4742 57.0076 28.7525C57.2905 27.7825 57.5613 27.2449 57.7877 26.9337C58.2242 27.0954 58.8102 27.3379 59.4973 27.6652C61.7255 28.7462 63.7897 30.1369 65.6285 31.7958L66.8895 32.9275L66.9461 32.98C67.5049 33.5018 68.0847 34.0007 68.684 34.4755C69.2516 34.9325 69.9021 35.2756 70.5998 35.4859C71.9093 35.8658 73.2632 35.6112 74.7223 35.3363L75.0335 35.2797L76.6501 34.9766C79.8592 34.3825 82.0053 33.9945 83.5452 33.9662C85.0245 33.9379 85.3357 34.2572 85.5014 34.4876C85.7358 34.8109 85.95 35.4414 85.5903 37.2117C85.2306 38.9738 84.4223 41.322 83.2461 44.717L82.551 46.7257C81.9932 48.3424 81.5405 49.6357 81.5931 50.9978C81.6456 52.372 82.1913 53.6087 82.8662 55.1365L83.7069 57.036C85.1215 60.2492 86.0955 62.464 86.5805 64.1575C87.0615 65.8347 86.9119 66.5137 86.6694 66.926C86.4673 67.2695 86.1076 67.6333 84.6486 67.8152C83.1128 68.0051 80.9505 67.9202 77.7212 67.7828L76.0883 67.7141L75.7812 67.698C74.2979 67.6333 72.9399 67.5767 71.6789 68.1304C70.4543 68.672 69.5287 69.7067 68.4658 70.899L68.2435 71.1455L67.0673 72.455Z" fill="#FFE8A3"/>
</svg>
</div>
            
            <div class="rectangle"></div>
            <div class="div"></div>
            <div class="rectangle-2"></div>
            <div class="rectangle-3"></div>
            <div class="cer">
              <div class="overlap-2">
                <div class="ellipse"></div>
                <div class="ellipse-2"></div>
              </div>
            </div>
            <div class="overlap-group-wrapper">
              <div class="overlap-3">
                <div class="ellipse-3"></div>
                <div class="ellipse-4"></div>
              </div>
            </div>
            <div class="div-wrapper">
              <div class="overlap-4">
                <div class="ellipse-5"></div>
                <div class="ellipse-6"></div>
              </div>
            </div>
            <div class="cer-2">
              <div class="overlap-5">
                <div class="ellipse-7"></div>
                <div class="ellipse-8"></div>
              </div>
            </div>
            <div class="game"></div>
            <div class="rectangle-4"></div>
            <div class="element">
              <div class="rectangle-5"></div>
              <div class="rectangle-6"></div>
              <div class="rectangle-7"></div>
              <div class="rectangle-8"></div>
            </div>
            <p class="text-wrapper">Help us customize your experience</p>


 
            </div>

            <div class="text-wrapper-2">Who are you?</div>
            <div class="p">
              <div class="overlap-7">
                <div class="text-wrapper-3">Parent</div>
              </div>
            </div>
            <div class="s-2">
              <div class="overlap-7">
                <div class="text-wrapper-3">Student</div>
              </div>
            </div>
            <p class="text-wrapper-4">Why are you signing for this free trial?</p>
            <div class="WTSFML">
              <div class="overlap-8">
                <div class="rectangle-10"></div>
                <p class="text-wrapper-5">Want to subscribe for more levels</p>
              </div>
            </div>
            <div class="JWTFT">
              <div class="overlap-8">
                <div class="rectangle-10"></div>
                <p class="text-wrapper-5">Just want the free trial</p>
              </div>
            </div>
            <p class="text-wrapper-6">When are you planning to subscribe to unlock all the levels?</p>
            <div class="ATFT">
              <div class="overlap-9">
                <div class="text-wrapper-7">After the free trial</div>
              </div>
            </div>
            <div class="TW">
              <div class="overlap-9">
                <div class="text-wrapper-7">This week</div>
              </div>
            </div>
            <div class="TM">
              <div class="overlap-9">
                <div class="text-wrapper-7">This month</div>
              </div>
            </div>
            <div class="JE">
              <div class="overlap-9">
                <div class="text-wrapper-7">Just exploring</div>
              </div>
            </div>
<form method="post" action="sign3.php" style="all: unset;">
  <!-- زر Submit -->
<div class="s">
  <button type="submit" name="action" value="submit" class="overlap-6" style="all: unset; cursor: pointer;">
    <div class="rectangle-9"></div>
    <div class="start-your-free">Submit</div>
  </button>
</div>

  <!-- الزر الثاني -->
  <button type="submit" name="action" value="subscribe" style="all: unset; cursor: pointer;">
    <div class="subscription">
      <div class="overlap-10">
        <div class="text-wrapper-8">Subscribe</div>
      </div>
    </div>
  </button>

  <!-- الحقول المخفية -->
  <input type="hidden" name="user_type" id="user_type">
  <input type="hidden" name="signup_reason" id="signup_reason">
</form>


          </div>
        </div>
      </div>
    </div>
<script>
  const allOptions = document.querySelectorAll('.text-wrapper-3, .text-wrapper-5, .text-wrapper-7');

  allOptions.forEach(option => {
    option.addEventListener('click', () => {
      let className = '';
      if (option.classList.contains('text-wrapper-3')) className = 'text-wrapper-3';
      if (option.classList.contains('text-wrapper-5')) className = 'text-wrapper-5';
      if (option.classList.contains('text-wrapper-7')) className = 'text-wrapper-7';

      document.querySelectorAll('.' + className).forEach(el => el.classList.remove('selected'));
      option.classList.add('selected');

      if (className === 'text-wrapper-3') {
        document.getElementById("userTypeInput").value = option.textContent.trim();
      }
      if (className === 'text-wrapper-5') {
        document.getElementById("signupReasonInput").value = option.textContent.trim();
      }
      if (className === 'text-wrapper-7') {
        document.getElementById("subscriptionPlanInput").value = option.textContent.trim();
      }
    });
  });
</script>

  </body>
</html>
