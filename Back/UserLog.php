<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "Users Login Logs"; 
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
	$result14 = mysqli_query($con,"SELECT * FROM user_logins");
		 $return_count = mysqli_num_rows($result14);
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            Users Login Logs
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> Users Login Logs</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Users Login Logs  
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Users Login Logs
                       
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

                            <th>User IP </th>
                                                        <th>Location</th>
							                            <th>Device</th>
														     
							<th>Created</th>

                        </tr>
                    </thead>
                    <tbody>
					<?php
													while($row=mysqli_fetch_array($result14)) {
													$uid = $row['user_id'];
													
											$query_res = mysqli_query($con, "SELECT username FROM members where gen_code='$uid'") or die(mysqli_error());
	
									$result_res = mysqli_fetch_array($query_res); 				
													
?>
                            <tr>
																					                                                                <td><B>LOG#2<?php echo $row['id']; ?></B></td>

                                <td>
                                   <?php echo $result_res['username']; ?>
                                </td>
                               <td>
								<?php echo $row['user_ip']; ?>
								</td> 
								<td>
                                 <?php echo $row['location']; ?>   </td>
								<td>  <?php echo $row['details']; ?> </td>
							
																<td>  <?php echo $row['created_at']; ?> </td>
                       
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
