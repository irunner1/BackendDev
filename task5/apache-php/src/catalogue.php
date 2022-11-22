<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html lang="ru">
<head>
    <title>Каталог товаров</title>
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
                <li><a class="nav_link" href="pdf/showPDF.php">PDF</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <div class="title">
            <p class="title_text">Каталог</p>
        </div>
        <?php
            require_once '_helper.php';
            $mysqli = openmysqli();
            $mysqli->set_charset('utf8mb4');
            $result = $mysqli->query("select * from goods");
        ?>
        <table cellspacing="0">
            <tr>
                <th>Товар</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
            <?php 
                if ($result->num_rows > 0) foreach ($result as $good) {
                    echo "
                        <tr>
                            <td>" . $good['title'] . "</td>
                            <td>" . $good['description'] . "</td>
                            <td>" . $good['cost'] . " руб</td>
                        </tr>
                    ";
                    }
                else echo ''; 
            ?>
        </table>
        <br>
        <div class="btn_link">
            <a class="link" href="index.php">На главную</a>
        </div>
    </div>
    <?php $mysqli->close(); ?>
</body>
</html>