<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>

<body>
    <header  class="header">
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
        <h1>Список пользователей</h1>
        <?php
            require_once '_helper.php';
            $mysqli = openmysqli();
            $users = $mysqli->query('select * from ' . 'users');
        ?>
        <table cellspacing="0">
            <tr>
                <th>Номер</th>
                <th>Логин</th>
                <th>Пароль</th>
            </tr>
            <?php foreach ($users as $user) {
                echo "
                <tr>
                    <td>{$user['ID']}</td>
                    <td>{$user['name']}</td>
                    <td>{$user['password']}</td>
                </tr>
                ";
                }; 
            ?>
        </table>
        <br>
        <a href="index.php">На главную</a>
        <div>
            <?php $mysqli->close(); ?>
        </div>
</body>
</html>