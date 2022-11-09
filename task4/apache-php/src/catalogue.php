<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <style>
        table{
            border: 1px solid #eee;
            table-layout: fixed;
            width: 70%;
            margin-bottom: 20px;
        }
        table th {
            font-weight: bold;
            padding: 5px;
            background: #efefef;
            border: 1px solid #dddddd;
        }
        table td{
            padding: 5px 10px;
            border: 1px solid #eee;
            text-align: left;
        }
        table tbody tr:nth-child(odd){
            background: #fff;
        }
        table tbody tr:nth-child(even){
            background: #F7F7F7;
        }
    </style>
</head>

<body>
    <header class="header">
        <p class="text">Строительный магазин</p>
        <nav class="header_menu">
            <ul class="nav_links">
                <li><a href="index.html">Home</a> </li>
                <li><a href="catalogue.php">Store</a> </li>
                <li><a href="admin.php">Admin</a></li>
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
        <br><a href="index.php">На главную</a>
    </div>
    <?php $mysqli->close(); ?>
</body>
</html>