<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Dashboard"; 
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
        <h1 style="color:white;"><b>
            Administrator Dashboard
        </b></h1>
        <ol class="breadcrumb">
            <li class="active" style="color:white;"><i class="fa fa-dashboard"></i> Administrator Dashboard</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->
<strong>
    <!-- Main content -->
    <section class="content">
	<div class="row">
							            <div class="col-md-12 col-sm-12 col-md-12">

        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p><b>Add New Admin</b></p>
                    </div>
                    <a href="AddAdmin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div> <!-- End small box -->
            </div>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p><b>Write New Notification Message</b></p>
                    </div>
                    <a href="WriteNotice" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div> <!-- End small box -->
            </div>
        </div> <!-- End Small boxes (Stat box) -->
<?php
	 $result14 = mysqli_query($con,"SELECT * FROM users");
		 $user_count = mysqli_num_rows($result14);
			?>

        <!-- Info Boxes -->

        <div class="row">

		<div class="panel panel-shadow" data-collapsed="0">
                        <div class="panel-heading bg-green">
                            <div class="panel-title"><i class="fa fa-users"></i><strong>  User Statistics</strong></div>
                        </div>
					                        <div class="panel-body">

            <div class="col-sm-4">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                     <!-- Info-box-content -->
                    <div class="info-box-content">
															<a href="UsersList" class="">

                        <span class="info-box-text">Total Users</span>
                        <span class="info-box-number"><b><?php echo $user_count; ?></b></span>
						</a>
                    </div> <!-- End info-box-content -->
                </div>
            </div>
			<?php
	 $result111 = mysqli_query($con,"SELECT * FROM users where status='active'");
		 $active_count = mysqli_num_rows($result111);
			?>

            <div class="col-sm-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
                     <!-- Info-box-content -->
                    <div class="info-box-content">
										<a href="ActiveUser" class="">

                        <span class="info-box-text">Active Users</span>
                        <span class="info-box-number"><b><?php echo $active_count; ?></b></span>
						</a>
                    </div> <!-- End info-box-content -->
                </div>
            </div>
			<?php
	 $result112 = mysqli_query($con,"SELECT * FROM users where status='blocked' || status = 'freeze'");
		 $block_count = mysqli_num_rows($result112);
			?>

            <div class="col-sm-4">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-ban"></i></span>
                     <!-- Info-box-content -->
                    <div class="info-box-content">
					<a href="BlockedUser" class="">
                        <span class="info-box-text">Blocked Users</span>
                        <span class="info-box-number"><b><?php echo $block_count; ?></b></span>
						</a>
                    </div> <!-- End info-box-content -->
                </div>
            </div>
			</div>
			</div>
        </div> <!-- End Info Boxes -->

        <!-- Extras -->
     
</div>
</div>
    </section>
<?php include 'member-footer.php'; ?>
