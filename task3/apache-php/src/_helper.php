<?php
/*
function conv($string) {
    return iconv('ISO-8859-1', 'UTF-8', $string);
}
*/

function openmysqli(): mysqli {
    $connection = new mysqli('mysql', 'user', 'password', 'appDB');
    return $connection;
}
?>