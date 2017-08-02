<?php
 
namespace App;
 
/**
 * SQLite Create Table Demo
 */
class SQLiteCreateTable {
 
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;
 
    /**
     * connect to the SQLite database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
 
    /**
     * create tables 
     */
    public function createTables() {
        $commands = [

            'CREATE TABLE IF NOT EXISTS MEMBER_2017 (
                    ID INTEGER PRIMARY KEY AUTOINCREMENT,
                    FName TEXT NOT NULL,
                    LName TEXT NOT NULL,
                    Email TEXT NOT NULL,
                    Class TEXT NOT NULL,
                    Refer TEXT NOT NULL,
                    Activity TEXT NOT NULL,
                    Payment TEXT NOT NULL);

            CREATE TABLE IF NOT EXISTS MEMBER_INTEREST (
                    ID INTEGER PRIMARY KEY AUTOINCREMENT,
                    FName TEXT NOT NULL,
                    LName TEXT NOT NULL,
                    Email TEXT NOT NULL,
                    Class TEXT NOT NULL);

            CREATE TABLE IF NOT EXISTS ADMIN (
                ID INTEGER PRIMARY KEY AUTOINCREMENT,
                Key TEXT NOT NULL,
                Value TEXT,
                Number INTEGER
            )
        ];


        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }
 
    /**
     * get the table list in the database
     */
    public function getTableList() {
 
        $stmt = $this->pdo->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }
 
        return $tables;
    }
 
<<<<<<< HEAD
}
=======
}
>>>>>>> 1eefe2ea1d88b163d097b6c01cfc9afade6e6b69
