<?php require_once '../_helper.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['REQUEST_URI'];
    $url_data = parse_url($url);
    switch ($method){
        case 'PUT':
            createUser();
            break;
        case 'GET':
            getUser();
            break;
        case 'POST':
            updateUser();
            break;
        case 'DELETE':
            deleteUser();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
    
    function createUser(){
        if (!isset($_GET['name']) || !isset($_GET['pass'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $usrName = $_GET['name'];
        $usrPass = $_GET['pass'];
        $result = $mysqli->query("SELECT * FROM users WHERE name = '{$usrName}';");
        if ($result->num_rows === 1) {
            $message = 'User '. $usrName . ' already exists';
            outputStatus(1, $message);
        } else {
            $usrPass = generatePass($usrName, $usrPass);
            $query = "INSERT INTO users (name, password)
            VALUES ('" . $usrName . "', '" . $usrPass . "');";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Added user ' . $usrName;
            outputStatus(0, $message);
        }
    }

    function getUser() {
        if (!isset($_GET['id'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $usrID = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM users WHERE ID = '{$usrID}';");
        if ($result->num_rows === 1) {
            foreach ($result as $info) {
                echo "{status: 0, name: '" . $info['name'] . "}";
            }
            $mysqli->close();
        } else {
            $message = 'User ID '. $usrID . ' does not exist';
            outputStatus(1, $message);
        }
    }

    function updateUser() {
        if (!isset($_GET['name']) || !isset($_GET['pass'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $usrName = $_GET['name'];
        $usrPass = $_GET['pass'];
        $result = $mysqli->query("SELECT * FROM users WHERE name = '{$usrName}';");
        if ($result->num_rows === 1) {
            $usrPass = generatePass($usrName, $usrPass);
            $query = "UPDATE users SET password = '" . $usrPass . "' WHERE name = '" . $usrName . "';";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Changed password for ' . $usrName;
            outputStatus(0, $message);
        } else {
            $message = $usrName . ' does not exist';
            outputStatus(1, $message);
        }
    }

    function deleteUser() {
        if (!isset($_GET['name'])) {
            throw new Exception("No input provided");
        }
        $mysqli = openMysqli();
        $usrName = $_GET['name'];
        $result = $mysqli->query("SELECT * FROM users WHERE name = '{$usrName}';");
        if ($result->num_rows === 1) {
            $query = "DELETE FROM users WHERE name = '" . $usrName . "';";
            $mysqli->query($query);
            $mysqli->close();
            $message = 'Removed user ' . $usrName;
            outputStatus(0, $message);
        } else {
            $message = 'User ' . $usrName . ' does not exist';
            outputStatus(1, $message);
        }
    }

    function generatePass($usrName, $usrPass) {
        $cmd = "htpasswd -nb {$usrName} {$usrPass}";
        exec($cmd, $output);
        $str = implode('', $output);
        $str = preg_replace('/^' . $usrName . ':/', '', $str);
        return $str;
    }

?>