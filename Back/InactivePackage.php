<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Inactive Package Accounts"; 
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

<?php
	$result14 = mysqli_query($con,"SELECT * FROM sub_package WHERE status='inactive'");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            Inactive Package Accounts
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Inactive Package Accounts</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong> Inactive Package Accounts     <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Inactive Package Accounts<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Inactive Package Accounts
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

						    <th>Username</th>
                            <th>FullName</th>
                            
							<th>Phone Number</th>
							<th>Package Name</th>


                            <th>Created Date</th>
							
                        </tr>
                    </thead>
                    <tbody>
					<?php
													while($row = mysqli_fetch_array($result14)) {
										$mem_id = $row['user_id'];
										$pack_id = $row['plan_id'];

$cahser = mysqli_query($con, "select * from members where gen_code='$mem_id'")or die(mysqli_error());
$recek = mysqli_fetch_array($cahser);	

		$plan_data = mysqli_query($con, "select * from plans where pack_key='$pack_id'")or die(mysqli_error());
$plan_row = mysqli_fetch_array($plan_data);												
													
?>
                            <tr>
							                                                                <td><b><?php echo $row['trx_id']; ?></b></td>

                                <td>
                                   <?php echo $recek['username']; ?>
                                </td>
                               <td>
                                   <?php echo $recek['name']; ?>
                                </td>
								<td>  <?php echo $recek['phone_one']; ?> </td>
																
								<td>  <?php echo $plan_row['title']; ?> </td>


	<td> <b> <?php echo date("M D, Y H:m:s a",strtotime($row['created_date'])); ?> </b></td>
								
                                
                     

                                
                                
                            </tr>
							        					
											<?php } ?>
                    </tbody>
                </table>

</div>
</div>
</div> <!-- End Main Content -->
       

    </section> <!-- End Main content -->
	
<?php include 'member-footer.php'; ?>


