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
 
    /**
     * Insert a new task into the tasks table
     * @param type $taskName
     * @param type $startDate
     * @param type $completedDate
     * @param type $completed
     * @param type $projectId
     * @return int id of the inserted task
     */
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