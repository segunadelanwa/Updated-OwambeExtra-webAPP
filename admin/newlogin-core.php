<!DOCTYPE html>
<html lang="en">
    <head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


 
       <title>RESULTBOX ACCOUNT LOGIN</title>
 
		
	<link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    
                    <div class="container">
					                
					
					 <div align="center"class="banner-layer gvhead">
					<img src="../images/logo.png" style="width:200px;margin-top:100px;"/>
					 </div>

 
 
<?php
 
	
	
	
	if(isset($_POST['submit']))
	{
	 
	$username =  trim($_POST['username']);
	$password =  MD5(trim($_POST['password']));
 
	$query_photo ="SELECT * FROM `owambe_admin` WHERE username ='$username'";
	$query_photo_result=mysqli_query($homedb,$query_photo);  
	$query_num_login=mysqli_num_rows($query_photo_result); 


	$query_photo ="SELECT * FROM `owambe_admin` WHERE username ='$username' AND `password`='$password'";
	$query_photo_result=mysqli_query($homedb,$query_photo);  
	$query_num_e=mysqli_num_rows($query_photo_result);  
 
    	 
 
 
			if($query_num_login == 1)
			{
			 
						if($query_num_e === 1)
						{ 
						 
								 
								$_SESSION['username']=$username;

								header('Location: index.php');	
												

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
				
					
	 
				
    
 
	if(isset($_GET['user']) && isset($_GET['code']))
	{
		$username =  $_GET['user'];
		$password =  $_GET['code'];
		$online='Online';
		$current= date('Y-m-d');
		$time = time();
		$update_time = date('d M Y H:i:s', $time);
		//$current='2019-12-21';
 

             $query_e = "SELECT * FROM `owambe_admin` WHERE `username`='$username'";
			 $run=mysqli_query($homedb, $query_e);	 
			 $query_num_login = mysqli_num_rows($run);

			$query_log = "SELECT * FROM `owambe_admin` WHERE `username`='".mysqli_real_escape_string($homedb, $username)."' AND `password` ='".mysqli_real_escape_string($homedb, $password)."'";			
			$run_e=mysqli_query($homedb, $query_log);	 
			 $query_num_e = mysqli_num_rows($run_e);

			while($row = mysqli_fetch_array($run_e)){
				$username=$row['username'];
				$surname=$row['surname'];
	 
			}
//////////////
	     if($query_num_login == 1)
			{
		 
						if($query_num_e === 1)
						  {  
				
								$_SESSION['surname']=$surname;
										
																					
									header("Location: index.php");
							
						 
				 	

					}
					else	
					{
				      $msg_remove ="You have supply a wrong password";
															  
					}

			}
			else	
			{
				 
		        $msg_remove ="The username does not exist";
		 
			}					 

		 
		 
 

	}
				
					//echo MD5('000000');
?>		 
				
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">OWANMBE ADMIN </h3></div>
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
                                                <input type="text" class="form-control py-4" name="username"  placeholder="Enter username"  required="required" aria-required="true"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input type="password" class="form-control py-4"name="password"  placeholder="Enter password" required="required" aria-required="true"/>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input"   id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
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
				
				
				
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;Owambe Extra <?php echo $date=date("d/m/Y");;?></div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script rc="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script rc="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script rc="js/scripts.js"></script>
    </body>
</html>
