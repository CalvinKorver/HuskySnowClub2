<?php
namespace App;
 
/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;
 
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            $s = "sqlite:" . Config::PATH_TO_SQLITE_FILE;
            $this->pdo = new \PDO($s);
        }

        return $this->pdo;
    }


}
