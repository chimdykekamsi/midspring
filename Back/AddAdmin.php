<?php include 'includes/dbpipe.php'; 

$title = "Add New Admin"; 
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
        <h1 style="color:white;"><b>Add New Admin</b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard" style="color:white;"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
            <li><a href="AdminList" style="color:white;"><i class="fa fa-users"></i> Admin List</a></li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

         <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> Add New Admin</h3>
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
       $mem_auto = (rand(000, 999));
               $hash = (rand(1000, 9999));
			   $shu = round($hash*2/6)+2017;

			   $mem_code = "CW"."".$mem_auto."".$shu;

?>

			<?php 
	   
    if(isset($_POST['create'])){
	$username = strip_tags($_POST['username']);
	$fulname = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	  
     $hasdfg = sha1($password);

	if(mysqli_num_rows(mysqli_query($con, "SELECT username FROM admins WHERE username='".$username."'"))>0){
	$user_exist_error="Username Already Exist, Please Try Another One";
	}
	
	if(mysqli_num_rows(mysqli_query($con, "SELECT email FROM admins WHERE email='".$email."'"))>0){
	$email_exist_error="Email Already Exist, Please Try Another One";
	}
		if(!isset($user_exist_error) and !isset($email_exist_error)){
    $t=mysqli_query($con, "INSERT INTO admins(username, name, email, password, role) VALUES('$username','$fulname','$email','$hasdfg','ROLE_SUPER_ADMIN')");
	
	echo "<div class='alert alert-success success-color-dark'><button class='close' data-dismiss='alert'>×</button>";

    echo "Admin Successfully Created..";
    echo "</div>";		
		
		}
		}
	?>

			
               
                <form method="post" class="form-horizontal">

                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>

                    
                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">FullName</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="FullName" required/>
                        </div>
                    </div>

                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" placeholder="Email" required/>
                        </div>
                    </div>


                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" name="create" class="btn btn-primary btn-block btn-flat">Create Admin</button>
                        </div>
                    </div>
                </form>
            </div> <!-- End Main Content -->
        </div>

    </section> <!-- End Main content -->

	<?php include 'member-footer.php'; ?>