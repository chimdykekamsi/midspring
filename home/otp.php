<?php ob_start(); ?>

<?php
 include_once 'includes/auth.php';

		     if(isset($_GET['resend'])){
		     
		    		   	            	 
			        $otp = verificationCode(6);
				
				    @mysqli_query($con, "UPDATE users SET otp=$otp, otpstatus=0 WHERE id=$session_id");	
				
				//   $data = "OTP Already Sent!<br> Please wait for 9 Minutes & try again!";
				            $data = array('name'=> ucfirst($fname), 'otp' => $otp, 'date' => date('Y-m-d'), 'time' => date('H:i:sa'));
				            
				            $reciver_email = $uxid;
                            $receiver_name =  $fname;
                            $subject = 'Login OTP';
                            $template = file_get_contents("otp_mail.php");
                            
                            foreach($data as $key => $value){
                                $template = str_replace('{{ '.$key.' }}', $value, $template);
                            }
                                                    
                            $headers = 'MIME-Version: 1.0'."\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                            $headers .= "From: noreply@midspringinc.com"; 

                          @mail($reciver_email, $subject, $template, $headers);

                            
                            
                        require_once("includes/phpmailer/class.phpmailer.php");
			  
        				$mail = new PHPMailer(); // defaults to using php "mail()"
        				
        				$mail->IsSMTP(); 
        				$mail->SMTPDebug  = 0;                     
        				$mail->SMTPAuth   = true;                  
        				$mail->SMTPSecure = "ssl";                 
        				$mail->Host       = "mail.midspringinc.com";      
        				$mail->Port       = 465;             
        
                       
        				$mail->AddAddress($uxid);
        				$mail->Username="noreply@midspringinc.com";  
        				$mail->Password="KQaAY9&^WG79";            
        				$mail->SetFrom('noreply@midspringinc.com','MidSpring Bank');
        				$mail->AddReplyTo("noreply@midspringinc.com","MidSpring Bank");
        				$mail->Subject = "Login OTP!";
        				$mail->MsgHTML($template);
        				$mail->Send();
				
				             $data = [ 'status' => true, 'message' => "success"];
                   
	 					header("Location: otp");

        		     }
		  
		  
function verificationCode($length)
	{
		if ($length == 0) return 0;
		$min = pow(10, $length - 1);
		$max = 0;
		while ($length > 0 && $length--) {
			$max = ($max * 10) + 9;
		}
		return random_int($min, $max);
	}


?>
<!DOCTYPE html><html lang="zxx"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,user-scaleable=0,maximum-scale=1.0"><meta name="robots" content="noindex" /><meta name="googlebot" content="noindex" /><!-- Meta Tags --><link rel="apple-touch-icon" href="https://stxx.lakefinancebank.com/img/apple-touch-icon.png?v=0.09ASDghs76hgdyHDSGS767SADDDGD"><link rel="apple-touch-icon" sizes="72x72" href="https://stxx.lakefinancebank.com/img/apple-touch-icon-72x.png?v=0.09ASDghs76hgdyHDSGS767SADDDGD"><link rel="apple-touch-icon" sizes="144x144" href="https://stxx.lakefinancebank.com/img/apple-touch-icon-144x.png?v=0.09ASDghs76hgdyHDSGS767SADDDGD"><meta content="Midspring Bank believes in providing international banking services that are regulated, fast, affordable, and secure. We specialises in managing transactions for individuals and businesses throughout the Europe, we also have hundreds of international clients." name="description" /><meta itemprop="name" content="Midspring Bank"> <meta property="og:url" content="https://lakefinancebank.com/start" /> <meta property="og:type" content="website" /><meta property="og:title" content="Open Account" /> <meta property="og:site_name" content="Midspring Bank" /><meta property="og:image" content="https://stxx.lakefinancebank.com/img/main-logo.png?v=0.09ASDghs76hgdyHDSGS767SADDDGD"><meta property="og:description" content="Midspring Bank believes in providing international banking services that are regulated, fast, affordable, and secure. We specialises in managing transactions for individuals and businesses throughout the Europe, we also have hundreds of international clients." /><meta itemprop="description" content="Midspring Bank believes in providing international banking services that are regulated, fast, affordable, and secure. We specialises in managing transactions for individuals and businesses throughout the Europe, we also have hundreds of international clients."> <meta itemprop="image" content="https://stxx.lakefinancebank.com/img/main-logo.png?v=0.09ASDghs76hgdyHDSGS767SADDDGD"> <!-- Styles --><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&amp;family=Lora:wght@400;500;600;700&amp;display=swap" /><link rel="stylesheet" href="https://stxx.lakefinancebank.com/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../stxx.lakefinancebank.com/css/flaticon.css"><link rel="stylesheet" href="../stxx.lakefinancebank.com/css/remixicon.css"> 
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://stxx.lakefinancebank.com/css/flaticon.css"><link rel="stylesheet" href="https://stxx.lakefinancebank.com/css/remixicon.css"> <link rel="stylesheet" href="https://stxx.lakefinancebank.com/css/aos.css"><link rel="stylesheet" href="https://stxx.lakefinancebank.com/css/style.css?v=0.09ASDghs76hgdyHDSGS767SADDDGD"> <title>Login Authentication - Midspring Bank</title><link rel="icon" type="image/png" href="https://stxx.lakefinancebank.com/img/favicon.png">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet"> 

