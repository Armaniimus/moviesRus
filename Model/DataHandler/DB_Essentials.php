<?php

/**
 *
 */
class DB_Essentials {
    /**
     *
     * a pdo instance
     *
     * @var pdo
     * @access public
     */
    public $pdo;

    /**
     * last select made by the datahandler
     *
     * @var array
     * @access public
     */
    public $lastSelect = [];

    /**
     * the host used for the connection
     *
     * @var string
     * @access public
     */
    public $host;
    /**
     * the database used for the connection
     *
     * @var string
     * @access public
     */
    public $database;
    /**
     * the username used for the connection
     *
     * @var string
     * @access public
     */
    public $username;
    /**
     * the password used for the connection
     *
     * @var string
     * @access public
     */
    public $password;
    /**
     * the database type used for the connection
     *
     * @var string
     * @access public
     */
    public $dbtype;

    /**
     * constructor for the datahandler
     *
     * @param string $host database host
     * @param string $database database name
     * @param string $username database username
     * @param string $password database password
     * @param string (optional) $dbtype database type
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

        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->dbtype = $dbtype;
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
