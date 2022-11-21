<?php
    session_start();
    if (!isset($_SESSION["theme"]) || !isset($_SESSION["views"]) || !isset($_SESSION["login"])) {
        $_SESSION["theme"] = 0;
        $_SESSION["views"] = 0;
        $_SESSION["login"] = ' ';
    }

    function openmysqli(): mysqli {
        $connection = new mysqli('mysql', 'user', 'password', 'appDB');
        return $connection;
    }
    
    function outputStatus ($status, $message) {
        echo '{status: ' . $status . ', message: "' . $message . '"}';
    }
?>