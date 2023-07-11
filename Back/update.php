<?php include 'includes/dbpipe.php'; ?>
<?php

$rid = $_POST['id'];

$account = $_POST['amount'];

$credit = $_POST['credit'];

$account = $_POST['account'];

$account_id = $_POST['account_id'];

	$accounData = mysqli_query($con, "select * from accounts where id=$account_id")or die(mysqli_error());
					
	$rowacc = mysqli_fetch_array($accounData);

    $balance  =  $rowacc['balance'] + $credit;
    
	          @mysqli_query($con, "UPDATE accounts SET balance='$balance' WHERE id='$account_id'");
	          
  	          @mysqli_query($con, "UPDATE deposits SET status='confirmed' WHERE id='$rid'");

        	header("Location: deposit?update");
?>