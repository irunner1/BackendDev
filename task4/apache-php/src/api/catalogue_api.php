<?php require_once '../_helper.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['REQUEST_URI'];
    $url_data = parse_url($url);
    switch ($method){
        case 'PUT':
            addItem();
            break;
        case 'GET':
            removeItemByName();
            break;
        case 'POST':
            updateItemCostByName();
            break;
        case 'DELETE':
            getItemByName();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
    
    function addItem() {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        if (!isset($data['name']) || !isset($data['cost']) || !isset($data['desc'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $goodName = $data['name'];
        $goodDesc = $data['desc'];
        $goodCost = $data['cost'];
        $result = $mysqli->query("SELECT * FROM goods WHERE title = '{$goodName}';");
        if ($result->num_rows === 1) {
            $message = $goodName . ' already exists';
            outputStatus(1, $message);
        }
        else {
        $query = "INSERT INTO goods (title, description, cost)
            VALUES ('" . $goodName . "', '" . $goodDesc . "', " . $goodCost . ");";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Added ' . $goodName . ' with cost of ' . $goodCost;
            outputStatus(0, $message);
        }
    }

    function removeItemByName() {
        if (!isset($_GET['name'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $goodName = $_GET['name'];
        $result = $mysqli->query("SELECT * FROM goods WHERE title = '{$goodName}';");
        if ($result->num_rows === 1) {
            $query = "DELETE FROM goods WHERE title = '" . $goodName . "';";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Removed ' . $goodName;
            outputStatus(0, $message);
        } else {
            $message = $goodName . ' does not exist';
            outputStatus(1, $message);
        }
    }
    
    function updateItemCostByName() {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        if (!isset($data['name']) || !isset($data['cost'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $goodName = $data['name'];
        $goodCost = $data['cost'];
        $result = $mysqli->query("SELECT * FROM goods WHERE title = '{$goodName}';");
        if ($result->num_rows === 1) {
            $query = "UPDATE goods SET cost = " . $goodCost . " WHERE title = '" . $goodName . "';";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Updated ' . $goodName . ' with cost of ' . $goodCost;
            outputStatus(0, $message);
        } else {
            $message = $goodName . ' does not exist';
            outputStatus(1, $message);
        }
    }

    function getItemByName() {
        if (!isset($_GET['name'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $goodName = $_GET['name'];
        $query = "SELECT * FROM goods WHERE title = '{$goodName}';";
        $result = $mysqli->query($query);
        if ($result->num_rows === 1) {
            $json = "";
            foreach ($result as $good) {
                $json = json_encode($good);
            }
            echo $json;
            $mysqli->close();
        } else {
            $message = $goodName . ' does not exist';
            outputStatus(1, $message);
        }
    }
?>