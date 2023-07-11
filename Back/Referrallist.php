<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Referrals Counts";  ?>
<?php include 'member.base.php'; ?>

<?php
	$result14 = mysqli_query($con,"SELECT c.stage, c.current_level, c.mem_id, COUNT(p.referral) AS Secondaries
FROM user AS c
    LEFT JOIN referral AS p ON c.mem_id = p.referral
GROUP BY c.mem_id HAVING Secondaries");

		 $return_count = mysqli_num_rows($result14);

		 ?>
<?php
	if($_GET['success']== 1)
{
	echo "<div class='alert alert-success success-color-dark'><button class='close' data-dismiss='alert'>×</button>";
    echo "Admin Status Successfully Change";
    echo "</div>";		
	
echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=referralist'>";

}

?>	
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
        <h1>
            Referrals Count
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active"><i class="fa fa-users"></i> Referrals Count</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- Mini Side Bar -->
            <div class="col-sm-3">
                
            </div> <!-- End Mini Side Bar -->

            <!-- Main Content -->
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8 text-center lead">
                        <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Users Referral<?php if($return_count != 1) { ?> <?php echo $return_count; ?>s<?php } ?>
                        <?php } else { ?>
                           
                        <?php } ?>
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
                <table class="table table-hover table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Stage</th>
                            <th>Current Level</th>
							                            <th>Referral Count Per User</th>
							                            <th>Option</th>
														

                        </tr>
                    </thead>
                    <tbody>
						<?php
													while($row = mysqli_fetch_array($result14)) {
														
							$feed_id = $row['mem_id'];
							
														
	$cahser = mysqli_query($con, "select * from user where mem_id='$feed_id'")or die(mysqli_error());
$recek = mysqli_fetch_array($cahser);													
?>
                            <tr>
							
                                <td><strong><b><?php echo $recek['name']; ?></td>
                                <td><strong><b><?php echo $recek['username']; ?></td>
								<td><strong><b><?php echo $row['stage']; ?></td>
                                <td>Level:<strong><b><?php echo $row['current_level']; ?></td>

                                <td><strong><b><?php echo $row['Secondaries']; ?></td>
                                <td>
						
							<a href="#viewConfirmModal" class="btn btn-xs btn-success" data-toggle="modal" data-target="#viewConfirmModal<?php echo $recek['username']; ?>"> Notify This User</a>

<div class="modal fade" id="viewConfirmModal<?php echo $recek['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-success">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						        <h3 class="modal-title" id="myModalLabel"><b>Send Referral Notification To <?php echo $recek['username']; ?>  </b></h3>

      </div>
      <div class="modal-body modal-info">
	  <p style="font-size:16px;">The Admin will like to inform you that your Referral Link Usage is too low,<p> Which will deny your upgrading at any moments.<p>Work on your publicity/Invitation.</p>

      </div>
      
        
		<div class="modal-footer modal-success">
<a href="sendRefMsg?msg=<?php echo $recek['username']; ?>" class="btn btn-info"> Send Message To <?php echo $recek['username']; ?> </a>
		</div>
      </div>
    
  </div>
</div>

                                </td>
                            </tr>
													<?php } ?>
                    </tbody>
                </table>

                <div class="navigation text-center">

                </div>
            </div> <!-- End Main Content -->
        </div>

    </section> <!-- End Main content -->
<?php include 'member-footer.php'; ?>