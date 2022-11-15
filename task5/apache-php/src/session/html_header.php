<?php
    # Meta
    echo '
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

    # JS
    echo '<script> ';
    require $_SERVER['DOCUMENT_ROOT'] . '/session/js_stuff.js';
    echo ' </script>';

    # CSS
    echo '<style> ';
    require $_SERVER['DOCUMENT_ROOT'] . '/css/style.css';
    echo ' </style>';

    # Theme
    echo '<style> ';
    # True = Dark
    if (isset($_SESSION['theme']) && $_SESSION['theme']){
        require $_SERVER['DOCUMENT_ROOT'] . '/css/darkTheme.css';
    }
    else {
        require $_SERVER['DOCUMENT_ROOT'] . '/css/lightTheme.css';
    }
    echo ' </style>';

    # Site header
    require $_SERVER['DOCUMENT_ROOT'] . '/session/header.php';
?>