</head><body> <div class="page-wrapper"><header class="header-wrap style1"><div class="header-top"><button type="button" class="close-sidebar"><i class="ri-close-fill"></i></button><div class="container"><div class="row align-items-center"><div class="col-lg-7 col-md-12"><div class="header-top-left"><ul class="contact-info list-style"><li><i class="fa fa-phone"></i> <a href="tel:+19165730937">+1(619) 573-0937</a></li><li><i class="fa fa-envelope"></i> <a href="mailto:info@midspring.com">info@midspring.com</a></li><li><i class="fa fa-map-pin"></i><p>121 King St, Texas, USA</p></li></ul></div></div><div class="col-lg-5 col-md-12"><div class="header-top-right"><ul class="header-top-menu list-style"><li><a href="/start">Open Account</a></li><li><a href="/support">Support</a></li></ul><div class="select-lang"><div id="google_translate_element"></div></div></div></div></div></div></div><div class="header-bottom"><div class="container"><nav class="navbar navbar-expand-md navbar-light"><a class="navbar-brand" href="/"><img class="logo-light" src="assets/img/logo.png?v=0.09ASDghshjsdTYHGHGskjj" alt="logo"> </a><div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent"><div class="menu-close xl-none"><a href="javascript:void(0)"> <i class="ri-close-line"></i></a></div><ul class="navbar-nav ms-auto"><li class="nav-item"><a href="/" class="nav-link">Home</a></li><li class="nav-item"><a href="/banking" class="nav-link">Banking</a></li><li class="nav-item"><a href="/about-us" class="nav-link">About Us</a></li><li class="nav-item"><a href="/support" class="nav-link">Support</a></li><li class="nav-item has-dropdown"><a href="#" class="nav-link active">Account<i class="ri-arrow-down-s-line"></i></a><ul class="dropdown-menu"><li class="nav-item"><a href="/login" class="nav-link">Login</a></li><li class="nav-item"><a href="/start" class="nav-link active">Open Account</a></li></ul></li><li class="nav-item xl-none"><a href="/login" class="btn style1">Login</a></li></ul><div class="others-options lg-none"> <div class="header-btn lg-none"><a href="/login" class="btn style1">Login</a></div></div></div></nav><div class="mobile-bar-wrap"><div class="mobile-sidebar mr-2"><i class="ri-menu-4-line"></i></div> <div class="mobile-menu xl-none"><a href="javascript:void(0)"><i class="ri-menu-line"></i></a></div></div></div> </div></header><div class="content-wrapper"><div class="breadcrumb-wrap bg-spring"><img data-src="https://stxx.lakefinancebank.com/img/breadcrumb/br-shape-1.png" alt="" class="br-shape-one xs-none lazy"><img data-src="https://stxx.lakefinancebank.com/img/breadcrumb/br-shape-2.png" alt="" class="br-shape-two xs-none lazy"><img data-src="https://stxx.lakefinancebank.com/img/breadcrumb/br-shape-3.png" alt="" class="br-shape-three moveHorizontal sm-none lazy"><img data-src="https://stxx.lakefinancebank.com/img/breadcrumb/br-shape-4.png" alt="" class="br-shape-four moveVertical sm-none lazy"><div class="container"><div class="row align-items-center"><div class="col-lg-7 col-md-8 col-sm-8"><div class="breadcrumb-title"><h2>Login Authentication</h2><ul class="breadcrumb-menu list-style"><li><a href="/">Home </a></li> <li>Login Authentication</li></ul></div></div><div class="col-lg-5 col-md-4 col-sm-4 xs-none"><div class="breadcrumb-img"><img data-src="https://stxx.lakefinancebank.com/img/breadcrumb/br-shape-5.png" alt="" class="br-shape-five animationFramesTwo lazy"><img data-src="https://stxx.lakefinancebank.com/img/breadcrumb/br-shape-6.png" alt="" class="br-shape-six bounce lazy"> </div></div></div></div></div><section class="Login-wrap ptb-100" id="otp1"><div class="container"><div class="row "><div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1"><div class="login-form-wrap"><div class="login-header"><h3>Login Authentication</h3><p>Welcome! Login your account below using the <b>Code</b> we sent to your email.</p></div><div class="login-form"><div class="login-body"><form class="form-wrap non-files-form" id="login-otp" aria-autocomplete="false" data-type="login-otp" data-sub-url="minor" data-redirect="home" data-suc="Welcome Back! You'll be redirected shortly..." autocomplete="off"><div class="row"><div class="col-lg-12"><div class="form-group"><label for="code">OTP*</label><input id="code" name="token" type="tel" data-number="" autofocus="" placeholder="OTP..." minlength="6" maxlength="6" pattern="[0-9]{6,6}" required></div></div><div class="col-lg-12"><div class="alert text-center"><?php if(isset($data)) { echo $data; } ?> </div></div><div class="col-lg-12"><div class="form-group"><button class="btn style1" type="submit">Proceed</button></div></div><div class="col-md-12"><p class="mb-0">Didn't get a login code? <a class="link style1" href="?resend=<?php echo uniqid(); ?>">Resend</a></p></div></div></form></div></div></div></div></div></div></section></div><footer class="footer-wrap bg-rock"><div class="container"><img data-src="https://stxx.lakefinancebank.com/img/footer-shape-1.png" alt="" class="footer-shape-one lazy"><img data-src="https://stxx.lakefinancebank.com/img/footer-shape-2.png" alt="" class="footer-shape-two lazy"><div class="row pt-100 pb-75"><div class="col-xl-4 col-lg-4 col-md-6 col-sm-6"><div class="footer-widget"><a href="/" class="footer-logo"><img src="https://stxx.lakefinancebank.com/img/logo-white.png?v=0.09ASDghs76hgdyHDSGS767SADDDGD" alt="Image"></a><p class="comp-desc">Midspring Bank is a brand of Secure Nordic Payments, with its main office in Texas, USA. Midspring Bank is registered as an Electronic Money Institution (EMI), and is regulated by the Bank of USA (license No. 11).</p><div class="social-link"><ul class="social-profile list-style style1"><li> <a target="_blank" href="https://facebook.com/"><i class="ri-facebook-fill"></i></a></li></li><li><a target="_blank" href="https://instagram.com/"><i class="ri-pinterest-fill"></i></a></li></ul></div></div></div><div class="col-xl-3 col-lg-3 col-md-6 col-sm-6"><div class="footer-widget"><h3 class="footer-widget-title">Our Company</h3><ul class="footer-menu list-style"><li><a href="about-us.html"><i class="fa fa-arrow-right"></i>About Us</a></li><li><a href="banking.html"><i class="fa fa-arrow-right"></i>Banking</a></li><li><a href="support.html"><i class="fa fa-arrow-right"></i>Support</a></li><li><a href="login.php "><i class="fa fa-arrow-right"></i>Login</a></li><li> <a href="start.php"><i class="fa fa-arrow-right"></i>Open Account</a></li></ul></div></div><div class="col-xl-2 col-lg-2 col-md-6 col-sm-6"></div><div class="col-xl-3 col-lg-3 col-md-6 col-sm-6"><div class="footer-widget"><h3 class="footer-widget-title">Subscribe</h3><p class="newsletter-text">Subscribe to our newsletter & get personal updates regarding our banking services.</p><form action="#" id="newsletter" class="newsletter-form"><input type="email" placeholder="Your Email..." name="email" required><button type="button">Subscribe</button></form></div></div></div></div><div class="copyright-text"><p> <i class="ri-copyright-line"></i> 2022 - All Rights Reserved By <a href="" target="_blank">Midspring Inc</a></p></div></footer></div><a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a><script src="https://stxx.lakefinancebank.com/js/jquery.min.js"></script><script src="https://stxx.lakefinancebank.com/js/bootstrap.bundle.min.js" defer></script> <script src="https://stxx.lakefinancebank.com/js/aos.js"></script> <script src="https://stxx.lakefinancebank.com/js/odometer.min.js"></script> <script src="https://stxx.lakefinancebank.com/js/jquery.appear.js"></script> <script src="../stxx.lakefinancebank.com/js/main4930.js?v=0.09ASDghs76hgdyHDSGS767SADDDGD" defer></script><script> (function($){ $(document).find('html, body').animate({ scrollTop: $(document).find("#otp1").offset().top }, 300); })(jQuery);</script><!--Start of Tawk.to Script-->
<script src="//code.tidio.co/d4ymu0tb2cizdrr0qphekc42ctxw0o5t.js" async></script>
<!--End of Tawk.to Script--> </body></html>