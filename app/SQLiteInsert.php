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
 
<<<<<<< HEAD
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
=======
    // /**
    //  * Insert a new project into the projects table
    //  * @param string $projectName
    //  * @return the id of the new project
    //  */
    // public function insert($projectName) {
    //     $sql = 'INSERT INTO projects(project_name) VALUES(:project_name)';
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindValue(':project_name', $projectName);
    //     $stmt->execute();
 
    //     return $this->pdo->lastInsertId();
    // }
>>>>>>> 1eefe2ea1d88b163d097b6c01cfc9afade6e6b69
 
    /**
     * Insert a new task into the tasks table
     * @param type $taskName
     * @param type $startDate
     * @param type $completedDate
     * @param type $completed
     * @param type $projectId
     * @return int id of the inserted task
     */
<<<<<<< HEAD
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

    public function getEmailCount($Email) {
 
        $stmt = $this->pdo->prepare('SELECT COUNT(*) 
                                    FROM MEMBER_INTEREST
                                   WHERE Email = :Email;');
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    /*  Inserts new member into the MEMBER_INTEREST Table
        Returns the ID of the newly entered entry otherwise 0 if email exists */
    public function insertMemberInterest($fName, $lName, $email, $class) {
        echo 'checkEmailExists';
        // $emailRes = $this->checkEmailExists($email);
        $sql = 'INSERT INTO MEMBER_INTEREST(FName,LName,email,class) '
                . 'VALUES(:FName,:LName,:email,:class)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':FName' => $fName,
            ':LName' => $lName,
            ':email' => $email,
            ':class' => $class,
        ]);
        echo 'Member inserted';
        return $this->pdo->lastInsertId();
    }



}
=======
    public function insertInterest($fName, $lName, $email, $class) {
        $sql = 'INSERT INTO MEMBER_INTEREST(FName, LName, Email, Class) VALUES(:FName,:LName,:Email,:Class)';
        
 
        echo $sql;
        $stmt = $this->pdo->prepare($sql);
        echo $this->pdo->lastInsertId();
        $stmt->execute([
            ':FName' => $fName,
            ':LName' => $lName,
            ':Email' => $email,
            ':Clafss' => $class,
        ]);
        echo "fuck";
        ECHO $this->pdo->lastInsertId();
        return $this->pdo->lastInsertId();
    }
 
}


// if(!empty($_POST) && $connected) {
//     $signup = true;
//     $dir = 'sqlite:/database/HSC2017local.db';
//     $mysqli_connection = new mysqli($dir, 'root', 'snowclub-sn0', 'MEMBERS', 4200);
//     if($mysqli_connection->connect_error){
//         $signup = FALSE;
//         $error = $mysqli_connection->connect_error;
//     } else {
//         $fname = $_POST['interest-fname'];
//         $lname = $_POST['interest-lname'];
//         $email = $_POST['interest-email'];
//         $class = 'Freshman';
//         // $level = $_POST['level'];
//         // $payment = $_POST['payment'];

//         $table = "MEMBER_INTEREST";
//         //Check email
//         $check_email =  "SELECT * FROM $member_table WHERE email='".$email."'";
//         if($mysqli_connection->query($check_email)->num_rows > 0){
//             $signup = FALSE;
//             $error = "Email exists in $table table already!";
//         } else {
//             //Insert into DB
//             $statement = $mysqli_connection->prepare("INSERT INTO $member_table (fname, lname, email, class) 
//                     VALUES (?, ?, ?, ?)");
            
//             // Binds a PHP variable to a corresponding named or question mark 
//             // placeholder in the SQL statement that was used to prepare the statement.
//             $statement->bind_param("ssssiis", $fname, $lname, $email, $class);

//             // Confirm exectuion
//             if($statement->execute()) {      
//                 $signup = TRUE;
                
//             } else {
//                 $signup = FALSE;
//                 $error = "The engineer got a little drunk and something broke!\nMember Insertion Failed";
//             }
//         }
//         echo $signup;
//         $mysqli_connection->close();
//     }
// }
>>>>>>> 1eefe2ea1d88b163d097b6c01cfc9afade6e6b69
