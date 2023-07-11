<?php
 include_once 'includes/auth.php';
	
    define('TIMEZONE', 'Africa/Lagos');
	date_default_timezone_set(TIMEZONE);
	
	//connect
	   if(!empty($_POST['ref'])) {
            
		$ref = strip_tags($_POST['ref']);
		
		
		$now = date('Y-m-d H:i:s');

			// Fetch Users To Pay Today
			$getf = mysqli_query($con, "SELECT * FROM deposits where trx='$ref'");
			
			$auto_data = mysqli_fetch_array($getf);
			
			
			
			$coin = $auto_data['payment_mode'];
			
			$user = $auto_data['user'];
			
			$amount  = $auto_data['amount'];
			
			$account = $auto_data['account_id'];
				
			$result14 = mysqli_query($con, "SELECT * FROM accounts where id='$account' and user='$session_id'");
				
			$getrow = mysqli_fetch_array($result14);
			
			
			if($getrow['account_type'] == 'USD') { 
				
				$symbol = '$';
				
				} elseif($getrow['account_type'] == 'GBP') { 
				
				$symbol =  '£';
				
				} else {
				$symbol = '€';
				} 
		
			if($coin == 'btc') {
				
			$api = "https://blockchain.info/ticker";
			$json = file_get_contents($api);
			$data = json_decode($json, TRUE);
			$rate = $data["USD"]["15m"];
			$symbol = $data["USD"]["symbol"];

			$buatdpnyax = round(($amount) * (1/ $rate), 8);
			
			$address = '1DJ8ZpV4wvCTYd8mHskxbCHWbaopXGqQYZ';
				
			$coin_name = 'Bitcoin';
			
			
			} else if($coin == 'eth'){
				
			$url_usdx = "https://api.binance.com/api/v3/ticker/price?symbol=ETHUSDT";
         
           $header = array();

           $eth_usdx = json_decode(initGetCurl($url_usdx, $header));

           $eth_usdd = $eth_usdx->price;
		   
			$coin_name = 'Ethereum';
		  
			$buatdpnyax =  round($amount / $eth_usdd, 8);

		    $address = '0x3ea1a078fda6d918c7fe14e98259a47d002eb33b';
			} else {
			
			$coin_name = 'USDT';
			$url_usdx = "https://api.binance.com/api/v3/ticker/price?symbol=TUSDUSDT";
         
           $header = array();

           $eth_usdx = json_decode(initGetCurl($url_usdx, $header));

           $eth_usdd = $eth_usdx->price;
		   			
			$buatdpnyax =  round($amount / $eth_usdd,8);

				$address = 'TWtj3MRFLKU6aE2ecNEqWgrdyYS7g9GxGU';	
			}

						
						
			$content = '<p class="lead" align="center"><small>Transfer a total of <b>'.$buatdpnyax.''.$coin.'<small>('.$symbol.$amount.')</small></b> to the <b>'.$coin_name.' Address</b> displayed below.<br>Your <b>'.$acct.' Account</b> will be <b>Credited</b> as soon as your payment is confirmed.</small></p>
            <style>.qr-holder a[data-download]{position:absolute;z-index:10;padding:.2rem;font-size:10px;bottom:88px;right:55px}</style>
            <div class="row mt-4">
            <div class="col-12 col-md-4 mx-auto">
              <div class="qr-holder" align="center">
                <img class="card" id="qr-code" src="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount='.$buatdpnyax.'" style="height:160px;width:160px;padding:8px;" alt=""> 
                <a class="btn btn-success btn-xxs" href="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount='.$buatdpnyax.'" download="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount='.$buatdpnyax.'" target="_blank" data-download="qr-code">Download <i class="la la-download"></i></a>
              </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="form-group">
                    <label for="btc">Payment Address*</label>
                    <input type="text" name="btc" id="btc" class="form-control" value="'.$address.'" data-suc="Wallet Address Copied Successfully!" copytext="" readonly="">
                </div><div class="form-group mt-3" align="left">
                    <b>Amount: </b><b>'.$buatdpnyax.'btc <small>('.$symbol.$amount.')</small></b>
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
			
			$data = [ 'status' => true, 'data' => $content, 'ref' => $ref, 'message' => "success"];
           
			header('Content-type: application/json');
          
     		echo json_encode( $data );
			
			exit();	

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