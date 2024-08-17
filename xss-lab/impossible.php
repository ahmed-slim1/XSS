<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>impossible</title>
    <style>
        body {
            font-family: 'Amiri', serif;
            background-color: #1e1e1e;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar {
            width: 220px;
            background-color: #000;
            padding-top: 20px;
            padding-bottom: 20px;
            position: fixed;
            height: 100%;
            overflow: auto;
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
        }
        h1 {
            color: #ffd700;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        p {
            font-size: 1.2em;
            line-height: 1.8;
            margin-bottom: 20px;
            color: #b0b0b0;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: calc(100% - 24px);
            padding: 12px;
            margin: 8px 0;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            background: #333;
            color: #e0e0e0;
            font-size: 16px;
            outline: none;
            transition: background 0.3s, border-color 0.3s;
        }
        input[type="text"]::placeholder {
            color: #888;
        }
        input[type="text"]:focus {
            background: #444;
            border-color: #66bb6a;
        }
        input[type="submit"] {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
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

        .hints {
            margin-top: 30px;
            text-align: left;
            padding: 15px;
            background: #333;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .hints button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .hints button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        .hint-content {
            display: none;
            margin-top: 15px;
            padding: 10px;
            background: #444;
            border-radius: 5px;
            color: #e0e0e0;
        }
        .hint-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">🏠 Main</a>
        <a href="1.php"">🟢 Level 1</a>
        <a href="2.php">🟢 Level 2</a>
        <a href="3.php">🟢 Level 3</a>
        <a href="4.php?input=imag.jpeg">🟡 Level 4</a>
        <a href="5.php">🟡 Level 5</a>
        <a href="6.php">🟠 Level 6</a>
        <a href="7.php">🟠 Level 7</a>
        <a href="8.php">🔴 Level 8</a>
        <a href="9.php">🔴 Level 9</a>
        <a href="10.php">🔴 Level 10</a>
        <a href="impossible.php" class="active">🛡️ Impossible</a>
    </div>
    <div class="container">
        <h1>impossible</h1>
        <p> في هذه الصفحة XSS  لا يوجد شيء مأمن بنسبة 100%، ولكننا دائمًا نحاول الاجتهاد. لقد حاولت منع اكتشاف ثغرة  </p>
	<p> تحتوي التلميحات على الطرق المستخدمة لمنع الهجمات</p>
        <form method="GET">
            <input type="text" name="input" placeholder="Enter text here" />
            <input type="submit" value="Submit" />
        </form>
        <?php
        if (isset($_GET['input'])) {
	    $input = htmlspecialchars($_GET['input'], ENT_QUOTES, 'UTF-8');
            echo '<div class="example-code">';
            echo $input;
            echo '</div>';
        }
        ?>
        <div class="hints">
            <button id="hint">Hint</button>
            <div id="hint-content" class="hint-content">
               htmlspecialchars() : تأكدت من تعقيم المدخلات بشكل صحيح على الخادم باستخدام دالة
            </div>
        </div>
        <footer>
                          Ahmed Mahmoud Selim
        </footer>
    </div>
    <script>

        document.getElementById('hint').addEventListener('click', () => {
            document.getElementById('hint-content').classList.toggle('active');
        });

    </script>
</body>
</html>

