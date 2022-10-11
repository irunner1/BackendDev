<?php
    function openmysqli(): mysqli {
        $connection = new mysqli('mysql', 'user', 'password', 'appDB');
        return $connection;
    }
?>