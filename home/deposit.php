<?php
 include_once 'functions/user_func.php';
 if (!isset($_SESSION['id'])) {
	 redirect_to('login.php ');
 }
//  $id = $_SESSION['id'];
$session_id = $_SESSION['id'];
$user_query = mysqli_query($link, "select * from users where acc_number='$session_id'")or die(mysqli_error($link));
$row = mysqli_fetch_array($user_query);


$account_query = mysqli_query($link, "select * from accounts where user_id='$session_id'")or die(mysqli_error($link));
$row_acc = mysqli_fetch_array($account_query);
		
?>
<!DOCTYPE html>
<html class="__fb-dark-mode">
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Deposit - Midspring Bank</title>

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

<script src="https://s3.tradingview.com/tv.js" async></script> <style>.card-body.notif-box{padding:15px 0;width:100%}.card-body.notif-box .notif-center a{position:relative}.card-body.notif-box .notif-center a i.la-dot-circle-o{position:absolute;right:3%;top:40%}.notif-box .notif-center a.active{text-decoration:none;background:#fafafa;transition:all .2s}</style> </head><body> <div class="wrapper"><div class="main-header"><div class="logo-header"><a href="home" class="logo mx-auto" style="display: block;text-align: center;"><img src="assets/img/logo.png?v=0.09ASDghshjsdTYHGHGskjj" style="height: auto;max-width: 200px;" alt="" /></a><button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" id="menuToggleMini"><span class="fa la-bars"></span></button><button class="topbar-toggler more"><i class="fa la-ellipsis-v"></i></button></div><nav class="navbar navbar-header navbar-expand-lg">
<div class="container-fluid"> <div class="col"> </div>
<ul class="navbar-nav topbar-nav ml-md-auto align-items-center"><li class="nav-item dropdown"><a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void();" aria-expanded="false"> <img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user-img" width="36px" style="width:36px;" class="img-circle" data-picture><span ><?php echo $row['fullname']; ?></span></span> </a><ul class="dropdown-menu dropdown-user"><li><div class="user-box"><div class="u-img"><img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user" data-picture></div><div class="u-text"><h4><?php echo $row['fullname']; ?></h4><p class="text-muted"><?php echo $row['email']; ?></p></div></div></li><div class="dropdown-divider"></div><a class="dropdown-item" href="settings"><i class="fa la-user"></i> Profile</a><div class="dropdown-divider"></div><a class="dropdown-item" href="logout"><i class="fa la-power-off"></i> Logout</a></ul><!-- /.dropdown-user --></li></ul>

</div>
</nav></div>
<div class="sidebar" style="background-image:url('assets/img/1.png?v=0.09ASDghshjsdTYHGHGskjj');">

<div class="scrollbar-inner sidebar-wrapper"><ul class="nav" id="memenu"><li class="nav-item"><a href="home" aside><i class="fa la-home"></i><p>Dashboard</p></a></li><li class="nav-item"><a href="deposit" aside><i class="fa la-btc"></i><p>Crypto Deposit</p></a></li><li class="nav-item"><a href="loan" aside><i class="fa la-diamond"></i><p>Loans</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="domestic" aside><i class="fa la-bank"></i><p>Domestic Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="interbank" aside><i class="fa la-refresh"></i><p>InterBank Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="transfer" aside><i class="fa la-refresh"></i><p>Wire Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="statement" aside><i class="fa la-bar-chart"></i><p>My Statement</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="settings" aside><i class="fa la-user"></i><p>Account</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="support"><i class="fa la-support"></i><p>Support</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="logout" aside><i class="fa la-power-off"></i><p>Logout</p><!--<span class="badge badge-count">14</span>--></a></li></ul></div></div>

<div class="main-panel"><div class="content" style="min-height:81vh;padding-top:12px;" id="my-view">
        <div class="container-fluid">                
            <div class="row">
                
                <div class="col-12">
                    <h4 class="page-title text-warning mb-0" align="center"><i class="fa la-btc"></i> Crypto Deposit</h4>
                    <p class="mb-4" align="center">Deposit into your <b>Fiat Account</b> using <b>Crypto</b>.<br><small>You can easily deposit into your various <b>Accounts</b> on <b>Midspring Bank</b> using the form below.</small></p>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header py-2">
                            <h4 class="card-title" align="center"><i class="fa la-plus-circle"></i> Crypto Deposit</h4>
                            <p class="card-category mt-1" style="line-height:1;" align="center"><small>Request for <b>Crypto Loan</b> using the form below.</small></p>
                        </div>
                        <form style="display:contents;" autocomplete="off" method="post" action="">
						<div class="card-body" style="padding-top:7px;padding-bottom:5px;">
						    <div class="form-row">
						    <div class="form-group col-7">
						        <label for="acct">Account*</label>
						        <select name="acct" id="acct" class="form-control" required="">
						            <option value="USD">USD Balance</option>
						            <option value="GBP">GBP Balance</option>
						            <option value="EUR">EUR Balance</option>
						        </select>
					        </div>
					        <div class="form-group col-5">
						        <label for="coin">Coin*</label>
						        <select name="coin" id="coin" class="form-control" required=""><option value="btc">Bitcoin</option><option value="eth">Ethereum</option><option value="usdt">USDT</option>						            
						        </select>
					        </div>
					        <div class="form-group col-12 mb-0">
						        <label for="amt">Amount*</label>
						        <input type="tel" data-amount="" maxlength="10" name="amt" id="amt" placeholder="Amount..." class="form-control" required="">
					        </div>
					        </div>
					        <p class=" mt-2" style="line-height:0.9;" align="center"><small><b class="text-warning">Note:</b> Select the account you want to deposit into, input the amount you want to deposit &amp; your payment details will be generated for you to make payments.</small></p>
						</div>
						<div class="card-footer py-2" align="center">
						    <button class="btn btn-warning btn-sm" id="invest" value="invest" type="submit" name='invest'>Deposit <i class="fa la-check-circle"></i></button>
						</div>
						</form>

						
					</div>
					
                </div>

											

                <div class="col-12 col-md-8">
                    <div class="card">
					<?php
                                                if (isset($_POST['invest'])) {
                                                    $post = [];
                                                    $post['acct']=$_POST['acct'];
                                                    $post['coin']=$_POST['coin'];
                                                    $post['amount']=$_POST['amt'];
                                                    // $post['location']=$_POST['location'];

                                                   
                                                    echo credit_account($post,$session_id);
                                                }
                                            ?>
                        <div class="card-header py-1">
                            <h4 class="card-title" align="center"><i class="fa la-area-chart"></i> Deposit History</h4>
                            <p class="card-category mt-1 col-12 col-md-11 mx-auto" style="line-height:1;" align="center"><small>All <b>Crypto Deposit</b> made on your <b>Account</b> are displayed below.</small></p>
                        </div>
                        <div class="card-body" style="max-height:300px;overflow-y:scroll;">
                            
                            <div class="table-responsive">    
								<table class="table table-bordered-bd-warning table-head-bg-warning table-bordered table-hover">
									<thead>
										<tr>
										    <th scope="col" style="text-align:center;">S/N</th>
										    <th scope="col" style="text-align:center;">Account</th>
											<th scope="col" style="text-align:center;">Amount</th>
											<th scope="col" style="text-align:center;">Coin</th>
											<th scope="col" style="text-align:center;">Status</th>
											<th scope="col" style="text-align:center;"><i class="fa la-bars"></i></th>
										</tr>
									</thead>
								    <tbody>
									<?php
									$return_query = mysqli_query($link, "select * from deposits where user='$session_id' ORDER BY `deposits`.`created_at` DESC")or die (mysqli_error($link));
									
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
											<?php if($return_row['status'] == 'pending') {  $style = "text-warning";?>
											
											<?php } elseif($return_row['status'] == 'confirmed') { $style = "text-success";?>
											
											<?php } else { $style = "text-danger";?>
											
											<?php } ?>
											</td>
										    <td style="text-align:center;"><b class="<?=$style?>"><i class="fa la-times"></i>	
										    <?php if($return_row['status'] == 'pending') {  $style = "text-warning";?>
											Pending
											<?php } elseif($return_row['status'] == 'confirmed') { $style = "text-success";?>
											Confirmed
											<?php } else { $style = "text-danger";?>
											Cancelled
											<?php } ?></b></td>
										    <td style="text-align:center;"><a href="?cancel=<?=$return_row['trx']?>"><b class="btn btn-xs btn-danger"><i class="fa la-times-circle"></i></b></a></td>
										</tr>
										<?php 
											if (isset($_GET['cancel'])) {
												$trx = $_GET['cancel'];
												$sql = "UPDATE `deposits` SET `status`='canceled' WHERE `trx` = '$trx' AND `user` = '$session_id'";
												mysqli_query($link,$sql);
												redirect_to('deposit');
											}	
										?>
										<?php } ?>
									</tbody>
								</table>
							</div>  
							
                        </div>
                    </div>
                </div>


            </div>
        </div>
</div></div>
</div>
<script src="assets/js/core/jquery.3.2.1.min.js"></script><script src="assets/js/core/popper.min.js"></script><script src="assets/js/core/bootstrap.min.js" defer></script><script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js" defer></script><script src="assets/js/ready.min.js" defer></script><script src="assets/js/demo.js?v=0.09ASDghshjsdTYHGHGskjj" defer></script><script> $(window).on("load", function(){ setTimeout(function(){ var preloader = $(document).find('#preloader'); preloader.delay().fadeOut(); }, 1000); setTimeout(function(){ $(document).find("[data-href]").each(function(){ var me = $(this); var link = me.attr("data-href"); me.attr("href",link); }); }, 500); });</script>
<script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script></body></html>

