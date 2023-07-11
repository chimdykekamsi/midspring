<?php $title = "View Ticket Message"; ?>

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
		if (isset($_GET['ticket']))
			
		$id = $_GET['ticket'];
	   
		$result1 = mysqli_query($con,"SELECT * FROM support_message WHERE id='$id'");
		
			?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>
            Ticket #<?php echo $id; ?>

<?php if($rows['status'] == 'user_reply'){ ?>
	    											<button class="btn btn-xs btn-warning">User Reply</button>
												<?php } elseif($rows['status'] == 'admin_reply') { ?>
	    											<button class="btn btn-xs btn-success">Admin Reply</button>
	    										<?php } elseif($rows['status'] == 'blank') { ?>
	    											<button class="btn btn-xs btn-info">Blank</button>
	    										<?php } elseif($rows['status'] == 'colsed') { ?>
	    											<button class="btn btn-xs btn-danger">Closed</button>
	    										<?php } ?>
       </b> </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="viewTicket"><i class="fa fa-ticket"></i> Tickets</a></li>
            <li class="active"><i class="fa fa-sticky-note"></i> Ticket #<?php echo $id; ?></li>
        </ol>
    </section> <!-- End Content Header (Page header) -->
<?php
			$result148 = mysqli_query($con,"SELECT * FROM support WHERE status='blank'");
		 $return_count3 = mysqli_num_rows($result148);
		
		?>            
    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<!-- Mini Side Bar -->
    		<div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><b><?php echo $return_count3; ?></b></h3>
                        <p>Tickets</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <a class="small-box-footer">Tickets Count <i class="fa fa-arrow-circle-right"></i></a>
                </div> <!-- End small box -->

          		<!-- Links -->
          		<div class="list-group">
                    <a href="viewTicket" class="list-group-item">View Tickets</a>
          		</div> <!-- End Links -->
    		</div> <!-- End Mini Side Bar -->

    		<!-- Mini  Main Content -->
    		<div class="col-sm-9">

                
                <div class="box box-success direct-chat direct-chat-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ticket Messages</h3>
                    </div>

                    <div class="box-body">
                        <!-- Direct Chat Messages -->
                        <div class="direct-chat-messages">
<?php
		while ($rows = mysqli_fetch_array($result1)) { ?>

                                <?php if($rows['sender'] == 'user' ) { ?>
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right margin-bottom-25">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right"><?php echo $fname; ?></span>
                                            <span class="direct-chat-timestamp pull-left"><?php echo $rows['created_date']; ?></span>
                                        </div>
                                        <img class="direct-chat-img" src="assets/images/avatar_m.png">
                                        <div class="direct-chat-text">
                                            <?php echo $rows['message']; ?>
                                            <?php if($rows['attachment'] != null ) { ?>
                                                <hr>
                                                <img src="../member/uploads/ticket/<?php echo $rows['attachment']; ?>" class="img-responsive">
                                            <?php } ?>
                                        </div>
                                    </div> <!-- End Message to the right -->
                                <?php } else { ?>
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg margin-bottom-25">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">Admin</span>
                                            <span class="direct-chat-timestamp pull-right"><?php echo $rows['created_date']; ?></span>
                                        </div>
                                        <img class="direct-chat-img" src="assets/images/avatar_m.png">
                                        <div class="direct-chat-text">
                                            <?php echo $rows['message']; ?>
                                           
                                        </div>
                                    </div> <!-- End Message.Default to the left -->
                                <?php } ?>
								<?php } ?>
                        </div> <!-- End Direct Chat Messages -->
                    </div>

                </div>
<?php
		$res1 = mysqli_query($con,"SELECT * FROM support WHERE id='$id'");
		
		$roww = mysqli_fetch_array($res1);

		?>

               ,<?php if($roww['status'] != 'closed' ) { ?>

                    <div class="box box-warning">
<?php 
       $sq1 = mysqli_query($con, "SELECT role FROM user WHERE mem_id ='$session_id' and status='active'") or die(mysqli_error());
$ac= mysqli_fetch_array($sq1); 
?>
<?php
 if(isset($_POST['create'])) {	 

$statem = strip_tags($_POST['message']);

	
	$userType = $ac['role'] == 'ROLE_SUPER_ADMIN' || $ac['role'] == 'ROLE_ADMIN' ? 'admin' : 'user';

							$now = date('Y-m-d H:i:s');
	   
	$sqll= mysqli_query($con, "INSERT INTO support_message(support,sender,message,created_date) VALUES('$id','$userType','$statem','$now')");
	
	  @mysqli_query($con, "UPDATE support set status='admin_reply' where id='$id'");
	
	    	 echo "<div class='alert alert-success success-color-dark'><button class='close' data-dismiss='alert'>×</button>";
			 
    echo "You have Reply This User";
    echo "</div>";
	
			//echo "<script> window.location='support.php'</script>";

		header("Location: viewTicket?success");
	   }


	?>
    
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Reply</h3>
                        </div>

                        <div class="box-body">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">

                                <span class="text-danger"></span>
                                <div class="form-group">
                                    <label for="message" class="col-sm-2 control-label">Reply</label>

                                    <div class="col-sm-10">
                                    <textarea name="message" class="form-control" placeholder="Reply Message" required></textarea>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="create" class="btn btn-success btn-block btn-flat">Add Reply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
			   <?php } ?>
    		</div> <!-- End Mini Main Content -->
    	</div>
    </section> <!-- End Main Content -->

<?php include 'member-footer.php'; ?>