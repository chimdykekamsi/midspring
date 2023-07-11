<?php include 'includes/dbpipe.php'; ?> 
<?php 
 $title = "Write Notification"; 
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
 <div class="content-wrapper" style="background-image: url('cy.jpg');background: rgba(38, 57, 88, 0.89);
        min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>Write Notification</b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i>Admin Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-sticky-note"></i> Write Notification</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

         <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Notification</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
                        <!-- Profile Image -->
            <div class="box box-danger">
                <div class="box-body box-profile">
   
<?php 
	   
    if(isset($_POST['update'])){
	
	$board = $_POST['message'];
		
$now = date('Y-m-d H:i:s');
 
 $t=mysqli_query($con, "INSERT INTO notification(info) VALUES('$board')");
   
   
   $sql6 = mysqli_query($con,"SELECT * FROM notification");
	$cash_count= mysqli_num_rows($sql6);
$i = 0;
while ($i < $cash_count) {
// define each variable
$queryyy = mysqli_query($con, "UPDATE notification SET status ='inactive'");
++$i;
}

$quy = mysqli_query($con, "UPDATE notification SET status ='active' ORDER BY id DESC LIMIT 1");

	echo "<div class='alert alert-success alert-dismissible success-color-dark'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "Notification Added Successfully";
    echo "</div>";

	}
	?>

				
                <form method="post" class="form-horizontal">

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