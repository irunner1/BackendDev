<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/html_header.php';
?>
<html lang="ru">
<body>
    <header class="header">
        <p class="text">Строительный магазин</p>
        <nav class="header_menu">
            <ul class="nav_links">
                <li><a href="index.html">Home</a> </li>
                <li><a href="catalogue.php">Store</a> </li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="session_test.php">Session</a></li>
                <li><a href="pdf/showPDF.php">PDF</a></li>
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