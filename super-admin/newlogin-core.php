<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" ">
    <meta name="author" content=" ">
    <meta name="keywords" content=" ">

	<!-- Title Page-->
       <title>SUPER ADMIN ACCOUNT LOGIN</title>
	<!-- Website icon -->
	<link rel="apple-touch-icon" href="../assets/images/logo.png">
	<link rel="shortcut icon"    href="../assets/images/logo.png"/>	
     <meta name="theme-color" content=" "> 
		
	<link href="../home_css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
					                
					
	<link rel="stylesheet" href="../css/font-awesome.css">
					 <div align="center"class="banner-layer gvhead">
					<a href="..\index.php"><img src="../images/logo.png" style="width:200px;margin-top:10px;"/></a>
					 </div>
<?php
 

 
	if(isset($_GET['account_verify']))
	{
	$verify = $_GET['account_verify'];
	
	echo$superlog->email_verify($verify);

	}
	
	
	
	if(isset($_POST['submit']))
	{
	$page = "index.php";	
	$username =  trim($_POST['username']);
	$password =  trim(MD5($_POST['password']));
	$online='Online';
	$current= date('Y-m-d');
	$time = time();
	$update_time = date('d M Y H:i:s', $time);
	
    	 
	$query_num_login = $superlog->username_row($username);

	$superlog->query_login($username, $password);
	$result = $superlog->query_result();
	$query_num_e = $superlog->total_row(); 
	 $account_lock = $superlog->account_lock($username);
    foreach($result as $row){
     $verify = $row['email_verify'];

	}		

			if($query_num_login == 1)
			{
				 
						if($query_num_e === 1)
						{ 
				 
								 
								$_SESSION['username']=$username;

								$superlog->redirect($page);	
												
 

						}
						else	
						{
						  $msg_remove ="You have supply a wrong password  ";
																  
						}

		 
	 				 

		}
		else	
		{
			 
			$msg_remove ="The username does not exist ";
	 
		}			 
		 
 

 
	}
				
					
?>		 
				
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center text-white font-weight-light my-4">SUPER ADMIN LOGIN</h3></div>
                                    <div class="card-body">
                                         <form  action='<?php echo "$current_file"; ?>' method="POST" enctype="multipart/form-data">
										 
                     <?php
					if(!empty($msg_remove)) 
					{
									 
					echo'
								
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Notification!</strong> '.$msg_remove.'
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
					';
					}
					
					
					?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input type="text" class="form-control py-4" name="username"  placeholder="Enter email"  required="required" aria-required="true"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input type="password" class="form-control py-4"name="password"  placeholder="Enter password" required="required" aria-required="true"/>
                                            </div>
                                            <div class="form-group">
													<div class="row">
													<div class="col-xl- col-md-6">
														<div class="custom-control custom-checkbox">
															<input class="custom-control-input"   id="rememberPasswordCheck" type="checkbox" />
															<label class="custom-control-label" for="rememberPasswordCheck">Remember me</label>
														</div>
														</div>


														<div class="col-xl- col-md-6">
														<div class="custom-control custom-checkbox">
														 
															<a href="recover-now.php" style="color:black;text-decoration:underline;">Forgotten Password</a>
														 
														</div>
														</div>		

														<div class="col-xl- col-md-12">
														<div class="custom-control custom-checkbox">
														 
															 
															<a href="..\index.php" style="color:black;text-decoration:underline;">Back to Home</a>
														</div>
														</div>
														
														
													</div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                             
                                                <input type="submit" name="submit"  class="btn btn-primary" value="Login"  />
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main><br><br>
				
	<?php
	
 
	?>			
				
            </div>
            <div id="layoutAuthentication_footer">
<?php
include("../footer.php");
?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<script type="text/javascript" src="../js_form/main.07a59de7b920cd76b874.js"></script> 
</html>
 