<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us</title>
  <style>
 body {
    background-color: #FFF8E4;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    min-height: 100vh;
    border: 10px solid #C9E4DE; /* لون الإطار */
    box-sizing: border-box;
    position: relative; /* تغيير من absolute إلى relative */
    border-radius: 15px; /* إضافة زوايا مدورة للإطار */
    border-color: #F2C6DE #C6DEF1 #DBCDF0 #C9E4DE;
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
      min-width: 70%;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 2rem;
    }

    .large-image {
      max-width: 700px;
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .image-wrapper {
      position: relative;
      display: inline-block;
      width: 100%;
      max-width: 700px;
    }

    .image-text {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      font-size: 20px;
      font-weight: bold;
      text-shadow: 3px 3px 7px #F2C6DE;
      z-index: 1;
      width: 90%;
      padding: 10px;
     color:rgb(134, 134, 134);
      border-radius: 10px;
      text-align: left;
    }

    h1 {
      margin-bottom: 30px;
      font-size: 40px;
      color: #F2C6DE;
      text-shadow: 1px 1px 3px #000000;
    }
  </style>
</head>
<body>
  <?php include 'header3.php'; ?>
  

  
  <div class="container">
    <h1>About Us </h1>
    <div class="image-wrapper">
      <div class="image-text"> < / ><br>
        Welcome to the world of Little Programmer!<br><br><br>
        On our website, we'll take you on an exciting journey to learn programming <br>in an easy and fun way.<br>
        You'll learn how to write magical codes that create amazing games and websites, <br> create your own stories, and achieve achievements!<br>
        You'll find an amazing board to write your code and see results instantly!
        <br>Plus, fun games and engaging quizzes at every level, ensuring that learning will be fun and challenging!<br>
        Join us and discover how coding can become an adventure!<br>< / >
      </div>
      <img src="abu.png" alt="About Us Image" class="large-image">
    </div>
  </div>

</body>
</html>
