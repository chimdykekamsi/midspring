<?php
require_once "config.php";

function user_register($post)
{
    $fullname = isset($post['fullname']) ? sanitize($post['fullname']) : '';
    $email = isset($post['email']) ? sanitize($post['email']) : '';
    $acc_type = isset($post['acc_type']) ? sanitize($post['acc_type']) : '';
    $password = isset($post['password']) ? sanitize($post['password']) : '';
    $confirm_pwd = isset($post['confirm_pwd']) ? sanitize($post['confirm_pwd']) : '';

    $errors = [];

    if (empty($fullname)) {
        $errors[] = "Enter fullname!";
    }

    if (empty($email)) {
        $errors[] = "Enter email!";
    }

    if (empty($acc_type)) {
        $errors[] = "Enter account type!";
    }

    if (empty($password)) {
        $errors[] = "Enter password!";
    }

    if (empty($confirm_pwd)) {
        $errors[] = "Confirm password!";
    }

    if ($password !== $confirm_pwd) {
        $errors[] = "Passwords do not match!";
        return $errors[0];
    }

    if (!empty($errors)) {
        return $errors;
    }

    $fullname = sanitize($fullname);
    $email = sanitize($email);
    $acc_type = sanitize($acc_type);
    $password = encrypt(sanitize($password));

    // Generating account number...
    $account_number = generateNumber(10);
    $account_pin = generateNumber(5);

    $sql = "INSERT INTO users (fullname, email, acc_type, acc_number, password, acc_pin, created_at, updated_at) VALUES ('$fullname', '$email','$acc_type', '$account_number', '$password', '$account_pin', now(), now())";

    
    try {
        $result = validateQuery($sql);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $errorMessage = $e->getMessage();
            if (strpos($errorMessage, 'Duplicate entry') !== false) {
                return "<span style='color:red;font-size:15px'> '$email' has already been registered to an account. <a href='login'>login instead</a></span>";
            } else {
                return "<span style='color:red'> Error: " . $errorMessage . "</span>";
            }
        } else {
            return "<span style='color:red'> Error: " . $e->getMessage() ."</span>";
        }
    }

    if (!$result) {
        return ["Error occurred while registering user."];
    }

    for ($i = 1; $i <= 3; $i++) {
        $acc_number = generateNumber(10);
        $acc_type = '';

        switch ($i) {
            case 1:
                $acc_type = 'GBP';
                break;
            case 2:
                $acc_type = 'USD';
                break;
            case 3:
                $acc_type = 'EUR';
                break;
        }

        $sql = "INSERT INTO accounts (user_id, account_type, account_number, created_at, updated_at) VALUES ('$account_number', '$acc_type', '$acc_number', now(), now())";

        $res = validateQuery($sql);

        if (!$res) {
            // Handle error if account insertion fails
            return ["Error occurred while creating user accounts."];
        }
    }

    $_SESSION['id'] = $account_number;

    $message = "
        <html>
        <head>
        <title>Welcome</title>
        </head>
        <body>
        <div style='padding: 10px; border: 1px 1px 1px solid; border-radius: 10px;'>
            <p>Hello! Welcome to swissapexfinancial. The bank that serves all customers equally on a daily basis. We are glad you chose us!</p>
            <p>Your details are as follows:</p>
        </div>
        <table class='table table-bordered table-responsiveness' border='1'>
        <tr>
        <th>Account Number</th>
        <th>Account Pin</th>
        <th>Account Type</th>
        </tr>
        <tr>
        <td>$account_number</td>
        <td>$account_pin</td>
        <td>$acc_type</td>
        </tr>
        </table>
        <p>
            <i>Thank you for choosing swiss apex financial</i>
        </p>
        </body>
        </html>
    ";

    sendEmail($email, "Welcome to SAF", $message);

    return true;
}
 // end of user registration

