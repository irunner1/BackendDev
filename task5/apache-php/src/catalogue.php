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
    <div>
        <h1>Каталог</h1>
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