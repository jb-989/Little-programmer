<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>start learning</title>
    <!-- <link rel="stylesheet" href="cstart.css">  -->
</head>
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
    position: relative;
    overflow: hidden;
    min-width: 70%;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    flex-grow: 1; /* لتعبئة المساحة المتاحة */
    justify-content: center; /* لتحريك المحتوى للوسط */
}

.image {
    max-width: 800px; /* زيادة عرض الصورة الكبيرة */
    height: auto; /* الحفاظ على نسبة العرض إلى الارتفاع */
    margin: 20px 0; /* إضافة مسافة أعلى وأسفل الصورة */
    position: relative; /* لجعل الصورة الكبيرة هي الحاوية */
}

.medium-image {
   width: 333px;
height: 333px;
left: 400px;
top: 300px;
    position: absolute; /* وضع الصورة المتوسطة فوق الصورة الكبيرة */
     /* مركز الصورة أفقياً */
    transform: translate(-50%, -50%);
}

.small-image {
    max-width: 220px; /* عرض الصورة الصغيرة */
    height: auto;
    position: absolute; /* وضع الصورة الصغيرة داخل الصورة الكبيرة */
    bottom: 7%; /* موضع الصورة الصغيرة من الأسفل */
    right: 7%; /* موضع الصورة الصغيرة من اليمين */
}

.image-container {
    position: relative; /* لجعل الصور المتوسطة والصغيرة تتداخل مع الصورة الكبيرة */
    display: flex;
    justify-content: center; /* محاذاة الصورة الكبيرة في الوسط */
    margin: 20px 0;
}


</style>
<body>
     <?php include 'header2.php'; ?>
    
    </div>
    <div class="container">
        <div class="image-container">
            <img src="images/Screenshot 2025-05-05 002532.png" alt="Large Image" class="image"> <!-- الصورة الكبيرة -->
          
            <img src="https://storage.googleapis.com/figment-image-store/tender-kangaroo-p2ed_463:670.png"  class="medium-image"></img> <!-- الصورة المتوسطة -->
            <a href="video.php"> <!-- رابط للصورة الصغيرة -->
                <img src="images/startp.png" alt="Small Image" class="small-image"> <!-- الصورة الصغيرة -->
            </a>
        </div>
    </div>
</div>
</body>
</html>