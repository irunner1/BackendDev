<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_helper.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/session/build_header.php';
?>
<html>

<head>
    <title>PDF файлы</title>
</head>

<body>
    <main>
        <div class="block">
            <div class="text">Отправить файл</div>
            <br>
            <form enctype="multipart/form-data" action="./upload_pdf.php" method="POST">
                <div class="file-input">
                    <input name="userfile" type="file" id="file" class="file">
                    <label for="file">Выбрать файл</label>
                </div>
                <br>
                <div class="file-input">
                    <input  type="submit" id="submit" class="file">
                    <label for="submit">Отправить файл</label>
                </div>
            </form>
            <br>
            <div class="btn_link">
                <a class="link" href="/index.php">На главную</a>
            </div>
            <div class="text"> Файлы на сервере </div>
            <table cellspacing="0" , style="width:100%">
                <?php
                    $scanned_directory = array_diff(scandir('./files'), array('..', '.'));
                    if (count($scanned_directory) > 0) {
                        foreach ($scanned_directory as $file) {
                            echo "<tr><td><a class='table_link' href='./files/" . $file . "'>" . $file . "</a></td></tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </main>
</body>
</html>