// User Login
function user_login($post)
{
    $email = isset($post['email']) ? sanitize($post['email']) : '';
    $password = isset($post['password']) ? sanitize($post['password']) : '';

    $errors = [];

    // Checking for account number...
    if (empty($email)) {
        $errors[] = "Please enter your account number!";
    }

    // Checking for password...
    if (empty($password)) {
        $errors[] = "Please enter your password!";
    }

    if (!empty($errors)) {
        return $errors;
    }

    $email = sanitize($email);
    $password = encrypt(sanitize($password));

    // The SQL Statement...
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = executeQuery($sql);

    if ($result) {
        // return "email found";
        $encryptedpassword = $result['password'];
        $userEmail = $result['email'];
        $userName = $result['fullname'];
        $user_id = $result['acc_number'];
        // $otp = generateNumber(4);

        // $message = "
        //     <html>
        //     <head>
        //     <title>Login Verification</title>
        //     </head>
        //     <body>
        //     <div>
        //         <p>Dear $userName, Your OTP for swissapexfinancial.com is <b>$otp</b> Use this Passcode to complete your Login. Thank you. Secured by swissapexfinancial</p>
        //     </div>
        //     <table>
        //     <tr>
        //     <th>Account Number</th>
        //     <th>Full Name</th>
        //     </tr>
        //     <tr>
        //     <td>$accNum</td>
        //     <td>$userName</td>
        //     </tr>
        //     </table>
        //     </body>
        //     </html>
        // ";
        // return $encryptedpassword."</br>". $password;
        if ($password == $encryptedpassword) {
            if ($result['status'] == 'active') {
                $_SESSION['id'] = $user_id;
                header("Location:home");
                // if (sendEmail($userEmail, "Login Verification", $message)) {
                //     $otpSql = "INSERT INTO passcodes (otp, user_id) VALUES ($otp, $user_id)";
                //     $insertOtp = validateQuery($otpSql);

                //     if ($insertOtp) {
                //         return true;
                //     }
                // }
            } else {
                $acc_blocked_err = "Your account has been blocked!";
                return $acc_blocked_err;
            }
        } else {
            $errors[] = "Invalid Login Details!";
        }
    } else {
        $errors[] = "Invalid Login Details!";
    }

    return $errors[0];
}


// function verifyLogin($post) {
//     extract($post);
//     $errors = [];
//     $user_id = $_SESSION['tmpData'];

//     if (!empty($otp)) {
//         $otp = sanitize($otp);
//     } else {
//         $errors[] = "Please enter OTP";
//     }

//     if (!$errors) {
//         $sql = "SELECT * FROM passcodes WHERE otp = $otp AND user_id = $user_id AND status = 'null'";
//         $result = executeQuery($sql);

//         if ($result) {
//             $updateSql = "UPDATE passcodes SET status = 'used' WHERE otp = $otp AND user_id = $user_id";
//             $updateQuery = validateQuery($updateSql);

//             if ($updateQuery) {
//                 return true;
//             }
//         } else {
//             return "Invaild OTP provided";
//         }
//     } else {
//         return $errors;
//     }
// }

// function confirmPin($post) {
//     extract($post);
//     $errors = [];
//     $user_id = $_SESSION['tmpData'];

//     if (!empty($pin)) {
//         $pin = sanitize($pin);
//     } else {
//         $errors[] = "Please provide account pin";
//     }

//     if (!$errors) {
//         $sql = "SELECT * FROM users WHERE acc_pin = $pin AND id = $user_id";
//         $result = executeQuery($sql);

//         if ($result) {
//             $_SESSION['user'] = $user_id;
//             return true;
//         } else {
//             return "Invaild pin provided";
//         }
//     } else {
//         return $errors;
//     }
// }

// function cardLogin($post) {
//     extract($post);
//     $errors = [];

//     if (!empty($username)) {
//         $username = sanitize($username);
//     } else {
//         $errors[] = "Username is empty";
//     }

//     if (!empty($pin)) {
//         $pin = sanitize($pin);
//     } else {
//         $errors[] = "Pin is empty";
//     }

//     if (isset($_SESSION['studentId'])) {
//         $student_id = $_SESSION['studentId'];
//     }

//     if (!$errors) {
//         $sql = "SELECT * FROM students WHERE id = $student_id";
//         $row = executeQuery($sql);

//         if ($username === $row['username']) {
//             $sql2 = "SELECT * FROM student_cards WHERE card_pin = '$pin'";
//             $row2 = executeQuery($sql2);

//             if ($row2) {
//                 $stusentIdFromDb = $row2['student_id_fk'];
//                 $validStatus = $row2['valid'];

//                 // echo "<pre>";
//                 // print_r($row2);
//                 // echo "<br>student-id: $student_id";
//                 // echo "<br>valid status: $validStatus";

//                 // die();

//                 if ($stusentIdFromDb == $student_id && $validStatus == 1) {
//                     $_SESSION['cardSet'] = $row2['card_pin'];
//                     return true;
//                 } else {

