   <?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Notification "; 
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
        <h1><b>
            Notification
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-users"></i> Notification</li>
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
                    <a href="noticeBoard" class="list-group-item active">Notification</a>
                    <a href="resetPassword" class="list-group-item">Reset Password</a>
                    <a href="listTestimony" class="list-group-item">Approve Testimonies</a>
                    <a href="listAdvert" class="list-group-item">Approve Adverts</a>
				
                </div>
            </div> <!-- End Mini Side Bar -->
<?php	       
   $appinfo = mysqli_query($con, "select * from notice");
   $cash_count = mysqli_num_rows($appinfo);
	
	?>

            <!-- Main Content -->
            <div class="col-sm-10">
			<div class="box">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10 text-center lead">
                        Showing <?php echo $cash_count; ?> of <?php echo $cash_count; ?> Notification
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
														 <div style="overflow-x:auto;">

                <table class="table table-hover table-responsive table-striped">
                    <thead class="bg-red">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Notice</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray">
<?php
while($row = mysqli_fetch_array($appinfo)){ 


?>					                               <tr>
                                
									                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['notice']; ?></td>

                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['created_date']; ?></td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>
</div>
                <div class="navigation text-center">
                </div>
            </div> <!-- End Main Content -->
        </div>

    </section> <!-- End Main content -->
<?php include 'member-footer.php'; ?>