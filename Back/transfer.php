<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Transfers"; 
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
	$result14 = mysqli_query($con,"SELECT * FROM withdrawal");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            Transfers
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Transfers</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>  <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Transfers<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Transfers
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
							<th>Reciever Bank</th>
                            <th>Created Date</th>
							<th>Status</th>
			                <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					      $sn = 1;
								while($row = mysqli_fetch_assoc($result14)) {
										$mem_id = $row['user'];

    $cahser = mysqli_query($con, "select * from users where acc_number = $mem_id")or die(mysqli_error($con));
    $recek = mysqli_fetch_assoc($cahser);	
    
                            	$acc_id = $row['acoount_id'];
										
										$accounData = mysqli_query($con, "select * from accounts where id = $acc_id")or die(mysqli_error($con));
										$rowacc = mysqli_fetch_assoc($accounData);
													
?>
                            <tr>
                            <td><b><?php echo $sn++; ?></b></td>
							 <td><b><?php echo $row['trx']; ?></b></td>
                               <td>
                                   <?php echo $recek['fullname']; ?>
                                </td>
								<td style="text-align:center;"><b><?php echo $row['gateway']; ?> <?php echo number_format($row['amount'],2); ?></b></td>										    
								<td style="text-align:center;"><b><?php echo $row['bank']; ?><br><small>(<?php echo $rowacc['account_number']; ?>)</small></b></td>	
								 <td style="text-align:center;"><?php echo date("M d, D, Y H:m:s a",strtotime($row['created_date'])); ?></td>
								 <td style="text-align:center;"><b class="btn btn-xs btn-danger"><i class="fa la-times-circle"></i> <?php echo $row['status']; ?></b></td>
                                <td> </td>
                            </tr>
							     	<?php } ?>
                    </tbody>
                </table>

</div>
</div>
</div> <!-- End Main Content -->
       

    </section> <!-- End Main content -->
	
<?php include 'member-footer.php'; ?>