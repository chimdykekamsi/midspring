   <?php ob_start(); ?>
  <?php include 'includes/dbpipe.php'; ?>
  <?php
		if(isset($_GET['render'])) {
			
		$id = $_GET['render'];
			 
	          @mysqli_query($con, "UPDATE users SET status='active' WHERE id=$id");
		
							echo "<script> window.location='UsersList?success'</script>";		

				}
		if(isset($_GET['trx'])) {
			
		$id = $_GET['trx'];
			 
	          @mysqli_query($con, "UPDATE users SET transfer ='active' WHERE id=$id");
		
							echo "<script> window.location='UsersList?success'</script>";		

				}
		?>

  