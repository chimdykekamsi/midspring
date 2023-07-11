<?php include 'includes/dbpipe.php'; ?> 
<?php 
 $title = "Change Password"; 
 ?>
<?php include 'member.base.php'; ?>
<?php
	$result14 = mysqli_query($con,"SELECT * FROM info");
		 $ret = mysqli_fetch_array($result14);
?><body class="skin-blue sidebar-mini">
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
        <h1><b>Change Password</b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active" style="color:white;"><i class="fa fa-exclamation"></i> Change Password</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

         <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Change Password</b></h3>
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
		
		$currentPass = strip_tags($_POST['old_key']);
		$password = strip_tags($_POST['newkey']);	
		$confirmPass = strip_tags($_POST['cpkey']);	
		
		//Php Validation
		if($currentPass == "")	{
			$error[] = "Please Enter Your current Password!";	
		}	
		else if($password == "")	{
			$error[] = "Please enter new Password!";
		}
		else if($confirmPass == "")	{
			$error[] = "Please confirm new Password!";
		}
		else if(strlen($password) < 4){
			$error[] = "New Password must be atleast 4 characters";	
		}
		else if($confirmPass != $password)	{
			$error[] = "New Password does not match, please try again!";
		}
		else{
			
				$new_password = sha1($password);
				$old = sha1($currentPass);
				
$sq1 = mysqli_query($con, "SELECT password FROM admins WHERE id ='$session_id'") or die(mysqli_error());
$ac= mysqli_fetch_array($sq1); 

				
				if($old == $ac['password']) {
					
						mysqli_query($con, "update admins set password = '$new_password' where id= '$session_id'");
						
                       		echo "<script> window.location='ChangePassword?updated=1'</script>";

						}else{
							
					$error[] = "Current Password does not match record, please try again!";
			
			}
		}	
	}
	?>
            <!-- Main Content -->
           
<?php
					if(isset($error)){
						foreach($error as $error){
					?>
						 <div class="alert alert-danger">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							<i class="fa fa-exclamation-triangle"></i> &nbsp; <?php echo $error; ?>
						 </div>
					  <?php
						}
					}
					elseif(isset($_GET['updated'])){
						 ?>
						 <div class="alert alert-success">                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							  <i class="fa fa-check-square"></i>Password Updated Successfully!
						 </div>
						 <?php
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=ChangePassword'>";
	 
					}
				?>
                    <div class="box-body">
                      <form method="post" name="" class="form-horizontal">

                    <div class="form-group">
					<label for="sundays" class="col-sm-3 control-label">Old Password</label>


                        <div class="col-sm-6">
                            <input type="password" placeholder="Old Password" name="old_key" class="form-control" value="" required/>
                        </div>
                    </div>

                    <div class="form-group">
					
					<label for="sundays" class="col-sm-3 control-label">New Password</label>

	   
                        <div class="col-sm-6">
                          <input type="password" placeholder="New Password" name="newkey" class="form-control" required/>
                        </div>
                    </div>

                    <div class="form-group">
					<label for="sundays" class="col-sm-3 control-label">Confirm Password</label>


                        <div class="col-sm-6">
                           <input type="password" placeholder="Confirm Payment" name="cpkey" class="form-control" required/>
                        </div>
                    </div>

                    
                    <div class="form-group">
										<div class="col-sm-3"></div>

                        <div class="col-sm-6">
                            <button type="submit" name="update" class="btn btn-primary btn-block btn-flat">Change Password</button>
                        </div>
                    </div>
               </form>
            </div> <!-- End Main Content -->
        </div>
</div>
</div>
    </section> <!-- End Main content -->
	
<?php include 'member-footer.php'; ?>
