<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="en">

<head>
    <title>Статус сессии</title>
</head>

<body>
    <main>
        <div class="block">
            <div class="text">
            <?php
                $_SESSION['views']++;
                $current_theme = $_SESSION['theme'] ? 'black' : 'white';
                echo "Your session ID: " . session_id() . "<br>";
                echo "You have visited this page: {$_SESSION['views']} times<br>";
                echo "Color Theme: {$current_theme}<br>";
            ?>
            <br>
            <div class="btn_link">
                <a class="link" href="index.php">На главную</a>
            </div>
        </div>
    </main>
</body>

</html>