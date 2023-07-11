<?php
 include_once 'includes/auth.php';
		
	   if(!empty($_POST['invest'])) {
            
		$acct = strip_tags($_POST['acct']);
		$amount = strip_tags($_POST['amt']);
		$coin = strip_tags($_POST['coin']);
		$invest = strip_tags($_POST['invest']);
		
					
			$result14 = mysqli_query($con, "SELECT * FROM accounts where user_id='$session_id' and account_type='$acct'");
				
			$getrow = mysqli_fetch_array($result14);
		
			if(mysqli_num_rows($result14) > 0){

			$uid = verificationCode(12);
			
			$acount_id = $getrow['id'];
			
			if($getrow['account_type'] == 'USD') { 
													
			$symbol = '$';
			
			} elseif($getrow['account_type'] == 'GBP') { 
			
			$symbol = '£';
			
			} else {
			$symbol = '€';
			} 
			
			
			@mysqli_query($con, "INSERT INTO deposits(trx, user, acoount_id, amount, payment_mode, status) VALUES('$uid','$session_id', '$acount_id', '$amount', '$coin','pending')");
			
			
			if($coin === 'btc') {
				
			$api = "https://blockchain.info/ticker";
			$json = file_get_contents($api);
			$data = json_decode($json, TRUE);
			$rate = $data["USD"]["15m"];
			$symbolx = $data["USD"]["symbol"];

			$buatdpnyax = round(($amount) * (1/ $rate), 8);
			
			$address = '1DJ8ZpV4wvCTYd8mHskxbCHWbaopXGqQYZ';
				
			$coin_name = 'Bitcoin';
			
			
			} elseif($coin === 'eth') {
			    
			$coin_name = 'Ethereum';
		  
			$buatdpnyax =  $amount; //round(($amount) * (1/ 1501.72000), 8);

		    $address = '0x3ea1a078fda6d918c7fe14e98259a47d002eb33b';
			
			    
			} else {
			
			
	       /*	$url = 'https://api.binance.com/api/v3/ticker/price?symbol=TUSDUSDT';  //Google Qrcode link
            
            $header = array();
    
            $ch = curl_init();
            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL, "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd");
            curl_setopt($ch, CURLOPT_HEADER, false);
            
           */
           
           	$coin_name = 'USDT';

			$buatdpnyax =  $amount; //round(($amount) * (1/ 0.99990000), 8);

			$address = 'TWtj3MRFLKU6aE2ecNEqWgrdyYS7g9GxGU';	
		
			}

			$qrcode = base64_encode('https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount='.$buatdpnyax);
				
			
				$content = '<p class="lead" align="center"><small>Transfer a total of <b>'.$buatdpnyax.''.$coin.'<small>('.$symbol.$amount.')</small></b> to the <b>'.$coin_name.' Address</b> displayed below.<br>Your <b>'.$acct.' Account</b> will be <b>Credited</b> as soon as your payment is confirmed.</small></p>
            <style>.qr-holder a[data-download]{position:absolute;z-index:10;padding:.2rem;font-size:10px;bottom:88px;right:55px}</style>
            <div class="row mt-4">
            <div class="col-12 col-md-4 mx-auto">
              <div class="qr-holder" align="center">
                <img class="card" src="'.$qrcode.'" style="height:160px;width:160px;padding:8px;" alt=""> 
                <a class="btn btn-success btn-xxs" href="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount='.$buatdpnyax.'" download="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount='.$buatdpnyax.'" target="_blank" data-download="qr-code">Download <i class="fa la-cloud"></i></a>
              </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="form-group">
                    <label for="btc">Payment Address*</label>
                    <input type="text" name="btc" id="btc" class="form-control" value="'.$address.'" data-suc="Wallet Address Copied Successfully!" copytext="" readonly="">
                </div>
                <div class="form-group mt-3" align="left">
                    <b>Amount: </b><b>"""'.$buatdpnyax.'"""<small>('.$symbol.$amount.')</small></b>
                </div><div class="form-group mt-3" align="left">
                    <b>Purpose: </b><b>Crypto Deposit</b>
                </div>
                <div class="form-group mt-3" align="left">
                    <b>Coin: </b><b>'.$coin_name.'</b>
                </div><div class="form-group mt-3" align="left">
                    <b>Account: </b><b>'.$acct.' Account</b>
                </div><div class="form-group mt-3" align="left">
                    <b>Status:</b> <button style="padding: .4rem;line-height: 13px;" class="btn btn-info btn-sm">Awaiting Payment</button>
                </div>                
                
            </div>
            </div>';
            
            
             $data = array('name'=> ucfirst($fname), 'trx' => $uid, 'amount' => $buatdpnyax, 'symbol' => $coin, 'status' => 'Pending', 'content' => ' is <b>Pending</b>. Kindly make payment within <b>30 Minutes</b>.', 'date' => date('Y-m-d'), 'time' => date('H:i:sa'));
				        
				       
                        $template_welcome = file_get_contents("payment.php");
                            
                            foreach($data as $key => $value){
                                $template_welcome = str_replace('{{ '.$key.' }}', $value, $template_welcome);
                            }
                            
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
        				$mail->Subject = "Payment Pending!";
        				$mail->MsgHTML($template_welcome);
        				$mail->Send();
        				
			
			 $data = [ 'status' => true,  'data' => $content, 'ref' => $uid, 'message' => "success", 'ddd'=> $qrcode];
           
			header('Content-type: application/json');
          
     		echo json_encode( $data );
			
			exit();	
			
			} else {
							
			$data = [ 'status' => false, 'message' => "Empty field<br>
			Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			
		}
	
		} else {
		  
		  $data = [ 'status' => false, 'message' => "Empty fields <br>Please Check & Try Again."];
           
		   header('Content-type: application/json');
          
     		echo json_encode( $data );
			exit();
			  
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
	
	function initGetCurl($url, $header){
        $ch = curl_init($url);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);
        if (curl_error($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

?>