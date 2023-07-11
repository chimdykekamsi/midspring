<?php ob_start(); ?>
<?php
	define('TIMEZONE', 'Africa/Lagos');
	date_default_timezone_set(TIMEZONE);
?>
<?php //error_reporting(); ?>
<?php include 'includes/auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?> || MidSpring Bank</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Favicon and Touch Icons -->
    <link href="assets/images/pagelogo.jpg" rel="shortcut icon" type="image/png">
    <link href="assets/images/pagelogo.jpg" rel="apple-touch-icon">
    <link href="assets/images/pagelogo.jpg" rel="apple-touch-icon" sizes="72x72">
    <link href="assets/images/pagelogo.jpg" rel="apple-touch-icon" sizes="72x72">
    <link href="assets/images/pagelogo.jpg" rel="apple-touch-icon" sizes="72x72">
    
    <!--<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>-->
    <!-- Bootstrap 3.3.5 -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- Font Awesome -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
   <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <link rel="stylesheet" href="assets/css/ionicons.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.css">

    <link rel="stylesheet" href="assets/css/bootstrapValidator.css">
        <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/css/daterangepicker-bs3.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/js/select2.js">     
    <link rel="stylesheet" href="assets/css/_all-skins.css">
    <!-- iCheck -->
	    <link rel="stylesheet" href="assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="asset/css/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/css/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/css/jquery-jvectormap-1.css">
    <!-- Date Picker -->
  <!-- Date Picker -->
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
 
    <!-- bootstrap wysihtml5 - text editor -->
   
     <!-- DataTables CSS -->
	

    <!-- DataTables Responsive CSS -->
    <link href="assets/css/jquery.css" rel="stylesheet">

    <link href="css/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>
 
   <link href="css/custom.min.css" rel="stylesheet" type="text/css"/>

    <link href="css/datatables.min.css" rel="stylesheet" type="text/css"/>

	<style>
.blink_text {
-webkit-animation-name: blinker;
-webkit-animation-duration: 1s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 1s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color:white;
 font-size:16px;
}

@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }
</style>
  
    <!-- CountDown Timer -->
    <script type="text/javascript">

       function getTimeRemaining(endtime) {
            //var t = Date.parse(endtime) - Date.parse(new Date());
            var t = new Date(endtime.replace(/-/g,'/').replace('T‌​',' ').replace(/\..*|\+.*/,"")) - new Date();
            var seconds = Math.floor( (t/1000) % 60 );
            var minutes = Math.floor( (t/1000/60) % 60 );
            var hours = Math.floor( (t/(1000*60*60)));
            return {
                'total': t,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
        }

        function initializeClock(id, $hoursClass, $minutesClass, $secondsClass, endtime) {
            var clock = document.getElementById(id);

            var hoursSpan = clock.querySelector('.' + $hoursClass);
            var minutesSpan = clock.querySelector('.' + $minutesClass);
            var secondsSpan = clock.querySelector('.' + $secondsClass);

            function updateClock() {
                var t = getTimeRemaining(endtime);

                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if(t.total<=0){

                    hoursSpan.innerHTML = ('00');
                    minutesSpan.innerHTML = ('00');
                    secondsSpan.innerHTML = ('00');

                    clearInterval(timeinterval);
                }
            }

            updateClock(); // run function once at first to avoid delay
            var timeinterval = setInterval(updateClock,1000);

        }
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <!-- jQuery -->
        
</head>
