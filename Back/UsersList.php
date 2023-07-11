<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "All Members List"; 

 
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
	$result14 = mysqli_query($con,"SELECT * FROM users");
		 $return_count = mysqli_num_rows($result14);
         
		 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1><b>
            <?php echo $return_count; ?> All Members
        </b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-users"></i> All Members</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Members     <?php if( $return_count != 0 ) { ?>
                        Showing <?php echo $return_count; ?>  of <?php echo $return_count; ?> Member<?php if($return_count != 1) { ?>s<?php } ?>
                        <?php } else { ?>
                            0 Member
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
												    <th>FullName</th>
                                                     <th>Email</th>
							                            <th>Phone Number</th>
														     <th>Balance</th>


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
							  <td>
                                   USR01<?php echo $row['id']; ?>
                                </td>
                        		<td><?php echo $row['fullname']; ?>   </td>
								<td>  <?php echo $row['email']; ?><br>
								</td>
								<td>  <?php echo $row['phone']; ?> </td>
                                <td>
                                <?php
                                $id = $row['acc_number'];
                                    $sql = "SELECT * FROM accounts WHERE user_id = $id";
                                    $res = mysqli_query($con,$sql);
                                    $balance = 0;
                                    while ($acc_bal = mysqli_fetch_assoc($res)) {
                                        
                                        $balance += $acc_bal['balance'];
                                    }
                                ?>
                                    <?=$balance?>
								  </td>


								<td>  <?php echo $row['country']; ?> </td>



								<td><!--<a href="#" data-toggle="modal" data-target="#viewConfirmModal<?php echo $row['id']; ?>" title="Edit User Data" class="btn btn-success"><i class="fa fa-edit"></i></a>-->
	                		<a href="DeleteUser?render=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this Member?')" title="Delete this Member" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								                	
							 <?php
								                    
		                        if($row['status'] == 'active') {  ?>
		                		<a href="Freeze?render=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to freeze this Member account?')" title="Freeze this Member" class="btn btn-info"><i class="fa fa-ban"></i> Freeze</a>
                                <?php } else if($row['status'] == 'freeze') { ?>
                                <a href="unFreeze?render=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to unfreeze this Member account?')" title="unFreeze this Member" class="btn btn-warning"><i class="fa fa-ban"></i> unFreeze</a>
                                <?php } ?>
                               <?php  
                                 if($row['transfer'] == 'active') {  ?>
		                		<a href="Freeze?trx=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to Disable Transfer for this Member account?')" title="Disable Transfer this Member" class="btn btn-info"><i class="fa fa-ban"></i> Disable TRF</a>
                                <?php } else if($row['transfer'] == 'freeze') { ?>
                                <a href="unFreeze?trx=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to Enable Transfer for this Member account?')" title="Enable Transfer this Member" class="btn btn-warning"><i class="fa fa-check-o"></i> Enable TRF</a>
                                <?php } ?>
								</td>
                                
                                

                                
                                
                            </tr>
							
							<div class="modal fade modal-success" id="viewConfirmModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						        <h3 class="modal-title" id="myModalLabel"><b><?php echo $row['name']; ?> Profile</b></h3>
      </div>
      <div class="modal-body">
	  <form method="post">
	  <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>

	  <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>

	  <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>

	  <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>

<span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>

      </div>
      <div class="modal-footer">
		
      </div>
	  
	  
	  </form>
    </div>
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
