<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Команды</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="output" maxlength=20 >
        <br/>
        <input type="submit" name="submit">
    </form>
    <?php if(isset($_GET['output'])): ?>
        <br/>
        <?php
            $command_list = array('ps', 'ls .', 'whoami', 'id', 'echo Hi!');

            function print_cmd($cmd) {
                $lines = array();
                exec($cmd, $lines);
                echo "<p>> " . $cmd . "</p>";
                echo "<pre>" . implode("\n", $lines) . "</pre>";
            }

            foreach ($command_list as $cmd) {
                if ($_GET["output"] == $cmd) {
                    print_cmd($cmd);
                }
            }
        ?>
    <?php endif; ?>
</body>
</html>