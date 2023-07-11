<?php $title = "Read Content"; ?>

<?php include 'member.base.php'; ?>

<body class="skin-blue sidebar-mini" style="font-family:calibri;font-size:12;">
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
<?php
		if(isset($_GET['read']))
			
		$id = $_GET['read'];
	   
		$result1 = mysqli_query($con,"SELECT * FROM report WHERE id='$id'");
			$rows = mysqli_fetch_array($result1);

	$receiver = $rows['mem_id'];

		$user_query = mysqli_query($con, "select username,name from user where mem_id='$receiver'")or die(mysqli_error());
	
	   $rowf = mysqli_fetch_array($user_query);
		 
				 
				 
			?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>
            Issue #RRI<?php echo $id; ?>
  </b> </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="viewIssue"><i class="fa fa-ticket"></i> Tickets</a></li>
        </ol>
    </section> <!-- End Content Header (Page header) -->
        
    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<!-- Mini Side Bar -->
    		<div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><b><?php echo $return_count3; ?></b></h3>
                        <p>Issue</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <a class="small-box-footer">Issues Count <i class="fa fa-arrow-circle-right"></i></a>
                </div> <!-- End small box -->

          		<!-- Links -->
          		<div class="list-group">
                    <a href="viewIssue" class="list-group-item">View Issue</a>
          		</div> <!-- End Links -->
    		</div> <!-- End Mini Side Bar -->

    		<!-- Mini  Main Content -->
    		<div class="col-sm-9">

                
                <div class="box box-success direct-chat direct-chat-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read Content</h3>
                    </div>

                    <div class="box-body">
                        <!-- Direct Chat Messages -->
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right margin-bottom-25">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right"><h4>Sender::Username:: <b><?php echo $rowf['username']. "</b><br><b>Sender:: Name::: " .$rowf['name']; ?></b></h2></span>
                                        </div>
                                        <img class="direct-chat-img" src="assets/images/avatar_m.png">
                                        <div class="direct-chat-text">
                                            <?php echo $rows['message']; ?>
                                            
                                        </div>
                                    </div> <!-- End Message to the right -->
                                
                    </div>

                </div>
    		</div> <!-- End Mini Main Content -->
    	</div>
    </section> <!-- End Main Content -->

<?php include 'member-footer.php'; ?>