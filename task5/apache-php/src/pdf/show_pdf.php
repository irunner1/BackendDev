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
            <!-- <form enctype="multipart/form-data" action="./upload_pdf.php" method="POST">
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
               
            </table> -->
            <?php
                $conn = new mysqli('mysql', 'user', 'password', 'appDB');
            ?>
            <form action="./upload_pdf.php" method="post" enctype="multipart/form-data">
                <p>Загрузить картику</p>
                <input type="file" name="pdf"><input type="submit" name="upload" value="Загрузить">
            </form>
            <br>
            <div class="btn_link">
                <a class="link" href="/index.php">На главную</a>
            </div>
               
                <?php
                    $conn = new mysqli('mysql', 'user', 'password', 'appDB');
                    $sql = "SELECT id, title FROM files ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_object($result)) {
                ?>
                    <p>
                        <a href="download.php?id=<?php echo $row->id; ?>" target="_blank">
                            <?php echo $row->filenamed; ?>
                        </a>
                    </p>
                <?php } ?>
        </div>
    </main>
</body>
</html>
