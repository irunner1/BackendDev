<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';

    echo '<div id="wblock">';

    # Целевая папка
    $target_dir = realpath(dirname(getcwd())) . "/pdf/files/";
    # Файл сохранения
    $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
    # Флаг проверки
    $uploadOk = 1;
    # Формат
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    # Файл пустой
    if ($_FILES["userfile"]["size"] == 0) {
        $uploadOk = 0;
        echo "Файл пустой";
    }
    # Файл существует
    else if (file_exists($target_file)) {
        $uploadOk = 0;
        echo "Такой файл уже существует\n";
    }
    # Ограничение размера
    else if ($_FILES["userfile"]["size"] > 2000000) {
        $uploadOk = 0;
        echo "Файл слишком большой";
    }
    # Не PDF
    else if ($fileType != "pdf") {
        $uploadOk = 0;
        echo "Только PDF файлы доступны к загрузке\n";
    }
    # Проверки пройдены
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file)) {
            echo "Файл " . htmlspecialchars(basename($_FILES["userfile"]["name"])) . " был успешно загружен.";
        } else {
            echo "Ошибка при загрузке файла.\n";
        }
    }

    echo '<br><br><a href="/pdf/show_pdf.php">Назад</a></div>';
?>