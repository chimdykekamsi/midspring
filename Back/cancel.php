<?php include 'includes/dbpipe.php'; ?>
  <?php
		 $pid = $_GET['id'];

    	@mysqli_query($con, "UPDATE deposits set status ='cancelled' WHERE id='$pid'");

		echo "<script>window.location='deposit?cancelled'</script>";	

?>

  