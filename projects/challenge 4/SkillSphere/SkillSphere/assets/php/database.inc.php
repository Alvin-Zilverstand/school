<?php
/*************************************************************
    Created 2019 by E.steens
    Edited 2020/2021/2022 by E. Steens and J. Wilmes
*************************************************************/

// database implemented abstract because only one implementation required
abstract class Database {
    private static $result         = array();
    private static $numrows        = -1;
    private static $currentrow     = -1;

    public static function dbConnect() {
        $dbhost      = "localhost:3306";
        $dbname      = "boydfranken_nl_";
        $dbuser      = "root";
        $dbpass      = '';
        $conn         = "";             // connection string
        $pdo          = "";             // handler
        $charset      = 'utf8mb4';

        $conn = "mysql:host=" . $dbhost . "; dbname=" . $dbname . ";charset=" . $charset;

        $options = [ // define options for PDO connection
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    // give error in case of issue
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          // get row indexed by column name
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($conn, $dbuser, $dbpass, $options); // create connection
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    // Function to execute a query that does not return data
    public static function executeQuery($p_sSql, $p_aData = "") {
        // execute query on Mysql server (INSERT, UPDATE, DELETE, etc.)
        // $p_sSQL contains MySQL query string with parameters '?'
        // $p_aData contains array with query parameters
        $pdo = Database::dbConnect();
        $stmt = $pdo->prepare($p_sSql); // prepare the query
        if (is_array($p_aData)) {       // add the data
            return $stmt->execute($p_aData);  // execute the query
        } else {
            return $stmt->execute();  // execute when no parameters
        }
    }

    // Get Data: Modified to handle fetching posts with user details
    public static function getData($p_sSql, $p_aData = "", $print = false) {
        // execute query on Mysql server
        // $p_sSQL contains MySql query string with parameter ?'s
        // $p_aData contains array with query parameters
        $pdo = Database::dbConnect();
        $stmt = $pdo->prepare($p_sSql); // prepare the query

        if (is_array($p_aData)) {       // add the data
            $stmt->execute($p_aData);   // execute the query
        } else {
            $stmt->execute();           // execute when no parameters
        }

        // Fetch the results
        database::$numrows = $stmt->rowCount();
        $result = $stmt->fetchAll();    // get result
        database::$result = $result;    // set class var
        database::$currentrow = 0;      // set current row
        if ($print === true) { print_r($result); }
        return $result; // database query result
    }

    public static function getNumrows() {
        return database::$numrows;
    }

    public static function nextRow() {
        if (database::$currentrow < database::getNumRows() - 1) {
            database::$currentrow++;
        }
        echo "n:" . database::$currentrow;
        $row = array();
        array_push($row, database::$result[database::$currentrow]);
        return $row;
    }

    public static function previousRow() {
        if (database::$currentrow > 0) {
            database::$currentrow--;
        }
        echo "p:" . database::$currentrow;
        $row = array();
        array_push($row, database::$result[database::$currentrow]);
        return $row;
    }

    public static function currentRow() {
        $rownr = database::$currentrow;
        $row = array();
        array_push($row, database::$result[database::$currentrow]);
        return $row;
    }

    public static function jsonParse($p_aValue) {
        if (is_array($p_aValue)) {
            return json_encode($p_aValue);
        }
        if (is_string($p_aValue)) {
            return json_decode($p_aValue);
        }
    }
}
?>
