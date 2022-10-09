<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>

<body>
    <div id="wblock">
        <h1>Каталог</h1>
        <?php
            require_once '_helper.php';
            $mysqli = openmysqli();
            $mysqli->set_charset('utf8mb4');
            $result = $mysqli->query("select * from " . 'goods');
        ?>
        <table cellspacing="0">
            <tr>
                <th>Игрушка</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
            <?php if ($result->num_rows > 0) foreach ($result as $good) {
                echo "
                    <tr>
                        <td>" . $good['title'] . "</td>
                        <td>" . $good['description'] . "</td>
                        <td>" . $good['cost'] . " руб</td>
                    </tr>
                ";
                }
            else echo ''; ?>
        </table>
        <br><a href="../static/index.php">На главную</a>
    </div>
    <?php $mysqli->close(); ?>
</body>

</html>