<?php
 include_once 'includes/auth.php';
		
	   if(!empty($_POST['token'])) {
            
		$token = strip_tags($_POST['token']);
		
		$login = strip_tags($_POST['login-otp']);	
				
		 $result14 = mysqli_query($con, "SELECT * FROM users where otp=$token && otpstatus=0 && id=$session_id");
				
			$getrow = mysqli_fetch_array($result14);
		
			if(mysqli_num_rows($result14) > 0){

			$uid = $getrow['id'];
							
			@mysqli_query($con, "update users set otpstatus=1 where id='$session_id'");
			
			 $data = [ 'status' => true, 'message' => "success"];
           
			header('Content-type: application/json');
          
     		echo json_encode( $data );
			
			exit();	
			
			} else {
							
		  $data = [ 'status' => false, 'message' => "Incorrect OTP Provided! <br>
			Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			
		}
	
		} else {
		  
		  $data = [ 'status' => false, 'message' => "Incorrect OTP Provided! <br>
Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			  
			}	
		

?>