<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Little Coder Game</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap');
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Comic Neue', cursive;
            background: #FFF8E4;
            overflow-x: hidden;
            user-select: none;
        }
        
        .game-container {
            width: 50%;
            max-width: 1512px;
            min-height: 982px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }
     
        
        /* Stars Container - Moved to main content */
        .stars-display {
            width: 90%;
            margin: 0 auto 30px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50px;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .stars-label {
            font-size: 24px;
            font-weight: bold;
            color: #800080;
        }
        
        .stars-count {
            font-size: 28px;
            font-weight: bold;
            color: #FFD700;
            min-width: 30px;
            text-align: center;
        }
        
        .star {
            width: 30px;
            height: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFD700"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
            background-size: contain;
        }
        
        /* Rest of the CSS remains the same */
        .game-area {
            display: flex;
            flex-direction: row-reverse;
            flex-wrap: nowrap;
            justify-content: space-between;
            padding: 0 5%;
            gap: 30px;
        }
        
        .words-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 50%;
            margin-bottom: 40px;
        }
        
        .word-box {
            width: 130px;
            height: 75px;
            background: #F0F0F0;
            border: 10px solid #888;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: grab;
            transition: all 0.3s ease;
            font-size: 20px;
            color: #555;
            text-align: center;
            border-radius: 15px;
            font-weight: bold;
        }
        
        .word-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .word-box.dragging {
            opacity: 0.7;
            transform: scale(1.05);
        }
        
        .questions-container {
            width: 80%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        
        .question-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }
        
        .question-box {
            flex: 1;
            height: 150px;
            display: flex;
            position: relative;
            max-width: 350px;
        }
        
        .question-side {
            width: 7%;
            background: rgba(173, 120, 251, 0.68);
            border-radius: 15px 0 0 15px;
        }
        
        .question-main {
            flex: 1;
            border: 2px solid rgba(173, 120, 251, 0.68);
            background: white;
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-size: 22px;
            color: rgba(173, 120, 251, 0.9);
            border-radius: 0 15px 15px 0;
            font-weight: bold;
        }
        
        .answer-box {
            width: 140px;
            height: 90px;
            border: 3px dashed rgba(173, 120, 251, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
            border-radius: 15px;
            font-size: 30px;
            color: rgba(173, 120, 251, 0.3);
            position: relative;
        }
        
        .answer-box::before {
            content: "?";
            position: absolute;
        }
        
        .answer-box.hovered {
            background: rgba(219, 205, 240, 0.3);
            border-style: solid;
        }
        
        .answer-box.correct {
            background: rgba(144, 238, 144, 0.3);
            border-color: green;
        }
        
        .answer-box.incorrect {
            background: rgba(255, 182, 193, 0.3);
            border-color: red;
        }
        
        .answer-box .feedback-icon {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 40px;
            height: 40px;
            display: none;
        }
        
        .answer-box.correct .feedback-icon.correct,
        .answer-box.incorrect .feedback-icon.incorrect {
            display: block;
        }
        
        .feedback {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 40px;
            border-radius: 10px;
            font-size: 24px;
            font-weight: bold;
            color: white;
            background: rgba(0, 0, 0, 0.8);
            z-index: 100;
            display: none;
        }
        
        .result-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 50%;
            height: 50%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 200;
            display: none;
        }
        
        .result-content {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 600px;
        }
        
        .result-title {
            font-size: 18px;
            color: #800080;
            margin-bottom: 20px;
        }
        
        .result-stars {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }
        
        .result-star {
            width: 50px;
            height: 50px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23FFD700"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>');
            background-size: contain;
            opacity: 0.3;
        }
        
        .result-star.active {
            opacity: 1;
        }
        
        .result-message {
            font-size: 12px;
            margin-bottom: 30px;
        }
        
        .restart-button {
            background: #800080;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .restart-button:hover {
            transform: scale(1.05);
            background: #6a006a;
        }
        
        @media (max-width: 1200px) {
            .question-row {
                flex-direction: column;
            }
            
            .question-box {
                max-width: 100%;
            }
            
            .answer-box {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    
    <div class="game-container">
        
        <!-- Stars Display - Moved to main content area -->
        <div class="stars-display">
            <div class="stars-label">Your Stars:</div>
            <div class="stars-count" id="starsCount">3</div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
        </div>
        
        <div class="game-area">
    <div class="words-container" id="wordsContainer">
        <!-- Words will be added by JavaScript -->
    </div>

    <div class="questions-container">
        <div class="question-row">
            <div class="question-box">
                <div class="question-side"></div>
                <div class="question-main">The tag &lt;h1&gt; is used to define a ______.</div>
            </div>
            <div class="answer-box" data-question="1">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="feedback-icon correct" alt="Correct">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" class="feedback-icon incorrect" alt="Incorrect">
            </div>
        </div>

        <div class="question-row">
            <div class="question-box">
                <div class="question-side"></div>
                <div class="question-main">The tag &lt;p&gt; is used to define a ______.</div>
            </div>
            <div class="answer-box" data-question="2">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="feedback-icon correct" alt="Correct">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" class="feedback-icon incorrect" alt="Incorrect">
            </div>
        </div>

        <div class="question-row">
            <div class="question-box">
                <div class="question-side"></div>
                <div class="question-main">The &lt;img&gt; tag is used to show an ______.</div>
            </div>
            <div class="answer-box" data-question="3">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="feedback-icon correct" alt="Correct">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" class="feedback-icon incorrect" alt="Incorrect">
            </div>
        </div>

        <div class="question-row">
            <div class="question-box">
                <div class="question-side"></div>
                <div class="question-main">The &lt;br&gt; tag adds a ______.</div>
            </div>
            <div class="answer-box" data-question="4">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="feedback-icon correct" alt="Correct">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" class="feedback-icon incorrect" alt="Incorrect">
            </div>
        </div>

        <div class="question-row">
            <div class="question-box">
                <div class="question-side"></div>
                <div class="question-main">The &lt;hr&gt; tag adds a ______.</div>
            </div>
            <div class="answer-box" data-question="5">
                <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="feedback-icon correct" alt="Correct">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png" class="feedback-icon incorrect" alt="Incorrect">
            </div>
        </div>
    </div>
</div>

        
        <div class="feedback" id="feedback"></div>
        
        <div class="result-screen" id="resultScreen">
            <div class="result-content">
                <h1 class="result-title">Great Job!</h1>
                <p class="result-message">You earned <span id="finalStars">0</span> stars!</p>
                <div class="result-stars" id="resultStars">
                    <div class="result-star"></div>
                    <div class="result-star"></div>
                    <div class="result-star"></div>
                    <div class="result-star"></div>
                    <div class="result-star"></div>
                </div>
                <button class="restart-button" id="restartButton">Play Again</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Programming words and concepts
            const programmingWords = [
            { text: "image", correctAnswer: 3 },    
            { text: "heading", correctAnswer: 1 },
             { text: "line break", correctAnswer: 4 },
            { text: "paragraph", correctAnswer: 2 },
            { text: "horizontal line", correctAnswer: 5 }
            ];            

            const wordsContainer = document.getElementById('wordsContainer');
            const answerBoxes = document.querySelectorAll('.answer-box');
            const feedback = document.getElementById('feedback');
            const starsCount = document.getElementById('starsCount');
            const resultScreen = document.getElementById('resultScreen');
            const finalStars = document.getElementById('finalStars');
            const resultStars = document.getElementById('resultStars');
            const restartButton = document.getElementById('restartButton');
            const navIcons = document.querySelectorAll('.nav-icon');
            
            let stars = 3; // Starting with 3 stars
            let answeredQuestions = 0;
            const totalQuestions = 5;
            
            // Create word boxes
            programmingWords.forEach(word => {
                const wordBox = document.createElement('div');
                wordBox.className = 'word-box';
                wordBox.textContent = word.text;
                wordBox.draggable = true;
                wordBox.dataset.correctAnswer = word.correctAnswer;
                
                wordBox.addEventListener('dragstart', function(e) {
                    e.dataTransfer.setData('text/plain', word.text);
                    this.classList.add('dragging');
                    e.dataTransfer.setData('correctAnswer', word.correctAnswer);
                });
                
                wordBox.addEventListener('dragend', function() {
                    this.classList.remove('dragging');
                });
                
                wordsContainer.appendChild(wordBox);
            });

            let correctAnswers = 0; // متغير جديد لحساب الإجابات الصحيحة
            // Make answer boxes droppable
            answerBoxes.forEach(box => {
                box.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    this.classList.add('hovered');
                });
                
                box.addEventListener('dragleave', function() {
                    this.classList.remove('hovered');
                });
                
                box.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('hovered');
                    
                    // If already answered, don't allow another answer
                    if (this.classList.contains('answered')) return;
                    
                    const word = e.dataTransfer.getData('text/plain');
                    const correctAnswer = e.dataTransfer.getData('correctAnswer');
                    const questionNumber = parseInt(this.dataset.question);
                    
                    this.textContent = word;
                    this.style.fontSize = "24px";
                    this.style.color = "#555";
                    this.classList.add('answered');
                    

                    // Check answer
                    if (parseInt(correctAnswer) === questionNumber) {
                        this.classList.add('correct');
                        this.classList.remove('incorrect');
                        correctAnswers++; // زيادة عدد الإجابات الصحيحة
                        stars++; // Add star for correct answer
                        showFeedback('Correct! You earned a star!', 'green');
                    } else {
                        this.classList.add('incorrect');
                        this.classList.remove('correct');
                        stars = Math.max(0, stars - 1); // Remove star for wrong answer (minimum 0)
                        showFeedback('Oops! Try again next time!', 'red');
                    }

                    
                    // Update stars display
                    updateStars();
                    answeredQuestions++;
                    
                    // Check if all questions are answered
                    if (answeredQuestions === totalQuestions) {
                        setTimeout(showResultScreen, 1500);
                    }
                });
            });
            
            // Update stars display
            function updateStars() {
                starsCount.textContent = stars;
                
                // Update star icons in display
                const starsDisplay = document.querySelectorAll('.stars-display .star');
                starsDisplay.forEach((star, index) => {
                    if (index < stars) {
                        star.style.opacity = '1';
                    } else {
                        star.style.opacity = '0.3';
                    }
                });
            }
            // تعديل دالة showResultScreen
            function showResultScreen() {
                // حساب النتيجة (كل إجابة صحيحة = 20 درجة)
                const score = correctAnswers * 20;
                const percentage = score; // لأن الدرجة من 100
                
                // عرض النتيجة
                finalStars.textContent = `${correctAnswers}/${totalQuestions}`;
                //document.getElementById('percentage').textContent = percentage;
                
                // عرض النجوم بناءً على النسبة
                const starsElements = resultStars.querySelectorAll('.result-star');
                const starsToShow = Math.round(percentage / 20); // 20% لكل نجمة
                
                starsElements.forEach((star, index) => {
                    if (index < starsToShow) {
                        star.classList.add('active');
                    } else {
                        star.classList.remove('active');
                    }
                });
                
                // Show appropriate message based on score
                const message = document.querySelector('.result-message');
                if (percentage >= 80) {
                    document.querySelector('.result-title').textContent = 'Excellent Work!';
                    message.textContent = `You answered ${correctAnswers} out of ${totalQuestions} correctly (${percentage}%)!`;
                } else if (percentage >= 50) {
                    document.querySelector('.result-title').textContent = 'Good Job!';
                    message.textContent = `You answered ${correctAnswers} out of ${totalQuestions} correctly (${percentage}%)!`;
                } else {
                    document.querySelector('.result-title').textContent = 'Nice Try!';
                    message.textContent = `You answered ${correctAnswers} out of ${totalQuestions} correctly (${percentage}%). Keep practicing!`;
                }
                
                resultScreen.style.display = 'flex';
                
                // إرسال النتيجة إلى الخادم
                saveGameResult(correctAnswers, percentage);
            }
            
            // تعديل دالة حفظ النتيجة
            function saveGameResult(correctAnswers, percentage) {
                fetch('save_score.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        correct_answers: correctAnswers,
                        total_questions: totalQuestions,
                        score: percentage,
                        percentage: percentage
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('تم حفظ النتيجة بنجاح');
                    } else {
                        console.error('خطأ في حفظ النتيجة:', data.message);
                    }
                })
                .catch(error => {
                    console.error('حدث خطأ:', error);
                });
            }

            // Show result screen
            function showResultScreen11() {
                finalStars.textContent = stars;
                
                // Update result stars
                const starsElements = resultStars.querySelectorAll('.result-star');
                starsElements.forEach((star, index) => {
                    if (index < stars) {
                        star.classList.add('active');
                    } else {
                        star.classList.remove('active');
                    }
                });
                
                // Show appropriate message based on stars
                const message = document.querySelector('.result-message');
                if (stars >= 4) {
                    document.querySelector('.result-title').textContent = 'Excellent Work!';
                    message.textContent = `You earned ${stars} stars! Amazing job!`;
                } else if (stars >= 2) {
                    document.querySelector('.result-title').textContent = 'Good Job!';
                    message.textContent = `You earned ${stars} stars! Keep practicing!`;
                } else {
                    document.querySelector('.result-title').textContent = 'Nice Try!';
                    message.textContent = `You earned ${stars} stars. Don't give up!`;
                }
                
                resultScreen.style.display = 'flex';
            }
            
            // Restart game
            restartButton.addEventListener('click', function() {
                // Reset game state
                stars = 3;
                answeredQuestions = 0;
                updateStars();
                
                // Clear answer boxes
                answerBoxes.forEach(box => {
                    box.textContent = '';
                    box.style.fontSize = '80px';
                    box.style.color = 'rgba(173, 120, 251, 0.3)';
                    box.classList.remove('correct', 'incorrect', 'answered', 'hovered');
                    box.setAttribute('data-question', box.getAttribute('data-question'));
                });
                
                // Hide result screen
                resultScreen.style.display = 'none';
            });
            
            // Navigation icons functionality
            navIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const altText = this.alt.toLowerCase();
                    showFeedback(`Navigating to ${altText} page...`, 'purple');
                    // In a real app, you would redirect to the appropriate page
                    // window.location.href = `${altText}.html`;
                });
            });
            
            // Show feedback message
            function showFeedback(message, color) {
                feedback.textContent = message;
                feedback.style.backgroundColor = color;
                feedback.style.display = 'block';
                
                setTimeout(() => {
                    feedback.style.display = 'none';
                }, 2000);
            }
        });
    </script>
</body>
</html>