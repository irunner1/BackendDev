<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Строительный магазин</title>
</head>
<body>
    <header class="header">
        <p class="text">Строительный магазин</p>
        <nav class="header_menu">
            <ul class="nav_links">
                <li><a class="nav_link" href="index.html">Home</a> </li>
                <li><a class="nav_link" href="catalogue.php">Store</a> </li>
                <li><a class="nav_link" href="admin.php">Admin</a></li>
                <li><a class="nav_link" href="session_status.php">Session</a></li>
                <li><a class="nav_link" href="/pdf/show_pdf.php">PDF</a></li>
            </ul>
        </nav>
        </nav>
    </header>
    <main>
        <div class="block">
            <div class="text">
                Прокат инструмента
                Профессиональные инструменты в аренду
            </div>
        </div>
        <div class="block">
            <div class="text">
                Для профессионалов
                Стройматериалы 
            </div>
        </div>
        <div class="block">
            <div class="text">
               Интерьер и отделка
            </div>
        </div>
        <div class="block">
            <div class="text">
               Инженерные системы и электрика
            </div>
        </div>
    </main>
</body>
</html>