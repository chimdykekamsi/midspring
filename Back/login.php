<?php ob_start(); ?>
<?php include 'includes/dbpipe.php'; ?>

<?php include 'public-base.php'; ?>


    <section>
        <div class="container">
				<div class="row">
					<div class="col-md-12">
   <style media="screen">
body {
   font: 1em/1.99em verdana, sans-serif;
    
 }
form {
    max-width: 58em; 
    padding: 1em; 
    margin: auto; 
    border: 0.25em solid #316ed6; 
   
    
    
 }
form fieldset {
    border: 0.1em solid #31d8eb; 
 }
form legend{
    display: none;
 }

form input {
    padding-right: 3000px;
	
	
 }
</style>
   
   
   <hr style="border-color:gold; border: solid 2px gold;width:50%;" class="text-center">
			<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Sign In</h2>
                
        				
            </div>
			</div>
			
			<div class="text-center">
                        <div class="row">
                <div class="login-box" style="margin: 0 auto !important">
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                                              	   	 <?php include('includes/move.php'); ?>

                        <form action="" method="post">
						<div class="row">
						
						<div class="col-md-8 col-xs-12 col-sm-8 text-center">
						<label for="username" class="label-control pull-left">UserName</label>
                            <div class="form-group has-feedback">                               
							
							  <input type="text" class="form-control pull-right" placeholder="Username" name="username" required />
                            
                            </div>
							</div>
							</div>
					
					<hr>
							    <div class="row wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">
								<div class="col-md-8 col-xs-12 col-sm-8">
								<label for="username" class="label-control pull-left">Password</label>
                            <div class="form-group text-center has-feedback">
                               

                                <input required type="password" class="form-control pull-right" placeholder="Password" name="password"/>
                            </div>
							</div>
						</div>
                            <div class="row">
								<p>
                                <!-- /.col -->
                                <div class="col-xs-8">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <input type="hidden" name="ver" value="u">
                        </form>

                    </div>
                    <!-- /.login-box-body -->
                </div>
                <!-- /.login-box -->
				</div>
				</div>
				</div>
            </div>
        </div>
    </section>
<footer id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">
                        All Rights Reserved. GRAIN Network Copyright &copy; 2018</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end copyright -->

    </body>
</html>