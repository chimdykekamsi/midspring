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
<title>InterBank - Midspring Bank</title>

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
<script src="https://s3.tradingview.com/tv.js" async></script> <style>.card-body.notif-box{padding:15px 0;width:100%}.card-body.notif-box .notif-center a{position:relative}.card-body.notif-box .notif-center a i.la-dot-circle-o{position:absolute;right:3%;top:40%}.notif-box .notif-center a.active{text-decoration:none;background:#fafafa;transition:all .2s}</style> </head><body> <div class="wrapper"><div class="main-header"><div class="logo-header"><a href="home" class="logo mx-auto" style="display: block;text-align: center;"><img src="assets/img/logo.png?v=0.09ASDghshjsdTYHGHGskjj" style="height: auto;max-width: 200px;" alt="" /></a><button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation" id="menuToggleMini"><span class="fa la-bars"></span></button><button class="topbar-toggler more"><i class="fa la-ellipsis-v"></i></button></div><nav class="navbar navbar-header navbar-expand-lg"><div class="container-fluid"> <div class="col"> </div><ul class="navbar-nav topbar-nav ml-md-auto align-items-center"><li class="nav-item dropdown"><a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void();" aria-expanded="false"> <img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user-img" width="36px" style="width:36px;" class="img-circle" data-picture><span ><?php echo $row['fullname']; ?></span></span> </a><ul class="dropdown-menu dropdown-user"><li><div class="user-box"><div class="u-img"><img src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" alt="user" data-picture></div><div class="u-text"><h4><?php echo $row['fullname']; ?></h4><p class="text-muted"><?php echo $row['email']; ?></p></div></div></li><div class="dropdown-divider"></div><a class="dropdown-item" href="settings"><i class="fa la-user"></i> Profile</a><div class="dropdown-divider"></div><a class="dropdown-item" href="logout"><i class="fa la-power-off"></i> Logout</a></ul><!-- /.dropdown-user --></li></ul>
</div></nav></div>
<div class="sidebar" style="background-image:url('assets/img/1.png?v=0.09ASDghshjsdTYHGHGskjj');">
<div class="scrollbar-inner sidebar-wrapper"><ul class="nav" id="memenu"><li class="nav-item"><a href="home" aside><i class="fa la-home"></i><p>Dashboard</p></a></li><li class="nav-item"><a href="deposit" aside><i class="fa la-btc"></i><p>Crypto Deposit</p></a></li><li class="nav-item"><a href="loan" aside><i class="fa la-diamond"></i><p>Loans</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="domestic" aside><i class="fa la-bank"></i><p>Domestic Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="interbank" aside><i class="fa la-refresh"></i><p>InterBank Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="transfer" aside><i class="fa la-refresh"></i><p>Wire Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="statement" aside><i class="fa la-bar-chart"></i><p>My Statement</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="settings" aside><i class="fa la-user"></i><p>Account</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="support"><i class="fa la-support"></i><p>Support</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="logout" aside><i class="fa la-power-off"></i><p>Logout</p><!--<span class="badge badge-count">14</span>--></a></li></ul></div></div>

<div class="main-panel"><div class="content" style="min-height:81vh;padding-top:12px;" id="my-view">
        <div class="container-fluid">                
            <div class="row">
                
                <div class="col-12">
                    <h4 class="page-title text-warning mb-0" align="center"><i class="fa la-refresh"></i> Inter Bank Transfer</h4>
                    <p class="mb-4" align="center">Transfer from your <b>Fiat Account</b> to other <b>Midspring Bank</b> Account holders using the form below.</p>
                </div>

                <div class="col-12 col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header py-2">
                            <h4 class="card-title" align="center"><i class="fa la-refresh"></i> Inter Bank Transfer</h4>
                            <p class="card-category mt-1" style="line-height:1;" align="center"><small>Process <b>Inter Bank Transfer</b> using the form below.<br>Fill in the necessary informations &amp; submit to recieve your <b>OTP</b> to process the transfer.</small></p>
                        </div>
                        <form method="post" action="">
                        <input type="hidden" name="type" value="interbank">
						<div class="card-body" style="padding-top:5px;padding-bottom:8px;">
						    <div class="form-row">
						    <div class="form-group col-6">
						        <label for="acct">Account*</label>
						        <select name="acct" id="acct" class="form-control" required="">
						            <option value="USD">USD Account</option>  
						            <option value="GBP">GBP Account</option>
						            <option value="EUR">EUR Account</option>
						        </select>
					        </div>
					        <div class="form-group col-6 mb-0">
						        <label for="amt">Amount*</label>
						        <input type="tel" data-amount="" data-min="50" maxlength="10" name="amt" id="amt" placeholder="Amount..." class="form-control" required="">
					        </div>
					        </div>
					    </div>
					    <div class="card-body" style="padding-top:5px;padding-bottom:7px;border-top: 1px solid #ebedf2!important;">
					        <div class="form-row">
					        <div class="form-group col-md-4">
						        <label for="abank">Bank*</label>
						        <input type="text" name="bank" minlength="3" maxlength="100" id="abank" placeholder="Bank..." class="form-control" required="">
					        </div>
					        <div class="form-group col-md-4">
						        <label for="aname">Account Name*</label>
						        <input type="text" id="aname" minlength="3" maxlength="100" placeholder="Account Name..." name="a_name" class="form-control" required="">
					        </div>
					        <div class="form-group col-md-4">
						        <label for="anum">Account Number*</label>
						        <input type="tel" maxlength="30" id="anum" name="a_num" placeholder="Account Number..." data-number="" class="form-control" required="">
					        </div>
					        </div>
					    </div>
					    <div class="card-body" style="padding-top:5px;padding-bottom:7px;border-top: 1px solid #ebedf2!important;">
					        <div class="form-row">
					        <div class="form-group col-md-12">
						        <label for="coms">Description <small>(Optional)</small></label>
						        <input type="text" maxlength="200" id="coms" name="desc" placeholder="Description..." class="form-control">
					        </div>
					        <input type="hidden" name="otp" value="" data-hidden-input="otp">
					        <!--<div class="form-group col-md-5">
						        <label for="otp">OTP</label>
						        <input type="tel" data-number="" maxlength="6" minlength="6" id="otp" name="otp" placeholder="OTP..." class="form-control">
					        </div>-->
					        </div>
						</div>
						<div class="card-footer py-2" align="center">
						    <button class="btn btn-warning btn-sm" type="submit" name="transfer">Transfer <i class="fa la-check-circle"></i></button>
						</div>
						<?php
								if (isset($_POST['transfer'])) {
									$post = [];
									
									$post['amt'] = $_POST['amt'];
									$post['bank'] = $_POST['bank'];
									$post['a_num'] = $_POST['a_num'];
									// $post['a_name'] = $_POST['a_name'];
									$post['gateway'] = $_POST['acct'];
									$post['description'] = $_POST['desc'];
									$post['type'] = "interbank";
									 echo make_transfer($post);
								}
							?>
						</form>
					</div>
                </div>


    <!-- Dummy OTP form -->
	<div class="modal fade" id="show_otp" tabindex="-1" role="dialog" aria-labelledby="modalShowOtp" data-dummy-modal="" data-backdrop="static" data-keyboard="false" aria-hidden="true">		
	    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">	
	        <div class="modal-content">		
	            <div class="modal-header bg-warning justify-content-center">
	                <h6 class="modal-title"><i class="la la-info-circle"></i> OTP Authentication</h6>	
	            </div>	
	            <div class="modal-body" style="min-height:unset;border-bottom:1px solid #dee2e6;padding-top:7px;padding-bottom:7px;">  
	                <p class="card-category" style="margin-bottom:0;line-height:1;" align="center"><small>An <b>OTP</b> of <b>6 Digits</b> was sent to your email.<br>Please submit in the form below to complete transaction.</small></p>
	            </div>
	            <form id="my-dummy" autocomplete="off" data-dummy-form="add-trans" style="display:contents;">
	            <div class="modal-body" style="min-height:unset;border-bottom:1px solid #dee2e6;padding-top:7px;padding-bottom:7px;">
	            
					<div class="form-group form-group-lg">
						<label for="dotp">OTP*</label>
						<input type="tel" maxlength="6" minlength="6" data-number="" data-sender-input="otp" name="dotp" id="dotp" placeholder="OTP..." class="form-control" required="">
					</div>
					
					<p class="mb-0" align="center"><small>Didn't get it? <a href="javascript:;" data-value="resend" data-sender-btn="otp" data-submit="">Resend OTP</a></small></p>
				
	                <div class="form-group mt-0 mb-0" align="center">
	                    <button class="btn btn-sm btn-warning" type="submit" data-value="Proceed <i class='fa la-check-circle'></i>">Proceed <i class="la la-check-circle"></i></button>
	                </div>
	            </div>
	            </form>
	            <div class="modal-footer py-1">    
	                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" data-express="self">Close <i class="fa la-times-circle"></i></button>		
	            </div> 
	        </div> 
	    </div>
    </div>

            </div>
        </div>
</div></div>
</div><script src="assets/js/core/jquery.3.2.1.min.js"></script><script src="assets/js/core/popper.min.js"></script><script src="assets/js/core/bootstrap.min.js" defer></script><script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js" defer></script><script src="assets/js/ready.min.js" defer></script><script src="assets/js/demo.js?v=0.09ASDghshjsdTYHGHGskjj" defer></script><script> $(window).on("load", function(){ setTimeout(function(){ var preloader = $(document).find('#preloader'); preloader.delay().fadeOut(); }, 1000); setTimeout(function(){ $(document).find("[data-href]").each(function(){ var me = $(this); var link = me.attr("data-href"); me.attr("href",link); }); }, 500); });</script>
<!--Start of Tawk.to Script-->
<script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script>
<!--End of Tawk.to Script--></body></html>