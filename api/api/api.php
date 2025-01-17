  <?php
//Api.php
require"../../phpmailer/PHPMailerAutoload.php";	
class API
{
	
	//private $connect ='';
	var $host; 
	var $username;
	var $password;
	var $database;
	var $connect;
	var $home_page;
	var $query;
	var $data;
	var $statement;
	var $filedata;
	
	function __construct()
	{
		
 
		$this->host = 'owambextra.com';
		$this->username = 'owambext_user';
		$this->password = 'referersellblog123123#$';
		$this->database = 'owambext_db'; 
		   
	  
	 
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
       
	 
	}

	function execute_query()
	{
		$this->statement = $this->connect->prepare($this->query);
		$this->statement->execute($this->data);
	}
  

	function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}

	function query_result()
	{
		$this->execute_query();
		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
	}


	function send_email($receiver_email, $subject, $body)
	{
		
	$mail = new PHPMailer;

	//$mail->IsSMTP();

	//$mail->Host = 'smtp host';

	//$mail->Port = '587';

	//$mail->SMTPAuth = true;

	//$mail->Username = '';

	//$mail->Password = '';

	//$mail->SMTPSecure = '';
    $mail->SMTPDebug = 0;  
	$mail->setFrom('noreply@owambextra.com', 'OWAMBE EXTRA');

	$mail->FromName = 'OWAMBE EXTRA';
	
	$mail->AddReplyTo = 'surpport@owambextra.com';

	$mail->AddAddress($receiver_email, '');

	$mail->IsHTML(true);

	$mail->Subject = $subject;

	$mail->Body = $body;
	
	$mail->AddEmbeddedImage('https://owambextra.com/images/logo.jpeg', 'logo', 'https://owambextra.com/images/logo.jpeg'); 

	$mail->Send();		
	}	
			
	

 
    

    function otp_table()
	{
		
 
		$i=0;
		$this->query="SELECT * FROM `otp_table` ORDER BY id";
        $output = $this->query_result();
					
		foreach($output as $row)
		{
			
				$data[$i] = $row;
				$i++;
		}
			
       return $data;		 
		
    }
    
 
 
 
			function Upload_file()
			{
			    
                $encode = file_get_contents('php://input');
                $decode = json_decode($encode, true);
        
                $username = $decode['user'];
        
        
        
                $this->query = "SELECT * FROM `login_table` WHERE `login_table`.`username` = '$username'";
                
                $output = $this->query_result();
                
                foreach($output as $row){
                
                $userphoto=$row['photo']; 
                
                }
				 
				 
				 
				if(!empty($this->filedata['name']))
				{
				//	$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);
				
 
					$new_name = uniqid() . '.' .jpg;

					$_source_path = $this->filedata['tmp_name'];

					$target_path = '../../images/' . $new_name;

					move_uploaded_file($_source_path, $target_path);
					
				$this->query = "UPDATE ` login_table` SET `photo` = '$new_name' WHERE `login_table`.`username` = '$username'";
                $this->execute_query();
                
                  unlink("../../public_banner/$userphoto");

					return $new_name;
				}
			}





   
    function event_previewMode($user)
	{
		
 
		$i=0;
		$this->query= "SELECT * FROM `public_event` WHERE `username` ='$user' AND `check_preview`='preview' ORDER BY `id` DESC";
        $output = $this->query_result();
					
		foreach($output as $row)
		{
			
				$data[$i] = $row;
				$i++;
		}
			
       return $data;		 
		
    }
 
	
	function fetch_single($id)
	{
            $query="SELECT * FROM login_table WHERE id = '$id'"; 
			$statement = $this->connect->prepare($query);
			$statement->execute();
		
				foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row)
				{
								$response[] = array( 
									'id'          =>  $row['id'], 
									'username'    =>  $row['username'], 
									'fullname'    =>  $row['fullname'], 
									'phone_no'    =>  $row['phone_no'],  
									'password'    =>  $row['password'] 
									);	
				}

 
	return $response;
	
	}


    function bankDetailsUpdate()
	{
	    
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
	
	 	    $form_data = array(
			  ':bankName'      => $decode['bankName'],
			  ':accountName'   => $decode['accountName'],
			  ':accountNumber' => $decode['accountNumber'],
			  ':username'      => $decode['username']
			);
			
			$query="
			    UPDATE login_table SET 
				bank_name = :bankName, 
				account_name = :accountName, 
				account_no = :accountNumber
                WHERE username =:username				
			";
	        $statement = $this->connect->prepare($query);
		 
				if($statement->execute($form_data))
				{
					$response[] = array(
					'success'     =>  'ok' 
					);
					
				}else{
					
					$response[] = array(
					'success'     =>  '0' 
					);				
				}
			
	 
		
		return $response; 
	}
	

    function passwordUpdate()
	{
	    
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
	
	 	    $form_data = array(
			  ':new_password'  => password_hash($decode['new_password'], PASSWORD_DEFAULT),
			  ':username'      => $decode['userName'] 
			);
			
			$query="
			    UPDATE login_table SET 
				password = :new_password  
                WHERE username =:username				
			";
	        $statement = $this->connect->prepare($query);
		 
				if($statement->execute($form_data))
				{
					$response[] = array(
					'success'     =>  'ok' 
					);
					
				}else{
					
					$response[] = array(
					'success'     =>  '0' 
					);				
				}
			
	 
		
		return $response; 
	}	


    function detailsUpdate()
	{
	    
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
	
	 	    $form_data = array(
			  ':city'         => $decode['city'], 
			  ':state'        => $decode['state'], 
			  ':country'      => $decode['country'],
			  ':username'      => $decode['username']
			);
			
			$query="
			    UPDATE login_table SET 
				city    = :city,  
				state   = :state,  
				country = :country  
                WHERE username =:username				
			";
	        $statement = $this->connect->prepare($query);
		 
				if($statement->execute($form_data))
				{
					$response[] = array(
					'success'     =>  'ok' 
					);
					
				}else{
					
					$response[] = array(
					'success'     =>  '0' 
					);				
				}
			
	 
		
		return $response; 
	}	
 

    function update()
	{
		if(isset($_POST["username"]))
		{
			$form_data = array(
			  ':username'  => $_POST['username'],
			  ':fullname'  => $_POST['fullname'],
			  ':password'  => $_POST['password'],
			  ':hidden_id' => $_POST['hidden_id']
			);
			
			$query="
			    UPDATE login_table SET 
				fullname = :fullname, 
				username = :username, 
				password = :password
                WHERE id =:hidden_id				
			";
	        $statement = $this->connect->prepare($query);
		 
				if($statement->execute($form_data))
				{
					$response[] = array(
					'success'     =>  '1' 
					);
					
				}else{
					
					$response[] = array(
					'success'     =>  '0' 
					);				
				}
			
		}
		else
		{
			
			$response[] = array(
			'success'     =>  '0' 
			);				
		}
		
		
		return $response; 
	}

    function delete_user($id)
	{
            $query="DELETE FROM `login_table` WHERE `login_table`.`id` = '$id'"; 
			$statement = $this->connect->prepare($query);
		 
				if($statement->execute()) 
				{
					$response[] = array( 
						'success'  =>  '1' 
						 );	
				}
				else
				{
				
					$response[] = array( 
						'success'  =>  '0' 
						 );	
						 
				}

 
	return $response;
	
	}




    function event_previewDelete($event_id,$banner)
	{
            $query="DELETE FROM `public_event` WHERE `public_event`.`event_id` = '$event_id'"; 
			$statement = $this->connect->prepare($query);
		 
				if($statement->execute()) 
				{
				    
                    $query="DELETE FROM `self_wallet` WHERE `self_wallet`.`self_event_id` = '$event_id'"; 
                    $statement = $this->connect->prepare($query);
                    $statement->execute();
			
			        unlink("../../../public_banner/$banner");
			        
			        
					$data[] = array( 
						'success'  =>  'ok' 
						 );	
				}
				else
				{
				
					$data[] = array( 
						'success'  =>  'error' 
						 );	
						 
				}

 
 return $data;
	
	}

    function event_previewApprove($event_id)
	{
	    
        
	
	 	    $form_data = array(
			  ':event_id'      => $event_id,
			  ':approved'      => 'approved'
			);
			
			$query="
			    UPDATE `public_event` SET  
				check_preview = :approved  
                WHERE `public_event`.`event_id` =:event_id				
			";
	        $statement = $this->connect->prepare($query);
		 
				if($statement->execute($form_data))
				{
					$response[] = array(
					'success'     =>  'ok' 
					);
					
				}else{
					
					$response[] = array(
					'success'     =>  'error' 
					);				
				}
			
	 
		
		return $response; 
	}
    function GiftOwnerSearch($event_id)
    {
    $this->query = "SELECT * FROM public_event WHERE event_id = '$event_id' ";
    
    $output = $this->query_result();
    
    
    return $output;
    
    }
    
    
    function ProxyWalletBal($event_id)
    {
    $this->query = "SELECT * FROM `proxy_wallet` WHERE `proxy_event_id` = '$event_id' ";
    
    $output = $this->query_result();
    
    
    return $output;
    
    }
    
    
    function selfWalletBal($event_id)
    {
    $this->query = "SELECT * FROM `self_wallet` WHERE `self_event_id` = '$event_id' ";
    
    $output = $this->query_result();
    
    
    return $output;
    
    }
    
    function ProspectGuest($username, $eventID)
    {
    $this->query = "SELECT * FROM `coming_guest` WHERE `event_user` = '$username' AND `eventid` = '$eventID'";
    
    $output = $this->query_result();
    
    
    return $output;
    
    }
    
    function GetGiftMoney($eventID)
    {
    $this->query = "SELECT * FROM `gift_event` WHERE `gift_event`.`gift_event_id` = '$eventID'";
    
    $output = $this->query_result();
    
    
    return $output;
    
    }

			

	
}
 
 
 
 
 
?>