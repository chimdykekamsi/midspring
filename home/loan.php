<?php
  include_once 'functions/user_func.php';
  if (!isset($_SESSION['id'])) {
	  redirect_to('login.php ');
  }
  $session_id = $_SESSION['id'];

$user_query = mysqli_query($link, "select * from users where acc_number ='$session_id'")or die(mysqli_error($link));
$row = mysqli_fetch_array($user_query);


$account_query = mysqli_query($link, "select * from accounts where user_id='$session_id'")or die(mysqli_error($link));
$row_acc = mysqli_fetch_array($account_query);
		
?>
<!DOCTYPE html>
<html class="__fb-dark-mode">
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Loan - Midspring Bank</title>
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
<link rel="icon" type="image/png" href="../stxx.lakefinancebank.com/img/favicon.png">
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
</nav></div><div class="sidebar" style="background-image:url('assets/img/1.png?v=0.09ASDghshjsdTYHGHGskjj');">

<div class="scrollbar-inner sidebar-wrapper"><ul class="nav" id="memenu"><li class="nav-item"><a href="home" aside><i class="fa la-home"></i><p>Dashboard</p></a></li><li class="nav-item"><a href="deposit" aside><i class="fa la-btc"></i><p>Crypto Deposit</p></a></li><li class="nav-item"><a href="loan" aside><i class="fa la-diamond"></i><p>Loans</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="domestic" aside><i class="fa la-bank"></i><p>Domestic Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="interbank" aside><i class="fa la-refresh"></i><p>InterBank Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="transfer" aside><i class="fa la-refresh"></i><p>Wire Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="statement" aside><i class="fa la-bar-chart"></i><p>My Statement</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="settings" aside><i class="fa la-user"></i><p>Account</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="support"><i class="fa la-support"></i><p>Support</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="logout" aside><i class="fa la-power-off"></i><p>Logout</p><!--<span class="badge badge-count">14</span>--></a></li></ul></div></div>

