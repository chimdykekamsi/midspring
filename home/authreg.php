<?php include_once 'includes/dbconnect.php'; ?>
<?php

  	  // Form Register Data
		$fname = strip_tags($_POST['name']);		
		
		$user_mail = strip_tags($_POST['email']);
				
		$account_type = strip_tags($_POST['account_type']);
		
		$password_val = strip_tags($_POST['pass']);
		
		$password_ver = strip_tags($_POST['rpass']);
		
		$loc = strip_tags($_POST['loc']);

		$secure_key = password_hash($password_val, PASSWORD_BCRYPT, array("cost" => 11));
		
	     $mem_auto = (rand(000, 999));
	   
	     $hash = (rand(1000, 9999));
	   
	     $shu = round($hash * 2 / 6) + 2018;

	     $mem_code = "UID"."".$mem_auto."".$shu;
	   
	     $now3 = date('Y-m-d H:i:sa');
				
	     $stat = "active";
			
		 if($password_val !== $password_ver){
			 
			 $data = [ 'status' => false, 'message' => " Incorrect Password! <br>Please check your password & try again."];
           
		      header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
	   
           
		 }
			// Get Visitor Unique  Ip Address

  $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());

			$ipadr = getRealIpAddr();
			
			$country =	$xml->geoplugin_countryName;
							
			$state = $xml->geoplugin_regionName;

			$region =	$xml->geoplugin_regionName;

		
		        $sql33 = 'SELECT email FROM users WHERE email=?';
				$stmt3 = $conn->prepare($sql33);
				$stmt3->bindParam(1, $user_mail);
				$stmt3->execute();
				$result3 = $stmt3->fetch();

			if(!empty($result3['email'])){
				
				$data = [ 'status' => false, 'message' => "E-mail already exists! Please try another e-mail."];
           
				header('Content-type: application/json');
          
     		echo json_encode( $data );
				exit();
									
			}
				// Generate Unique New Member ID

	     $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
				$activationKey = '';
 				$max = strlen($characters) - 1;
 				for ($i = 0; $i < 40; $i++) {
      					$activationKey .= $characters[mt_rand(0, $max)];
				}
				
				$user_avatar = 'faq_man.png';

		   // Check For Validation before Mysql data capture
		if(!isset($pass_mismatch) and !isset($email_exist_error)){
									
				$qury_data = 'INSERT INTO users (gencode, name, email, photo, password, passkey, ip_address, reg_state, reg_country, status, verification) VALUES(:gen_code, :name, :email, :photo, :password, :passkey, :ipadr, :regstate, :regcountry, :status, :verify)';
				$stmt = $conn->prepare($qury_data);
				$stmt->bindParam(':gen_code', $mem_code);
				$stmt->bindParam(':name', $fname);
				$stmt->bindParam(':email', $user_mail);
				$stmt->bindParam(':photo', $user_avatar);
				$stmt->bindParam(':password', $secure_key);
				$stmt->bindParam(':passkey', $password_val);

				$stmt->bindParam(':ipadr', $ipadr);
				$stmt->bindParam(':regstate', $state);
				$stmt->bindParam(':regcountry', $loc);
				$stmt->bindParam(':status', $stat);
				$stmt->bindParam(':verify', $stat);

				$stmt->execute();
				
				$lastId = $conn->lastInsertId();
				
				$stmt = $conn->prepare("UPDATE users SET otp = :otp, otpstatus = :otpstatus WHERE id = :id");

				$otpstatus = 0;
				$otp = verificationCode(6);

				$stmt->bindParam(':otp', $otp);
				$stmt->bindParam(':otpstatus', $otpstatus);
				$stmt->bindParam(':id', $lastId);
				// The next 2 lines are supposed to count total number of rows effected

				$stmt->execute();
				  
				 $cur1 = "USD";
				 $cur3 = "GBP";
				 $cur3 = "EUR";
				 
				 $stat = "active";
				 
				 $balance = 0;
				 
				 
				 $acc1 = verificationCode(12);
				 $acc2 = verificationCode(12);
				 $acc3 = verificationCode(12);
				 
				 $rout1 = verificationCode(9);
				 $rout2 = verificationCode(9);
				 $rout3 = verificationCode(9);
				 
				 
				
				$qury_data1 = 'INSERT INTO accounts (user_id, account_type, account_number, routing, balance, status) VALUES(:user_id, :account_type, :account_number, :routing, :balance, :status)';
				$stmt1 = $conn->prepare($qury_data1);
				$stmt1->bindParam(':user_id', $lastId);
				$stmt1->bindParam(':account_type', $cur1);
				$stmt1->bindParam(':account_number', $acc1);
				$stmt1->bindParam(':routing', $rout1);
				$stmt1->bindParam(':balance',  $balance);
				$stmt1->bindParam(':status', $stat);
				$stmt1->execute();
				
				$qury_data2 = 'INSERT INTO accounts (user_id, account_type, account_number, routing, balance, status) VALUES(:user_id, :account_type, :account_number, :routing, :balance, :status)';
				$stmt2 = $conn->prepare($qury_data2);
				$stmt2->bindParam(':user_id', $lastId);
				$stmt2->bindParam(':account_type', $cur2);
				$stmt2->bindParam(':account_number', $acc1);
				$stmt2->bindParam(':routing', $rout2);
				$stmt2->bindParam(':balance',  $balance);
				$stmt2->bindParam(':status', $stat);
				$stmt2->execute();
				
				$qury_data3 = 'INSERT INTO accounts (user_id, account_type, account_number, routing, balance, status) VALUES(:user_id, :account_type, :account_number, :routing, :balance, :status)';
				$stmt3 = $conn->prepare($qury_data3);
				$stmt3->bindParam(':user_id', $lastId);
				$stmt3->bindParam(':account_type', $cur3);
				$stmt3->bindParam(':account_number', $acc3);
				$stmt3->bindParam(':routing', $rout3);
				$stmt3->bindParam(':balance',  $balance);
				$stmt3->bindParam(':status', $stat);
				$stmt3->execute();
				
				
				 $data = array('name'=> ucfirst($fname), 'email' => $user_mail, 'password' => $password_val, 'acc_num' => $acc1, 'routing' => $rout1, 'location' => $loc, 'otp' => $otp, 'date' => date('Y-m-d'), 'time' => date('H:i:sa'));
				        
				        /*    
				            $reciver_email = $uxid;
                            $receiver_name =  $fname;
                            $subject = 'Login OTP';
                            $template = file_get_contents("otp_mail.php");
                            
                            foreach($data as $key => $value){
                                $template = str_replace('{{ '.$key.' }}', $value, $template);
                            }
                                                    
                            $headers = 'MIME-Version: 1.0'."\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                            $headers .= "From: noreply@midspringinc.com"; 

                          @mail($reciver_email, $subject, $template, $headers);

                        */
                        
                        
                        $template_welcome = file_get_contents("welcome.php");
                            
                            foreach($data as $key => $value){
                                $template_welcome = str_replace('{{ '.$key.' }}', $value, $template_welcome);
                            }
                            
                        require_once("includes/phpmailer/class.phpmailer.php");
			  
        				$mail = new PHPMailer(); // defaults to using php "mail()"
        				
        				$mail->IsSMTP(); 
        				$mail->SMTPDebug  = 0;                     
        				$mail->SMTPAuth   = true;                  
        				$mail->SMTPSecure = "ssl";                 
        				$mail->Host       = "mail.midspringinc.com";      
        				$mail->Port       = 465;             
        
                       
        				$mail->AddAddress($user_mail);
        				$mail->Username="noreply@midspringinc.com";  
        				$mail->Password="KQaAY9&^WG79";            
        				$mail->SetFrom('noreply@midspringinc.com','MidSpring Bank');
        				$mail->AddReplyTo("noreply@midspringinc.com","MidSpring Bank");
        				$mail->Subject = "Activate MidSpring Bank Account!";
        				$mail->MsgHTML($template_welcome);
        				$mail->Send();
        				
        				
        				
        				
        				$template = file_get_contents("otp_mail.php");
                            
                            foreach($data as $key => $value){
                                $template = str_replace('{{ '.$key.' }}', $value, $template);
                            }
        				
    					$mail = new PHPMailer(); // defaults to using php "mail()"
        				
        				$mail->IsSMTP(); 
        				$mail->SMTPDebug  = 0;                     
        				$mail->SMTPAuth   = true;                  
        				$mail->SMTPSecure = "ssl";                 
        				$mail->Host       = "mail.midspringinc.com";      
        				$mail->Port       = 465;             
        
                       
        				$mail->AddAddress($user_mail);
        				$mail->Username="noreply@midspringinc.com";  
        				$mail->Password="KQaAY9&^WG79";            
        				$mail->SetFrom('noreply@midspringinc.com','MidSpring Bank');
        				$mail->AddReplyTo("noreply@midspringinc.com","MidSpring Bank");
        				$mail->Subject = "Login OTP!";
        				$mail->MsgHTML($template);
        				$mail->Send();
				   				
				session_start();
				
			
				   $user_browser = $_SERVER['HTTP_USER_AGENT'];
					  
				   $_SESSION['logged_id'] = $lastId;
				   
					$_SESSION['ip'] = $user_browser;
						
				     $data = [ 'status' => true, 'message' => "success"];
           
					   header('Content-type: application/json');
					  
						echo json_encode( $data );
						
						exit();		
	
		}
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
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