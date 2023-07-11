   <?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Confirmed Withdrawals"; 
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
        min-height: 500px;color">

 
    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            Confirmed Withdrawals
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Confirmed Withdrawals</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

       
           
<?php	       
   $appinfo = mysqli_query($con, "select * from withdraw where status='confirmed'");
   $cash_count = mysqli_num_rows($appinfo);
	
	?>

            <!-- Main Content -->
               <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong> Confirmed Withdrawals  </h3>    <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Confirmed Withdrawal<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Confirmed Withdrawals
                        <?php } ?>
						</strong>
                   
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
		<div style="overflow-x:auto;">
												
 <div class="box-body">
                        


                <table class="table table-hover table-responsive table-striped" id="sample_1">
                    <thead class="bg-blue">
                        <tr>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray">
<?php
while($row = mysqli_fetch_array($appinfo)){ 
$mem_id = $row['user'];

$cahser = mysqli_query($con, "select * from members where gen_code='$mem_id'")or die(mysqli_error());
$recek = mysqli_fetch_array($cahser);						

?>					                               <tr>
                                <td> <?php echo $row['trx_id']; ?></td>

                                <td> <?php echo $recek['username']; ?></td>
                                <td><?php echo $recek['name']; ?></td>
                                <td>$<?php echo (number_format($row['with_amount'])); ?></td>
									
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