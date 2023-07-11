<?php ob_start(); ?>
<?php
 session_start(); 
 include "includes/dbpipe.php";
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['key_id']) || $_SESSION['key_id'] == '') { ?>

<script>
window.location = "login";
</script>

<?php
}
//Check whether the session variable SESS_MEMBER_ID is present or not
if ($_SESSION['ip'] != $_SERVER['HTTP_USER_AGENT']) { ?>
<script>
window.location = "login";
</script>
<?php
}

//Check whether the session variable SESS_MEMBER_ID is present or not
$session_id = $_SESSION['key_id'];
$query= mysqli_query($con, "select * from admins where id = '$session_id' AND role='ROLE_USER'")or die(mysqli_error($con));
$num_row = mysqli_num_rows($query);

if ($num_row > 0){ ?>

<script>
window.location = "login?error=1";
</script>

<?php
}
$session_id = $_SESSION['key_id'];
$query= mysqli_query($con, "select * from admins where id = '$session_id'")or die(mysqli_error($con));
	$row = mysqli_fetch_array($query);
	$uid = $row['username'];
	$fname =$row['name'];
?>