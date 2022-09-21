<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фигуры</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <?php
        if (isset($_GET['num'])) {
            $num = $_GET['num'];
            // 00    0 0 0  00
            // Shape R G B  Size
            $shape = ($num >> 5) & 3; // 00-круг 01-прямоуг 10-квадр 11-треуг
            $red = ($num >> 4) & 1;
            $green = ($num >> 3) & 1; // RGB
            $blue = ($num >> 2) & 1;
            $size = (($num >> 0) & 3) + 1; // 00-мал 01-сред 10-бол 11-очбол
            $color = '"#'
                . ($red == 1    ? 'ff' : "00")
                . ($green == 1  ? 'ff' : "00")
                . ($blue == 1   ? 'ff' : "00") . '"';
            $size = $size * 100;

            $shape_tag = '';
            switch ($shape) {
                case 0: // Круг
                    $radius = ($size / 2);
                    $shape_tag = "circle "
                        . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                        . " r=" . $radius . " ";
                    break;
                case 1: // Прямоугольник
                    $shape_tag = "rect "
                        . "width=" . ($size * 2) . " height=" . ($size);
                    break;
                case 2: // Квадрат
                    $shape_tag = "rect "
                        . "width=" . ($size) . " height=" . ($size);
                    break;
                case 3: // Треугольник
                    $side = $size;
                    $shape_tag = "polygon points='"
                        . ($side / 2 + 5) . ",10"
                        . " 10," . ($side) . " "
                        . ($side) . "," . ($side) . "'";
                    break;
            }
            echo '<svg>';
            echo '<' . $shape_tag . ' fill=' . $color . '  />';
            echo '</svg>';
        }
        else {
            echo '<p>Отсутствует переменная: ?num=</p>';
        }
    ?>
</body>
</html>