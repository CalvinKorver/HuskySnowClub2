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
<<<<<<< HEAD
        $commands = [

            'CREATE TABLE IF NOT EXISTS  (
                    project_id   INTEGER PRIMARY KEY,
                    project_name TEXT NOT NULL
            )',

            'CREATE TABLE IF NOT EXISTS MEMBER_INTEREST (
                    ID INTEGER PRIMARY KEY AUTOINCREMENT,
                    FName TEXT NOT NULL,
                    LName TEXT NOT NULL,
                    Email TEXT NOT NULL,
                    Class TEXT NOT NULL
            )'
        ];


=======
        $commands = ['CREATE TABLE IF NOT EXISTS projects (
                        project_id   INTEGER PRIMARY KEY,
                        project_name TEXT NOT NULL
                      )',
            'CREATE TABLE IF NOT EXISTS tasks (
                    task_id INTEGER PRIMARY KEY,
                    task_name  VARCHAR (255) NOT NULL,
                    completed  INTEGER NOT NULL,
                    start_date TEXT,
                    completed_date TEXT,
                    project_id VARCHAR (255),
                    FOREIGN KEY (project_id)
                    REFERENCES projects(project_id) ON UPDATE CASCADE
                                                    ON DELETE CASCADE)'];
>>>>>>> 1eefe2ea1d88b163d097b6c01cfc9afade6e6b69
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
