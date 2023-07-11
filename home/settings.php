<?php
 include_once 'functions/user_func.php';
 $session_id = $_SESSION['id'];

$user_query = mysqli_query($link, "select * from users where acc_number='$session_id'")or die(mysqli_error($link));
$row = mysqli_fetch_array($user_query);	
?>
<!DOCTYPE html>
<html class="__fb-dark-mode">
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Settings - Midspring Bank</title>

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

</div></nav></div><div class="sidebar" style="background-image:url('assets/img/1.png');"><div class="scrollbar-inner sidebar-wrapper"><ul class="nav" id="memenu"><li class="nav-item"><a href="home" aside><i class="fa la-home"></i><p>Dashboard</p></a></li><li class="nav-item"><a href="deposit" aside><i class="fa la-btc"></i><p>Crypto Deposit</p></a></li><li class="nav-item"><a href="loan" aside><i class="fa la-diamond"></i><p>Loans</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="domestic" aside><i class="fa la-bank"></i><p>Domestic Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="interbank" aside><i class="fa la-refresh"></i><p>InterBank Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="transfer" aside><i class="fa la-refresh"></i><p>Wire Transfer</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="statement" aside><i class="fa la-bar-chart"></i><p>My Statement</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="settings" aside><i class="fa la-user"></i><p>Account</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="support"><i class="fa la-support"></i><p>Support</p><!--<span class="badge badge-count">14</span>--></a></li><li class="nav-item"><a href="logout" aside><i class="fa la-power-off"></i><p>Logout</p><!--<span class="badge badge-count">14</span>--></a></li></ul></div></div>

