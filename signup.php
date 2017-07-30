<?php
if(!empty($_POST)){
    $signup = true;
    $mysqli_connection = new mysqli('vergil.u.washington.edu', 'root', 'snowclub-sn0', 'MEMBERS', 4200);
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
        $payment = 'cash';
        
        //Check cash validation
        if($payment == 'cash') {
            $cashcode = $_POST['cashcode'];
            $checkcashcode = "SELECT * FROM admin WHERE type='cashcode'";
            $check = $mysqli_connection->query($checkcashcode)->fetch_assoc();
            if($check) {
                if(strcmp ($check['content'], $cashcode  ) != 0) {
                    $signup = FALSE;
                    $error = "Incorrect Cash Code";
                }
            } else {
                $signup = FALSE;
                $error = "There was an error!";
            }       
            
        }

        if($signup) {

            $member_table = "members_2017"
            //Check email
            $check_email =  "SELECT * FROM $member_table WHERE email='".$email."'";
            if($mysqli_connection->query($check_email)->num_rows > 0){
                $signup = FALSE;
                $error = "That email is registered to an existing user";
            } else {
                //Insert into DB
                $statement = $mysqli_connection->prepare("INSERT INTO $member_table (fname, lname, email, payment) 
                        VALUES (?, ?, ?)");
                
                // Binds a PHP variable to a corresponding named or question mark 
                // placeholder in the SQL statement that was used to prepare the statement.
                $statement->bind_param("ssssiis", $fname, $lname, $email, $payment);

                //Send out confirmation email
                // if($statement->execute()) {      
                //     $signup = TRUE;
                //     $tpl = file_get_contents('../assets/email/confirmation.html');
                //     $tpl = str_replace('{{fname}}', $fname, $tpl);
                //     $to  = $email;
                //     // subject
                //     $subject = 'Welcome!';
                //     // To send HTML mail, the Content-type header must be set
                //     $headers  = 'MIME-Version: 1.0' . "\r\n";
                //     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                //     $email_from = "Husky Snow Club".'<officers@huskysnowclub.com>';
                //     $headers .= 'From: '.$email_from. "\r\n" .
                //              'Reply-To: officers@huskysnoclub.com' . "\r\n" .
                //             'X-Mailer: PHP/' . phpversion();
                //     mail($to, $subject, $tpl, $headers);
                // } else {
                //     $signup = FALSE;
                //     $error = "The engineer got a little drunk and something broke!\nMember Insertion Failed";
                // }
            }
        }  
        $mysqli_connection->close();
    }
}
?>
