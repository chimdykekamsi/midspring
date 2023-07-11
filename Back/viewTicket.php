<?php $title = "View Support Ticket"; ?>

<?php include 'member.base.php'; ?>
<body class="skin-blue sidebar-mini" style="font-family:calibri;font-size:12;">
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
      	<h1><b>
        	View All Support Tickets
      	</b></h1>
      	<ol class="breadcrumb">
        	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        	<li class="active"><i class="fa fa-ticket"></i>Support Tickets</li>
      	</ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
	<?php


if(isset($_GET['success'])){
						 ?>
						 <div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							  <i class="fa fa-check-square"></i> &nbsp; Message Successfully Added To Ticket!
						 </div>
						 <?php
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=viewTicket'>";
	 
					}			
			?>

			
			<?php
			$result14 = mysqli_query($con,"SELECT * FROM support WHERE status= 'blank'");
		 $return_count = mysqli_num_rows($result14);
		
		?>
    	<div class="row">
    		<!-- Mini Side Bar -->
    		<div class="col-sm-3">

          		<!-- small box -->
          		<div class="small-box bg-red">
            		<div class="inner">
              			<h3><b><?php echo $return_count; ?></b></h3>
              			<p>Tickets</p>
            		</div>
            		<div class="icon">
              			<i class="fa fa-ticket"></i>
            		</div>
            		<a class="small-box-footer">Tickets Count <i class="fa fa-arrow-circle-right"></i></a>
          		</div> <!-- End small box -->

          		<!-- Links -->
          		<div class="list-group">
                    <a href="viewTicket" class="list-group-item list-group-item-success">View Support Tickets</a>
          		</div> <!-- End Links -->
    		</div> <!-- End Mini Side Bar -->

    		<!-- Mini  Main Content -->
    		<div class="col-sm-9">
    			<?php if($return_count == 0 ) { ?>
    				<div class="alert alert-warning">
    					<p class="lead text-center">Users Have Not Created Any Support Ticket Yet</p>
    					<hr>

    				</div>
    			<?php } else { ?>
				<div class="box">
	    				<div class="box-header with-border-success text-center">
	    					<h3 class="box-title">Showing <?php echo $return_count; ?> of <?php echo $return_count; ?> TicketAdvert <?php if($ret_count > 1) { ?>s <?php } else { ?> <?php } ?></h3>
	    				</div>

	    				<div class="box-body">
	    					<table class="table table-responsive table-hover table-striped text-black">
	    						<thead class="bg-red">
	    							<tr>
	    								<th>#</th>
	    								<th>Subject</th>
	    								<th>Status</th>
	    								<th>Date</th>
	    							</tr>
	    						</thead>

	    						<tbody>
	    							<?php
									while($row= mysqli_fetch_array($result14)){ 
									?>
	    								<tr>
	    									<td><?php echo $row['id']; ?></td>
	    									<td><a href="viewTicketMessage?ticket=<?php echo $row['id']; ?>"><?php echo $row['subject']; ?></a></td>
	    									<td>
	    										<?php if($row['status'] == 'user_reply'){ ?>
	    											<button class="btn btn-xs btn-warning">User Reply</button>
												<?php } elseif($row['status'] == 'admin_reply') { ?>
	    											<button class="btn btn-xs btn-success">Admin Reply</button>
	    										<?php } elseif($row['status'] == 'blank') { ?>
	    											<button class="btn btn-xs btn-info">Blank</button>
	    										<?php } elseif($row['status'] == 'colsed') { ?>
	    											<button class="btn btn-xs btn-danger">Closed</button>
	    										<?php } ?>

	    									</td>
	    									<td><?php echo $row['created_date']; ?></td>
	    								</tr>
	    							<?php } ?>
	    						</tbody>
	    					</table>
	    				</div>
	    			</div>

	                <div class="navigation text-center">
	                </div>
    			<?php } ?>
    		</div> <!-- End Mini Main Content -->
    	</div>
    </section> <!-- End Main Content -->

<?php include 'member-footer.php'; ?>