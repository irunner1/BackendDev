<?php
    $conn = new mysqli('mysql', 'user', 'password', 'appDB');
    $image = $_FILES['pdf'];
    $file_name = $_FILES['pdf']['name'];
    $info = getimagesize($image["tmp_name"]);
    $name = $image["name"];
    $type = $image["type"];
    $blob = addslashes(file_get_contents($image["tmp_name"]));
    $sql = "INSERT INTO files (title, filename) VALUES ('$blob', '$name')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    echo "File has been uploaded.";
?>