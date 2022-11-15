<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';

    function error() {
        echo 'Error';
        http_response_code(400);
    }

    if (!array_key_exists('action', $_POST)) {
        error();
        return;
    }
    switch ($_POST['action']) {
        case 'theme':
            setTheme();
            break;
        case 'login':
            setLogin();
            break;
        default:
            error();
            break;
    }

    function setTheme() {
        $theme = $_SESSION['theme'] ?? false;
        $_SESSION['theme'] = !$theme;
    }

    function setLogin() {
        $login = $_POST['login'] ?? null;
        if (!$login) {
            error();
            return;
        }
        $_SESSION['login'] = $login;
    }
?>