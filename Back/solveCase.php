<!-- Content Header (Page header) -->
  <?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Solve Payment Dispute"; 
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

<?php
if(isset($_GET['jury']))
	
		$case = mysqli_real_escape_string($con, $_GET['jury']);
						$query_level = mysqli_query($con,"select * from jury where id='$case'");
							$row = mysqli_fetch_array($query_level);
							
							$upline = $row['upline'];
$payer = $row['payer'];

$cahser = mysqli_query($con, "select * from user where mem_id='$upline'")or die(mysqli_error());
$rowfeed = mysqli_fetch_array($cahser);						
  

$fpayer = mysqli_query($con, "select * from user where mem_id='$payer'")or die(mysqli_error());
$rowp = mysqli_fetch_array($fpayer);						

							
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
             Dispute #<?php echo $case; ?>

            <?php if($row['status'] == 'giver_reply') { ?>
									                <button class="btn btn-xs btn-info">Payer/Downline Reply</button>
									            <?php } elseif($row['status'] == 'receiver_reply') { ?>
									                <button class="btn btn-xs btn-primary">Receiver/Upline Reply</button>
									            <?php } elseif($row['status'] == 'admin_reply') { ?>
									                <button class="btn btn-xs btn-warning">Admin Reply</button>
									            <?php } elseif($row['status'] == 'open' ) { ?>
									                <button class="btn btn-xs btn-success">Open</button>
									            <?php } elseif($row['status'] == 'closed' ) { ?>
									                <button class="btn btn-xs btn-danger">Closed</button>
									            <?php } ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="disputePayment"><i class="fa fa-university"></i> Dispute Payment</a></li>
        </ol>
    </section> <!-- End Content Header (Page header) -->
<?php
				 $return_query = mysqli_query($con, "select * from jury")or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query); 
								//total_results = mysql_num_rows($result);
									
									?>


    <!-- Main content -->
    <section class="content">
    	<div class="row">
		<?php
if(isset($_GET['confirmed'])){
						 ?>
						 <div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							  <i class="fa fa-check-square"></i> &nbsp; Payment Successfully Confirmed!
						 </div>
						 <?php
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=listDispute'>";
	 
					}			
			?>
			
	<?php
if(isset($_GET['deleted'])){
						 ?>
						 <div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							  <i class="fa fa-check-square"></i> &nbsp; Payment Successfully Deleted!
						 </div>
						 <?php
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=listDispute'>";
	 
					}			
			?>
		
    		<!-- Mini Side Bar -->
    		<div class="col-sm-3">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                       <h3><?php echo $return_count; ?></h3>
                        <p>Disputes Count</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <a class="small-box-footer">Disputes Count<i class="fa fa-arrow-circle-right"></i></a>
                </div> <!-- End small box -->

          		<!-- Links -->
          		<div class="list-group">
                    <a href="listDispute" class="list-group-item">Disputes Payment</a>
          		</div> <!-- End Links -->
				
				
				
          		<!-- Participants -->
                <div class="box box-info">

                    <div class="box-header with-border">
                        <h3 class="box-title">In Attendance</h3>
                    </div>

                    <div class="box-body">
                         <strong><i class="fa fa-angle-double-up"></i> Receiver/Upline</strong>
                        <p class="text-muted"><?php echo $rowfeed['name']; ?></p>
                        <hr>
                        <strong><i class="fa fa-angle-double-down"></i> Payer/Downline</strong>
                        <p class="text-muted"><?php echo $rowp['name']; ?></p>
                    
                    </div>
                </div> <!-- End Participants -->

                <?php if($row['status'] != 'closed' ) { ?>
	                <!-- Actions -->
	                <div class="box box-danger">

	                	<div class="box-header with-border">
	                		<h3 class="box-title">Select Verdict</h3>
	                	</div>
	  						
	                	<div class="box-body">
	                		<p><a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#viewConfirmModal"><i class="fa fa-thumbs-up"></i> Close Dispute?Confirmed Payment</a></p>
	                		<p><a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#viewCancelModal"><i class="fa fa-thumbs-down"></i> Close Dispute/Delete Payment</a></p>
	                	</div>
	                </div> <!-- End Actions -->
                <?php } ?>
    		</div> <!-- End Mini Side Bar -->

    		<!-- Mini  Main Content -->
    		<div class="col-sm-9">

               
                <?php if($row['status'] != 'closed' ) { ?>
	                <div class="alert alert-info">
	                    <p>Welcome to the Judges Panel. As the judge presiding over this case, you are to review statements and evidences passed by members and approach a veridct. Remember to be fair in your final judgement</p>
	                </div>
            	<?php } ?>

                <?php if($row['status'] != 'none') { ?>
                    <div class="alert alert-warning">
                        <p class="lead">Judge's Verdict</p>
                        <p><?php echo $row['verdict']; ?></p>
                    </div>
                <?php } ?>

                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dispute #<?php echo $case; ?> Statements</h3>
                    </div>

                    <div class="box-body">
                        <!-- Direct Chat Messages -->
                        <div class="direct-chat-messages">

                            <?php
							
