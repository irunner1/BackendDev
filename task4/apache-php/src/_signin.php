<?php require_once '_helper.php';

    header('Access-Control-Allow-Origin: *');

    $name = $_GET['name'];
    $password = $_GET['password'];
    if (!$name || !$password) {
        header('Location: ' . '../static/signin.html?e=1');
    }

    $mysqli = openmysqli();
    $statement = $mysqli->prepare(
        'select ID from users where name = ? and password = ?'
    );
    $statement->bind_param('ss', $name, $password);
    $statement->execute();
    $result = $statement->get_result()->num_rows === 1;
    $mysqli->close();

    if ($result) {
        setcookie('auth', strval(rand(0, 9)));
        header('Location: ' . '../dynamic/admin.php');
    } else {
        header('Location: ' . '../static/signin.html?e=1');
    }
?>