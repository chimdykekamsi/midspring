<?php define('TIMEZONE', 'Africa/Lagos');
	date_default_timezone_set(TIMEZONE);


include 'includes/dbpipe.php'; ?> 
<?php 
 $title = "Create Admin"; 
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
        <div class="content-wrapper">

   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>Create Admin</b></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Administrator Dashboard</a></li>
            <li><a href="viewAdmin"><i class="fa fa-users"></i> Admin Users</a></li>
            <li class="active"><i class="fa fa-user-plus"></i> Create Admin User</li>
        </ol>
    </section> <!-- End Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- Mini Side Bar -->
            <div class="col-sm-2">
               <div class="list-group">
					<a href="applicationSettings" class="list-group-item ">Application Settings</a>        
                    <a href="createAdmin" class="list-group-item active">Create Admin</a>
                    <a href="listAdmin" class="list-group-item">List Admins</a>
                    <a href="listUsers" class="list-group-item">List Users</a>
                    <a href="createNews" class="list-group-item">Daily Quote</a>
                    <a href="listNews" class="list-group-item">List Quote</a>
                    <a href="noticeBoard" class="list-group-item">Set Notice Board</a>
                    <a href="resetPassword" class="list-group-item">Reset Password</a>
                    <a href="listTestimony" class="list-group-item">Approve Testimonies</a>
                    <a href="listAdvert" class="list-group-item">Approve Adverts</a>
				
                </div>
            </div> <!-- End Mini Side Bar -->

            <!-- Main Content -->
            <div class="col-sm-10 col-xs-12 col-md-10">
<?php
       $mem_auto = (rand(000, 999));
               $hash = (rand(1000, 9999));
			   $shu = round($hash*2/6)+2017;

			   $mem_code = "CW"."".$mem_auto."".$shu;

?>

			<?php 
	   
    if(isset($_POST['create'])){
	$username = strip_tags($_POST['username']);
		$tite = strip_tags($_POST['title']);

	$fulname = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['phone_one']);
	$password = strip_tags($_POST['password']);
	$cpass = strip_tags($_POST['cpass']);
	$sex = strip_tags($_POST['sex']);
	$stage = strip_tags($_POST['stage']);
	$level = strip_tags($_POST['level']);
		
  							$now = date('Y-m-d H:i:s');

   
     $hasdfg = password_hash($password, PASSWORD_BCRYPT, array("cost" => 11));

	if(mysqli_num_rows(mysqli_query($con, "SELECT username FROM user WHERE username='".$username."'"))>0){
	$user_exist_error="Username Already Exist, Please Try Another One";
	}
	if(mysqli_num_rows(mysqli_query($con, "SELECT phone_one FROM user WHERE phone_one='".$phone."'"))>0){
	$phone_exist_error="Phone Number Already Exist, Please Try Another One";
	}
	if(mysqli_num_rows(mysqli_query($con, "SELECT email FROM user WHERE email='".$email."'"))>0){
	$email_exist_error="Email Already Exist, Please Try Another One";
	}
		if(!isset($phone_exist_error) and !isset($user_exist_error) and !isset($email_exist_error)){
    $t=mysqli_query($con, "INSERT INTO user(mem_id,username,name,email,password,sex,phone_one,stage,current_level,status,role,created,activation_key) VALUES('".$mem_code."','".$username."','".$fulname."','".$email."','$hasdfg','".$sex."','".$phone."','".$stage."','".$level."','active','ROLE_ADMIN','".$now."','activated')");
	
	echo "<div class='alert alert-success success-color-dark'><button class='close' data-dismiss='alert'>×</button>";

    echo "Admin Successfully Created..";
    echo "</div>";		
		
		}
		}
	?>

			<div class="box box-success">
                <h3>Create New Admin User</h3>
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
                        <label for="username" class="col-sm-3 control-label">Phone One</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone_one" placeholder="Phone One" required/>
                        </div>
                    </div>
<span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Stage</label>

                        <div class="col-sm-9">
 <select class="form-control sex" name="stage" required="">
                <option class="1" value="Stage 1">Stage 1</option>
                <option class="2" value="Stage 2">Stage 2</option>

            </select>                        </div>
                    </div>
<span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Level</label>

                        <div class="col-sm-9">
 <select class="form-control sex" name="level" required="">

                <option class="1" value="1">1</option>
                <option class="2" value="2">2</option>
                <option class="2" value="3">3</option>
                <option class="2" value="4">4</option>

            </select>                        </div>
                    </div>


                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>

                    
                    <span class="text-danger"></span>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Gender</label>

                        <div class="col-sm-9">
<select required class="form-control sex" name="sex" required="">
                <option class="0" disabled="true" selected="selected">--Gender--</option>
                <option class="1" value="Male">Male</option>
                <option class="2" value="Female">Female</option>
            </select>                        </div>
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