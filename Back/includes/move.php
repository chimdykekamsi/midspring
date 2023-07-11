 <div class="error">
			  
<?php



if (isset($_POST['submit'])){


$UserName = mysqli_real_escape_string($con, $_POST['username']);

$Password = sha1(mysqli_real_escape_string($con, $_POST['password']));
	
$query = mysqli_query($con, "select * from admins where username ='$UserName' and password='$Password'");
$row = mysqli_fetch_array($query);
$num_row = mysqli_num_rows($query);
$f=$row['name'];


if ($num_row > 0){

    		if (isset($_POST['rember'])) {
    			setcookie('usrname', $UserName, time() + 86400);
    		}
			 session_start();
			 
			 $key_id = $row['id']; 
			 
		     $user_browser = $_SERVER['HTTP_USER_AGENT'];

			$_SESSION['key_id'] = $key_id;
			
			$_SESSION['ip'] = $user_browser;

	
	//mysqli_query($con, "INSERT INTO user_history (data,action,date,user)VALUES('$f', 'Login', NOW(),'$UserName')");
	
			 //redirect("profile.php");
		//redirect('profile.php');
		
//echo("<script>location.href = 'profile.php';</script>");
//exit(header("Location: /profile.php"));

if($row['role'] == "ROLE_SUPER_ADMIN"){
	
	?>
	<script>
window.location = "dashboard";
</script>
<?php
}
else{
    ?>
	<script>
window.location = "login";
</script>
<?php

}
}
else{
?>
    <div class="alert alert-warning success-color-dark">
    <button class="close" data-dismiss="alert">×</button>
   Invalid Login Credentials
    </div>
	
<?php } 
  
}

?>
</div>