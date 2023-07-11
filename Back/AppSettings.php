<?php include 'includes/dbpipe.php'; ?>
<?php 
 $title = "App Settings"; 
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
	$result14 = mysqli_query($con,"SELECT * FROM settings");
		 $ret = mysqli_fetch_array($result14);
		 ?>

    
    <!-- Content Header (Page header) -->
    <section class="content-header" style="color:white;">
        <h1 style="color:white;"><b>AppSettings</b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-exclamation"></i> AppSettings</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

         <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">AppSettings</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
                        <!-- Profile Image -->
            <div class="box box-danger">
                <div class="box-body box-profile">
          
        
			
		<?php 
	   
    if(isset($_POST['update'])){
	
	$currency = strip_tags($_POST['currency']);
	$local = strip_tags($_POST['local']);
	$comm = strip_tags($_POST['comm']);
	$mature_date = strip_tags($_POST['mature_date']);

	


   $t= mysqli_query($con, "UPDATE settings SET currency='$currency', local='$local',  with_comm='$comm', mature_date='$mature_date' WHERE id=1");
	
	echo "<div class='alert alert-success success-color-dark'><button class='close' data-dismiss='alert'>×</button>";
    echo "Application Settings Updated Successfully";
    echo "</div>";	
			echo "<script> window.location='AppSettings'</script>";
	}
		?>
		
				
                <form method="post">
					
						<div class="form-group">
						<div class="input-group input-text-box">
											  <span class="input-group-addon red">&nbsp;<strong>Currency Sign</strong></span>


                       
                           <input type="text" value="<?php echo $ret['currency']; ?>" name="currency" class="form-control" required/>
                        </div>
						
                    </div>

                    <div class="form-group">
						<div class="input-group input-text-box">
											  <span class="input-group-addon red">&nbsp;<strong>Withdrawal Comm %%</strong></span>


                       
                           <input type="text" value="<?php echo $ret['with_comm']; ?>" name="comm" class="form-control" required/>
                        </div>
						
                    </div>
<div class="form-group">
						<div class="input-group input-text-box">
											  <span class="input-group-addon red">&nbsp;<strong>Fixed Dollar Rate</strong></span>


                       
                           <input type="text" value="<?php echo $ret['local']; ?>" name="local" class="form-control" required/>
                        </div>
						
                    </div>

<div class="form-group">
						<div class="input-group input-text-box">
											  <span class="input-group-addon red">&nbsp;<strong>Incubation Date (Months) </strong></span>


                       
                           <input type="text" value="<?php echo $ret['mature_date']; ?>" name="mature_date" class="form-control" required/>
                        </div>
						
                    </div>
                   
                    
                    
                    <div class="row">
					<hr>
                        <div class="col-sm-6 col-sm-offset-2">
                            <button type="submit" name="update" class="btn btn-primary btn-block btn-flat">Set Application Parameters</button>
                        </div>
                    </div>
                </form>
            </div> <!-- End Main Content -->
        </div>
			</div>

    </section> <!-- End Main content -->
	<?php include 'member-footer.php'; ?>