//                     if(empty($validStatus)){
//                         $changeToInvalid = "UPDATE student_cards SET student_id_fk = '$student_id', valid = '1' WHERE card_pin = '$pin'";
//                         $invalidQuery = validateQuery($changeToInvalid);

//                         if ($invalidQuery) {
//                             $_SESSION['cardSet'] = $row2['card_pin'];
//                             return true;
//                         } else {
//                             $invalid = "Invalid card details";
//                             return $invalid;
//                         }
//                     }else{
//                         $invalid = "This card does not belong to you! Please check for your card";
//                         return $invalid;
//                     }

//                 }
//             } else {
//                 $invalid = "Invalid card details";
//                 return $invalid;
//             }
            
//         } else {
//             $invalid = "Invalid card details";
//             return $invalid;
//         }
//     } else {
//         return $errors;
//     }
// }

function changePassword($post){
    extract($post);
    $errors = [];
    $studentId = $_SESSION['id'];
    if (!empty($oldpassword)) {
        $oldpassword = sanitize($oldpassword);

        $sql = "SELECT * FROM users WHERE acc_number = $studentId";
        $gettingDetails = executeQuery($sql);
        if (!empty($gettingDetails)) {
            $db_pwd = $gettingDetails['password'];
            $check_pwd = encrypt($oldpassword) == $db_pwd;
            if ($check_pwd === true) {
                if (!empty($newpassword)) {
                    $new_pwd_tmp = sanitize($newpassword);
                    if (!empty($repassword)) {
                        $repassword = sanitize($repassword);
                        if ($repassword == $new_pwd_tmp) {
                            $new_pwd = encrypt($new_pwd_tmp);
                            $update_pwd = "UPDATE users SET password = '$new_pwd' WHERE acc_number = $studentId";
                            $update_pwd_query = validateQuery($update_pwd);
                            return "<span style='color:green;'>Passwords Updated!! <a href='' style='font-weight:bolder'>ok</a></span>";
                        }else {
                            return "<span style='color:red'>Passwords do not match</span>";
                        }
                    }
                }
            } else {
                return "<span style='color:red'>Incorrect Password</span>";
            }
        }
    }
}

function updateImage()
{
    $errors = [];

    $studentId = $_SESSION['id'];

    if (isset($_FILES['pics'])) {
        $pics = sanitize($_FILES['pics']['name']);
        $file_extension = pathinfo($pics, PATHINFO_EXTENSION);
        $unique_name = uniqid() . '.' . $file_extension;
        $tmp_pics = $_FILES['pics']['tmp_name'];

        // Validate the uploaded image
        $image_info = getimagesize($tmp_pics);
        $allowed_types = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP]; // Add JPG to the allowed types

        if (!$image_info || !in_array($image_info[2], $allowed_types)) {
            return "<span style='color:red'>Invalid image file. Please upload a JPEG, PNG or WEBP file.</span>";
        } elseif ($_FILES['pics']['size'] > 5 * 1024 * 1024) {
            return "<span style='color:red'> Image size exceeds the maximum limit of 5MB.</span>";
        } else {
            $sql = "SELECT photo FROM users WHERE acc_number = $studentId";
            $result = executeQuery($sql);
            if ($result && !empty($result['photo'])) {
                $previous_image = $result['photo'];
                if (file_exists("./assets/img/profile/". $previous_image)) {
                    // return "in";
                    unlink("./assets/img/profile/". $previous_image);
                }
            }
            $image_path = "./assets/img/profile/$unique_name";
            if (move_uploaded_file($tmp_pics, $image_path)) {
                // Update the image path in the database
                $sql = "UPDATE users SET photo = '$unique_name' WHERE acc_number = $studentId";
                $result = validateQuery($sql);

                if ($result) {
                   header("Location: settings");
                } else {
                    return "<span style='color:red'>Failed to update the image path in the database.</span>";
                }
            } else {
                return "<span style='color:red'>Failed to upload the image file.</span>";
            }
        }
    } else {
        return "<span style='color:red'>Profile Image is empty.</span>";
    }

    return $errors;
}

