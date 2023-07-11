<?php ob_start(); ?>
<?php include_once 'includes/dbconnect.php'; ?>
<?php

    $username = $conn->quote($_POST['email']);
    $pword = $_POST['pass'];
	
    $query = ("SELECT * FROM users WHERE email =$username");
    //echo $query;
    $stmt = $conn->prepare($query);
    $stmt = $conn->query($query);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

	
if($row != null) {
	$user_key = $row['password'];
	
    if(password_verify($pword, $user_key))
    {
        // check if user email has been verified
       $query = "SELECT status FROM users WHERE id = ". $row['id'];
        $stmt = $conn->prepare($query);
        $stmt = $conn->query($query);
        $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['verification'] == 'active'){
			
			$stmt = $conn->prepare("UPDATE users SET otp = :otp, otpstatus = :otpstatus WHERE id = :id");

				$otpstatus = 0;
				$otp = verificationCode(6);

				$stmt->bindParam(':otp', $otp);
				$stmt->bindParam(':otpstatus', $otpstatus);
				$stmt->bindParam(':id', $row['id']);
				// The next 2 lines are supposed to count total number of rows effected

				$stmt->execute();
						
			session_start();
			
               $user_browser = $_SERVER['HTTP_USER_AGENT'];
    			  
               $_SESSION['logged_id'] = $row['id'];
    		   
                $_SESSION['ip'] = $user_browser;
    						
    			setcookie("username", $_POST['email'], time()+(10 * 365 * 24 * 60 * 60));
    			if(ISSET($_COOKIE['username'])){
    				setcookie("username", "");
    			}           
			                $datax = array('name'=> ucfirst($row['name']), 'otp' => $otp, 'date' => date('Y-m-d'), 'time' => date('H:i:sa'));

			
				            $reciver_email = $row['email'];
                            $receiver_name =  $row['name'];
                            $subject = 'Login OTP!';
                            $template = file_get_contents("otp_mail.php");
                            foreach($datax as $key => $value){
                                $template = str_replace('{{ '.$key.' }}', $value, $template);
                            }
                                                    
                            $headers = 'MIME-Version: 1.0'."\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                            $headers .= "From: info@midspringinc.com"; 
                        
                            @mail($reciver_email, $subject, $template, $headers);
                            
                            
                            require_once("includes/phpmailer/class.phpmailer.php");
    			  
            				$mail = new PHPMailer(); // defaults to using php "mail()"
            				
            				$mail->IsSMTP(); 
            				$mail->SMTPDebug  = 0;                     
            				$mail->SMTPAuth   = true;                  
            				$mail->SMTPSecure = "ssl";                 
            				$mail->Host       = "mail.midspringinc.com";      
            				$mail->Port       = 465;             
            
                           
            				$mail->AddAddress($reciver_email);
            				$mail->Username="noreply@midspringinc.com";  
            				$mail->Password="KQaAY9&^WG79";            
            				$mail->SetFrom('noreply@midspringinc.com','MidSpring Bank');
            				$mail->AddReplyTo("noreply@midspringinc.com","MidSpring Bank");
            				$mail->Subject = "Login OTP!";
            				$mail->MsgHTML($template);
            				$mail->Send();

			
                           $data = [ 'status' => true, 'message' => "success"];
                           
                		   header('Content-type: application/json');
                          
                     		echo json_encode( $data );
                			
                			exit();			
                			
                        } elseif($row['status'] == 'blocked') {
                			
                			
                			$data = [ 'status' => false, 'message' => "Account Is Currently Blocked"];
                           
                		   header('Content-type: application/json');
                          
                     		echo json_encode( $data );
                			exit();
			
            		
	} 
           
    } else {
		
		$data = [ 'status' => false, 'message' => " Incorrect Password! <br>Please check your password & try again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
		exit();			
    }
} else{
	$data = [ 'status' => false, 'message' => "E-mail does not exist on this server! <br>Please check & try again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
		exit();
}
function verificationCode($length)
	{
		if ($length == 0) return 0;
		$min = pow(10, $length - 1);
		$max = 0;
		while ($length > 0 && $length--) {
			$max = ($max * 10) + 9;
		}
		return random_int($min, $max);
	}
?>