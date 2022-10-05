<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="../css/table.css" type="text/css" />
</head>

<body>
    <div id="wblock">
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
            }; ?>
        </table>
        <br><a href="../dynamic/about.php">На главную</a>
        <div>
            <?php $mysqli->close(); ?>
</body>

</html>