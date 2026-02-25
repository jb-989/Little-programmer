<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Little Programmer</title>
  <link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="BoardStyle.css" />
</head>
<body>
    <div class="colored-border-box">
    </div>
  <div class="board">
    <!-- <header class="header">
      <div class="logo-section">
        <div class="icon"><svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="49" height="49" rx="10" fill="#F2C6DE"/>
            <path d="M23.4793 12.2499C14.3367 12.2499 9.76341 12.2499 6.92345 14.6428C4.0835 17.0356 4.0835 20.8841 4.0835 28.5833C4.0835 36.2824 4.0835 40.133 6.92345 42.5237C9.76341 44.9145 14.3347 44.9166 23.4793 44.9166C32.6219 44.9166 37.1952 44.9166 40.0352 42.5237C42.8752 40.1309 42.8752 36.2824 42.8752 28.5833C42.8752 26.1945 42.8752 24.1773 42.7915 22.4583M37.771 4.08325L38.2977 5.50629C38.9878 7.37238 39.3329 8.30542 40.0127 8.98529C40.6947 9.66721 41.6277 10.0123 43.4938 10.7023L44.9168 11.2291L43.4938 11.7558C41.6277 12.4459 40.6947 12.791 40.0148 13.4708C39.3329 14.1528 38.9878 15.0858 38.2977 16.9519L37.771 18.3749L37.2442 16.9519C36.5542 15.0858 36.2091 14.1528 35.5292 13.4729C34.8473 12.791 33.9143 12.4459 32.0482 11.7558L30.6252 11.2291L32.0482 10.7023C33.9143 10.0123 34.8473 9.66721 35.5272 8.98733C36.2091 8.30542 36.5542 7.37238 37.2442 5.50629L37.771 4.08325Z" stroke="#FFF8E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M31.6462 24.4999L34.1513 26.658C35.2027 27.5665 35.7295 28.0198 35.7295 28.5833C35.7295 29.1468 35.2027 29.6 34.1513 30.5085L31.6462 32.6666M15.3128 24.4999L12.8077 26.658C11.7562 27.5665 11.2295 28.0198 11.2295 28.5833C11.2295 29.1468 11.7562 29.6 12.8077 30.5085L15.3128 32.6666M25.5212 22.4583L21.4378 34.7083" stroke="#FFF8E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </div> -->
        <!-- <span class="title">Little programmer</span>
      </div>
      <nav class="nav">
        <button class="nav-button">Home</button> -->
      </nav>
      
 
    </header>
    <body>
 <?php include 'header2.php'; ?>
      <h2>Compiler HTML / CSS / JavaScript</h2>
    
      <label>HTML:</label>
      <textarea id="htmlCode"><h1>Hello</h1></textarea>
    
      <label>CSS:</label>
      <textarea id="cssCode">h1 { color: blue; text-align: center; }</textarea>
    
      <label>JavaScript:</label>
      <textarea id="jsCode">console.log("Hello from JS");</textarea>
    
      <button onclick="runCode()">Run</button>
    
      <h3>Result</h3>
      <iframe id="preview"></iframe>
    
      <script>
        function runCode() {
          const html = document.getElementById("htmlCode").value;
          const css = `<style>${document.getElementById("cssCode").value}</style>`;
          const js = `<script>${document.getElementById("jsCode").value}<\/script>`;
    
          const result = html + css + js;
          const previewFrame = document.getElementById("preview");
          previewFrame.srcdoc = result;
        }
    
        // تشغيل أولي تلقائي
        runCode();
      </script>
    
    </body>
      
  </div>


</body>

</html>
