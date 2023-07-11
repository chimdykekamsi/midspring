  <?php include 'includes/dbpipe.php'; ?>
  <?php include 'includes/auth.php'; ?>
  <?php
		if(isset($_GET['delete'])) {
			
		$id = $_GET['delete'];
			 
		 
	          @mysqli_query($con, "DELETE FROM report WHERE id ='$id'");
		
		
				header("Location: viewIssue?deleted");

				}
		?>

  