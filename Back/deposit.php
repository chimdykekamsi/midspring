<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Deposits"; 
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

<?php
	$result14 = mysqli_query($con,"SELECT * FROM deposits");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            Deposits
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Deposits</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong> Deposits  <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Deposit<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Deposits
                        <?php } ?>
						</strong>
                    </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
		<div style="overflow-x:auto;">

        <div class="box-body">
                        <div class="pull-right">
                                           <div class="tools pull-right"> </div>
                       </div>


                <table class="table table-hover table-responsive table-striped" id="sample_1">
                    <thead class="bg-blue">
                        <tr>
							<th>S/N</th>
                            <th>TRX</th>
                            <th>FullName</th>
							<th>Amount</th>
							<th>status</th>
                            <th>Created Date</th>
			                <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					      $sn = 1;
								while($row = mysqli_fetch_array($result14)) {
										 $mem_id = $row['user'];

$cahser = mysqli_query($con, "select * from users where acc_number = '$mem_id'")or die(mysqli_error($con));
$recek = mysqli_fetch_array($cahser);	

                                    	$acc_id = $row['acoount_id'];
										
										$accounData = mysqli_query($con, "select * from accounts where id=$acc_id")or die(mysqli_error($con));
										$rowacc = mysqli_fetch_array($accounData);

?>
                            <tr>
                                <td><b><?php echo $sn++; ?>.</b></td>
							 <td><b><?php echo $row['trx']; ?></b></td>
                               <td>
                                   <?php echo $recek['fullname']; ?>
                                </td>
								<td><h4><?php echo $rowacc['account_type']; ?><?php echo $row['amount']; ?></h4><br>
							    <?php echo $rowacc['account_number']; ?><br><small>(<?php echo $rowacc['account_type']; ?> Account)</small></b>	</td>
																                                 <td>
                                 <?php if($row['status'] == 'confirmed' ) { ?>
                                        <span class="badge badge-success">Confirmed</span>
										
                                    <?php } elseif($row['status'] == 'cancelled' ) { ?>
									
                                        <span class="badge bg-danger">Cancelled</span>
									<?php } else { ?>
									<span class="badge badge-warning">Pending</span>
                                    <?php } ?>
								</td>
	                            <td> <b> <?php echo date("M D, Y H:m:s a",strtotime($row['created_at'])); ?> </b></td>
                               <td>
								<a href="#" data-toggle="modal" data-target="#viewCreditModal<?php echo $row['id']; ?>" title="Credit Account" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
						          <?php if($row['status'] != 'confirmed'){ ?>
                                        <a href="cancel?id=<?php echo $row['id']; ?>" title="Cancelled Account" onclick="return confirm('Are you sure you want to Cancel this Deposit?')" class="btn btn-danger"> <i class="fa fa-trash"></i> Cancel Deposit</a>
                                    <?php } ?>
								</td>
                            </tr>
							    <div class="modal fade modal-warning" id="viewCreditModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						        <h3 class="modal-title" id="myModalLabel"><b>Credit <span class="text-black"><?php echo $recek['fullname']; ?></span> <?php echo $rowacc['account_type']; ?> Account</b></h3>
      </div>
      <div class="modal-body">
<form method="post" action="update">
<input type="hidden" name="account_id" class="form-control" value="<?php echo $rowacc['id']; ?>">
<input type="hidden" name="account" class="form-control" value="<?php echo $rowacc['account_type']; ?>">

<input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>" >
<strong>
<label> Enter Amount Below</label>
<input type="text" name="credit" class="form-control" placeholder="Enter Amount" required/>
</strong>
<p>

      </div>
      <div class="modal-footer">
		<button class="btn btn-block btn-primary" name="update" onclick="return confirm('Are you sure you want to Confirm Deposit?')"> Credit <?php echo $recek['fullname']; ?> <?php echo $rowacc['account_type']; ?> Account</button>

      </div>
    </div>
	</form>
  </div>
</div>       					
											<?php } ?>
                    </tbody>
                </table>

</div>
</div>
</div> <!-- End Main Content -->
       

    </section> <!-- End Main content -->
	
<?php include 'member-footer.php'; ?>