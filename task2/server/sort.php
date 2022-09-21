<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сортировка</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <?php
    function insertSort(array $arr) {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }
        for ($i = 1; $i < $count; $i++) {
            $cur_val = $arr[$i];
            $j = $i - 1;
            while (isset($arr[$j]) && $arr[$j] > $cur_val) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $cur_val;
                $j--;
            }
        }
        return $arr;
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        echo "<p>Массив</p>";
        echo implode(", ", $array);

        echo "<p>Отсортированный массив</p>";
        $array = insertSort($array);

        echo implode(", ", $array);
    } 
    else {
        echo '<p>Отсутствует переменная: ?array=</p>';
    }
    ?>
</body>
</html>