function updateinfo($post)
{
    extract($post);
    $errors = [];

    $studentId = $_SESSION['id'];
   
    
    if(!empty($addr)){
        $addr = sanitize($addr);
    }else {
        return $errors[0] = "address cannot be empty";
    }
    
    if(!empty($state)){
        $state = sanitize($state);
    }else {
        return $errors[0] = "state cannot be empty";
    }
    
    if(!empty($city)){
        $city = sanitize($city);
    }else {
        return $errors[0] = "city cannot be empty";
    }
    
    if(!empty($zip)){
        $zip = sanitize($zip);
    }else {
        return $errors[0] = "zip code cannot be empty";
    }
        
    if(!empty($country)){
        $country = sanitize($country);
    }else {
        return $errors[0] = "country cannot be empty";
    }
    
    if(!empty($phone)){
        $phone = sanitize($phone);
    }else {
        return $errors[0] = "phone cannot be empty";
    }
    
    if(!empty($work)){
        $work = sanitize($work);
    }else {
        return $errors[0] = "Employee status cannot be empty";
    }
    
    if(!empty($salary)){
        $salary = sanitize($salary);
    }else {
        return $errors[0] = "salary cannot be empty";
    }
    
    if(!empty($company)){
        $company = sanitize($company);
    }else {
        return $errors[0] = "company cannot be empty";
    }
    
        $update_profile = "UPDATE users SET `address` = '$addr', `state` = '$state', `country` = '$country', `city` = '$city', `postal_code` = '$zip', `phone` = '$phone', `work` = '$work', `company` = '$company', `salary` = '$salary' WHERE acc_number = '$studentId'";
        $profile_query = validateQuery($update_profile);

        if ($profile_query) {
            header("Location: settings");
            return "<span style='color:green'>Update Successful</span>";
        } else {
            return "<span style='color:red'>Update failed</span>";
        }
    
        return "<span style='color:red'>Update failed</span>";
    
}

function updateProfile($post)
{
    extract($post);
    $errors = [];

    $studentId = $_SESSION['id'];

    if(!empty($pin)){
        $pin = sanitize($pin);
    }else {
        return $errors[0] = "pin cannot be empty";
    }
    
    if(!empty($addr)){
        $addr = sanitize($addr);
    }else {
        return $errors[0] = "address cannot be empty";
    }
    
    if(!empty($country)){
        $country = sanitize($country);
    }else {
        return $errors[0] = "country cannot be empty";
    }
    
        $update_profile = "UPDATE users SET `address` = '$addr', `acc_pin` = '$pin', `country` = '$country' WHERE acc_number = '$studentId'";
        $profile_query = validateQuery($update_profile);

        if ($profile_query) {
            header("Location: settings");
            return "<span style='color:green'>Update Successful</span>";
        } else {
            return "<span style='color:red'>Update failed</span>";
        }
    
        return "<span style='color:red'>Update failed</span>";
    
}

function make_transfer($post) {
    extract($post);
    $user_id = $_SESSION['id'];
    global $link;

   
        $sql1 = "SELECT * FROM users WHERE acc_number = $user_id";
        $query1 = executeQuery($sql1);

        if ($type == 'domestic') {
            if (!check_num($a_num)) {
                return "<p class='text-center text-danger'><b>account number does not exist</b></p>";
            }
        }

        if ($query1['transfer'] !== "active") {
            return "<p class='text-center text-danger'><b>You cannot make transfers at the moment refer to customer care for mor etails</b></p>";
        }

        if ($query1) {
            $sql = "SELECT * FROM accounts WHERE `user_id` = $user_id AND account_type = '$gateway'";
            $details = executeQuery($sql);
            $trx = generateNumber('10');
           
            $total_balance = $details['balance'];
            $id = $details['id'];

            if ($amt <= $total_balance) {
                $s = "UPDATE accounts SET balance = balance - $amt WHERE id = $id";
                $r = validateQuery($s);
                // $s = "UPDATE accounts SET balance = balance + $amt WHERE account_number = $a_num";
                // $r = validateQuery($s);
                $sql2 = "INSERT INTO withdrawal (user, trx,gateway,status,acoount_id,`type`, amount, account_number,bank,description, created_date) VALUES ($user_id, $trx,'$gateway','pending', $id, '$type', $amt, '$a_num', '$bank','$description',now())";
                $query2 = validateQuery($sql2);

                if ($query2) {
                    // redirect_to('domestic');
                    return "<p class='text-center text-success'><b>your request is being processed</b></p>";
                }
            } else {
                return  "<p class='text-center text-danger'><b>Insufficient Balance</b></p>";
            }
        } else {
            $err_user = "Error from getting users";
            return $err_user;
        }
}

