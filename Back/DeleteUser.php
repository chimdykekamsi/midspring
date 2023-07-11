  <?php include 'includes/dbpipe.php'; ?>
  <?php
		if(isset($_GET['render'])) {
			
		$id = $_GET['render'];
			 
	          @mysqli_query($con, "DELETE FROM users WHERE id='$id'");
		
		      @mysqli_query($con, "DELETE FROM accounts WHERE user_id='$id'");

							echo "<script> window.location='UsersList?success'</script>";		

				}
		?>

  