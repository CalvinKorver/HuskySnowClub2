<?php
echo 'Running interest.php';
if(!empty($_POST)){
    
    $signup = true;
    $dir = 'sqlite:/database/HSC2017local.db';
    $mysqli_connection = new mysqli($dir, 'root', 'snowclub-sn0', 'MEMBERS', 4200);
    if($mysqli_connection->connect_error){
        $signup = FALSE;
        $error = $mysqli_connection->connect_error;
    } else {
        $fname = $_POST['interest-fname'];
        $lname = $_POST['interest-lname'];
        $email = $_POST['interest-email'];
        $class = 'Freshman';
        // $level = $_POST['level'];
        // $payment = $_POST['payment'];

        $table = "MEMBER_INTEREST";
        //Check email
        $check_email =  "SELECT * FROM $member_table WHERE email='".$email."'";
        if($mysqli_connection->query($check_email)->num_rows > 0){
            $signup = FALSE;
            $error = "Email exists in $table table already!";
        } else {
            //Insert into DB
            $statement = $mysqli_connection->prepare("INSERT INTO $member_table (fname, lname, email, class) 
                    VALUES (?, ?, ?, ?)");
            
            // Binds a PHP variable to a corresponding named or question mark 
            // placeholder in the SQL statement that was used to prepare the statement.
            $statement->bind_param("ssssiis", $fname, $lname, $email, $class);

            // Confirm exectuion
            if($statement->execute()) {      
                $signup = TRUE;
                
            } else {
                $signup = FALSE;
                $error = "The engineer got a little drunk and something broke!\nMember Insertion Failed";
            }
        }
        echo $signup;
        $mysqli_connection->close();
    }
}
?>
