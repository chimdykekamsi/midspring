<?php
 include_once 'functions/user_func.php';
if (!isset($_SESSION['id'])) {
	redirect_to('login.php ');
}
$id = $_SESSION['id'];
// $user_query = mysqli_query($con, "select * from users where id='$session_id'")or die(mysqli_error());
// $row = mysqli_fetch_array($user_query);	

$row = executeQuery("SELECT * FROM `users` WHERE `acc_number` = $id");
$combinedBalance = 0;
?>
<!DOCTYPE html>
<html class="__fb-dark-mode">
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Dashboard - Midspring Bank</title>

<style>
.preloader{
	width:100%;
	height:100%;
	left:0;
	top:0;position:fixed;
	z-index:99999;
	background-color:#fff;
	overflow:hidden
	}
.signal{
	border:5px solid #2c96c8;
	border-radius:30px;
	height:30px;
	left:50%;
	margin:-15px 0 0 -15px;
	opacity:0;
	position:absolute;
	top:50%;
	width:30px;
	animation:pulsate 1s ease-out;
	animation-iteration-count:infinite
	}
@keyframes pulsate{
	0%{
	transform:scale(.1);
opacity:0}50%{
	opacity:1}100%{
	transform:scale(1.2);
	opacity:0}}
.modal-sm{max-width:400px!important}
.form-control:focus{
	border-color:#2c96c8!important
	}
</style>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<link rel="icon" type="image/png" href="https://stxx.lakefinancebank.com/img/favicon.png">
<link rel="stylesheet" data-href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" href="assets/style.css">

