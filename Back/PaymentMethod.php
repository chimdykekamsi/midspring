<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Payment Methods"; 
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
	$result14 = mysqli_query($con,"SELECT * FROM payment_methods");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            <?php echo $return_count; ?> Payment Methods
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Payment Methods</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong> Payment Methods     <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Payment Methods<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Payment Methods
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

						    <th>Payment Coy</th>

                            <th>Logo</th>
                                                        <th>Deposit Comm.</th>
														
                            <th>Key ID 1</th>
							                                    <th>Key ID 2</th>
                    


                            <th>Currency</th>
							                            <th>Status</th>

							<th>Options</th>

                        </tr>
                    </thead>
                    <tbody>
					<?php
													while($row=mysqli_fetch_array($result14)) {
													$uid = $row['id'];
?>
                            <tr>
		<td><B>PAY#90<?php echo $row['id']; ?></B></td>

                                <td>
                                   <?php echo $row['name']; ?>
                                </td>
                               
								
                                
								<td>  <img src="../member/assets/images/<?php echo $row['image']; ?>" width="50"/> </td>
												<td>  <?php echo $row['depo']; ?> </td>
																<td>  <?php echo $row['key1']; ?> </td>
																			<td>  <?php echo $row['key2']; ?> </td>

<td>  <?php echo $row['currency']; ?> </td>
																			<td>  <?php echo $row['status']; ?> </td>

								<td><a href="#" data-toggle="modal" data-target="#viewConfirmModal<?php echo $row['id']; ?>" title="Update <?php echo $row['name']; ?> Method" class="btn btn-success"><i class="fa fa-edit"></i></a>
	                		<a href="PayMethod?payment=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" title="Delete <?php echo $row['name']; ?> Method" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								
								</td>
                                
                                

                                
                                
                            </tr>
													<?php } ?>
                    </tbody>
                </table>

</div>
</div>
</div> <!-- End Main Content -->
       

    </section> <!-- End Main content -->
	
<?php include 'member-footer.php'; ?>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
