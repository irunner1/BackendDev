<?php
    $conn = new mysqli('mysql', 'user', 'password', 'appDB');
    $sql = "SELECT * FROM `files` WHERE `id` = " . $_GET["id"];
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        die("File does not exists.");
    }
    header('Content-type: " : application/pdf');
    $row = mysqli_fetch_object($result);
    echo $row->title;
    echo base64_encode($row['title']);
?>