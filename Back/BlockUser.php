  <?php include 'includes/dbpipe.php'; ?>
  <?php include 'includes/auth.php'; ?>
  
  <?php
		if (isset($_GET['render'])) {
			
		$id = $_GET['render'];
			 
		 $sql11 = mysqli_query($con, "SELECT id FROM members where id='$id'") or die(mysqli_error());
		 
		 $aa= mysqli_fetch_array($sql11); 
		

		   if($aa['id'] == null) {
			
	             header("Location: dashboard");

		}
		
		else {
			
		//$dueDate = (new DateTime('now'))->add(new DateInterval('PT'.$aa['hours_for_scam_extension'].'H'))->format('Y-m-d H:i:s');
	
	       mysqli_query($con, "UPDATE members set status ='blocked' WHERE id ='$id'");
		
		
				header("Location: ActiveUser");

		
		
		}
		}
		?>

  