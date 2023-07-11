<?php
 include_once 'includes/auth.php';
		
	   if(!empty($_POST['type'])) {
            
		$acct = strip_tags($_POST['acct']);
		$amount = strip_tags($_POST['amt']);
		$name = strip_tags($_POST['name']);
		$bank = strip_tags($_POST['bank']);
		$num = strip_tags($_POST['num']);
		$routing = strip_tags($_POST['routing']);
		$addr = strip_tags($_POST['addr']);
		$desc = strip_tags($_POST['desc']);
		$type = strip_tags($_POST['type']);
		$otp = strip_tags($_POST['otp']);
		
					
				if($type === 'dom') {
				
				  $xmode = 'Domestic';
				    
				} else if($type === 'wire') {
				    
				    $xmode = 'Wire';
				} else {
				    
				    $xmode = 'InterBank';
				}
	 //  if(isset($otp) || $otp != null || $otp != '') {
		   
		   
		    $result134 = mysqli_query($con, "SELECT * FROM users where otp=$otp and id=$session_id");
				
			$getrow1 = mysqli_fetch_array($result134);
		
			//if(mysqli_num_rows($result134) > 0){

			$uid = $getrow1['id'];
			
		//	@mysqli_query($con, "update users set otp=null where id='$session_id'");
		   
			$result14 = mysqli_query($con, "SELECT * FROM accounts where user_id=$session_id and account_type='$acct'");
				
			$getrow = mysqli_fetch_array($result14);
		
			if(mysqli_num_rows($result14) > 0){

			$uid = verificationCode(12);
			
			$acount_id = $getrow['id'];
			
			$balance = intval($getrow['balance']);
			
			$gate = $getrow['account_type'];
			
			if($getrow['account_type'] == 'USD') { 
													
			$symbol = '$';
			
			} elseif($getrow['account_type'] == 'GBP') { 
			
			$symbol = '£';
			
			} else {
			$symbol = '€';
			} 
			
			
			if(intval($amount) >  $balance) {
				
				 $data = [ 'status' => 'error',  'message' => "Error! Insufficient Balance in your USD Account!<br>Please Deposit & try again."];
           
				header('Content-type: application/json');
			  
				echo json_encode($data);
				exit();
				
			}
			
			
			if($type === 'dom') {
			    
			    	$accounData = mysqli_query($con, "select * from accounts where account_type='$acct' and account_number='$num'")or die(mysqli_error());
            		 
            		 $return_count = mysqli_num_rows($accounData);
                
                    if($return_count < 1) {
                        
                     $data = [ 'status' => 'error',  'message' => "Error! Account number does not exist!<br>Please check & try again."];
               
    				header('Content-type: application/json');
    			  
        				echo json_encode($data);
        				exit();  
                    
                        
                    } else {
                    
            			$accT_row = mysqli_fetch_array($accounData);

            			 $balance_dept_new  = $accT_row['balance'] + $amount;

                        $dept_id = $accT_row['id'];
                    
                        @mysqli_query($con, "UPDATE accounts SET balance='$balance_dept_new' WHERE id=$dept_id");

                }
			}
			
			 $balance_new  = $balance - $amount;
			 
			
	        @mysqli_query($con, "UPDATE accounts SET balance='$balance_new' WHERE id=$acount_id");
	          
			
			@mysqli_query($con, "INSERT INTO withdrawal(trx, user, amount, bank, account_number, routing, type, description, gateway, status) VALUES('$uid','$session_id', '$amount', '$bank', '$num', '$routing','$type','$desc','$gate','pending')");
			        
			        
			         $data = array('name'=> ucfirst($fname), 'type' => $xmode, 'trx' => $uid, 'amount' => $amount, 'symbol' => $acct, 'status' => 'Successful', 'content' => ' was <b>Successful</b>. Transfer was successfully completed.', 'date' => date('Y-m-d'), 'time' => date('H:i:sa'));
				        
				       
                        $template_welcome = file_get_contents("trans_mail.php");
                            
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
        
                       
        				$mail->AddAddress($uxid);
        				$mail->Username="noreply@midspringinc.com";  
        				$mail->Password="KQaAY9&^WG79";            
        				$mail->SetFrom('noreply@midspringinc.com','MidSpring Bank');
        				$mail->AddReplyTo("noreply@midspringinc.com","MidSpring Bank");
        				$mail->Subject = "Transfer Notification!";
        				$mail->MsgHTML($template_welcome);
        				$mail->Send();
        				
				
			 $data = [ 'status' => true, 'ref' => $uid, 'message' => "success"];
           
			header('Content-type: application/json');
          
     		echo json_encode( $data );
			
			exit();	
			
			} else {
							
			$data = [ 'status' => false, 'message' => "Error find account<br>
			Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			
		}
	/* 
		} else {
		  
		  $data = [ 'status' => false, 'message' => "Empty fields <br>Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			  
			} */
	 } else {
		  
		  $data = [ 'status' => false, 'message' => "Empty fields <br>Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			  
			} 
			
	/* } else {
		
		$otp = verificationCode(6);
		
		@mysqli_query($con, "update users set otp=$otp where id='$session_id'");
		  
		  $data = [ 'status' => false, 'message' => "OTP Send"];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			  
			}	
		 */
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
	
	function initGetCurl($url, $header){
        $ch = curl_init($url);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);
        if (curl_error($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

?>