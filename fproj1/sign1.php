<?php
session_start(); // بدء الجلسة
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تخزين البيانات في الجلسة بدلاً من قاعدة البيانات مباشرة
    $_SESSION['signup_data'] = [
        'mobile_number' => $_POST['mobile_number'] ?? '',
        'grade' => $_POST['grade'] ?? '',
        'has_laptop' => $_POST['has_laptop'] ?? ''
    ];

    // التأكد من تعبئة جميع الحقول
    if (!empty($_SESSION['signup_data']['mobile_number'])) {
        header("Location: sign2.php"); // الانتقال للصفحة التالية
        exit();
    } else {
        echo "<script>alert('يرجى إدخال رقم الجوال');</script>";
    }
}
?>
<?php include  'head.html'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="utf-8" />
<link rel="stylesheet" href="sig.css" />
<style>
  .clickable { cursor: pointer; transition: 0.3s ease; }
  .clickable:hover { transform: scale(1.05); }
  .selected { border: 2px solid #4CAF50; background-color: #e8f5e9; }
  .box-2 input { /* Style for input inside .box-2 */
    width: 100%;
    border: none;
    outline: none;
    padding: 10px;
    font-size: 16px;
  }
  /* Ensure .real-input is also styled if it's the primary one */
  .real-input {
    /* You might want to add specific styles for .real-input if not covered by sig.css */
    padding: 10px;
    font-size: 16px;
    width: calc(100% - 22px); /* Example width, adjust as needed */
    margin-top: 5px; /* Example margin */
    border: 1px solid #ccc; /* Example border */
  }
  .next {
  position: relative !important;
  z-index: 9999 !important;
  pointer-events: auto !important;
}

</style>


<div class="sign-in-page">
  <div class="overlap-wrapper">
    <div class="overlap">
      <div class="overlap-group">
        
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
        <div class="rectangle-4"></div>
        
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
        <div class="text-wrapper-2">&lt; / &gt;</div>
        <div class="flex">
          <div class="overlap-6">
            <p class="flexible-scheduling">
              Flexible scheduling makes it easy to fit into your family's routine, and every student earns a
              recognized certification.
            </p>
          </div>
          <div class="rectangle-5"></div>
        </div>
        <div class="give">
          <div class="group">
            <p class="p">
              Give your child a head start with expert-led coding lessons designed to spark creativity and
            <br> build real-world skills.
            </p>
          </div>
          <div class="rectangle-5"></div>
        </div>
        <div class="text-wrapper-3">&lt; / &gt;</div>
        <div class="game"></div>
        <div class="element">
                    
   <div style="position: absolute; top: 165px; left: -105px; width: 30px; z-index: 10;">
  <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.45983 24.4851H34.5562C34.977 24.4851 35.3554 24.7578 35.5125 25.174L38.9256 34.2204C38.9748 34.3508 39.0001 34.4901 39.0001 34.6307V35.4634C39.0001 36.0704 38.5386 36.5625 37.9693 36.5625H1.25642C0.687111 36.5625 0.225586 36.0705 0.225586 35.4634V34.6187C0.225586 34.4859 0.248133 34.3542 0.292236 34.23L3.49564 25.1956C3.64723 24.768 4.03113 24.4851 4.45983 24.4851Z" fill="#ADB8BC"/>
<path d="M4.65129 1.46741H34.4657C34.9698 1.46741 35.3785 1.87607 35.3785 2.38017V23.6054C35.3785 24.1095 34.9698 24.5182 34.4657 24.5182H4.65129C4.14719 24.5182 3.73853 24.1095 3.73853 23.6054V2.38017C3.73845 1.87607 4.14719 1.46741 4.65129 1.46741Z" fill="#C5CFD1"/>
<path d="M6.59174 5.17102H32.5252C33.0449 5.17102 33.4663 5.59233 33.4663 6.11212V21.5774C33.4663 22.0971 33.045 22.5185 32.5252 22.5185H6.59174C6.07202 22.5185 5.65063 22.0972 5.65063 21.5774V6.11212C5.65063 5.5924 6.07202 5.17102 6.59174 5.17102Z" fill="#C6DEF1"/>
<path d="M32.4211 4.22383C32.8768 4.22383 33.2463 3.85439 33.2463 3.39866C33.2463 2.94293 32.8768 2.57349 32.4211 2.57349C31.9654 2.57349 31.5959 2.94293 31.5959 3.39866C31.5959 3.85439 31.9654 4.22383 32.4211 4.22383Z" fill="#FF473E"/>
<path d="M29.9306 4.22383C30.3864 4.22383 30.7558 3.85439 30.7558 3.39866C30.7558 2.94293 30.3864 2.57349 29.9306 2.57349C29.4749 2.57349 29.1055 2.94293 29.1055 3.39866C29.1055 3.85439 29.4749 4.22383 29.9306 4.22383Z" fill="#D7F4F7"/>
<path d="M9.27028 29.8502L8.89292 30.9204C8.82627 31.1094 8.63356 31.2376 8.41601 31.2376H5.95109C5.61128 31.2376 5.37005 30.9354 5.47417 30.6401L5.85153 29.5699C5.91818 29.3808 6.1109 29.2526 6.32844 29.2526H8.79336C9.13317 29.2526 9.3744 29.5549 9.27028 29.8502ZM14.8646 29.2526H12.3718C12.1356 29.2526 11.9315 29.4032 11.882 29.614L11.6305 30.6843C11.5637 30.969 11.8014 31.2376 12.1204 31.2376H14.6131C14.8493 31.2376 15.0535 31.087 15.103 30.8761L15.3544 29.8059C15.4213 29.5212 15.1836 29.2526 14.8646 29.2526ZM27.5949 30.6843L27.3435 29.614C27.294 29.4032 27.0898 29.2526 26.8536 29.2526H24.3609C24.0419 29.2526 23.8042 29.5212 23.8711 29.8059L24.1225 30.8761C24.172 31.087 24.3762 31.2376 24.6124 31.2376H27.1051C27.4241 31.2376 27.6618 30.9691 27.5949 30.6843ZM21.392 30.7154L21.2243 29.6452C21.189 29.4199 20.9777 29.2526 20.7284 29.2526H18.4974C18.2482 29.2526 18.0368 29.4199 18.0015 29.6451L17.8335 30.7153C17.7903 30.9909 18.0245 31.2376 18.3295 31.2376H20.8961C21.201 31.2376 21.4352 30.991 21.392 30.7154ZM29.2432 34.3804L28.7655 33.278C28.7291 33.0459 28.5114 32.8735 28.2546 32.8735H11.3054C11.0486 32.8735 10.8309 33.0458 10.7945 33.2778L10.3166 34.3803C10.272 34.6642 10.5133 34.9183 10.8275 34.9183H28.7323C29.0465 34.9183 29.2877 34.6643 29.2432 34.3804ZM33.7512 30.6401L33.3739 29.5699C33.3072 29.3808 33.1145 29.2526 32.897 29.2526H30.432C30.0922 29.2526 29.851 29.5549 29.9551 29.8502L30.3325 30.9204C30.3991 31.1094 30.5919 31.2376 30.8094 31.2376H33.2743C33.6141 31.2376 33.8554 30.9353 33.7512 30.6401ZM9.81087 25.9898H7.57781C7.38068 25.9898 7.20617 26.1059 7.14577 26.2772L6.80391 27.2467C6.70961 27.5142 6.92814 27.788 7.23595 27.788H9.46901C9.66614 27.788 9.84065 27.6719 9.90106 27.5007L10.2429 26.5311C10.3373 26.2636 10.1188 25.9898 9.81087 25.9898ZM15.3111 25.9898H13.0528C12.8389 25.9898 12.6539 26.1262 12.609 26.3172L12.3812 27.2868C12.3206 27.5448 12.536 27.788 12.825 27.788H15.0833C15.2972 27.788 15.4822 27.6516 15.527 27.4606L15.7549 26.4911C15.8155 26.2331 15.6002 25.9898 15.3111 25.9898ZM26.8442 27.2868L26.6164 26.3172C26.5715 26.1262 26.3866 25.9898 26.1726 25.9898H23.9143C23.6253 25.9898 23.4099 26.2331 23.4705 26.4911L23.6984 27.4606C23.7432 27.6516 23.9282 27.788 24.1421 27.788H26.4004C26.6894 27.788 26.9048 27.5448 26.8442 27.2868ZM21.2247 27.315L21.0727 26.3455C21.0407 26.1414 20.8492 25.9899 20.6234 25.9899H18.6022C18.3765 25.9899 18.185 26.1414 18.1529 26.3455L18.0008 27.315C17.9616 27.5647 18.1738 27.7881 18.4501 27.7881H20.7754C21.0516 27.788 21.2638 27.5646 21.2247 27.315ZM32.4216 27.2467L32.0797 26.2772C32.0193 26.1059 31.8447 25.9898 31.6477 25.9898H29.4146C29.1068 25.9898 28.8883 26.2636 28.9826 26.5311L29.3244 27.5007C29.3848 27.672 29.5594 27.788 29.7565 27.788H31.9895C32.2973 27.788 32.5159 27.5142 32.4216 27.2467ZM18.5015 3.7901H20.3896C20.551 3.7901 20.7057 3.72601 20.8198 3.61193C20.9338 3.49785 20.9979 3.34313 20.9979 3.18179C20.9979 3.02046 20.9338 2.86574 20.8198 2.75166C20.7057 2.63758 20.551 2.57349 20.3896 2.57349H18.5015C18.3402 2.57349 18.1855 2.63758 18.0714 2.75166C17.9573 2.86574 17.8932 3.02046 17.8932 3.18179C17.8932 3.26168 17.909 3.34079 17.9395 3.4146C17.9701 3.4884 18.0149 3.55547 18.0714 3.61196C18.1279 3.66844 18.1949 3.71325 18.2687 3.74382C18.3426 3.77439 18.4217 3.79011 18.5015 3.7901Z" fill="#6F7782"/>
</svg>
</div>
          <div class="rectangle-6"></div>
          <div class="rectangle-7"></div>
          <div class="rectangle-8"></div>
          <div class="rectangle-9"></div>
        </div>
          <div class="box">
            <div class="twemoji-flag-saudi">
            <div class="text-wrapper-4">+966</div>
            </div>
          </div>
          <div class="box-2"></div>
          <div class="text-wrapper-6">Country Code</div>
          <div class="text-wrapper-7">Mobile Number (in box above)</div> <div class="text-wrapper-8">Select Child’s Grade</div>
          <div class="text-wrapper-9">Elementary school</div>
          <div class="box-3">
            <div class="overlap-8">
              <div class="text-wrapper-10">Grade</div>
              <div class="text-wrapper-11">4</div>
            </div>
          </div>
          <div class="box-4">
            <div class="overlap-8">
              <div class="text-wrapper-10">Grade</div>
              <div class="text-wrapper-11">5</div>
            </div>
          </div>

          <div class="text-wrapper-5">Mobile Number</div>
<div class="box-2">
    <input type="text" id="visible_mobile_input" placeholder="Enter Mobile Number" class="real-input" required />
 </div>
</div>
          <div class="box-5">
            <div class="overlap-8">
              <div class="text-wrapper-10">Grade</div>
              <div class="text-wrapper-11">7</div>
            </div>
          </div>
          <div class="box-6">
            <div class="overlap-8">
              <div class="text-wrapper-10">Grade</div>
              <div class="text-wrapper-11">8</div>
            </div>
          </div>
          <div class="box-7">
            <div class="overlap-8">
              <div class="text-wrapper-10">Grade</div>
              <div class="text-wrapper-11">9</div>
            </div>
          </div>
          <div class="box-8">
            <div class="overlap-8">
              <div class="text-wrapper-10">Grade</div>
              <div class="text-wrapper-11">6</div>
            </div>
          </div>

          <div class="sign-in-regisrariton">Sign In & Regisrariton</div>
          <p style="position: absolute; top: 770px; left: 815px; color:#ffda79; font-size:18px; font-weight:bold; margin: 0; text-align: center;">
               Do you have a Laptop or Desktop? </p>
          <div class="yes">
            <div class="rectangle-10"></div>
            <div class="text-wrapper-13">Yes</div>
          </div>
          <div class="no">
            <div class="rectangle-10"></div>
            <div class="text-wrapper-13">No</div>
          </div>
    <div class="next">
  <form method="post" action="" style="all: unset;">
    <button type="submit" style="all: unset; width: 100%; height: 100%; display: block; cursor: pointer;">
      <div class="next-wrapper">
        <div class="text-wrapper">Next</div>
      </div>
    </button>
    <input type="hidden" name="grade" id="gradeInput" />
    <input type="hidden" name="has_laptop" id="laptopInput" />
    <input type="hidden" name="mobile_number" id="mobileInput" />
  </form>
</div>
          <p class="text-wrapper-14">Prepare Your Child for a Tech-Driven Future</p>
          <p class="fun-educational">Fun & Educational Coding Classes for Ages 9–15</p>
          <p class="empower-your-child">
           Empower your child to become a tech superhero 🚀 enroll today!
          </p>
       </div>
    </div>
  </div>
</div>
<script>
  // تحديد الصف
  const gradeBoxes = document.querySelectorAll('[class^="box-"]');
  const gradeInput = document.getElementById("gradeInput");
  gradeBoxes.forEach(box => {
    box.addEventListener("click", function () {
      gradeBoxes.forEach(b => b.classList.remove("selected"));
      this.classList.add("selected");
      const gradeText = this.querySelector(".text-wrapper-11")?.innerText;
      if (gradeText) gradeInput.value = gradeText;
    });
  });


  // تحديد Yes / No
  const yesBtn = document.querySelector(".yes");
  const noBtn = document.querySelector(".no");
  const laptopInput = document.getElementById("laptopInput");

  yesBtn.addEventListener("click", function () {
    yesBtn.classList.add("selected");
    noBtn.classList.remove("selected");
    laptopInput.value = "Yes";
  });

  noBtn.addEventListener("click", function () {
    noBtn.classList.add("selected");
    yesBtn.classList.remove("selected");
    laptopInput.value = "No";
  });
document.querySelector("form").addEventListener("submit", function (e) {
  // انسخ الرقم إلى hidden input قبل الإرسال
document.getElementById("mobileInput").value = document.getElementById("visible_mobile_input").value;

  // تأكيد إن الزر اشتغل
  alert("تم إرسال النموذج بنجاح!");
});

</script>
  </body>
</html>
