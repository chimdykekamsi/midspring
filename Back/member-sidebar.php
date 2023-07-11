<!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar" id="sidebar-wrapper">
<?php
  include 'includes/dbpipe.php';
$user_query = mysqli_query($con, "select id, name from admins where id='$session_id'")or die(mysqli_error());
	$rows = mysqli_fetch_array($user_query);
		
?>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      	<!-- Sidebar user panel -->
      	<div class="user-panel">
        	<div class="pull-left image">
				<img src="assets/images/avatar_m.png" class="img-circle" alt="User Image">
			</div>
        	<div class="pull-left info">
          		<p><b><?php echo $rows['name']; ?></b></p>
        	</div>
      	</div> <!-- End Sidebar user panel -->

      	<!-- sidebar menu: : style can be found in sidebar.less -->
      	<ul class="sidebar-menu">
        	<li class="header">MAIN NAVIGATION</li>
			
		        <li>
		          	<a href="dashboard">
		            	<i class="fa fa-dashboard"></i> <span> Dashboard</span>
		          	</a>
		        </li>
			<li>
		          	<a href="deposit">
		            	<i class="fa fa-money"></i> <span>Deposits</span>
		            	<span class="pull-right-container">
		              		<small class="label pull-right bg-orange"></small>
		            	</span>
		          	</a>
		        </li>
	        <li>
	            
	            
	       <li>
		          	<a href="loan">
		            	<i class="fa fa-money"></i> <span>Loans</span>
		            	<span class="pull-right-container">
		              		<small class="label pull-right bg-orange"></small>
		            	</span>
		          	</a>
		        </li>
	        <li>
	            
	       <li>
		          	<a href="transfer">
		            	<i class="fa fa-money"></i> <span>Transfer</span>
		            	<span class="pull-right-container">
		              		<small class="label pull-right bg-orange"></small>
		            	</span>
		          	</a>
		        </li>
	        <li>
	            
			<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i>
        <span>Manage Users</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="UsersList"><i class="fa fa-user"></i>All Users</a></li>
        <li><a href="BlockedUser"><i class="fa fa-ban"></i>Blocked Users</a></li>
		<li><a href="ActiveUser"><i class="fa fa-check-square-o"></i>Active Users</a></li>
        <li><a href="ActiveUserIdentity"><i class="fa fa-users"></i>Active User Identity</a></li>




         </ul>
</li>
	        <li>
	        	<a href="logout">
	        		<i class="fa fa-sign-out"></i> <span>Logout</span>
	        	</a>
	        </li>
        </ul> <!-- End sidebar menu: : style can be found in sidebar.less -->

    </section> <!-- End sidebar -->

</aside> <!-- End Left side column -->