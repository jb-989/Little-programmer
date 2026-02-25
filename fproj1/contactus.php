<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact Us</title>
    <style>
       body {
    background-color: #FFF8E4;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    font: size 50px;
    min-height: 100vh;
    border: 10px solid #C9E4DE; /* لون الإطار */
    box-sizing: border-box;
    position: relative; /* تغيير من absolute إلى relative */
    border-radius: 15px; /* إضافة زوايا مدورة للإطار */
    border-color: #F2C6DE #C6DEF1 #DBCDF0 #C9E4DE;
}

        .contact-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin-top: 20px;
        }

        .contact-row {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-bottom: 10px;
        }

        .contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 5px;
            text-align: center;
        }

        .contact-item img {
            max-width: 100px; /* ضبط الحجم */
            max-height: 100px; /* ضبط الحجم */
            margin-bottom: 5px;
        }

        .middle-image {
            max-width: 500px;
            max-height: 700px;
            margin-top: 20px;
            margin-bottom: 0;
          left:30px;
           margin: 20px auto; /* مركز الصورة عمودياً وأفقياً */
    display: block;
        }

        .r {
            width: 100%; /* جعلها ملء العرض */
            background-color: rgba(255, 218, 196, 1);
            opacity: 1;
            padding: 5px;
            
        }
    </style>
</head>
<body>
    <?php include 'header3.php'; ?>
    <div class="contact-section">
        <h1>CONTACT US</h1><br><br>
        <div class="r">
            <div class="contact-row">
                <div class="contact-item">
                    <img src="https://storage.googleapis.com/figment-image-store/massive-belgium-y29j_743:499.png" alt="Email">
                    <h2>noja7005@gmail.com</h2>
                </div>
                <div class="contact-item">
                    <img src="https://storage.googleapis.com/figment-image-store/massive-belgium-y29j_743:500.png" alt="Phone">
                    <h2>+966500282383</h2>
                </div>
            </div>
            <div class="contact-row">
                <div class="contact-item">
                    <img src="https://storage.googleapis.com/figment-image-store/enough-england-907l_986:460.png" alt="Instagram">
                    <h2>Little_programmer</h2>
                </div>
                <div class="contact-item">
                    <img src="https://storage.googleapis.com/figment-image-store/enough-england-907l_743:495.png" alt="Twitter">
                    <h2>Little_programmer</h2>
                </div>
            </div>
        </div>
    </div>
   <img src="https://storage.googleapis.com/figment-image-store/freezing-russia-yj8a_743:493.png"
 alt="Middle Image" class="middle-image " />
</body>
</html>