<div class="main-panel"><div class="content" style="min-height:81vh;padding-top:12px;" id="my-view">
        <div class="container-fluid">                
            <div class="row">
                
                <div class="col-12">
                    <h4 class="page-title text-warning mb-0" align="center"><i class="fa la-user"></i> Account</h4>
                    <p class="mb-4" align="center">Manage your Personal Information &amp; Security Settings below.</p>
                </div>

                <div class="col-12 col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                        
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true"><i class="fa la-user"></i> Personal</a>
                                    <a class="nav-item nav-link" id="nav-sec-tab" data-toggle="tab" href="#nav-sec" role="tab" aria-controls="nav-sec" aria-selected="false"><i class="fa la-lock"></i> Security</a>
                                </div>
                            </nav>
                            
                            
                            <div class="tab-content" id="nav-tabContent">
                            
                                <!-- Profile -->
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <p class="lead mt-1 col-12 col-md-10 mx-auto" align="center"><small>Update your <b>Account Picture</b> or update your <b>Personal Information</b>.</small></p>
                                    <?php
                                        if (isset($_POST['updatePass'])) {
                                            $post = [];
                                            $post['oldpassword'] = $_POST['opass'];
                                            $post['newpassword'] = $_POST['npass'];
                                            $post['repassword'] = $_POST['rpass'];

                                            echo changePassword($post);
                                        }
                                    ?>
                                    
                                    
                                    <div class="row">
                                        <div class="col-12 col-md-4 pt-3" align="center">
                                                <img accept="image/*" src="assets/img/profile/<?=$row['photo']?? 'profile.png'?>" style="border-radius: 50%;width: 120px;height:120px;" alt="" data-picture="" id="dis">
                                                <form action="" method="post" enctype="multipart/form-data">
				                                    <div class="form-group">
							                            <input type="file" class="form-control input-pill" name="pics" required="" id="img">
						                            </div>
						                            <div class="form-group pt-0" align="center">
						                                <button type="submit" class="btn btn-warning btn-sm btn-round" name="updateI">Change</button>
						                            </div>
                                                </form>
                                                <?php
                                                if (isset($_POST['updateI'])) {
                                                   $result = updateImage();
                                                    echo $result;
                                                }
                                            ?>
                                            <script>
                                                var img = document.getElementById('img')
                                                img.addEventListener('change',display);
                                                function display(){
                                                   let imgLink = URL.createObjectURL(img.files[0]);
                                                   document.getElementById('dis').src = imgLink;
                                                }
                                            </script>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <form action="" id="" method="post">
				                                <div class="form-group">
							                        <label for="aname">Full Name*</label>
							                        <input type="text" class="form-control input-pill" id="aname" placeholder="Full Name*" value="<?php echo $row['fullname']; ?>" disabled="">
						                        </div>
						                        <div class="form-group">
							                        <label for="amail">Email*</label>
							                        <input type="email" class="form-control input-pill" id="amail" placeholder="Email..." value="<?php echo $row['email']; ?>" disabled="">
						                        </div>
						                        <div class="form-group">
							                        <label for="amail">Transaction pin*</label>
							                        <input type="text" class="form-control input-pill" id="pin" placeholder="Pin..." value="<?php echo $row['acc_pin']; ?>" name="pin" maxlength="5" minlength="5">
						                        </div>
						                        <div class="form-group">
							                        <label for="addr">Address*</label>
							                        <textarea class="form-control input-pill" id="addr" name="addr" placeholder="Address*" rows="1" required=""><?php echo $row['address']; ?></textarea>
						                        </div>
						                        
						                     <div class="form-group">
							                        <label for="addr">Country*</label>    
						                 <select name="country" required class="form-control input-pill"val>
                                <option value="<?=$row['country']??""?>"><?=$row['country']??"Select Country"?></option>
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            </div>
						                        <div class="form-group" align="center">
						                            <button type="submit" class="btn btn-warning btn-sm btn-round" name="updateP">Update Profile</button>
						                        </div>
						                    </form>
                                            <?php
                                                if (isset($_POST['updateP'])) {
                                                    $post = [];
                                                    $post['pin'] = $_POST['pin'];
                                                    $post['addr'] = $_POST['addr'];
                                                    $post['country'] = $_POST['country'];
                                                    // var_dump($post);
                                                   $result = updateProfile($post);
                                                    echo $result;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Security -->
                                <div class="tab-pane fade" id="nav-sec" role="tabpanel" aria-labelledby="nav-sec-tab">
                                    <p class="lead mt-1 col-12 col-md-8 mx-auto" align="center"><small>Update your <b>Account Security</b> information using the form below.</small></p>
                                    
                                    <div class="col-12 col-md-9 mx-auto">
							        <form action="" method="post">
							            <div class="form-group">
							                <label for="amail">E-mail*</label>
							                <input type="text" class="form-control input-pill" id="amail" name="mail" placeholder="E-mail*" value="<?php echo $row['email']; ?>" disabled="">
						                </div>
				                        <div class="form-group">
							                 <label for="opass">Old Password*</label>
							                 <input type="password" class="form-control input-pill" id="opass" name="opass" placeholder="Old Password*" required="">
						                </div>
						                <div class="form-group">
							                 <label for="npass">New Password*</label>
							                 <input type="password" class="form-control input-pill" id="npass" name="npass" placeholder="New Password*" required="">
						                </div>
						                <div class="form-group">
							                 <label for="rpass">Repeat Password*</label>
							                 <input type="password" class="form-control input-pill" id="rpass" name="rpass" placeholder="Repeat Password*" required="">
						                </div>
                                       
						                
						                        <div class="form-group" align="center">
						                            <button type="submit" class="btn btn-warning btn-sm btn-round" name="updatePass">Update</button>
						                        </div>
						            </form>

                                    
						            </div>
                                </div>
                                
                                
                            </div>
                        
                        </div>
                    </div>
                </div>

<script>

</script>


            </div>
        </div>
</div></div>
</div><script src="assets/js/core/jquery.3.2.1.min.js"></script><script src="assets/js/core/popper.min.js"></script><script src="assets/js/core/bootstrap.min.js" defer></script><script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js" defer></script><script src="assets/js/ready.min.js" defer></script></script>
<!-- <script src="assets/js/demo.js?v=0.09ASDghshjsdTYHGHGskjj" defer></script> -->
<script> $(window).on("load", function(){ setTimeout(function(){ var preloader = $(document).find('#preloader'); preloader.delay().fadeOut(); }, 1000); setTimeout(function(){ $(document).find("[data-href]").each(function(){ var me = $(this); var link = me.attr("data-href"); me.attr("href",link); }); }, 500); });</script>
<script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script></body></html>