<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Blocked Members List"; 
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
	$result14 = mysqli_query($con,"SELECT * FROM users WHERE status='freeze' || status = 'blocked'");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:'white'">
        <h1><b>
            <?php echo $return_count; ?> Blocked Members
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Blocked Members</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Blocked Members     <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Blocked Member<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Blocked Member
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

                            <th>Avatar</th>
                                                        <th>FullName</th>
                            <th>Email</th>
							                            <th>Phone Number</th>
														     <th>Package Name</th>


                            <th>Country</th>
							<th>Options</th>

                        </tr>
                    </thead>
                    <tbody>
					<?php
													while($row=mysqli_fetch_array($result14)) {
													$uid = $row['id'];
?>
                            <tr>
														                                                                <td><B>USR1<?php echo $row['id']; ?></B></td>

                                
                               <td><a href="#viewConfirmModal" data-toggle="modal" data-target="#viewConfirmModal<?php echo $row['id']; ?>"> <img  src="../home/assets/img/profile/<?= $row['photo'] ?? 'profile.png' ?>"  width="50"/></a>
								
								
								<div class="modal fade modal-success" id="viewConfirmModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						        <h3 class="modal-title" id="myModalLabel"><b>Profile Avatar PicView</b></h3>
      </div>
      <div class="modal-body">
	  <p style="font-size:16px;"><img src="../home/assets/img/profile/<?= $row['photo'] ?? 'profile.png' ?>" width="100%"  style="height:auto;"></p>

      </div>
      <div class="modal-footer">
		
      </div>
    </div>
  </div>
</div>
								
								</td> 
								<td>
                                   <?php echo $row['fullname']; ?>
                                </td>
								<td>  <?php echo $row['email']; ?> </td>
								<td>  <?php echo $row['phone']. " // ". $row['phone_two']; ?> </td>
																<td>  <?php echo $row['email']; ?> </td>
																								<td>  <?php echo $row['country']; ?> </td>



								<td><a href="#" data-toggle="modal" data-target="#viewConfirmModal<?php echo $row['order_id']; ?>" title="Update Order Status" class="btn btn-success"><i class="fa fa-edit"></i></a>
	                		<a href="OrderDelete?order=<?php echo $row['order_id']; ?>" onclick="return confirm('Are you sure you want to delete?')" title="Delete Order" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<a href="EditMenuCategory?menu=<?php echo $row['menu_id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
	                		<a href="CateDelete?category=<?php echo $row['menu_id']; ?>" onclick="return confirm('Are you sure you want to delete?')" title="Delete Menu Category" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
