<?php
 include_once 'includes/auth.php';
		
	   if(!empty($_POST['sex'])) {
            
		$dob = strip_tags($_POST['dob']);
		$sex = strip_tags($_POST['sex']);
		$marry = strip_tags($_POST['marry']);
		$nation = strip_tags($_POST['nation']);
		$t_phone = strip_tags($_POST['t_phone']);
		$occ = strip_tags($_POST['occ']);
		$mon = strip_tags($_POST['mon']);
		$id_type = strip_tags($_POST['id_type']);
		$addr = strip_tags($_POST['addr']);
		$ct = strip_tags($_POST['ct']);
		$zip = strip_tags($_POST['zip']);
		$state = strip_tags($_POST['state']);
		$city = strip_tags($_POST['city']);
		
		
		
		
		
		//$id = strip_tags($_POST['id']);
		
		$login = strip_tags($_POST['login-otp']);	
				
		 $result14 = mysqli_query($con, "SELECT * FROM users where id=$session_id");
				
			$getrow = mysqli_fetch_array($result14);
		
			if(mysqli_num_rows($result14) > 0){

			$uid = $getrow['id'];
							
			@mysqli_query($con, "update users set reg_state='$state', city='$city', sex='$sex', nation='$nation', salary='$mon', work='$occ', idcard='$id_type' where id='$session_id'");
			
			 $data = [ 'status' => true, 'message' => "success"];
           
			header('Content-type: application/json');
          
     		echo json_encode( $data );
			
			exit();	
			
			} else {
							
			$data = [ 'status' => false, 'message' => "Empty field<br>
			Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			
		}
	
		} else {
		  
		  $data = [ 'status' => false, 'message' => "Empty fields <br>Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			  
			}	
		

?>