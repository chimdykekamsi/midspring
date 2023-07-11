<!-- Page Top Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><!--<img src="{{ asset('img/nav-logo-small.png') }}">-->GRAIN</span>
        <!-- logo for regular state and mobile devices 200x50 pixels -->
        <span class="logo-lg"><!--<img src="{{ asset('img/nav-logo.png') }}">-->GRAIN</span>
    </a> <!-- End Logo -->
<?php
  include 'includes/dbpipe.php';
$user_query = mysqli_query($con, "select id,name from admins where id='$session_id'")or die(mysqli_error());
	$rows = mysqli_fetch_array($user_query);
		
?>

    <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a> <!-- End Sidebar toggle button-->

        <!-- Navbar Custom Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				<!-- Messages: style can be found in dropdown.less-->
				
				
				
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success"></span>
                            </a>
							

                            <ul class="dropdown-menu">
                                <li class="header">You have messages</li>
                                <li>

                                    <!-- inner menu: contains the actual data -->
                                    </li>
                                <li class="footer"><a href="viewTicket">See All Tickets</a></li>
                            </ul>
                        </li>



                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="assets/images/avatar_m.png" class="user-image" alt="User Image">
				<span class="hidden-xs"><?php echo $rows['name']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
				<img src="assets/images/avatar_m.png" class="img-circle" alt="User Image">
				             

                            
                                <b><?php echo $rows['name']; ?></b>
                            
                        </li> <!-- End User image -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li> <!-- End Menu Footer-->
                    </ul>
                </li> <!-- End User Account -->
            </ul>

        </div> <!-- End Navbar Custom Menu -->

    </nav> <!-- End Header Navbar -->

</header> <!-- End Page Top Header -->