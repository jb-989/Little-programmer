
<?php
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Little Programmer</title>
  <link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Alice', serif;
      background-color: #FFF8E4;
      padding-top: 80px; /* مساحة للهيدر الثابت */
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #f2c6de;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 30px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 999;
    }

    .logo-section {
      display: flex;
      align-items: center;
    }

    .icon svg {
      height: 40px;
    }

    .title {
      font-size: 20px;
      font-weight: bold;
      color: #fff;
      margin-left: 10px;
    }

    nav {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .nav-button,
    .program-button {
      background-color: transparent;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 1rem;
      border: none;
      cursor: pointer;
      transition: background: 0.3s ease;
    }

    .nav-button:hover,
    .program-button:hover {
      background-color: rgba(255, 248, 228, 0.2);
    }

    .popup-container {
      display: none;
      position: fixed;
      z-index: 2000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .popup-content {
      background-color: #DAF3FF;
      margin: 10% auto;
      padding: 20px;
      border-radius: 10px;
      width: 80%;
      max-width: 400px;
      border: 1px solid #888;
    }

    .popup-item {
      display: flex;
      align-items: center;
      padding: 10px;
      border-bottom: 2px solid #9EA2A6;
      cursor: pointer;
    }

    .popup-item:last-child {
      border-bottom: none;
    }

    .popup-item img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }

    .close-button {
      float: right;
      font-size: 24px;
      font-weight: bold;
      color: #333;
      cursor: pointer;
    }

    .close-button:hover {
      color: #000;
    }

    @media (max-width: 768px) {
      nav {
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 10px;
      }

      header {
        flex-direction: column;
        align-items: flex-start;
      }

      .logo-section {
        margin-bottom: 10px;
      }
    }
  
  </style>
</head>
<body>
<header>
    <div class="logo-section">
      <div class="icon">
              <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="49" height="49" rx="10" fill="#F2C6DE"/>
            <path d="M23.4793 12.2499C14.3367 12.2499 9.76341 12.2499 6.92345 14.6428C4.0835 17.0356 4.0835 20.8841 4.0835 28.5833C4.0835 36.2824 4.0835 40.133 6.92345 42.5237C9.76341 44.9145 14.3347 44.9166 23.4793 44.9166C32.6219 44.9166 37.1952 44.9166 40.0352 42.5237C42.8752 40.1309 42.8752 36.2824 42.8752 28.5833C42.8752 26.1945 42.8752 24.1773 42.7915 22.4583M37.771 4.08325L38.2977 5.50629C38.9878 7.37238 39.3329 8.30542 40.0127 8.98529C40.6947 9.66721 41.6277 10.0123 43.4938 10.7023L44.9168 11.2291L43.4938 11.7558C41.6277 12.4459 40.6947 12.791 40.0148 13.4708C39.3329 14.1528 38.9878 15.0858 38.2977 16.9519L37.771 18.3749L37.2442 16.9519C36.5542 15.0858 36.2091 14.1528 35.5292 13.4729C34.8473 12.791 33.9143 12.4459 32.0482 11.7558L30.6252 11.2291L32.0482 10.7023C33.9143 10.0123 34.8473 9.66721 35.5272 8.98733C36.2091 8.30542 36.5542 7.37238 37.2442 5.50629L37.771 4.08325Z" stroke="#FFF8E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M31.6462 24.4999L34.1513 26.658C35.2027 27.5665 35.7295 28.0198 35.7295 28.5833C35.7295 29.1468 35.2027 29.6 34.1513 30.5085L31.6462 32.6666M15.3128 24.4999L12.8077 26.658C11.7562 27.5665 11.2295 28.0198 11.2295 28.5833C11.2295 29.1468 11.7562 29.6 12.8077 30.5085L15.3128 32.6666M25.5212 22.4583L21.4378 34.7083" stroke="#FFF8E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <!-- يمكنك تعديل شكل الشعار هنا حسب الحاجة -->
          <path d="M15 24L20 30L35 15" stroke="#FFF8E4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <span class="title">Little programmer</span>
    </div>
    <nav>
      <a href="home.php" class="nav-button">Home</a>
      <a href="aboutus.php" class="nav-button">About Us</a>
      <a href="sign1.php" class="nav-button">SIGN IN</a>
    </nav>
  </header>

  <!-- نافذة البرامج -->
<div id="myPopup" class="popup-container" style="display: none;">
  <div class="popup-content">
    <span class="close-button" onclick="closePopup()">&times;</span>

    <div class="popup-item">
      <span>Beginner</span>
    </div>

    <div class="popup-item">
      <span>Intermediate</span>
    </div>

    <div class="popup-item">
      <span>Advanced</span>
    </div>

    <div class="popup-item">
      <img src="https://i.ibb.co/FbbpMZZd/robot-lang.webp" alt="Robot Language" style="width: 50px; height: auto; margin-right: 10px;">
      <span>Robot Language</span>
      <img src="https://i.ibb.co/VYdJ6ZV4/future-plan.png" alt="future-plan" style="width: 70px; height: auto; margin-left: auto;">
    </div>
  </div>
</div>

<script>
  function closePopup() {
    document.getElementById('myPopup').style.display = 'none';
  }
</script>

</body>
 <div class="footer">
       Little Programmar &copy; -2025 
    </div>
</html>