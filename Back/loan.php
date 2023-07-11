<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Loan"; 
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
	$result14 = mysqli_query($con,"SELECT * FROM loan WHERE status='pending'");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            Loans
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Loans</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong> Loans  <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Loan<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Loan
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
							<th>Loan Amount</th>
							<th>status</th>
                            <th>Created Date</th>
			                <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					      $sn = 0;
								while($row = mysqli_fetch_array($result14)) {
										$mem_id = $row['user_id'];

$cahser = mysqli_query($con, "select * from users where acc_number='$mem_id'")or die(mysqli_error($con));
$recek = mysqli_fetch_array($cahser);	

// 		$plan_data = mysqli_query($con, "select * from plans where pack_key='$pack_id'")or die(mysqli_error($con));
// $plan_row = mysqli_fetch_array($plan_data);												
													
?>
                            <tr>
                                <td><b><?php echo $sn++; ?></b></td>
							 <td><b><?php echo $mem_id ?></b></td>
                               <td>
                                   <?php echo $recek['fullname']; ?>
                                </td>
								<td>  <?php echo $row['amount']; ?> </td>
																
								<td>  <?php echo $row['status']; ?> </td>
	                            <td> <b> <?php echo date("M D, Y H:m:s a",strtotime($row['created_at'])); ?> </b></td>
                                <td><?php echo $row['status']; ?> </td>
                            </tr>
							        					
											<?php } ?>
                    </tbody>
                </table>

</div>
</div>
</div> <!-- End Main Content -->
       

    </section> <!-- End Main content -->
	
<?php include 'member-footer.php'; ?>