<div class="main-panel">
<?php 
	if (!$row['phone'] || !$row['address'] || !$row['state'] || !$row['city'] || !$row['postal_code'] || !$row['country'] || !$row['salary'] || !$row['work'] || !$row['company']) {
		$loan = "freeze";
?>
	<div class="content" style="min-height:81vh;padding-top:12px;" id="my-view"><div class="alert alert-warning mt-1" align="center"><strong><span class="fa la-exclamation-circle"></span></strong>You have not enabled your <b>Account</b> for <b>Loan Application</b> yet. <a href="javascript:;" data-toggle="modal" data-target="#add-addr" class="btn btn-sm btn-success">Enable <i class="fa la-check"></i></a>
	<?php
					if(isset($_POST['updateInfo'])){
						$post = [];
						$post['addr'] = $_POST['addr'];
						$post['state'] = $_POST['state'];
						$post['city'] = $_POST['city'];
						$post['zip'] = $_POST['zip'];
						$post['country'] = $_POST['country'];
						$post['phone'] = $_POST['phone'];
						$post['work'] = $_POST['work'];
						$post['salary'] = $_POST['salary'];
						$post['company'] = $_POST['company'];
						$result = updateinfo($post);
						echo $result;
						redirect_to('loan');
					}
				?>
	</div><?php } else {
	$loan = "active";
}?>
        <div class="container-fluid">                
            <div class="row">
                
                <div class="col-12">
                    <h4 class="page-title text-warning mb-0" align="center"><i class="fa la-credit-card"></i> Loan</h4>
                    <p class="mb-4" align="center">Request for a <b>Crypto Loan</b> or <b>Monitor</b> you pending <b>Crypto Loans</b> below.</p>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header py-1">
                            <h4 class="card-title" align="center"><i class="fa la-plus-circle"></i> Request Loan</h4>
                            <p class="card-category mt-1" style="line-height:1;" align="center"><small>Request for <b>Crypto Loan</b> using the form below.</small></p>
                        </div>
                        <form style="display:contents;" method="post" action="">
						<div class="card-body" style="padding-top:7px;padding-bottom:5px;">
						    <div class="form-row">
						    <div class="form-group col-7">
						        <label for="plan">Loan Plan*</label>
						        <select name="plan" data-loan="" id="plan" class="form-control" required="">
						            <option value="">Loan Plan</option><option value="personal" data-min="1500" data-max="20000" data-per="20">Personal Plan</option><option value="family" data-min="5000" data-max="50000" data-per="25">Family Plan</option><option value="business" data-min="10000" data-max="200000" data-per="28">Business Plan</option>						            
						        </select>
					        </div>
					        <div class="form-group col-5">
						        <label for="coin">Coin*</label>
						        <select name="coin" id="coin" class="form-control" required=""><option value="BTC">Bitcoin</option><option value="ETH">Ethereum</option><option value="USDT">USDT</option>						            
						        </select>
					        </div>
					        <div class="form-group col-12 mb-0">
						        <label for="amt">Amount (USD account)*</label>
						        <input type="tel" data-loan="" data-amount="" maxlength="8" name="amt" id="amt" placeholder="Amount..." class="form-control" data-nofocus="" required="">
					        </div>
					        <p class="col-12 mt-2 mb-1" style="line-height:0.9;" align="center"><small data-range=""></small></p>
					        <div class="form-group col-6">
						        <label for="rate">Rate*</label>
						        <input type="text" id="rate" placeholder="Rate..." class="form-control text-center font-weight-bold" readonly="" name="rate" value="0%">
					        </div>
					        <div class="form-group col-6">
						        <label for="int">Interest*</label>
						        <input type="text" id="int" placeholder="Interest..." class="form-control text-center font-weight-bold" readonly="" name="interest">
					        </div>
					        <div class="form-group col-12">
						        <label for="dur">Periodity*</label>
						        <select id="dur" class="form-control text-center font-weight-bold" readonly="" name="period">
						            <option value="12months">12 Months</option>
						        </select>
					        </div>
					        </div>
					        <p style="line-height:0.9;" align="center"><small><b class="text-warning">Note:</b> You are required to pay for the <b>Interest</b> of the loan you're applying for as <b>Collateral</b> for us to proces the loan. <br>Also, if you fail to repay your loan on the due date, your account will be <b>Terminated</b> immediately.</small></p>
							<?php
						if (isset($_POST['loan'])) {
							if ($loan == 'active') {
								$post['plan'] = $_POST['plan'];
								$post['coin'] = $_POST['coin'];
								$post['amt'] = $_POST['amt'];
								$post['rate'] = $_POST['rate'];
								$post['interest'] = $_POST['interest'];
								$post['period'] = $_POST['period'];

								applyLoan($post);
							}else {
								echo "<span style='color:red'> You have not enabled your account for loan application yet</span>";
							}
						}
					?>
						</div>
						<div class="card-footer py-2" align="center">
						    <button class="btn btn-warning btn-sm" type="submit" name="loan">Request <i class="fa la-check-circle"></i></button>
						</div>
						</form>
						
					</div>

					
                </div>

                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header py-1">
                            <h4 class="card-title" align="center"><i class="fa la-credit-card"></i> All Loans</h4>
                            <p class="card-category mt-1 col-12 col-md-11 mx-auto" style="line-height:1;" align="center"><small>All your <b>Crypto Loans</b> are listed on the table below. If your <b>Crypto Loan</b> has not been approved after <b>2 Weeks</b> of applying, please contact us via our <b>Live Chat</b> channel immediately.</small></p>
                        </div>
                        <div class="card-body" style="max-height:300px;overflow-y:scroll;">
                            
                            <div class="table-responsive">    
								<table class="table table-bordered-bd-warning table-head-bg-warning table-bordered table-hover">
									<thead>
										<tr>
										    <th scope="col" style="text-align:center;">S/N</th>
											<th scope="col" style="text-align:center;">Amount</th>
											<th scope="col" style="text-align:center;">Interest</th>
											<th scope="col" style="text-align:center;">Plan</th>
											<th scope="col" style="text-align:center;">Status</th>
										</tr>
									</thead>
								    <tbody>
								        	<?php
												$sql = "SELECT * FROM loan WHERE user_id = '$session_id'";
												$result = mysqli_query($link,$sql);
												$sn = 1;
												while($return_row = mysqli_fetch_assoc($result)){
											?>
										<tr>
										    <td style="text-align:center;"><?php echo $sn++; ?>.</td>
										    <td style="text-align:center;"><b>$<?php echo ($return_row['amount']); ?></b></td>
									        <td style="text-align:center;"><b><?php echo ($return_row['interest']); ?></b></td>
										    <td style="text-align:center;"><b><?php echo $return_row['loan']; ?></b></td>
										    <td style="text-align:center;">
											<?php if($return_row['status'] == 'pending') { ?>
											Pending
											<?php } elseif($return_row['status'] == 'approved') { ?>
											Approved
											<?php } else { ?>
											Rejected
											<?php } ?>
											</td>
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

    <!-- Add Loan Address -->
	<div class="modal fade" id="add-addr" tabindex="-1" role="dialog" aria-labelledby="modalAddAddr" data-backdrop="static" data-keyboard="false" aria-hidden="true">		
	    <div class="modal-dialog modal-dialog-centered" role="document">	
	        <div class="modal-content">		
	            <div class="modal-header bg-warning justify-content-center">
	                <h6 class="modal-title"><i class="fa la-user"></i> Personal Information</h6>	
	            </div>	
	            <div class="modal-body" style="min-height:unset;border-bottom:1px solid #dee2e6;padding-top:7px;padding-bottom:7px;">  
	                <p class="card-category" style="margin-bottom:0;line-height:1;" align="center"><small>Please provide your <b>Address</b> &amp; <b>Employment</b> information to enable <b>Loan Application</b> on your <b>Account</b>.</small></p>
	            </div>
	            <form method="post" style="display:contents;" action="">
	            <div class="modal-body" style="min-height:unset;border-bottom:1px solid #dee2e6;padding-top:7px;padding-bottom:7px;">
	                <div class="form-group form-group-sm col-12">
						<label for="name">Name*</label>
						<input type="text" name="name" id="name" placeholder="Name..." value="<?=$row['fullname']?>" class="form-control" readonly="">
					</div>
	                <div class="form-row">
					<div class="form-group form-group-sm col-sm-8">
						<label for="addr">Address*</label>
						<input type="text" maxlength="60" name="addr" id="addr" placeholder="Address..." class="form-control" required="" value="<?=$row['address']?? ''?>">
					</div>
					<div class="form-group form-group-sm col-sm-4">
						<label for="state">State/Province*</label>
						<input name="state" maxlength="50" class="form-control" placeholder="State/Province..." id="state" required="" value="<?=$row['state']?? ''?>">
					</div>
					<div class="form-group form-group-sm col-6 col-sm-4">
						<label for="city">City*</label>
						<input name="city" maxlength="50" class="form-control" placeholder="City..." id="state" required="" value="<?=$row['city']?? ''?>">
					</div>
					<div class="form-group form-group-sm col-6 col-sm-4">
						<label for="zip">Zip/Postal Code*</label>
						<input name="zip" id="zip" maxlength="10" class="form-control" placeholder="Zip/Postal Code..." required="" value="<?=$row['postal_code']?? ''?>">
					</div>
					<div class="form-group form-group-sm col-12 col-sm-4">
						<label for="ct">Country*</label>
						<select name="country" class="form-control" id="ct" required="">
						<option value="<?=$row['country']?? ''?>"><?=$row['country']?? 'Select Country'?></option>
						<option value="afghanistan-29f71dd3a9614fb84e3032283573f177-1627741272">Afghanistan</option>
						<option value="albania-7bc8ca2a19706858d0bdff171ce3fe1f-1627741217">Albania</option><option value="algeria-8e3b7b5f96f243178e456c9028c6cb0c-1627741297">Algeria</option><option value="american samoa-054ab4d4b426b1a202ff40bd3d475f5f-1627741322">American Samoa</option><option value="andorra-64663fdf7fc839d0add0f9c09484f802-1627741355">Andorra</option><option value="angola-34ab72f6af064ef0a703f737a0df3e1f-1627741381">Angola</option><option value="anguilla-83380b7c74ebbf77be89acb359353142-1627743114">Anguilla</option><option value="antarctica-190ba759406292f27e22f892a01eb8db-1627911649">Antarctica</option><option value="antigua and barbuda-a9ca18cbd81c9a398e1ee812cbed59f5-1627913">Antigua and Barbuda</option><option value="argentina-9dcc3e6ad885fc9acd4349ec54ab913c-1627913264">Argentina</option><option value="armenia-1c5bbabd31ab487cb0f37e7732dd22d0-1627913289">Armenia</option><option value="aruba-965ce128d3585830eeba52caa7611523-1627913332">Aruba</option><option value="australia-8a2f0f634a9a545a66d2d5de95dd4014-1627913662">Australia</option><option value="austria-b8bc147e48dfb29d281208814b036289-1627913734">Austria</option><option value="azerbaijan-f32640adf0f3ca2dc93297fc5b506257-1627913757">Azerbaijan</option><option value="bahamas-e17336516de86ebb3c30c124da5b0a83-1627913791">Bahamas</option><option value="bahrain-9a77b0317512e0922c32e15e218329e6-1627913859">Bahrain</option><option value="bangladesh-9cdda04698e281868102a241b4a400e3-1627913877">Bangladesh</option><option value="barbados-6d20763eb9537a028af8628564f4d486-1627913905">Barbados</option><option value="belarus-feb464ef34d694b2ba48ebc9980b4a07-1627914127">Belarus</option><option value="belgium-213a3a27875e9929108467d4820a82c0-1627914207">Belgium</option><option value="belize-68b36979e067a3b1dfa6cdf3eb7e6a20-1627914234">Belize</option><option value="benin-372cae7c7877dc4dd455e1dcea7b39b3-1627914248">Benin</option><option value="bermuda-14cc45bb87d6a4e1b7103eb582e27008-1627914278">Bermuda</option><option value="bolivia-ef10a0971ee6e94d7895d7e1803d9f9b-1627914309">Bolivia</option><option value="bosnia &amp; herzegonia-4b1fdc3493748549e6def25b7cf065bf-162">Bosnia &amp; Herzegonia</option><option value="botswana-3303cbafe27a6e1657e4d68fe0e1c874-1627914347">Botswana</option><option value="bouvet island-a296ebb0ca3707f0577610719d56d9d0-1627914366">Bouvet Island</option><option value="brazil-def2b3b3d2afbc76f8b36c3034b7b604-1627914380">Brazil</option><option value="british indian ocean territory-4e3e50b594007dc7110655206a155">British Indian Ocean Territory</option><option value="brunei darussalam-6ab546772039e17c23aaff6bc833ee04-162791444">Brunei</option><option value="bulgaria-dc1a28458022a1496ecb564cc84c568d-1627914557">Bulgaria</option><option value="burkina faso-e46138b48539ac1b57a4657f86f7a39c-1627914571">Burkina Faso</option><option value="burma-b616860d0c690c7e54ae528ab3690525-1627917107">Burma</option><option value="burundi-c93a14a50dd1bb323e5357e7abcb5573-1627914588">Burundi</option><option value="cambodia-df0581a61a2419d05cafd15c042591a2-1627914602">Cambodia</option><option value="cameroon-d24cb046794dd7a329740c613db792aa-1627914611">Cameroon</option><option value="canada-fa497b3b1ddf529fdaafc75e8663a87b-1627914624">Canada</option><option value="cape verde-1cb0c9534a602e03bfaaa2a8f45a8d3c-1627914634">Cape Verde</option><option value="cayman islands-0a4d0a22a4c4c2a8ab51d9c67e70a4e0-1627914659">Cayman Islands</option><option value="côte d'ivoire-86f2b1475f02c566382445ea3e9998bf-1627914948">Côte D'Ivoire</option><option value="central african republic-807b7f4da65d0d775d0a814d99af9579-16">Central African Republic</option><option value="chad-7d0f84dde3dda5ba5267cf5711873a33-1627914690">Chad</option><option value="chile-ceb0f6d7f5acf9d70e427a41ac6f66c8-1627914698">Chile</option><option value="china-9d7fd6b172d66fba74accb7557508c82-1627914709">China</option><option value="christmas island-d191a43980447a04471974b62ed65622-1627914735">Christmas Island</option><option value="cocos (keeling) islands-3ce1057f6b6b1dc04e4bd569ac8a0ac9-162">Cocos (keeling) Islands</option><option value="colombia-73a1f97c60b9c59f47123be27db9bca5-1627914785">Colombia</option><option value="comoros-d9e7f0ffaaff3f14bb04ea28831b3cab-1627914798">Comoros</option><option value="congo-2867d983184c5ba78a750b1a94775a88-1627914809">Congo</option><option value="congo, the democratic republic of the-0ab45029ab5c911c3e2f27">Congo, The Democratic Republic Of The</option><option value="cook islands-7e4de737155d146f8e4a70780426217e-1627914916">Cook Islands</option><option value="costa rica-f10cc90d31b3a23776c71990f1d31cc3-1627914930">Costa Rica</option><option value="croatia-e303818034e65e3c73c917963973a3a8-1627914996">Croatia</option><option value="cuba-81db9c196e4c7f305d6ecb117c9a7a91-1627915029">Cuba</option><option value="cyprus-daac2a99a12ac10ffed11d0a23f36353-1627915043">Cyprus</option><option value="czech republic-b71762a5797197abacc5c04194294f0a-1627915076">Czech Republic</option><option value="denmark-a2b174115f0a728746d61a75987d8f53-1627915087">Denmark</option><option value="djibouti-42629e0b49fc1173d37def6eb81ab9d0-1627915102">Djibouti</option><option value="dominica-4498bc17c4f8bd45a971690b37694d32-1627915122">Dominica</option><option value="dominican republic-f3b0feb8496cfa59c57499271f34af68-16279151">Dominican Republic</option><option value="ecuador-f24d97fc554b265e44ba0c26611e6a13-1627915165">Ecuador</option><option value="egypt-0423f9cbf4cb76bab158cce661cb2c49-1627915174">Egypt</option><option value="el salvador-5fcef91d3da3c09830efd38b36773dbb-1627915192">El Salvador</option><option value="equatorial guinea-b51ac12c96f3d218323b75ed9efddfe0-162791520">Equatorial Guinea</option><option value="eritrea-48826d79f62ce177e20561e728517f62-1627915223">Eritrea</option><option value="estonia-a941c2d8a69e777c0b90ba749e5604cc-1627915234">Estonia</option><option value="ethiopia-f4888d50092d38c55c95727ee2d7f11f-1627915248">Ethiopia</option><option value="falkland islands (malvinas)-d9d354b3403537a5b38dc34f8926d5e2">Falkland Islands (malvinas)</option><option value="faroe islands-27803b8a178b3983de6997eba3a12cb7-1627915312">Faroe Islands</option><option value="fiji-435212f6dd205dd2072577ae78e4226c-1627915326">Fiji</option><option value="finland-beed8323c3458b3db9482142143883b0-1627915361">Finland</option><option value="france-89b386fe90cbf9b3c67e06262d795ec6-1627915374">France</option><option value="french guiana-2438564fb1cf6f59e415f01900c9da61-1627915406">French Guiana</option><option value="french polynesia-de44a76854809a0ec7fa8fcf7dccb3f9-1627915430">French Polynesia</option><option value="french southern territories-971018bee49641fc6e0703dbb05e5033">French Southern Territories</option><option value="gabon-37a33d9e4ea386630ddf8e00c23ae161-1627915465">Gabon</option><option value="gambia-d9add8373e27cfb36dc23d62925657f0-1627915488">Gambia</option><option value="georgia-e0136a89a56f4d953ab85e20c8b8107f-1627915524">Georgia</option><option value="germany-06fb827015ead60d842f232abaa03ca1-1627915540">Germany</option><option value="ghana-1d711000468adf3c8657e636c57660df-1627915552">Ghana</option><option value="gibraltar-675d44d00cd7b37f21b111274f08c4ac-1627915593">Gibraltar</option><option value="greece-57e3c538321b2d5fa81793b4049b6cd8-1627915604">Greece</option><option value="greenland-07b7bd8ce3ae34adec7c871ac7f63610-1627915615">Greenland</option><option value="grenada-951ca7ebef7effbcdca5ce6f0e7779c6-1627915633">Grenada</option><option value="guadeloupe-a079b1d40dc34a46c17e6d83f7d8b1f0-1627915677">Guadeloupe</option><option value="guam-4a5829e11a03444aecca42162d23a21a-1627915716">Guam</option><option value="guatemala-27f89e77662a6ae7927e0c6bd8a01322-1627915733">Guatemala</option><option value="guernsey-bd003b5e08f061ce88ec1ed7ea381559-1627915755">Guernsey</option><option value="guinea-6d8ac28cea3ff5563f7cd5ce9e13a753-1627915767">Guinea</option><option value="guinea-bissau-e9fc6c82d743b861d45bb89edad19b1b-1627915793">Guinea-Bissau</option><option value="guyana-7ecb2760ed39c10d72c338b876811ce8-1627915830">Guyana</option><option value="haiti-8f3ee8357ce467b127502573a8f15557-1627915864">Haiti</option><option value="heard island &amp; mcdonald islands-fc1fa398f4922675bd88b616">Heard Island &amp; McDonald Islands</option><option value="holy see (vatican city state)-499c81034fbda4f40108fd284f2af5">Holy See (Vatican City State)</option><option value="honduras-fa9b3a226be9babb03731864e3505f94-1627915978">Honduras</option><option value="hong kong-17020bfe53296dd3257f35404846c9af-1627915999">Hong Kong</option><option value="hungary-30e9e38ce5a8f37e88a1cd4d14268bb7-1627916011">Hungary</option><option value="iceland-5c373325ad9e322371bd64792cefadd3-1627916029">Iceland</option><option value="india-f5737f0ed4a0a1b51f5026f8ea918654-1627916038">India</option><option value="iran, islamic republic of-25b66a84916574814ad15e1005334d3e-1">Iran, Islamic Republic Of</option><option value="iraq-8d6b3dd09fc275f0c34f334c1f26bbd0-1627916071">Iraq</option><option value="ireland-04afcc6abfcd883adac3f8ecd252bd63-1627916082">Ireland</option><option value="isle of man-28f50ef59e305558576c2df03567a524-1627916098">Isle Of Man</option><option value="israel-e540d95abba799f9b13c5efcedcaffd5-1627916117">Israel</option><option value="italy-cd96054b630bdddfab8a23db17151a22-1627916140">Italy</option><option value="jamaica-8587ad8115ffb6be0f0cb7cc8d0bda9e-1627916157">Jamaica</option><option value="japan-6846874ad2c389892597011d38cc9dbf-1627916167">Japan</option><option value="jersey-852c542a9d654edebef01cb01109d0f3-1627916185">Jersey</option><option value="jordan-98e4c88afac83253d3b20e9473cd6055-1627916194">Jordan</option><option value="kazakhstan-87f7c87d8c1e51c2e7d90868d58e1d06-1627916249">Kazakhstan</option><option value="kenya-7c280286122c6ece6098e2bd783b53ca-1627916260">Kenya</option><option value="kiribati-d7d7e372f9197f7810202ff0a1a624ad-1627916280">Kiribati</option><option value="korea, democratic people's republic of-6020b26c349a42bb871b">Korea, Democratic People's Republic Of</option><option value="korea, republic of-508e560ad58a0ce8ca651eb57a2504d6-16279163">Korea, Republic Of</option><option value="kuwait-daacad7ebc89b5a74ae5ae70db47d439-1627916387">Kuwait</option><option value="kyrgyzstan-09b77367e55607e2cc82fbcd80a09c5d-1627916404">Kyrgyzstan</option><option value="lao people's democratic republic-5594ed0823e459e129d1a3f527">Lao People's Democratic Republic</option><option value="latvia-174544d0fe35fd6ff1458282a7f36428-1627916440">Latvia</option><option value="lebanon-fcd17e4c276f0ae0a3e7c471ebd12232-1627916480">Lebanon</option><option value="lesotho-46865a356ea3442da0d4ae60c8f30aba-1627916497">Lesotho</option><option value="liberia-8ee3c9d8292918342ff873704b45e936-1627916512">Liberia</option><option value="libya-851899ab4b6aca26848b0ea9f02e423d-1627916530">Libya</option><option value="liechtenstein-e21078ac57d4ba1701ea56111bf4ac21-1627916563">Liechtenstein</option><option value="lithuania-51e3f1ba08d5773a21043a3aab8903ca-1627916582">Lithuania</option><option value="luxembourg-b19998bc989f84d8b253819b4e57a785-1627916632">Luxembourg</option><option value="macao-ac1c5628c73f9d657b00705c3ed92174-1627916654">Macao</option><option value="macedonia-a24c21f83bbe453633092ac166f316e6-1627916683">Macedonia</option><option value="madagascar-0f8dd5865be5c0b78570c6391dacce91-1627916703">Madagascar</option><option value="malawi-d5720096fa72f9c3b29df440d2eddf7e-1627916718">Malawi</option><option value="malaysia-6445c0b7b90ed0fb4355665540cd160d-1627916734">Malaysia</option><option value="maldives-bc8a70f8c2ca0119a15c2b36b243b5b5-1627916750">Maldives</option><option value="mali-aece23513e042ae184366097214b5ec7-1627916760">Mali</option><option value="malta-fd7e03793c8bf3db0f1612a185ecd5dc-1627916779">Malta</option><option value="marshall islands-1bd8320064883d247e47ef7c684f65b7-1627916803">Marshall Islands</option><option value="martinique-26dde20b32e4ab6b8f6e0d841b43aa2d-1627916851">Martinique</option><option value="mauritania-c9418d9d5dbc5bfacd612e5d2519a3a8-1627916871">Mauritania</option><option value="mauritius-0d309e4bd75b28e082e1086cf85cf8d8-1627916895">Mauritius</option><option value="mayotte-aba6eb210deacf768691312dc31738eb-1627916923">Mayotte</option><option value="mexico-a9ffc565541775bc48a3b3746b93a0f9-1627916935">Mexico</option><option value="micronesia-3abc1b31678b7642f4a81fee335647c3-1627916967">Micronesia</option><option value="moldova-77272ee33f61e2c49dc6e63e02ebdd45-1627916981">Moldova</option><option value="monaco-ec2b7ab63deca1b5ab265768d2a31ce9-1627916994">Monaco</option><option value="mongolia-08be1e44a554ee49c40dd03a440940ef-1627917006">Mongolia</option><option value="montenegro-1b7da90b2ca3ed6819ed9d302f6f35fe-1627917022">Montenegro</option><option value="montserrat-7bec049f4b4b82b0008eecc2259ef8bd-1627917042">Montserrat</option><option value="morocco-2c917cb863b74d92eca5c8ac1ef5804c-1627917064">Morocco</option><option value="mozambique-9d76b077086cee6c114633ede0d948f2-1627917081">Mozambique</option><option value="namibia-dc579e847a7549e416a201be609ccc91-1627917121">Namibia</option><option value="nauru-58390be8150ae05a7e723f6575165b35-1627917154">Nauru</option><option value="nepal-cff320e6d36d90e76e81047a53f03067-1627917169">Nepal</option><option value="netherlands-3c6c162ecae4acb500f6c15d821d825a-1627917197">Netherlands</option><option value="netherlands antilles-a3a78f1973cb800e6a4c347be60ee1d5-162791">Netherlands Antilles</option><option value="new caledonia-74215888c2539df3447f72344c0dbdbe-1627917237">New Caledonia</option><option value="new zealand-388149568f8bddd85e55695a22cf66ab-1627917250">New Zealand</option><option value="nicaragua-bace17d66be5053835004952c78d1f55-1627917265">Nicaragua</option><option value="niger-d2656bd00f573fe1d24600d373e392a8-1627917276">Niger</option><option value="nigeria-b2fe90d1184662896b77c0481a6adeca-1627917289">Nigeria</option><option value="niue-e8c9b8917c9e412113373b61bf57255c-1627917320">Niue</option><option value="norfolk island-7f0b92e9b61cc06ca0a35a7e0baca54c-1627917344">Norfolk Island</option><option value="northern mariana islands-cbd8a02ff69b969b314a4bb6bb37a51d-16">Northern Mariana Islands</option><option value="norway-cd687e43cafb539c0651ad380047d5ce-1627917384">Norway</option><option value="oman-47609dc08f81df4092ae0ac7e2bd2eb2-1627917393">Oman</option><option value="pakistan-9ed6bde06ed699a1ef2812af4a5fb774-1627917405">Pakistan</option><option value="palau-15cb609ddd06b9a3b94faf3821eb7b91-1627917417">Palau</option><option value="palestinian territory-3b70fe990b066bdceb97f12832705230-16279">Palestinian Territory</option><option value="panama-40725ed981b68180ef40aa9dafbcc183-1627917460">Panama</option><option value="papua new guinea-87bb10c61c5c0b323cd21b88b1e04c90-1627917491">Papua New Guinea</option><option value="paraguay-b0a4adab492cd8516df41244a0d47e33-1627917508">Paraguay</option><option value="peru-1fd1f4ca0314520d53292d0a89c79e53-1627917546">Peru</option><option value="phillipines-31c14e945b359d60decf9130dfb9f68f-1627917576">Phillipines</option><option value="pitcairn-7011aec00075fb62ec4e4745c9d7d760-1627917597">Pitcairn</option><option value="poland-da016174ec329f354790eee8e9ede3ed-1627917613">Poland</option><option value="portugal-e21e7363e5b51bf147840184809e928a-1627917649">Portugal</option><option value="puerto rico-fbfed7c0d5cb22df3899e562fa1202c9-1627917682">Puerto Rico</option><option value="qatar-dfee007bc76e5af8d336f560ba2c5881-1627917696">Qatar</option><option value="réunion-54d5e1c01d69f58d864fb454d0819a7b-1627917720">Réunion</option><option value="romania-f7ab011138b815176e5e334758d2269e-1627917732">Romania</option><option value="russia-836935caaaf5cc62f2a32e33a81f60b3-1627917743">Russia</option><option value="rwanda-6220937d751589ac2c9c4984a4c0e9a5-1627917758">Rwanda</option><option value="saint helena, ascension &amp; tristan da cunha-da94feabd2ae7">Saint Helena, Ascension &amp; Tristan Da Cunha</option><option value="saint kitts &amp; nevis-bd384c7e553ce028be14f9088612210a-162">Saint Kitts &amp; Nevis</option><option value="saint lucia-fe2ae27a2e65b88c88d185bdcb5fa66c-1627917855">Saint Lucia</option><option value="saint pierre and miquelon-b28880c178f273efaf8826cbb9a25267-1">Saint Pierre And Miquelon</option><option value="saint vincent &amp; the grenadines-e219c7c01c21d55b2c21424f2">Saint Vincent &amp; The Grenadines</option><option value="samoa-4d0a0b9ec74242b95d31d7ebbd0cefbb-1627917952">Samoa</option><option value="san marino-be3d90338373e3279f9bab4c0012c7c6-1627917969">San Marino</option><option value="sao tome &amp; principe-48aafe7c69dcfb3a6a2a6ed464fdb890-162">Sao Tome &amp; Principe</option><option value="saudi arabia-d9024b8d3d6c0966a3865ec1deaa6d16-1627918004">Saudi Arabia</option><option value="senegal-14cb1ccf0d89bc053a777702a4d0831f-1627918015">Senegal</option><option value="serbia-2e288ddf5b737bdf2ff247044bd8d458-1627918033">Serbia</option><option value="seychelles-a7e4c460567beee3c809ce20befef4f9-1627918055">Seychelles</option><option value="sierra leone-b3b79400ad91d006d37c4c09c5c9fe4c-1627918082">Sierra Leone</option><option value="singapore-70733462fc7bbfb126ca104a7dfdb2a2-1627918110">Singapore</option><option value="slovakia-79618c9be45f3ce828c5fc07ce5d0b32-1627918128">Slovakia</option><option value="slovenia-6a4148f87a2587a8bce859d09ee26380-1627918157">Slovenia</option><option value="solomon islands-69e4081605c7dc6c0bcd978fae957b06-1627918174">Solomon Islands</option><option value="somalia-61ac43d906efa82237384e0d39bd8cbf-1627918193">Somalia</option><option value="south africa-05a62d42742e3b247997094d3ddd9529-1627918204">South Africa</option><option value="south georgia &amp; the south sandwich islands-fb28900973245">South Georgia &amp; The South Sandwich Islands</option><option value="south sudan-0a9b41775f381e76b0d7995a361daff3-1627918256">South Sudan</option><option value="spain-5445c51c9ef97ac9dc83af5c62d23fa3-1627918286">Spain</option><option value="sri lanka-5c80d0797354ff4766c7dedf43082512-1627752644">Sri Lanka</option><option value="sudan-4d936258c0a9d7888f5a8e4f883649d0-1627918301">Sudan</option><option value="suriname-7c3bdb8433782ed9d353814916a6e025-1627918315">Suriname</option><option value="svalbard &amp; jan mayen-ae50a0abf2f8b6e989bdf2038c1f99d7-16">Svalbard &amp; Jan Mayen</option><option value="swaziland-466bbed2607a2b7a987635d0100b0cdb-1627918353">Swaziland</option><option value="sweden-4b4dd5ea7a7bc5651d9ed8b746033db1-1627918362">Sweden</option><option value="switzerland-9bff4c9009d1ad19cd1e323a82c22a51-1627918421">Switzerland</option><option value="syrian arab republic-e7e33d20a56c7a7a7bc33adfc6e46d4d-162791">Syrian Arab Republic</option><option value="taiwan-948a78c14fc4f7fc5228e2f05a1cbd33-1627918529">Taiwan</option><option value="tajikistan-f2018f3964e1fc118c2eeb9463c3d14f-1627918545">Tajikistan</option><option value="tanzania-b4f1e332fdad868e860dc72ee4b2c81a-1627918573">Tanzania</option><option value="thailand-77209728efea32c8b1d3991564d22f0d-1627918584">Thailand</option><option value="timor-leste-fbacd6e59531e38aaca8e470b04c9f7b-1627918604">Timor-leste</option><option value="togo-735cbc7e331d36731ad9cae41423f8cd-1627918661">Togo</option><option value="tokelau-7f74bd8fadbd1b49f5484434a26bca2c-1627918693">Tokelau</option><option value="tonga-4b5d4142ee70483f402a2766c9ab23ea-1627918705">Tonga</option><option value="trinidad &amp; tobago-84299d295367a2093eb80673e6f91077-16279">Trinidad &amp; Tobago</option><option value="tunisia-b03790a1941ae6a5682803c77be11348-1627918735">Tunisia</option><option value="turkey-22f26e4d762a78565254a23ffdf1dab3-1627918747">Turkey</option><option value="turkmenistan-e379021d270195c52437c52516567f64-1627918767">Turkmenistan</option><option value="turks &amp; caicos islands-a6dd3bde19124deebf1fe2b059348100-">Turks &amp; Caicos Islands</option><option value="tuvalu-2f1b1ae167236bff60fc4c6d5b84fe00-1627918808">Tuvalu</option><option value="uganda-0f3aaca0f5a4a23db2effa7e1542e21c-1627918818">Uganda</option><option value="ukraine-6ea2f5010f3825a951262fa5cec49726-1627918827">Ukraine</option><option value="united arab emirates-7eb986de9eb4a68c69f4ad410e5684b4-162791">United Arab Emirates</option><option value="united kingdom-7c25d93a5dc371b43d410ec77d9896d5-1627753920">United Kingdom</option><option value="united states-133347a4cfd6eeca9da221948acde825-1627918864">United States</option><option value="united states minor-3080a7f1015131a785f93fa468af3af0-1627918">United States Minor</option><option value="uruguay-362beb06b84337bacb26805be276492c-1627918919">Uruguay</option><option value="uzbekistan-74b9aba17b03e407f66ecbf56f6b03ce-1627918935">Uzbekistan</option><option value="vanuatu-6d1609c54ff3e635c1468e3a8dabee06-1627918956">Vanuatu</option><option value="venezuela-ed156838f25aa0ed74b06f69ea4ea99b-1627918975">Venezuela</option><option value="vietnam-4590592176ecdbdef4850c0ab016e5e9-1627918990">Vietnam</option><option value="virgin islands, british-2610cf02aa263357cd284e1af1993e2b-162">Virgin Islands, British</option><option value="virgin islands, u.s.-f4c21170a33ff633beaf5f8c2ddee0a0-162791">Virgin Islands, U.S.</option><option value="wallis &amp; futuna-715a5acfef79eab8745cd6104a67a441-1627919">Wallis &amp; Futuna</option><option value="western sahara-310b549c9842b9842e2c9cd96555a283-1627919174">Western Sahara</option><option value="yemen-5d6084503ef51a276c2c1b22ed095c2d-1627919189">Yemen</option><option value="zambia-f86768453e809eea20e29c5877e65d3e-1627919200">Zambia</option><option value="zimbabwe-60b4efebe8ab67025fed29ab663832a9-1627919212">Zimbabwe</option>						
						</select>
					</div>
					</div>
				</div>
				<div class="modal-body" style="min-height:unset;border-bottom:1px solid #dee2e6;padding-top:7px;padding-bottom:7px;">
				    <div class="form-row">
					<div class="form-group form-group-sm col-sm-6">
						<label for="tel">Mobile Number*</label>
						<input type="tel" data-number="" name="phone" maxlength="11" id="tel" placeholder="Mobile Number..." class="form-control" required="" value="<?=$row['phone']?? ''?>">
					</div>
					<div class="form-group form-group-sm col-sm-6">
						<label for="emp">Employment Status*</label>
						<select name="work" class="form-control" id="emp" required="">
						    <option value="<?=$row['work']?? ''?>"><?=$row['work']?? 'Employee Status'?></option>
						    <option value="emp">Employee</option>
						    <option value="self">Self Employed</option>
						    <option value="work">Public Servant</option>
						    <option value="non">Unemployed</option>
						</select>
					</div>
					<div class="form-group form-group-sm col-sm-6">
						<label for="inc">Monthly Income(estimated <strong>USD value</strong>)*</label>
						<input type="number" data-amount="" data-min="10" name="salary" maxlength="8" id="inc" placeholder="Monthly Income..." class="form-control" required="" value="<?=$row['salary']?? ''?>">
					</div>
					<div class="form-group form-group-sm col-sm-6">
						<label for="com">Company <small>(Optional)</small></label>
						<input type="text" name="company" maxlength="50" id="com" placeholder="Company..." class="form-control" value="<?=$row['company']?? ''?>">
					</div>
					
					</div>
				
				  <p style="margin:0px 5px;text-align:center;line-height:0.9;"><small class="text-danger" data-ccerror=""></small></p>
	              <div class="form-group mb-0" align="center">
	                  <button class="btn btn-sm btn-warning" type="submit" name="updateInfo">Save <i class="la la-check-circle"></i></button>
	              </div>
	            </div>
	            </form>

				
	            <div class="modal-footer py-1">    
	                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close <i class="la la-times-circle"></i></button>		
	            </div> 
	        </div> 
	    </div>
    </div>
</div></div>
</div>
<script src="assets/js/core/jquery.3.2.1.min.js"></script><script src="assets/js/core/popper.min.js"></script><script src="assets/js/core/bootstrap.min.js" defer></script><script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js" defer></script><script src="assets/js/ready.min.js" defer></script>
<script src="assets/js/demo.js?v=0.09ASDghshjsdTYHGHGskjj" defer></script>
<!-- <script> $(window).on("load", function(){ setTimeout(function(){ var preloader = $(document).find('#preloader'); preloader.delay().fadeOut(); }, 1000); setTimeout(function(){ $(document).find("[data-href]").each(function(){ var me = $(this); var link = me.attr("data-href"); me.attr("href",link); }); }, 500); });</script> -->
<!--Start of Tawk.to Script-->
<!-- <script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script> -->
<!--End of Tawk.to Script--></body></html>