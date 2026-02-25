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
    max-width: 1000px; /* زيادة عرض الصورة الكبيرة */
    height: auto; /* الحفاظ على نسبة العرض إلى الارتفاع */
    margin: 20px 0; /* إضافة مسافة أعلى وأسفل الصورة */
    position: relative; /* لجعل الصورة الكبيرة هي الحاوية */
}



.small-image {
    max-width: 220px; /* عرض الصورة الصغيرة */
    height: auto;
    position: absolute; /* وضع الصورة الصغيرة داخل الصورة الكبيرة */
    bottom: 15%; /* موضع الصورة الصغيرة من الأسفل */
    right: 20%; /* موضع الصورة الصغيرة من اليمين */
}

.image-container {
    position: relative; /* لجعل الصور المتوسطة والصغيرة تتداخل مع الصورة الكبيرة */
    display: flex;
    justify-content: center; /* محاذاة الصورة الكبيرة في الوسط */
    margin: 20px 0;
}
.text-overlay {
    position: absolute;
    top: 5%;
    left: 0%;
    right: 5%;
    color: black;
    padding: 100px;
    border-radius: 10px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    line-height: 1.6;
}


</style>
<body>
     <?php include 'header2.php'; ?>
    
    </div>
    <div class="container">
        <div class="image-container">
            <img src="images/Screenshot 2025-05-05 002532.png" alt="Large Image" class="image"> <!-- الصورة الكبيرة -->
    <div class="text-overlay">
        <h3>✅ Getting Started – What You Need to Use the Website</h3>
        <p>🖥️ <strong>You need a computer or laptop:</strong> The website works best on a computer or laptop. It’s not recommended to use a mobile phone or tablet.</p><br>
        <p>🌐 <strong>You need a good internet connection:</strong> Make sure your internet is working well. A Wi-Fi connection is better than mobile data.</p><br>
        <p>💬 <strong>You should know a little bit of English (not always required):</strong> Many websites use English. Some websites (like Scratch) let you change the language to Arabic. It’s helpful to have someone who can help you with English at the beginning.</p><br>
        <p>👨‍👩‍👧‍👦 <strong>Have someone with you in the beginning (a parent or teacher):</strong> It's good to have help when you: create an account, learn how to use the website, and choose your first project.</p><br>
    </div>
</div>
            <a href="sign1.php"> <!-- رابط للصورة الصغيرة -->
                <img src="https://i.postimg.cc/pTtg8cHm/regnow.png" alt="Small Image" class="small-image"> <!-- الصورة الصغيرة -->
            </a>
        </div>
    </div>
</div>
</body>
</html>