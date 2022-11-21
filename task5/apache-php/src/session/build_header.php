<?php
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

    echo '<script> ';
    require $_SERVER['DOCUMENT_ROOT'] . '/session/js_stuff.js';
    echo ' </script>';

    echo '<style> ';
    require $_SERVER['DOCUMENT_ROOT'] . '/css/style.css';
    echo ' </style>';

    echo '<style> ';
    if (isset($_SESSION['theme']) && $_SESSION['theme']) {
        require $_SERVER['DOCUMENT_ROOT'] . '/css/darkTheme.css';
    }
    else {
        require $_SERVER['DOCUMENT_ROOT'] . '/css/lightTheme.css';
    }
    echo ' </style>';

    require $_SERVER['DOCUMENT_ROOT'] . '/session/header.php';
?>