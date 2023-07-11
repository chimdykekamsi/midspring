<?php
  include_once 'functions/user_func.php';
  if (!isset($_SESSION['id'])) {
	  redirect_to('login.php ');
  }
  $session_id = $_SESSION['id'];

$user_query = mysqli_query($link, "select * from users where acc_number='$session_id'")or die(mysqli_error($link));
$row = mysqli_fetch_array($user_query);	
?>
<!DOCTYPE html>
<html class="__fb-dark-mode">
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Statement - Midspring Bank</title>

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
<script src="https://s3.tradingview.com/tv.js" async></script> <style>.card-body.notif-box{padding:15px 0;width:100%}.card-body.notif-box .notif-center a{position:relative}.card-body.notif-box .notif-center a i.la-dot-circle-o{position:absolute;right:3%;top:40%}.notif-box .notif-center a.active{text-decoration:none;background:#fafafa;transition:all .2s}</style> </head><body> <div class="wrapper"><div class="main-header"><div class="logo-header"><a href="home" class="logo mx-auto" style="display: block;text-align: center;"><img src="assets/img/logo.png?v=0.09ASDghshjsdTYHGHGskjj" style="height: auto;max-width: 200px;" alt="" /></a><button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" id="menuToggleMini"><span class="fa la-bars"></span></button><button class="topbar-toggler more"><i class="fa la-ellipsis-v"></i></button></div><nav class="navbar navbar-header navbar-expand-lg"><div class="container-fluid"> <div class="col"> </div>

<ul class="navbar-nav topbar-nav ml-md-auto align-items-center"><li class="nav-item dropdown"><a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void();" aria-expanded="false"> <img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user-img" width="36px" style="width:36px;" class="img-circle" data-picture><span ><?php echo $row['fullname']; ?></span></span> </a><ul class="dropdown-menu dropdown-user"><li><div class="user-box"><div class="u-img"><img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user" data-picture></div><div class="u-text"><h4><?php echo $row['fullname']; ?></h4><p class="text-muted"><?php echo $row['email']; ?></p></div></div></li><div class="dropdown-divider"></div><a class="dropdown-item" href="settings"><i class="fa la-user"></i> Profile</a><div class="dropdown-divider"></div><a class="dropdown-item" href="logout"><i class="fa la-power-off"></i> Logout</a></ul><!-- /.dropdown-user --></li></ul>

</div></nav></div>
<div class="sidebar" style="background-image:url('assets/img/1.png?v=0.09ASDghshjsdTYHGHGskjj');">
<div class="scrollbar-inner sidebar-wrapper"><ul class="nav" id="memenu"><li class="nav-item"><a href="home" aside><i class="fa la-home"></i><p>Dashboard</p></a></li><li class="nav-item"><a href="deposit" aside><i class="fa la-btc"></i><p>Crypto Deposit</p></a></li><li class="nav-item"><a href="loan" aside><i class="fa la-diamond"></i><p>Loans</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="domestic" aside><i class="fa la-bank"></i><p>Domestic Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="interbank" aside><i class="fa la-refresh"></i><p>InterBank Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="transfer" aside><i class="fa la-refresh"></i><p>Wire Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="statement" aside><i class="fa la-bar-chart"></i><p>My Statement</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="settings" aside><i class="fa la-user"></i><p>Account</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="support"><i class="fa la-support"></i><p>Support</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="logout" aside><i class="fa la-power-off"></i><p>Logout</p><!--<span class="badge badge-count">14</span>--></a></li></ul></div></div>

<div class="main-panel"><div class="content" style="min-height:81vh;padding-top:12px;" id="my-view">
        <div class="container-fluid">                
            <div class="row">
                
                <div class="col-12">
                    <h4 class="page-title text-warning mb-0" align="center"><i class="fa la-line-chart"></i> My Statement</h4>
                    <p class="mb-4" align="center">All your My Statement with <b>Midspring Bank</b> for this Account can be found here!</p>
                </div>

                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                        
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-transfer-tab" data-toggle="tab" href="#nav-transfer" role="tab" aria-controls="nav-transfer" aria-selected="false"><i class="fa la-refresh"></i> Transfer</a>
                                    <a class="nav-item nav-link" id="nav-statement-tab" data-toggle="tab" href="#nav-statement" role="tab" aria-controls="nav-statement" aria-selected="false"><i class="fa la-bar-chart"></i> Statement</a>
                                    <a class="nav-item nav-link" id="nav-statement-tab" data-toggle="tab" href="#nav-crypto" role="tab" aria-controls="nav-statement" aria-selected="false"><i class="fa la-bar-chart"></i> Crypto Deposits</a>
                                </div>
                            </nav>
                            
                            
                            <div class="tab-content" id="nav-tabContent">
                                
                                <!-- Transfer -->
                                <div class="tab-pane fade show active" id="nav-transfer" role="tabpanel" aria-labelledby="nav-transfer-tab">
                                    <p class="lead mt-1 col-12 col-md-11 mx-auto" align="center"><small>Your <b>Transfer History</b> are displayed on the table below. If you can't find any Transfer History, please contact us via <b>Live Chat</b> immediately.</small></p>
                                    

                            <div class="table-responsive">    
								<table class="table table-bordered-bd-warning table-head-bg-warning table-bordered table-hover">
									<thead>
										<tr>
										    										    <th scope="col" style="text-align:center;">S/N</th>

										    <th scope="col" style="text-align:center;">Account</th>
											<th scope="col" style="text-align:center;">Amount</th>
											<th scope="col" style="text-align:center;">Recieving Account</th>
											<th scope="col" style="text-align:center;">Type</th>
											<th scope="col" style="text-align:center;">Bank</th>
											<th scope="col" style="text-align:center;">Description</th>
											<th scope="col" style="text-align:center;">Date/Time</th>
											<th scope="col" style="text-align:center;">Status</th>
										</tr>
									</thead>
								    <tbody>	
								    	<?php
									$return_query = mysqli_query($link, "select * from withdrawal where user ='$session_id'")or die (mysqli_error($link));
									
										  $sn = 1;
										while ($return_row = mysqli_fetch_array($return_query) ){
										
										$acc_id = $return_row['acoount_id'];
										
										$accounData = mysqli_query($link, "select * from accounts where id=$acc_id")or die(mysqli_error($link));
										$rowacc = mysqli_fetch_array($accounData);
											
									?>
										<tr>
										    <td style="text-align:center;"><?php echo $sn++; ?>.</td>
											<td style="text-align:center;"><b><?php echo $rowacc['account_number']; ?><br><small>(<?php echo $rowacc['account_type']; ?> Account)</small></b></td>										   
											<td style="text-align:center;"><b><?php echo $return_row['gateway']; ?> <?php echo number_format($return_row['amount'],2); ?></b></td>										    
											<td style="text-align:center;"><b><?php echo $return_row['bank']; ?><br><small>(<?php echo $rowacc['account_number']; ?>)</small></b></td>										   
											<td style="text-align:center;"><b><?php echo $return_row['type']; ?></b></td>										    
											<td style="text-align:center;"><b><?php echo $return_row['bank']; ?></b></td>
											<td><?php if($return_row['description'] == " " || $return_row['description'] == null ){echo "No description";}?></td>
										    <td style="text-align:center;"><?php echo date("M d, D, Y H:m:s a",strtotime($return_row['created_date'])); ?></td>
										    <td style="text-align:center;"><b class="btn btn-xs btn-danger"><i class="fa la-times-circle"></i> <?php echo $return_row['status']; ?></b></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>  

							
                                </div>
                                
                                <!-- Statement -->
                                <div class="tab-pane fade" id="nav-statement" role="tabpanel" aria-labelledby="nav-statement-tab">
                                    <p class="lead mt-1 col-12 col-md-11 mx-auto" align="center"><small>Your <b>Bank Statement</b> is displayed on the table below. If you can't find any transaction, please contact us via <b>Live Chat</b> immediately.</small></p>
                                    
                                    
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
											<th scope="col" style="text-align:center;"><i class="la la-bar-chart"></i></th>
											<th scope="col" style="text-align:center;">Description</th>
											<th scope="col" style="text-align:center;">Date/Time</th>
											<th scope="col" style="text-align:center;">Status</th>
										</tr>
									</thead>
								    <tbody>			    
										<tr>
											<td colspan="10"><p class="card-category" align="center">No Account Statement Yet!</p></td>
										</tr>
									</tbody>
								</table>
							</div>  
							
                                    
                                </div>
                                
                                
                                <!-- Crypto Deposits -->
                                <div class="tab-pane fade" id="nav-crypto" role="tabpanel" aria-labelledby="nav-statement-tab">
                                    <p class="lead mt-1 col-12 col-md-11 mx-auto" align="center"><small>Your <b>Crypto Deposit Statement</b> is displayed on the table below. If you can't find any transaction, please contact us via <b>Live Chat</b> immediately.</small></p>
                                    
                                    
                            <div class="table-responsive">    
								<table class="table table-bordered-bd-warning table-head-bg-warning table-bordered table-hover">
									<thead>
										<tr>
										    <th scope="col" style="text-align:center;">S/N</th>
										    <th scope="col" style="text-align:center;">Account</th>
											<th scope="col" style="text-align:center;">Amount</th>
											<th scope="col" style="text-align:center;">Coin</th>
											<th scope="col" style="text-align:center;">Date/Time</th>
											<th scope="col" style="text-align:center;">Status</th>
										</tr>
									</thead>
								    <tbody>
									<?php
									$return_query = mysqli_query($link, "select * from deposits where user='$session_id'")or die (mysqli_error($link));
									
										  $sn = 1;
										while ($return_row = mysqli_fetch_array($return_query) ){
										
										$acc_id = $return_row['acoount_id'];
										
										$accounData = mysqli_query($link, "select * from accounts where id=$acc_id")or die(mysqli_error($link));
										$rowacc = mysqli_fetch_array($accounData);
											
									?>
										<tr>
										    <td style="text-align:center;"><?php echo $sn++; ?>.</td>
											<td style="text-align:center;"><b><?php echo $rowacc['account_number']; ?><br><small>(<?php echo $rowacc['account_type']; ?> Account)</small></b></td>										    <td style="text-align:center;"><b>$<?php echo (number_format($return_row['amount'])); ?><br><small>(0.01168078BTC)</small></b></td>
										   <td style="text-align:center;">
											<?php if($return_row['payment_mode'] == 'btc') { ?>
											Bitcoin
											<?php } elseif($return_row['payment_mode'] == 'eth') { ?>
											Ethereum
											
											<?php } else { ?>
											USDT
											<?php } ?>
											
											</td>
										    <td style="text-align:center;">Thu 10th Nov, 2022 <small>(04:06am)</small></td>
										    <td style="text-align:center;"><b class="btn btn-xs btn-danger"><i class="fa la-times-circle"></i> Failed</b></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>  
							
                                    
                                </div>
                                
                            </div>
                        
                        </div>
                    </div>
                </div>

<script>
    $('[data-toggle="popover"]').popover({
        html: true,
        placement: "auto"
    }); 
</script>


            </div>
        </div>
</div></div>

</div><script src="assets/js/core/jquery.3.2.1.min.js"></script><script src="assets/js/core/popper.min.js"></script><script src="assets/js/core/bootstrap.min.js" defer></script><script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js" defer></script><script src="assets/js/ready.min.js" defer></script><script src="assets/js/demo.js?v=0.09ASDghshjsdTYHGHGskjj" defer></script><script> $(window).on("load", function(){ setTimeout(function(){ var preloader = $(document).find('#preloader'); preloader.delay().fadeOut(); }, 1000); setTimeout(function(){ $(document).find("[data-href]").each(function(){ var me = $(this); var link = me.attr("data-href"); me.attr("href",link); }); }, 500); });</script><!--Start of Tawk.to Script-->
<script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script>
<!--End of Tawk.to Script--></body></html>