function check_num($number){
    $sql = "SELECT * FROM accounts WHERE account_number = $number";
    $res = returnQuery($sql);
    $exist = mysqli_num_rows($res);
    if ($exist == 1) {
        return true;
    }else{
        return false;
    }
}

function wire_transfer($post, $user_id) {
    extract($post);

   
        $sql1 = "SELECT * FROM users WHERE acc_number = $user_id";
        $query1 = executeQuery($sql1);

        if ($query1['transfer'] !== "active") {
            return "<p class='text-center text-danger'><b>You cannot make transfers at the moment </b></p>";
        }
        if ($query1['acc_pin'] == $pin) {
            
            if ($query1) {
                $sql = "SELECT * FROM accounts WHERE `user_id` = $user_id AND account_type = '$acct'";
                $details = executeQuery($sql);
                $trx = generateNumber('10');
            
                $total_balance = $details['balance'];
                $id = $details['id'];

                if ($amt <= $total_balance) {
                    $s = "UPDATE accounts SET balance = balance - $amt WHERE id = $id";
                    $r = validateQuery($s);
                    // $s = "UPDATE accounts SET balance = balance + $amt WHERE account_number = $num";
                    // $r = validateQuery($s);
                    $sql2 = "INSERT INTO withdrawal (user, trx,gateway,status,acoount_id,`type`, amount, account_number,bank,description, account_name,created_date) VALUES ($user_id, $trx,'$acct','pending', $id, 'wire', $amt, '$num', '$bank','$desc',$name,now())";
                    $query2 = validateQuery($sql2);

                    if ($query2) {
                        // redirect_to('domestic');
                        return "<p class='text-center text-success'><b>your request is being processed</b></p>";
                    }
                } else {
                    return  "<p class='text-center text-danger'><b>Insufficient Balance</b></p>";
                }
            } else {
                $err_user = "Error from getting users";
                return $err_user;
            }
        }else{
            return  "<p class='text-center text-danger'><b>Invalid pin</b></p>";
        }
}

function applyLoan($post) {
    global $link;
    extract($post);
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM accounts WHERE `user_id` = $user_id AND `account_type` = 'USD'";
            $result = executeQuery($sql);
            
            extract($result);
            if ($result) {
                $sql = "INSERT INTO `loan`(`user_id`, `account_id`, `loan`, `currency`, `amount`, `interest`, `created_at`, `updated_at`) 
                VALUES ($user_id,$id,'$plan','$coin','$amt','$interest',now(),now())";
                mysqli_query($link,$sql);
                redirect_to('loan');
            } else {
                return "<span style='color:red'>Loan application failed</span>";
            }
}


function credit_account($post, $user_id) {
    global $link;
    extract($post);
    $err_flag = false;
    $errors = [];

    if (!empty($amount)) {
        $amount = sanitize($amount);
    } else {
        $err_flag = true;
        $errors[] = "Amount is empty";
    }

    if ($err_flag === false) {
       

            // $sql = "UPDATE `accounts` SET balance = balance +$amount WHERE `user_id` = $user_id AND `account_type` = '$acct'";
            // $result = validateQuery($sql);

            $sql = "SELECT * FROM accounts WHERE `user_id` = $user_id AND `account_type` = '$acct'";
            $result = executeQuery($sql);
            
            extract($result);
            if ($result) {
                $trx = generateNumber(5);
                $sql2 = "INSERT INTO `deposits`(`trx`, `acoount_id`, `user`, `amount`, `payment_mode`, `status`, `created_at`, `updated_at`) VALUES ('$trx','$id','$user_id',$amount,'$coin','pending',now(),now())";
                $query2 = mysqli_query($link,$sql2);

                if ($query2) {
                    
                    // header("Location: deposit");
                    if($acct == 'USD') { 
													
                        $symbol = '$';
                        
                        } elseif($acct == 'GBP') { 
                        
                        $symbol = '£';
                        
                        } else {
                        $symbol = '€';
                        } 
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
                            <img class="card" src="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl='.$address.'&amp;amount=.$buatdpnyax" style="height:160px;width:160px;padding:8px;" alt="">
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
                    return $content;
                } else {
                  return  $err = "Error! try again";
                }
            } else {
                return ;
            }
    } else {
        return $errors;
    }
}

function Transactions($user_id, $status) {
    $sql = "SELECT * FROM transactions WHERE user_id = $user_id AND approved = $status ORDER BY id DESC";
    $result = returnQuery($sql);

    if ($result) {
        return $result;
    } else {
        return false;
    }
}