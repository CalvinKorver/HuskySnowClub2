<?php
 


namespace App;
 
/**
 * PHP SQLite Insert Demo
 */
class SQLiteMemberRoster {
 
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;
 
    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
 


    /* Returns boolean true if member exists, false otherwise */
    public function displayMembers() {
        $stmt = $this->pdo->query("SELECT FName, LName, Class, Payment FROM MEMBER_2017;");
        $members = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $members[] = [
                'FName' => $row['FName'],
                'LName' => $row['LName'],
                'Class' => $row['Class'],
                'Payment' => $row['Payment']
            ];

        }
        echo "here";
        return $members;
    }

    public function checkAdminCode($adminAttempt) {
        
        $stmt = $this->pdo->prepare("SELECT Value FROM ADMIN WHERE Key == 'admin_key';");
        $stmt->execute();
        echo $stmt->fetchColumn();
        return ($stmt->fetchColumn() == $adminAttempt);
    }
}
