<?php
 


namespace App;
 
/**
 * PHP SQLite Insert Demo
 */
class SQLiteInsert {
 
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
 
    /**
     * Insert a new project into the projects table
     * @param string $projectName
     * @return the id of the new project
     */
    public function insertProject($projectName) {
        $sql = 'INSERT INTO projects(project_name) VALUES(:project_name)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':project_name', $projectName);
        $stmt->execute();
 
        return $this->pdo->lastInsertId();
    }
 
    /**
     * Insert a new task into the tasks table
     * @param type $taskName
     * @param type $startDate
     * @param type $completedDate
     * @param type $completed
     * @param type $projectId
     * @return int id of the inserted task
     */
    public function insertTask($taskName, $startDate, $completedDate, $completed, $projectId) {
        $sql = 'INSERT INTO tasks(task_name,start_date,completed_date,completed,project_id) '
                . 'VALUES(:task_name,:start_date,:completed_date,:completed,:project_id)';
 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':task_name' => $taskName,
            ':start_date' => $startDate,
            ':completed_date' => $completedDate,
            ':completed' => $completed,
            ':project_id' => $projectId,
        ]);
 
        return $this->pdo->lastInsertId();
    }

    public function getEmailCount($email, $table) {

        $tableName = '';
        if ($table == 'interest' ? $tableName = 'MEMBER_INTEREST' : $tableName = 'MEMBER_2017');
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM '$tableName' WHERE Email = :Email;");
        $stmt->bindParam(':Email', $email);
        // $stmt->bindParam(':TableName', $tableName);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    public function checkCashCode($cashcodeAttempt) {

        $stmt = $this->pdo->prepare("SELECT Value FROM ADMIN WHERE Key == 'cashcode';");
        // $stmt->bindParam(':TableName', $tableName);
        $stmt->execute();
        return ($stmt->fetchColumn() == $cashcodeAttempt);
    }


    /*  Inserts new member into the MEMBER_INTEREST Table
        Returns the ID of the newly entered entry otherwise 0 if email exists */
    public function insertMemberInterest($fName, $lName, $email, $class) {
        // $emailRes = $this->checkEmailExists($email);
        $sql = 'INSERT INTO MEMBER_INTEREST(FName,LName,email,class) '
                . 'VALUES(:FName,:LName,:email,:class)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':FName' => strtolower($fName),
            ':LName' => strtolower($lName),
            ':email' => strtolower($email),
            ':class' => strtolower($class),
        ]);
        return $this->pdo->lastInsertId();
    }

    public function insertMemberSignup($fName, $lName, $email, $class, $refer, $activity, $payment) {
        // $emailRes = $this->checkEmailExists($email);
        $sql = 'INSERT INTO MEMBER_2017(FName,LName,email,class,refer,activity,payment) '
                . 'VALUES(:FName,:LName,:email,:class,:refer,:activity,:payment)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':FName' => strtolower($fName),
            ':LName' => strtolower($lName),
            ':email' => strtolower($email),
            ':class' => strtolower($class),
            ':refer' => strtolower($refer),
            ':activity' => strtolower($activity),
            ':payment' => strtolower($payment),
        ]);
        return $this->pdo->lastInsertId();
    }



}
