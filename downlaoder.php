<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>دانلود فایل</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>دانلود فایل</h1>
    <form method="post" action="">
        <input type="text" name="file_url" placeholder="لینک مورد نظر را وارد کنید" required>
        <br>
        <input type="submit" name="download" value="دانلود بروی هاست">
    </form>

    <?php
    if (isset($_POST['download'])) {
        $file_url = $_POST['file_url'];
        $file_name = basename($file_url);

        // دانلود فایل
        $file_content = @file_get_contents($file_url);
        if ($file_content === FALSE) {
            echo "<p style='color: red;'>خطا در دانلود فایل. لطفا لینک را بررسی کنید.</p>";
        } else {
            // ذخیره فایل در هاست
            if (file_put_contents($file_name, $file_content)) {
                echo "<p style='color: green;'>فایل با موفقیت دانلود شد.</p>";
            } else {
                echo "<p style='color: red;'>خطا در ذخیره فایل در هاست.</p>";
            }
        }
    }
    ?>

    <footer>
        <a href="https://github.com/m-alizadeh7" target="_blank">گیت‌هاب من</a>
    </footer>
</body>
</html>
