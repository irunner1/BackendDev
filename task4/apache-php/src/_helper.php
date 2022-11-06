<?php
    function openmysqli(): mysqli {
        $connection = new mysqli('mysql', 'user', 'password', 'appDB');
        return $connection;
    }
    function outputStatus($status, $message)
    {
        echo '{status: ' . $status . ', message: "' . $message . '"}';
    }
?>