<script src="https://s3.tradingview.com/tv.js" async></script> 
<style>.card-body.notif-box{padding:15px 0;width:100%}.card-body.notif-box .notif-center a{position:relative}.card-body.notif-box .notif-center a i.la-dot-circle-o{position:absolute;right:3%;top:40%}.notif-box .notif-center a.active{text-decoration:none;background:#fafafa;transition:all .2s}</style> </head>
<body> 
<div class="wrapper"><div class="main-header"><div class="logo-header"><a href="home" class="logo mx-auto" style="display: block;text-align: center;"><img src="assets/img/logo.png?v=0.09ASDghshjsdTYHGHGskjj" style="height: auto;max-width: 200px;" alt="home" /></a><button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" id="menuToggleMini"><span class="fa la-bars"></span></button><button class="topbar-toggler more"><i class="fa la-ellipsis-v"></i></button></div><nav class="navbar navbar-header navbar-expand-lg">

<div class="container-fluid"> <div class="col"> </div>
<ul class="navbar-nav topbar-nav ml-md-auto align-items-center"><li class="nav-item dropdown"><a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void();" aria-expanded="false"> <img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user-img" width="36px" style="width:36px;" class="img-circle" data-picture><span ><?php echo $row['fullname']; ?></span></span> </a><ul class="dropdown-menu dropdown-user"><li><div class="user-box"><div class="u-img"><img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user" data-picture></div><div class="u-text"><h4><?php echo $row['fullname']; ?></h4><p class="text-muted"><?php echo $row['email']; ?></p></div></div></li><div class="dropdown-divider"></div><a class="dropdown-item" href="settings"><i class="fa la-user"></i> Profile</a><div class="dropdown-divider"></div><a class="dropdown-item" href="logout"><i class="fa la-power-off"></i> Logout</a></ul><!-- /.dropdown-user --></li></ul>

</div>
</nav></div>

<div class="sidebar" style="background-image:url('assets/img/1.png?v=0.09ASDghshjsdTYHGHGskjj');">

<div class="scrollbar-inner sidebar-wrapper"><ul class="nav" id="memenu"><li class="nav-item"><a href="home" aside><i class="fa la-home"></i><p>Dashboard</p></a></li><li class="nav-item"><a href="deposit" aside><i class="fa la-btc"></i><p>Crypto Deposit</p></a></li><li class="nav-item"><a href="loan" aside><i class="fa la-diamond"></i><p>Loans</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="domestic" aside><i class="fa la-bank"></i><p>Domestic Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="interbank" aside><i class="fa la-refresh"></i><p>InterBank Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="transfer" aside><i class="fa la-refresh"></i><p>Wire Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="statement" aside><i class="fa la-bar-chart"></i><p>My Statement</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="settings" aside><i class="fa la-user"></i><p>Account</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="support"><i class="fa la-support"></i><p>Support</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="logout" aside><i class="fa la-power-off"></i><p>Logout</p><!--<span class="badge badge-count">14</span>--></a></li></ul></div></div>

<div class="main-panel"><div class="content" style="min-height:81vh;padding-top:12px;" id="my-view">
<div class="container-fluid">
						<h4 class="page-title"><i class="fa la-home"></i> Dashboard</h4>
					<?php 
					
					if($row['status'] == 'freeze') { ?>
						<br>
						 <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <p><b>Your Account has been Freeze. <a href="mailto:support@midspringc.com" class="text-white">Contact support</a></b></p>
                            </div>
                            <br>
                    <?php } else { ?>
						<div class="row">
						    
						   
						<?php
						
						$account_query = mysqli_query($link, "select * from accounts where user_id='$id'")or die(mysqli_error($link));
					while($row_acc = mysqli_fetch_array($account_query)) {
	
	?>
 							<div class="col-md-4">
								<div class="card card-stats">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center icon-warning">
													<i class="fa <?php if($row_acc['account_type'] == 'USD') { ?>
													fa-dollar
													<?php } elseif($row_acc['account_type'] == 'GBP') { ?>
													fa-gbp
													<?php } else { ?>
													fa-euro
													<?php } ?> text-warning"></i>
												</div>
											</div>
											<div class="col-8 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category"><?php echo $row_acc['account_type']; ?> Balance</p>
													<h4 class="card-title">
													<?php if($row_acc['account_type'] == 'USD') { ?>
													$
													<?php } elseif($row_acc['account_type'] == 'GBP') { ?>
													£
													<?php } else { ?>
													€
													<?php } ?>
													<?php echo number_format($row_acc['balance'],2); ?></h4>
													<?php $combinedBalance+= $row_acc['balance'] ?>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer py-1">
									    <div class="row">
									        <div class="col-6">
											    <p class="card-category" style="font-size:11px!important;">A/C No: <b><?php echo $row_acc['account_number']; ?></b></p>
										    </div>
										    <div class="col-6">
											    <p class="card-category" style="font-size:11px!important;">Routing No: <b><?php echo $row_acc['routing']; ?></b></p>
										    </div>
										</div>
									</div>
								</div>
							</div>
					<?php } ?>
							
						
						</div>
						<div class="row">
							<div class="col-md-4 mx-auto" id="deposit">
								<div class="card">
									<div class="card-body">
										<p class="fw-bold mt-1" align="center"><i class="fa la-google-wallet"></i> Combined Balance</p>
										<h4 align="center"><b>$<?=number_format($combinedBalance,2) ?></b></h4>
										<a href="deposit" class="btn btn-warning btn-full text-center mt-3 mb-3"><i class="fa la-btc"></i> Deposit Crypto</a>
										<!--<a href="javascript:;" data-toggle="modal" data-target="#buy-crypto" class="btn btn-warning btn-full text-center mb-3"><i class="la la-btc"></i> Buy Crypto</a>-->
									</div>
									<div class="card-footer py-1">
										<ul class="nav" style="justify-content: center;">
											<li class="nav-item"><a class="btn btn-default btn-link" href="deposit"><i class="fa la-history"></i> History</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card card-stats">
									<div class="card-header">
										<h4 class="card-title" align="center"><i class="fa la-bar-chart"></i> Transaction History</h4>
										<p class="card-category" align="center">All <b>Deposit</b> &amp; <b>Transfers</b> made on your <b>Account</b> are displayed below.</p>
									</div>
									<div class="card-body" style="overflow-y:scroll;">
									
                            <div class="table-responsive">    
								<table class="table table-bordered-bd-warning table-head-bg-warning table-bordered table-hover">
									<thead>
										<tr>
										    <th scope="col" style="text-align:center;">S/N</th>
										    <th scope="col" style="text-align:center;">Account</th>
										    <th scope="col" style="text-align:center;">Type</th>
											<th scope="col" style="text-align:center;">Amount</th>
											<th scope="col" style="text-align:center;">Recieving Account</th>
											<th scope="col" style="text-align:center;">Bank</th>
											<th scope="col" style="text-align:center;">Description</th>
											<th scope="col" style="text-align:center;">Date/Time</th>
											<th scope="col" style="text-align:center;">Status</th>
										</tr>
									</thead>
								    <tbody>		
										
									<?php
									$return_query = mysqli_query($link, "select * from withdrawal where user='$id' limit 4")or die (mysqli_error($link));
									
										  $sn = 1;
										while ($return_row = mysqli_fetch_array($return_query) ){
										
										$acc_id = $return_row['acoount_id'];
										
										$accounData = mysqli_query($link, "select * from accounts where id=$acc_id")or die(mysqli_error($link));
										$rowacc = mysqli_fetch_array($accounData);
										$trx = $return_row['trx'];
									?>
									<td style="text-align:center;"><?php echo $sn++; ?>.</td>
										    <td style="text-align:center;"><b><?php echo $rowacc['account_number']; ?><br><small>(<?php echo $rowacc['account_type']; ?> Account)</small></b></td>
										    <td style="text-align:center;"><b>$<?php echo (number_format($return_row['amount'])); ?></b></td>
										    <td style="text-align:center;"><?=$return_row['amount']?></td>
											<td style="text-align:center;"><b><?php echo $return_row['bank']; ?><br><small>(<?php echo $rowacc['account_number']; ?>)</small></b></td>										   
											<td  style="text-align:center;"><?=$return_row['bank']?></td>
											<td  style="text-align:center;"><?php if($return_row['description'] == " " || $return_row['description'] == null ){echo "No description";}?></td>
											<td  style="text-align:center;"><?=$return_row['created_date']?></td>
											<td style="text-align:center;"><b class="text-danger"><i class="fa la-times"></i>	
										    <?php if($return_row['status'] == 'pending') { ?>
											Pending
											<?php } elseif($return_row['status'] == 'approved') { ?>
											Confirmed
											<?php } else { ?>
											Cancelled
											<?php } ?></b></td>
										</tr>
										
										<?php } ?>

										</tr>
									</tbody>
								</table>
							</div>  
							
							<div class="w-100 text-center">
							    <a href="statement" class="btn btn-warning">See More <i class="fa la-arrow-circle-right"></i></a>
							</div>
							
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card card-stats">
									<div class="card-header">
										<h4 class="card-title" align="center"><i class="fa la-area-chart"></i> Deposit History</h4>
                                        <p class="card-category mt-1 col-12 col-md-11 mx-auto" style="line-height:1;" align="center"><small>All <b>Crypto Deposit</b> made on your <b>Account</b> are displayed below.</small></p>
									</div>
									<div class="card-body" style="overflow-y:scroll;">
									
                            <div class="table-responsive">    
							<table class="table table-bordered-bd-warning table-head-bg-warning table-bordered table-hover">
									<thead>
										<tr>
										    <th scope="col" style="text-align:center;">S/N</th>
										    <th scope="col" style="text-align:center;">Account</th>
											<th scope="col" style="text-align:center;">Amount</th>
											<th scope="col" style="text-align:center;">Coin</th>
											<th scope="col" style="text-align:center;">Date</th>
											<th scope="col" style="text-align:center;">Status</th>
											<th scope="col" style="text-align:center;"><i class="fa la-bars"></i></th>
										</tr>
									</thead>
								    <tbody>
									<?php
									$return_query = mysqli_query($link, "select * from deposits where user='$id' limit 4")or die (mysqli_error($link));
									
										  $sn = 1;
										while ($return_row = mysqli_fetch_array($return_query) ){
										
										$acc_id = $return_row['acoount_id'];
										
										$accounData = mysqli_query($link, "select * from accounts where id=$acc_id")or die(mysqli_error($link));
										$rowacc = mysqli_fetch_array($accounData);
											
									?>
										<tr>
										    <td style="text-align:center;"><?php echo $sn++; ?>.</td>
										    <td style="text-align:center;"><b><?php echo $rowacc['account_number']; ?><br><small>(<?php echo $rowacc['account_type']; ?> Account)</small></b></td>
										    <td style="text-align:center;"><b>$<?php echo (number_format($return_row['amount'])); ?></b></td>
										    <td style="text-align:center;">
											<?php if($return_row['payment_mode'] == 'btc') { ?>
											Bitcoin
											<?php } elseif($return_row['payment_mode'] == 'eth') { ?>
											Ethereum
											
											<?php } else { ?>
											USDT
											<?php } ?>
											
											</td>
											<td><?=$return_row['created_at']?></td>
										    <td style="text-align:center;"><b class="text-danger"><i class="fa la-times"></i>	
										    <?php if($return_row['status'] == 'pending') { ?>
											Pending
											<?php } elseif($return_row['status'] == 'approved') { ?>
											Confirmed
											<?php } else { ?>
											Cancelled
											<?php } ?></b></td>
										    <td style="text-align:center;"><a href="?cancel=<?=$return_row['trx']?>"><b class="btn btn-xs btn-danger"><i class="fa la-times-circle"></i></b></a></td>
										</tr>
										<?php 
											if (isset($_GET['cancel'])) {
												$trx = $_GET['cancel'];
												$sql = "UPDATE `deposits` SET `status`='canceled' WHERE `trx` = '$trx' AND `user` = '$session_id'";
												mysqli_query($link,$sql);
												redirect_to('home');
											}	
										?>
										<?php } ?>
									</tbody>
								</table>
							</div>  
							
							<div class="w-100 text-center">
							    <a href="deposit" class="btn btn-warning">See More <i class="la la-arrow-circle-right"></i></a>
							</div>
							
									</div>
								</div>
							</div>
						</div>
						
						
						
						<!--
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Users Statistics</h4>
										<p class="card-category">
										Users statistics this month</p>
									</div>
									<div class="card-body">
										
									</div>
								</div>
							</div>
						</div>-->
						<?php } ?>
					</div>
					
</div></div></div><script src="assets/js/core/jquery.3.2.1.min.js"></script><script src="assets/js/core/popper.min.js"></script><script src="assets/js/core/bootstrap.min.js" defer></script><script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js" defer></script><script src="assets/js/ready.min.js" defer></script><script src="assets/js/demo.js?v=0.09ASDghshjsdTYHGHGskjj" defer></script><script> $(window).on("load", function(){ setTimeout(function(){ var preloader = $(document).find('#preloader'); preloader.delay().fadeOut(); }, 1000); setTimeout(function(){ $(document).find("[data-href]").each(function(){ var me = $(this); var link = me.attr("data-href"); me.attr("href",link); }); }, 500); });</script>
<script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script></body></html>