$west = mysqli_query($con, "select * from jury_message where jury ='$case'")or die(mysqli_error());
while($rowd = mysqli_fetch_array($west)) {
$reci = $rowd['mem_id'];

$finds = mysqli_query($con, "select * from user where mem_id='$reci'")or die(mysqli_error());
$rowfe = mysqli_fetch_array($finds);						

?>	
                                <?php if($rowd['sender_type'] == 'admin') { ?>

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right margin-bottom-25">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">Admin</span>
                                            <span class="direct-chat-timestamp pull-left"><?php echo $rowd['created_date']; ?></span>
                                        </div>
                                        <div class="direct-chat-text">
                                            <?php echo $rowd['message']; ?>  
<hr>                                          
<?php if($rowd['attachment'] != null ) { ?>
                                                
                                                <img src="../member/uploads/proof/<?php echo $rowd['attachment']; ?>" class="img-responsive">
<?php } ?>

                                        </div>
                                    </div> <!-- End Message to the right -->
                            	<?php } else { ?>
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg margin-bottom-25">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left"><?php if($rowd['sender_type'] != 'admin' ) { ?><? echo $rowfe['name']; ?><?php } else { ?> Admin<?php } ?></span>
                                            <span class="direct-chat-timestamp pull-left"><?php echo $rowd['created_date']; ?></span>
                                        </div>
                                        <div class="direct-chat-text">
                                            <?php echo $rowd['message']; ?>  
<hr>                                          
<?php if($rowd['attachment'] != null ) { ?>
                                                <img src="../member/uploads/proof/<?php echo $rowd['attachment']; ?>" class="img-responsive">
<?php } ?>
                                        </div>
                                    </div> <!-- End Message.Default to the left -->
                            	<?php } ?>
<?php } ?>                        </div> <!-- End Direct Chat Messages -->
                    </div>
                </div>
			
<div class="modal fade" id="viewConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-blue">
    <div class="modal-content bg-green">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
<p style="font-size:16px;">You are about to confirm the payment in this case thereby ruling in the favor of the Payer/Downline: </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
       <a href="confirmPayment?payment=<?php echo $case; ?>" class="btn btn-outline btn-success pull-right">Confirm Payment</a>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewCancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-red">
    <div class="modal-content bg-red">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	<h3 class="modal-title" id="myModalLabel"><b>Delete Payment</b></h3>
      </div>
      <div class="modal-body">
<p style="font-size:16px;">You are about to delete the payment in this case thereby ruling in the favor of the Receiver/Upline.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
       <a href="deletePayment?payment=<?php echo $case; ?>" class="btn btn-outline pull-right">Delete Payment</a>

        
      </div>
    </div>
  </div>
</div>	
				
				

                
    		</div> <!-- End Mini Main Content -->
			
    	</div> 
    </section> <!-- End Main content -->