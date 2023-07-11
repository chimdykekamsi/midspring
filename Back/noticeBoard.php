<?php include 'includes/dbpipe.php'; ?> 
<?php 
 $title = "Notification"; 
 ?>
<?php include 'member.base.php'; ?>

 <body class="skin-blue sidebar-mini">
<!--<body class="hold-transition skin-red sidebar-mini">-->
  <!-- Overlay  -->
  <div id="overlay" style="background-color: #ecf0f5;opacity: 0.5;z-index: 2000;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;">
    <i style="position: fixed;width: auto;height: auto;z-index: 15;top: 20%;left: 45%;" class="fa fa-spinner fa-spin fa-5x fa-bw"></i>
  </div>

    <div class="wrapper">
        <!-- Main Header -->
        <?php include 'main-header.php'; ?>
        <!-- Left side column. contains the logo and sidebar -->
		
		<?php include 'member-sidebar.php'; ?>
                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>Notification</b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i>Administrator Dashboard</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i> Set Notification</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- Mini Side Bar -->
            <div class="col-sm-2">
                <div class="list-group">
					<a href="applicationSettings" class="list-group-item">Application Settings</a>        
                    <a href="createAdmin" class="list-group-item">Create Admin</a>
                    <a href="listAdmin" class="list-group-item">List Admins</a>
                    <a href="listUsers" class="list-group-item">List Users</a>
                    <a href="createNews" class="list-group-item">Create News</a>
                    <a href="ListNews" class="list-group-item">List News</a>
                    <a href="noticeBoard" class="list-group-item active">Set Notice Board</a>
                    <a href="resetPassword" class="list-group-item">Reset Password</a>
                    <a href="listTestimony" class="list-group-item">Approve Testimonies</a>
                    <a href="listAdvert" class="list-group-item">Approve Adverts</a>
				
                </div>
            </div> <!-- End Mini Side Bar -->
   <!-- Main Content -->
            <div class="col-sm-10">
                <h3>Notification</h3>
				
							                <div class="box box-info">
<?php 
	   
    if(isset($_POST['update'])){
	$title = $_POST['board_title'];
	$board = $_POST['message'];
		
$now = date('Y-m-d H:i:s');
 
 $t=mysqli_query($con, "INSERT INTO notice(title,notice,created_date) VALUES('$title','$board','$now')");
   
   
   $sql6 = mysqli_query($con,"SELECT * FROM notice");
	$cash_count= mysqli_num_rows($sql6);
$i = 0;
while ($i < $cash_count) {
// define each variable
$queryyy = mysqli_query($con, "UPDATE notice SET status ='inactive'");
++$i;
}

$quy = mysqli_query($con, "UPDATE notice SET status ='active' ORDER BY id DESC LIMIT 1");

	echo "<div class='alert alert-success alert-dismissible success-color-dark'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "Notification Added Successfully";
    echo "</div>";

	}
	?>

				<div class="box-header with-border">
                        <h3 class="box-title">Notification</h3>
                    </div>

                <form method="post" class="form-horizontal">

                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Notice Title</label>

                        <div class="col-sm-9">
                            <input type="text" name="board_title" value="" class="form-control" placeholder="Board Title" required/>
                        </div>
                    </div>

                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Message</label>

                        <div class="col-sm-9">
                            <textarea class="form-control bswysiwyg" id="bswysiwyg" placeholder="Enter Your Information" name="message" required></textarea>
                        </div>
                    </div>
<hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" name="update" class="btn btn-primary btn-block btn-flat">Save Notification</button>
                        </div>
                    </div>
               </form>
            </div> <!-- End Main Content -->
        </div>
</div>
    </section> <!-- End Main content -->


    <?php include 'member-footer.php'; ?>