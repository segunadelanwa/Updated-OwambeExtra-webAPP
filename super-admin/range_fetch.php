
<?php
//fetch.php
include('../core.php');

$exam = new config;

$current_date  = date('Y-m-d');	

 
if($_POST['page'] == 'view_table')
{
	
 
		if($_POST['action'] == 'fetch_unapprove_invest')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'invest_approval', 'cash_invested', 'expected_returns','date_of_purchase','mode_of_payment','grace_period');


			$exam-> query = "
			SELECT * FROM clone_invest WHERE invest_approval='Inactive'
			AND ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'date_of_purchase BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
			  OR expected_returns LIKE "%'.$_POST["search"]["value"].'%" 
			  OR mode_of_payment LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = "
	    SELECT * FROM `clone_invest` WHERE invest_approval='Inactive' || invest_approval='Disapproved'";
	   $total_rows = $exam->total_row();
	   
			$data = array(); 
			
			
			foreach($result as $row)
			{
			
			$inv_details='<a href="index.php?details_invest='.$row["invoice_no"].'" style="text-decoration:underline;">Check Details</a>'; 
							
							  

			$approval_action = '                           
						<form method="POST">
						<input type="hidden" value="'.$row["invoice_no"].'"  name="1" />
						<input type="hidden" value="Approved"  name="2" />
						<input type="submit" class="btn btn-info" value="Approve now"  name="approve_invest_payment" />

						</form>';

			$delete_action = ' <a href="index.php?delete_invest='.$row["invoice_no"].'" class="btn btn-danger"> Delete</a>';
			$cash_invested=number_format($row["cash_invested"],2);
			$expected_returns=number_format($row["expected_returns"],2);
						
 
			 
		 $sub_array = array(); 
		  
		 $sub_array[] = $row["invoice_no"].'<br>'.$inv_details;
		 $sub_array[] = $row["invest_approval"];
		 $sub_array[] = '₦'.$cash_invested;
		 $sub_array[] = '₦'.$expected_returns;
		 $sub_array[] = $row["date_of_purchase"];
		 $sub_array[] = $row["grace_period"];
		 $sub_array[] = $row["mode_of_payment"];
		 $sub_array[] = $approval_action.'<hr>'.$delete_action ;
		 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	

		if($_POST['action'] == 'fetch_approved_invest')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'invest_approval', 'cash_invested', 'expected_returns','returns_date','date_approved');


			$exam-> query = "
			SELECT * FROM `clone_invest` WHERE `running_invest` = 'Running' AND '$current_date' <`returns_date`
			AND ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'date_approved BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
			  OR cash_invested LIKE "%'.$_POST["search"]["value"].'%" 
			  OR upfront_payment LIKE "%'.$_POST["search"]["value"].'%" 
			  OR upfront_payment LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_approved LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = "
	   SELECT * FROM `clone_invest` WHERE `running_invest` = 'Running' AND '$current_date' <`returns_date`";
	   $total_rows = $exam->total_row();
	   
			$data = array(); 
			
			$upfront_requested="Not Requested";	
			foreach($result as $row)
			{
				$invest_id       =$row['id'];
				$invoice_no      =$row['invoice_no'];
				$invest_approval =$row['invest_approval'];
				$cash_invested   =number_format($row['cash_invested'],2);
				$returns_date    =$row['returns_date'];
				$approval_date   =$row['date_approved'];
				$upfront_payment =$row['upfront_payment'];
				$expected_returns=number_format($row['expected_returns'],2);
				
			$inv_details="
						<tr role='row' class='odd'>
						<td tabindex='0' class='sorting_1'> $invoice_no<br>

						<a href='index.php?details_invest=$invoice_no'>Check Details
						<i class='fa fa-check-circle' style='font-size:1.1em !important; color:green'></i> 
						</a>
						</td>
	                  "; 
							
		 		  
				if($upfront_payment == $upfront_requested)
				{

				$upfront=" 
					<form method='POST'>
					<input type='hidden' value='$invoice_no'  name='1' />
					<input type='hidden' value='Upfront Payment'  name='2' />
					<input type='submit' class='btn btn-danger'value='Approve Upfront'  name='approve_invest_payment' />

					</form> ";

				}
				else
				{
				$upfront="<center><i class='fa fa-bell' style='font-size:1.5em !important;color:red'></i> <center><br>
				          ₦$upfront_payment";

				}
			 
						
 
			 
		 $sub_array = array(); 
		 $sub_array[] = $inv_details;
		 $sub_array[] = $invest_approval;
		 $sub_array[] = '₦'.$cash_invested;
		 $sub_array[] = '₦'.$expected_returns;
		 $sub_array[] = $returns_date;
		 $sub_array[] = $approval_date;
		 $sub_array[] = $upfront;
		 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	


		if($_POST['action'] == 'fetch_matured_invest')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'running_invest', 'expected_returns', 'returns_date','date_approved');


			$exam-> query = "
			SELECT * FROM `clone_invest` WHERE   '$current_date'>=`returns_date`
			AND ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'returns_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
			  OR running_invest LIKE "%'.$_POST["search"]["value"].'%" 
			  OR expected_returns LIKE "%'.$_POST["search"]["value"].'%" 
			  OR returns_date LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_approved LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = "
	   SELECT * FROM `clone_invest` WHERE  '$current_date'>=`returns_date`";
	   $total_rows = $exam->total_row();
	   
			$data = array(); 
			
		 
			foreach($result as $row)
			{
				$invest_id        =$row['id'];
				$invoice_no       =$row['invoice_no'];
				$running_invest   =$row['running_invest'];
				$expected_returns =number_format($row['expected_returns'],2);
				$returns_date     =$row['returns_date'];
				$approval_date    =$row['date_approved'];
				
			$inv_details="
							<tr role='row' class='odd'>
							<td tabindex='0' class='sorting_1'> $invoice_no<br>
							<a href='index.php?details_invest=$invoice_no' style='text-decoration:underline;'>Check details </a>
							</td>";
							
 
						
 
			 
		 $sub_array = array(); 
         $sub_array[] = $inv_details;
		 $sub_array[] = $row["username"];
		 $sub_array[] = $row["firstname"].' '.$row["surname"];
		 $sub_array[] = $running_invest;
		 $sub_array[] = '₦'.$expected_returns;
		 $sub_array[] = $returns_date;
		 $sub_array[] = $approval_date;
		 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	

	    if($_POST['action'] == 'fetch_property_invest')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'payment_approval', 'order_name', 'order_total','date_of_purchase');


			$exam-> query = " SELECT * FROM clone_property WHERE ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'returns_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
			  OR payment_approval LIKE "%'.$_POST["search"]["value"].'%" 
			  OR order_name LIKE "%'.$_POST["search"]["value"].'%" 
			  OR order_total LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_of_purchase LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = " SELECT * FROM clone_property ";
	   $total_rows = $exam->total_row();
	   
			$data = array(); 

			foreach($result as $row)
			{
				$property_id            =$row['id'];
				$invoice_no           =$row['invoice_no'];
				$payment_approval      =$row['payment_approval'];
				$order_total          =number_format($row['order_total'],2);
				$order_name           =$row['order_name'];
				$date_of_purchase     =$row['date_of_purchase'];
				$date_approved     =$row['date_approved'];
				
			$inv_details="
						<tr role='row' class='odd'>
						<td tabindex='0' class='sorting_1'> $invoice_no<br>
						<a href='index.php?details_property=$invoice_no' style='text-decoration: ;'>Check Details </a>
						</td> ";
							
 
				if($payment_approval == "Approved")
				{


				$approved="<div  class='btn btn-success'>Approved</div> ";

				}
				else
				{
				$approved="<form method='POST'>
				<input type='hidden' value='$invoice_no'  name='1' />
				<input type='hidden' value='Approved'  name='2' />
				<input type='submit' class='btn btn-danger'value='Approve Now'  name='approve_property_payment' />

				</form>";	
				}		
 
			 
		 $sub_array = array(); 
		 $sub_array[] = $inv_details;
		 $sub_array[] = $order_name;
		 $sub_array[] = '₦'.$order_total;
		 $sub_array[] = $date_of_purchase;
		 $sub_array[] = $date_approved;
		 $sub_array[] = $approved;
		 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	


	    if($_POST['action'] == 'fetch_buildbay_invest')
		{
	 
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'first_name', 'last_name', 'email','phone','daily_amount','total_price','days_paid','days_left','date_start','date_end','current_payment','payment_date','estate_name','agent_marketer');


			$exam-> query = " SELECT * FROM buidbay_customer WHERE ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'date_start BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
			  OR email LIKE "%'.$_POST["search"]["value"].'%" 
			  OR agent_marketer LIKE "%'.$_POST["search"]["value"].'%" 
			  OR phone LIKE "%'.$_POST["search"]["value"].'%" 
			  OR payment_date LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_end LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_start LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = " SELECT * FROM buidbay_customer ";
	       $total_rows = $exam->total_row();
	   
			$data = array(); 

			foreach($result as $row)
			{
				$invoice_no          =$row['invoice_no'];
				$first_name          =$row['first_name'];
				$last_name           =$row['last_name'];
				$email               =$row['email'];
				$phone               =$row['phone'];
				$daily_amount        =number_format($row['daily_amount'],2);
				$total_price         =number_format($row['total_price'],2);
				$days_paid           =$row['days_paid'];
				$days_left           =$row['days_left'];
				$date_start          =$row['date_start'];
				$date_end            =$row['date_end'];
				$current_payment     =number_format($row['current_payment'],2);
				$payment_date        =$row['payment_date'];
				$estate_name         =$row['estate_name'];
				$agent_marketer      =$row['agent_marketer'];
				$subsidiary          =$row['subsidiary'];
				 
				$exam->query ="SELECT * FROM `subidary_title` WHERE `code` ='$subsidiary'";
			    $result_sub = $exam->query_result();
				foreach($result_sub as $row_sub){
				 $subtitle=$row_sub['title']; 
				} 
/*				
			   $exam->query = "SELECT SUM(`current_payment`)FROM `buidbay_customer` ";
				$resulttsub = $exam->query_result();
				foreach($resulttsub as $rowsub){
				$payment_status =number_format($rowsub['SUM(`current_payment`)'],2); 	

				} 


				$exam->query = "SELECT SUM(`total_price`)FROM `buidbay_customer`  ";
				$resultprice = $exam->query_result();
				foreach($resultprice as $rowprice){
				$pay_total_price =number_format($rowprice['SUM(`total_price`)'],2); 	

				} 				
 */
			 
		 $sub_array = array(); 
		 $sub_array[] = $invoice_no;
		 $sub_array[] = $first_name;
		 $sub_array[] = $last_name;
		 $sub_array[] = $email;
		 $sub_array[] = $phone;
		 $sub_array[] = $estate_name;
	     $sub_array[] = '₦'.$total_price;
		 $sub_array[] = '₦'.$daily_amount;
		 $sub_array[] = '₦'.$current_payment;
		 $sub_array[] = $days_paid;
		 $sub_array[] = $days_left;
		 $sub_array[] = $date_start;
		 $sub_array[] = $date_end;
		 $sub_array[] = $payment_date; 
		 $sub_array[] = $agent_marketer;
		 $sub_array[] = $subtitle;
		 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	

	    if($_POST['action'] == 'fetch_investor_table')
		{
	 
			$output = array();
			
	        $columns = array('id', 'current_balance', 'subsidiary_code', 'username', 'firstname', 'surname','date_of_birth','nationality',
			'home_address','gender','phone_number','registered_date','bank_name','account_name','account_number');


			$exam-> query = " 
			SELECT * FROM `login-table`  
			INNER JOIN `wallet` ON `login-table`.`username` = `wallet`.`username` WHERE ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'registered_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (username LIKE "%'.$_POST["search"]["value"].'%" 
			  OR firstname LIKE "%'.$_POST["search"]["value"].'%" 
			  OR subsidiary_code LIKE "%'.$_POST["search"]["value"].'%" 
			  OR phone_number LIKE "%'.$_POST["search"]["value"].'%" 
			  OR registered_date LIKE "%'.$_POST["search"]["value"].'%" 
			  OR bank_name LIKE "%'.$_POST["search"]["value"].'%" 
			  OR account_name LIKE "%'.$_POST["search"]["value"].'%" 
			  OR account_number LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 //$exam->query .= 'ORDER BY id DESC ';
		 $exam->query .= ' ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = "SELECT * FROM `login-table`  
			INNER JOIN `wallet` ON `login-table`.`username` = `wallet`.`username`";
           $results = $exam->query_result();
	       $total_rows = $exam->total_row();
	   
			$data = array(); 

 
		 

			foreach($result as $row)
			{
			
			
                $current_balance       =  number_format($row['current_balance'],2); 	   
				$subsidiary            =  $row['subsidiary_code'];
				$username              =  $row['username']; 	
				$firstname             =  $row['firstname'];
				$middlename            =  $row['middlename'];
				$surname               =  $row['surname'];
				$birth_day             =  $row['birth_day'];
				$birth_month           =  $row['birth_month'];
				$birth_year            =  $row['birth_year'];
				$nationality           =  $row['nationality'];	
				$home_address          =  $row['home_address'];
				$gender                =  $row['gender'];
				$phone_number          =  $row['phone_number']; 
				$registered_date       =  $row['registered_date'];	
				$bank_n                =  $row['bank_name'];
				$account_na            =  $row['account_name'];
				$account_n             =  $row['account_number']; 
		        $date_of_birth="$birth_day-$birth_month-$birth_year";
				
	
		 		
				
			
				//	$exam->query = "SELECT * FROM `login-table`  
			//INNER JOIN `wallet` ON `login-table`.`username` = `wallet`.`username` ";
			//$results = $exam->query_result(); 
		   			//foreach($results as $rows)
		 
				 $sub_array = array(); 
				 $sub_array[] = $subsidiary;
				 $sub_array[] = '₦'.$current_balance;
				 $sub_array[] = $username;
				 $sub_array[] = $firstname;
				 $sub_array[] = $middlename;
				 $sub_array[] = $surname;
				 $sub_array[] = $date_of_birth;
				 $sub_array[] = $nationality; 
				 $sub_array[] = $home_address;
				 $sub_array[] = $gender;
				 $sub_array[] = $phone_number; 
				 $sub_array[] = $registered_date;
				 $sub_array[] = $bank_n;
				 $sub_array[] = $account_na;
				 $sub_array[] = $account_n;
				 $data[] = $sub_array;
  


		}
 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	


	    if($_POST['action'] == 'fetch_admin1_table')
		{
	 
			$output = array();
			
	        $columns = array('id', 'staff_id', 'firstname', 'middlename', 'surname','home_address','gender','date_of_birth',
			'marital_status','number','email','city','state','nationality','registrant','register_date');


			$exam-> query = " SELECT * FROM login_admin_level1 WHERE ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'register_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (staff_id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR firstname LIKE "%'.$_POST["search"]["value"].'%" 
			  OR surname LIKE "%'.$_POST["search"]["value"].'%" 
			  OR gender LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_of_birth LIKE "%'.$_POST["search"]["value"].'%" 
			  OR registrant LIKE "%'.$_POST["search"]["value"].'%" 
			  OR register_date LIKE "%'.$_POST["search"]["value"].'%" 
			  OR email LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = " SELECT * FROM login_admin_level1 ";
	       $total_rows = $exam->total_row();
	   
			$data = array(); 

			foreach($result as $row)
			{
				        $ids            =$row['id']; 
				        $m_staff_id     =$row['staff_id'];        
					 	$m_username      =$row['username']; 
						$passwords      =$row['password'];  
						$m_firstname     =$row['firstname'];      
						$m_middlename    =$row['middlename'];      
						$m_surname     =$row['surname'];
					 	$m_home_address  =$row['home_address']; 
						$m_gender        =$row['gender'];        
						$m_date_of_birth =$row['date_of_birth'];  
						$m_marital_status=$row['marital_status'];
					 	$m_number        =$row['number']; 
						$m_email         =$row['email'];                     
						$m_city          =$row['city']; 
						$m_state         =$row['state']; 
						$m_nationality   =$row['nationality'];
						
					    $office_portfolios     =$row['office_portfolio']; 
						$m_registrant           =$row['registrant']; 
						$registrant_portfolios =$row['registrant_portfolio'];  
					 	$registrant_phones     =$row['registrant_phone']; 
					    $sub_sidiary_code       =$row['subsidiary_code'];   
					    $m_register_date        =$row['register_date'];  
				 

			 
						 $sub_array = array(); 
						 $sub_array[] = $m_staff_id;
						 $sub_array[] = $m_username;
						 $sub_array[] = $m_firstname;
						 $sub_array[] = $m_middlename;
						 $sub_array[] = $m_surname;
						 $sub_array[] = $m_home_address;
						 $sub_array[] = $m_gender; 
						 $sub_array[] = $m_date_of_birth;
						 $sub_array[] = $m_marital_status;
						 $sub_array[] = $m_number; 
						 $sub_array[] = $m_email;
						 $sub_array[] = $m_city;
						 $sub_array[] = $m_state;
						 $sub_array[] = $m_nationality;
						 $sub_array[] = $m_registrant;
						 $sub_array[] = $m_register_date;
						 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	

	    if($_POST['action'] == 'fetch_admin2_table')
		{
	 
			$output = array();
			
	        $columns = array('id', 'staff_id', 'firstname', 'middlename', 'surname','home_address','gender','date_of_birth',
			'marital_status','number','email','city','state','nationality','registrant','register_date');


			$exam-> query = " SELECT * FROM login_admin_level2 WHERE ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'register_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (staff_id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR firstname LIKE "%'.$_POST["search"]["value"].'%" 
			  OR surname LIKE "%'.$_POST["search"]["value"].'%" 
			  OR gender LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_of_birth LIKE "%'.$_POST["search"]["value"].'%" 
			  OR registrant LIKE "%'.$_POST["search"]["value"].'%" 
			  OR register_date LIKE "%'.$_POST["search"]["value"].'%" 
			  OR email LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = " SELECT * FROM login_admin_level2 ";
	       $total_rows = $exam->total_row();
	   
			$data = array(); 

			foreach($result as $row)
			{
				        $ids            =$row['id']; 
				        $m_staff_id     =$row['staff_id'];        
					 	$m_username      =$row['username']; 
						$passwords      =$row['password'];  
						$m_firstname     =$row['firstname'];      
						$m_middlename    =$row['middlename'];      
						$m_surname     =$row['surname'];
					 	$m_home_address  =$row['home_address']; 
						$m_gender        =$row['gender'];        
						$m_date_of_birth =$row['date_of_birth'];  
						$m_marital_status=$row['marital_status'];
					 	$m_number        =$row['number']; 
						$m_email         =$row['email'];                     
						$m_city          =$row['city']; 
						$m_state         =$row['state']; 
						$m_nationality   =$row['nationality'];
						
					    $office_portfolios     =$row['office_portfolio']; 
						$m_registrant           =$row['registrant']; 
						$registrant_portfolios =$row['registrant_portfolio'];  
					 	$registrant_phones     =$row['registrant_phone']; 
					    $sub_sidiary_code       =$row['subsidiary_code'];   
					    $m_register_date        =$row['register_date'];  
				 

			 
						 $sub_array = array(); 
						 $sub_array[] = $m_staff_id;
						 $sub_array[] = $m_username;
						 $sub_array[] = $m_firstname;
						 $sub_array[] = $m_middlename;
						 $sub_array[] = $m_surname;
						 $sub_array[] = $m_home_address;
						 $sub_array[] = $m_gender; 
						 $sub_array[] = $m_date_of_birth;
						 $sub_array[] = $m_marital_status;
						 $sub_array[] = $m_number; 
						 $sub_array[] = $m_email;
						 $sub_array[] = $m_city;
						 $sub_array[] = $m_state;
						 $sub_array[] = $m_nationality;
						 $sub_array[] = $m_registrant;
						 $sub_array[] = $m_register_date;
						 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	

 		if($_POST['action'] == 'fetch_mortgagevest_table')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'invest_approval', 'cash_invested', 'expected_returns','returns_date','date_approved');


			$exam-> query = "
			SELECT * FROM `clone_mortgagevest` WHERE ";


			if($_POST["is_date_search"] == "yes")
			{
			 $exam->query .= 'date_of_purchase BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
			}

			if(isset($_POST["search"]["value"]))
			{
			$exam->query .= '
			  (id LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
			  OR cash_invested LIKE "%'.$_POST["search"]["value"].'%" 
			  OR invest_approval LIKE "%'.$_POST["search"]["value"].'%" 
			  OR upfront_payment LIKE "%'.$_POST["search"]["value"].'%" 
			  OR payment_approval LIKE "%'.$_POST["search"]["value"].'%" 
			  OR running_invest LIKE "%'.$_POST["search"]["value"].'%" 
			  OR date_approved LIKE "%'.$_POST["search"]["value"].'%")';
			 }

	 

		if(isset($_POST["order"]))
		{
		 $exam->query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
		 ';
		}
		else
		{
		 $exam->query .= 'ORDER BY id DESC ';
		}

		$extra_query = '';

		if($_POST["length"] != -1)
		{
		 $extra_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

			$filterd_rows = $exam->total_row();

			$exam->query .= $extra_query;

			$result = $exam->query_result();
           
			$exam->query = "SELECT * FROM `clone_mortgagevest`  ";
	   $total_rows = $exam->total_row();
	   
			$data = array(); 
			
			$upfront_requested="Not Requested";	
			foreach($result as $row)
			{
				$invest_id       =$row['id'];
				$firstname       =$row['firstname'];
				$surname         =$row['surname'];
				$username        =$row['username'];
				$invoice_no      =$row['invoice_no'];
				$invest_approval =$row['invest_approval'];
				$cash_invested   =number_format($row['cash_invested'],2);
				$returns_date    =$row['returns_date'];
				$approval_date   =$row['date_approved'];
				$running_invest   =$row['running_invest'];
				$date_of_purchase=$row['date_of_purchase'];
				$upfront_payment =$row['upfront_payment'];
				$expected_returns=number_format($row['expected_returns'],2);
				
				if($invest_approval == 'Approved')
				{
       			$inv_details="	$invoice_no<br>
				        <a href='index.php?details_mortgagevest=$invoice_no'>Check Details
						<i class='fa fa-check-circle' style='font-size:1.1em !important; color:green'></i> 
						</a>";             
       			                 
				}
                else  
				{
					
		          			$inv_details="	$invoice_no<br>
				        <a href='index.php?details_mortgagevest=$invoice_no'>Check Details
						<i class='fa fa-times-circle' style='font-size:1.1em !important; color:red'></i> 
						</a>"; 
				 
				}					
				

				if($invest_approval == 'Approved')
				{
       			$delete_invest=" <div class='btn btn-success'>Approved </div>";                
				}
                else  
				{
					
		    	  
				
				$delete_invest="
						 
				<a href='index.php?delete_mortgagevest=$invoice_no' class='btn btn-danger'> Delete Invest </a> <br><br>
				
				<form method='POST'>
				<input type='hidden' value='$invoice_no'  name='1' />
				<input type='hidden' value='Approved'  name='2' /> 
				<input type='submit' class='btn btn-warning'value='Approve Invest'  name='approve_mortgagevest_payment' />

				</form> ";
				}					
				




				
			$shares_allocation=""; 
							
		 		  
				if($upfront_payment == $upfront_requested)
				{

				$upfront=" 
				<form method='POST'>
				<input type='hidden' value='$invoice_no'  name='1' />
				<input type='hidden' value='Upfront Payment'  name='2' />
					<input type='submit' class='btn btn-danger'value='Approve Upfront'   name='approve_mortgagevest_payment' />

				</form> ";

				}
				else
				{
				$upfront="<center><i class='fa fa-bell' style='font-size:1.5em !important;color:red'></i> <center><br>
				          ₦$upfront_payment";

				}
			    $investor="$firstname $surname";
						
 
			 
		 $sub_array = array(); 
		 $sub_array[] = $inv_details;
		 $sub_array[] = $username;
		 $sub_array[] = $investor;
		 $sub_array[] = $running_invest;
		 $sub_array[] = $invest_approval;
		 $sub_array[] = '₦'.$cash_invested;
		 $sub_array[] = '₦'.$expected_returns;
		 $sub_array[] = $returns_date;
		 $sub_array[] = $approval_date;
	     $sub_array[] = $upfront;
		 $sub_array[] = $shares_allocation;
		 $sub_array[] = $date_of_purchase;
		 $sub_array[] = $delete_invest;
		 $data[] = $sub_array;
		}

 

			$output = array(
			 	"draw"    			=> 	intval($_POST["draw"]),
			 	"recordsTotal"  	=>  $total_rows,
			 	"recordsFiltered" 	=> 	$filterd_rows,
			 	"data"    			=> 	$data
			);
			 

		echo json_encode($output);

		}
	
 

}
?>
