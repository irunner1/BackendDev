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

            <form enctype="multipart/form-data" action="./upload_pdf.php" method="POST">
                <div class="file-input">
                    <input name="userfile" type="file" id="file" class="file">
                    <label for="file">Выберите файл</label>
                </div>
                <br>
                <input type="submit" value="Отправить файл" />
            </form>
            <form enctype="multipart/form-data" action="./upload_pdf.php" method="POST">
                <div>
                    <label for="file_field">Отправить файл:</label>
                    <br>
                    <input name="userfile" type="file" />
                </div>
                <br>
                <input type="submit" value="Отправить файл" />
            </form>

            <br>
            <div class="btn_link">
                <a class="link" href="/index.php">На главную</a>
            </div>
            <div class="text"> Файлы сервера </div>
            <table cellspacing="0" , style="width:50%">
                <?php
                    $scanned_directory = array_diff(scandir('./files'), array('..', '.'));
                    if (count($scanned_directory) > 0) {
                        foreach ($scanned_directory as $file) {
                            echo "<tr><td><a class='filelink' href='./files/" . $file . "'>" . $file . "</a></td></tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </main>
</body>
</html>
