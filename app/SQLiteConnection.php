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
<<<<<<< HEAD
            $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
        return $this->pdo;
    }
=======
            $s = "sqlite:" . Config::PATH_TO_SQLITE_FILE;
            $this->pdo = new \PDO($s);
        }

        return $this->pdo;
    }


>>>>>>> 1eefe2ea1d88b163d097b6c01cfc9afade6e6b69
}
