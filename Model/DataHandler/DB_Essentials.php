<?php

/**
 *  This class is used to contain the neccesary crud functions to interact with a database
 *
 * @property array $lastSelect used to hold the last select bindings
 * @property object $pdo a variable to store the connection
*/
class DB_Essentials {
    public $lastSelect = [];
    private $pdo;

    /**
     * constructor for the datahandler
     *
     * @param string $host database host for the connection
     * @param string $database database name for the connection
     * @param string $username database username for the connection
     * @param string $password database password for the connection
     * @param string (optional) $dbtype database type for the connection
     */
    public function __construct(string $host, string $database, string $username, string $password, string $dbtype = "mysql") {
        try {
            $this->pdo = new PDO("$dbtype:host=$host;dbname=$database;charset=utf8mb4", $username, $password, [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch(PDOexeption $e) {
            $this->showError("Error: " . $e->getMessage());
        }
    }

    /**
     * used to insert data in the database
     *
     * @param string $sql the sql query
     * @param array (optional) $bindings the bindings used in the query
     * @return int last insert id
     */
    public function createData(string $sql, array $bindings = []) {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($bindings);
        return $this->pdo->lastInsertId();
    }

    /**
     * reads data from a database
     *
     * @param string $sql the sql query
     * @param array (optional) $bindings the bindings for the query
     * @param boolean (optional) $multiple if you want multiple rows or not
     * @return array the data from the database
     */
    public function readData(string $sql, array $bindings = [], bool $multiple = true) {

        $sth = $this->pdo->prepare($sql);
        $sth->execute($bindings);

        $this->lastSelect = compact("bindings", "sql");

        if($multiple) {
            return $sth->fetchAll();

        } else {
            return $sth->fetch();
        }
    }

    /**
     * updates data in the database
     *
     * @param string $sql the sql query
     * @param array $bindings (optional) the bindings for the query
     * @return int last insert id
     */
    public function updateData(string $sql, array $bindings = []) {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($bindings);
        return $this->pdo->lastInsertId();
    }

    /**
     * deletes data in the database
     *
     * @param string $sql the sql query
     * @param array $bindings (optional) the bindings for the query
     * @return bool if the query completed or not
     */
    public function deleteData(string $sql, array $bindings = []) {
        $sth = $this->pdo->prepare($sql);
        return $sth->execute($bindings);
    }
}

?>
