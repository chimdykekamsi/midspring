  <?php include 'includes/dbpipe.php'; ?>
  <?php include 'includes/auth.php'; ?>
  <?php
		if(isset($_GET['payment'])) {
			
		$id = $_GET['payment'];
			 
		 $sql11 = mysqli_query($con, "SELECT payment_entry FROM jury where id='$id'") or die(mysqli_error());
		     $aa= mysqli_fetch_array($sql11); 
			 
			 $pid = $aa['payment_entry'];

		   if($aa['payment_entry'] == null) {
			
	             header("Location: listDispute");

		}
		
		else {
			
			$verdict = "The Payment has been cancelled by the admin as the statements and evidences brought by the Receiver/Upline by far outweigh the statements and evidences brought by the Payer/Downline. Hence the Payer/Downline has been blocked for failing to complete the payment and another feeder will be assigned to the receiver/upline";

		//$dueDate = (new DateTime('now'))->add(new DateInterval('PT'.$aa['hours_for_scam_extension'].'H'))->format('Y-m-d H:i:s');
		
			       @mysqli_query($con, "UPDATE jury SET verdict ='$verdict', status ='closed' WHERE id ='$id'");

	
	          @mysqli_query($con, "UPDATE payment SET upline ='', payer='', status ='cancelled' WHERE id ='$pid'");
		
		
				header("Location: solveCase?deleted");

		
		
		}
		}
		?>

  