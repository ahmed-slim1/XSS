<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What is XSS</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Amiri', serif;
            background-color: #1e1e1e;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar {
            width: 220px;
            background-color: #000;
            padding-top: 20px;
            padding-bottom: 20px;
            position: fixed;
            height: 100%;
            overflow: auto;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar a {
            display: block;
            font-size: 18px;
            color: white;
            text-align: center;
            padding: 15px 20px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .navbar a:hover {
            background-color: #555;
            transform: scale(1.05);
        }

        .navbar a.active {
            background-color: #4CAF50;
        }

        .container {
            background: #282828;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            max-width: 800px;
            width: 90%;
            text-align: center;
            margin: auto;
            margin-left: 260px;
            margin-top: 50px;
            transition: all 0.3s ease-in-out;
        }

        .container:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            transform: translateY(-5px);
        }

        h1 {
            color: #ffd700;
            margin-bottom: 20px;
            font-size: 2.5em;
            overflow: hidden;
            border-right: .15em solid #ffd700;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        p {
            font-size: 1.2em;
            line-height: 1.8;
            margin-bottom: 20px;
            color: #b0b0b0;
        }

        .example-code {
            background: #3c3c3c;
            padding: 20px;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            color: #ffd700;
            direction: ltr;
            margin-top: 20px;
            font-size: 1.1em;
            text-align: left;
        }

        .example-code code {
            color: #50fa7b;
        }

        footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #888;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #ffd700; }
        }

        @media (max-width: 768px) {
            .container {
                margin-left: 20px;
                margin-right: 20px;
                width: calc(100% - 40px);
            }

            .navbar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .navbar a {
                text-align: left;
                padding-left: 30px;
            }
        }

        /* Light theme styles */
        .light-theme {
            background-color: #f0f0f0;
            color: #333;
        }

        .light-theme .navbar {
            background-color: #ddd;
            color: #333;
        }

        .light-theme .navbar a {
            color: #333;
        }

        .light-theme .navbar a:hover {
            background-color: #ccc;
        }

        .light-theme .container {
            background: #ffffff;
            color: #333;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .light-theme .example-code {
            background: #f4f4f4;
            color: #333;
        }

        .light-theme h1 {
            border-color: #333;
            color: #333;
        }

        /* Theme toggle button styles */
        #theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px; /* وضع الزر في الجهة اليمنى بعيدًا عن القائمة */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #ffd700;
            color: #000;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        #theme-toggle:hover {
            background-color: #ffc700;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="navbar">
        <a href="index.php" class="active">🏠 Main</a>
        <a href="1.php">🟢 Level 1</a>
        <a href="2.php">🟢 Level 2</a>
        <a href="3.php">🟢 Level 3</a>
        <a href="4.php?input=imag.jpeg">🟡 Level 4</a>
        <a href="5.php">🟡 Level 5</a>
        <a href="6.php">🟠 Level 6</a>
        <a href="7.php">🟠 Level 7</a>
        <a href="8.php">🔴 Level 8</a>
        <a href="9.php">🔴 Level 9</a>
        <a href="10.php">🔴 Level 10</a>
        <a href="impossible.php">🛡️ Impossible</a>
    </div>

<div class="container">
    <h1> ؟ XSSما هي ثغرة  ال     </h1>
    <p>ثغرة <strong>XSS</strong> هي نوع من الثغرات الأمنية التي تتيح للمهاجم إدخال سكربتات ضارة في صفحات الويب التي يشاهدها المستخدمون. يمكن أن يتم استخدام هذه السكربتات لسرقة معلومات حساسة أو تنفيذ عمليات غير مرغوب فيها.</p>
    <p>تحدث هذه الثغرة غالبًا عندما يقوم الموقع بعرض مدخلات المستخدمين دون التحقق منها بشكل صحيح. على سبيل المثال، يمكن إدخال كود JavaScript ضار في حقل إدخال وسيتم تنفيذه عند عرض الصفحة.</p>
    <p>إليك مثال على كود بسيط قد يؤدي إلى ثغرة XSS:</p>
    <div class="example-code">
        <code>&lt;script&gt;alert('لقد تم استغلال ثغرة XSS!');&lt;/script&gt;</code>
    </div>
    <footer>
        تعلم كيف تحمي موقعك من ثغرات XSS من خلال التحقق من مدخلات المستخدم وتنقيتها.
    </footer>
</div>

<!-- Theme toggle button -->
<button id="theme-toggle">Toggle Theme</button>

<script>
    const toggleButton = document.getElementById('theme-toggle');
    const body = document.body;

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('light-theme');
    });
</script>

</body>
</html>

