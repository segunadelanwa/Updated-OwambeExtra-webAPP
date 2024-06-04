<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>GreenVine CropVest Compnay Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="">


<script rc="..\js_form/jquery.min.js"></script>
<link   el="stylesheet" ref="..\js_form/bootstrap.min.css"/>
<script rc="..\js_form/bootstrap.min.js"></script> 


<link   rel="stylesheet" href="table/datatables.min.css"/>
<script src="table/datatables.min.js"></script> 

<link rel="stylesheet" href="..\css/main.css"/>
	<link rel="stylesheet" ref="..\css/bootstrap.css">
</head>
 
 
<body style="background:#eeeeee;">
<br><br><br>
<center><a href="index.php"><h3>Back to previous page</h3></a></center>
 <!----VIEW ALL SUBSCRIBERS LOGIN TABLE AT GLANCE----->
<section>		
<?php
require"config.php";
if(isset($_GET['all_subscribers']))
{

 

echo"<div lass='card mb-3'style='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
                     ALL NEW & EXISTING SUBSCRIBERS DATABASE
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 <button id='examples1'>pdf</button>
	 <div class='row'>
		  <div lass='col-sm-12' style='background:white;'><br>
			 <table tyle=' ' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>
								
					<thead>
					<tr role='row'>
 
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Subscriber Unique ID
						</th>
						

						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					    Subscriber username
						</th>
						

						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Subscriber referal_code
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Subscriber  firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Subscriber  Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					    Subscriber  surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Subscriber  Date of Birth
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Subscriber  Nationality
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Subscriber  Home Address
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Subscriber  Gender
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						investment Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					   Subscriber  City
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Subscriber  State
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Subscriber  Security QUE
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Subscriber  Security ANS
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						 Subscriber Agreement Checked
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						 Subscriber Registered Date 
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					    Subscriber IP address
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						 Subscriber Bank Name
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						 Subscriber Account Name 
						</th>
						

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Subscriber Account Number
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Relation Officer Name
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relation Officer Phone
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						IRO Manager Name
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						IRO Number Phone
						</th>						
						
					 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Profile Approval
						</th>

			 
					</tr>
					</thead>
								
				<tbody>
				";
					
					
					//INVESTOR INVESTMENT TABLE CALL UP/////////////
		$login_table ="SELECT * FROM `login-table` ";
		$investor_result=mysqli_query($homedb, $login_table);
		while ($row = mysqli_fetch_array($investor_result))
		{
    $id                    =  $row['id'];
	$photo                 =  $row['photo'];
	$unique_id             =  $row['unique_id'];
	$username              =  $row['username'];
	$password              =  $row['password'];
	$referal_code          =  $row['referal_code'];
	$firstname             =  $row['firstname'];
	$middlename            =  $row['middlename'];
	$surname               =  $row['surname'];
	$date_of_birth         =  $row['date_of_birth'];
	$nationality           =  $row['nationality'];	
	$home_address          =  $row['home_address'];
	$gender                =  $row['gender'];
	$phone_number          =  $row['phone_number'];
	$city                  =  $row['city'];
	$state                 =  $row['state'];
	$security_question     =  $row['security_question'];
	$security_answers      =  $row['security_answers'];
	$agreement_checked     =  $row['agreement_checked'];
	$registered_date       =  $row['registered_date'];	
	$ip_address            =  $row['ip_address'];
    $bank_n                =  $row['bank_name'];
    $account_na            =  $row['account_name'];
    $account_n             =  $row['account_number'];
	$r_o_name              =  $row['r_o_name'];
    $r_o_phone             =  $row['r_o_phone'];
    $i_r_m_name            =  $row['i_r_m_name'];
    $i_r_m_phone           =  $row['i_r_m_phone'];
    $update_approve        =  $row['update_approve'];


								
				
echo"			
<tr role='row' class='odd'>
	<td tabindex='0' class='sorting_1'>$unique_id</td> 
	<td>$username         </td> 
	<td>$referal_code     </td>
	<td>$firstname        </td>
	<td>$middlename       </td>
	<td>$surname          </td>
	<td>date_of_birth     </td>
	<td>$nationality      </td>
	<td>$home_address     </td>
	<td>$gender           </td>
	<td>$phone_number     </td>
	<td>$city             </td>
	<td>$state            </td>
	<td>$security_question</td>
	<td>$security_answers </td>
	<td>$agreement_checked </td>
	<td>$registered_date   </td>
	<td>$ip_address        </td>
	<td>$bank_n            </td>
	<td>$account_na        </td>
	<td>$account_n         </td> 
	<td>$r_o_name          </td>
	<td>$r_o_name          </td>
	<td>$i_r_m_name        </td>
	<td>$i_r_m_name        </td>
	<td>$update_approve       </td>
</tr>"; 
		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div>";
}
	
?>
</section>        
 <!----VIEW ALL SUBSCRIBERS LOGIN TABLE AT GLANCE ENDS ----->


<!----VIEW SINGLE INVESTORS TABLE----->
<section>		
<?php
if(isset($_POST['sub_search']))
{
	
	$email_sub=$_POST['search_subscriber'];

		 

			$query_log = "SELECT * FROM `login-table` WHERE `username`='$email_sub' ";
			$run=mysqli_query($homedb, $query_log);	 
			 $query_num_login = mysqli_num_rows($run);

 
		$investor ="SELECT * FROM `$email_sub` ";
		$investor_result=mysqli_query($investdb, $investor);
		while($row = mysqli_fetch_array($investor_result))
		{
		$fname   =$row['firstname'];	
		$surname = $row['surname'];
		}

		 
	if($query_num_login === 1)
	{


			if(!empty($surname))
			  {



			echo"<div lass='card mb-3'tyle='font-size:15px;'>
						<div class='card-header-tab card-header'>
							<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
								 
						<center><span style='text-transform:uppercase;'>$surname $fname </span> &nbsp; INVESTMENT HISTORY</center>
							</div>
							
					 
				 
						</div>
						
						<div class='card-body'>
							<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
							
							<div class='row'>
			 
						 </div>
			 
				 <div class='row'>
					  <div lass='col-sm-12'Style='background-color:white;'><br>
						 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

												
								<thead>
								<tr role='row'>
									<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
									Username
									</th>
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
									Firstname
									</th>
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
									 Middlename
									</th>
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
									Surname
									</th>
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
									Phone
									</th>
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									City
									</th>

									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Referal Code
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Investment Id
									</th>
			 

									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Investment name
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
									Investment_t&c_confirmed
									</th>

									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
									T&C Date Confirmed
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Quantity Of Farmlots
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									First Returns
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Seconde Returns
									</th>

									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Third Returns
									</th>


									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Final Returns
									</th>

									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Principal Repayment
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Investment Amount Paid
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Payment Date
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Investment Officer
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Payment Confirmed
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Confirmed Date
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Officer Number
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Investor Home Address
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									First Returns Cal
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Seconde Returns Cal
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Third Returns Cal
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Final Returns Cal
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Total Returns Cal
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Investment Option at Due
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Off Plan Terminate
									</th>						
									
							 						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Super Admin Confirmation
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Super Admin Name
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									First Returns Date
									</th>

									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Seconde Returns Date
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Third Returns Date
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Final Returns Date
									</th>						
									
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
									Principal Repayment
									</th>
			 
					 
								</tr>
								</thead>
											
							<tbody>
							";
								
								
								//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
					$investor ="SELECT * FROM `$email_sub` ";
					$investor_result=mysqli_query($investdb, $investor);
					while ($row = mysqli_fetch_array($investor_result))
					{
						$investor_tab_id       =$row['id']; 
						$username              =$row['username']; 
						$firstname             =$row['firstname'];
						$middlename            =$row['middlename'];
						$surname               =$row['surname']; 
						$phone                 =$row['phone']; 
						$city                  =$row['city']; 
						$referal_code          =$row['referal_code']; 
						$investment_id         =$row['investment_id']; 
						$investment_name       =$row['investment_name']; 
						$investment_tandc      =$row['investment_t&c_confirmed']; 
						$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
						$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
						$first_returns         =$row['first_returns']; 
						$seconde_returns       =$row['seconde_returns'];
						$third_returns         =$row['third_returns']; 
						$final_returns         =$row['final_returns'];
						$principal_repayment   =$row['principal_repayment']; 
						$investment_amount_paid=$row['investment_amount_paid']; 
						$payment_date          =$row['payment_date']; 
						$investment_officer    =$row['relationship_officer_code']; 
						$payment_confirmed     =$row['payment_confirmed']; 
						$confirmed_date        =$row['confirmed_date']; 
						$officer_number        =$row['relationship_officer_name']; 
						$home_address          =$row['home_address']; 
						$cal_first_returns     =$row['cal_first_returns']; 
						$cal_seconde_returns   =$row['cal_seconde_returns']; 
						$cal_third_returns     =$row['cal_third_returns']; 
						$cal_final_returns     =$row['cal_final_returns']; 
						$cal_total_returns     =$row['cal_total_returns']; 
						$investment_option     =$row['investment_option']; 
						$Off_plan_terminate    =$row['off_plan_terminate'];  
						$super_adm1            =$row['super_adm1']; 
						$super_adm2            =$row['super_adm2']; 
						$first_returns_date    =$row['first_returns_date']; 
						$seconde_returns_date  =$row['seconde_returns_date']; 
						$third_returns_date    =$row['third_returns_date']; 
						$final_returns_date    =$row['final_returns_date']; 
						$capital_returns_date   =$row['capital_returns_date']; 
						

											
							
			echo"			
			<tr role='row' class='odd'>
				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$investment_officer</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_number</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td>
				<td>$super_adm2</td>
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td>
				 
				 
			</tr>"; 
					
			} 
																		
			   
			echo"</tbody> 
						
			</table>
			</div>
			</div>


			 
			 </div>

			</div>

			</div>";


				}
			  else
			  {
				header("location: index.php?failed5");
			  }
	}
	else
	{
		header("location: index.php?failed2");
	}

}	
?>
</section>        
 <!----MY INVESTMENT TABLE ----->



<!----VIEW ALL INVESTORS TABLE----->
<section>		
<?php
if(isset($_GET['all_investment'])){

 


echo"<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			 ALL INVESTMENT HISTORY</center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>
					
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='overflow:hidden;width:40.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Status
						</th>
						
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width:auto;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Temporary Investment Id
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						New Investment Id
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width:5px;' aria-label='Salary: activate to sort column ascending'>
						T&C
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
					 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation  
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin
						</th>						
						
			 					
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>


	 
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$tem_invest_id         =$row['tem_invest_id']; 
			$referal_code          =$row['referal_code']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$officer_code          =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_name          =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];  
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			
$query_rec_table ="SELECT * FROM `all_receipt` WHERE `invest_autogen_id`='$investment_id'";
$query_ref_result=mysqli_query($homedb,$query_rec_table); 
@$query_num_all_receipt = mysqli_num_rows($query_ref_result);
$not="Not-Approved";								
 $invest_id=strlen($investment_id);								
$cal_first=strlen($cal_first_returns);								
 							
		if($query_num_all_receipt == 1) 
		{				
          echo"			
			<tr role='row' class='odd'>
<td   style='background-color:green;font-size:20px;color:white;border-radius:5px;'>Activated Investment</td>
				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$tem_invest_id</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$officer_code</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_name</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td> 
				<td>$super_adm2</td> 
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td>
				 
			</tr>"; 
		}
        else
        {
			if(($invest_id <= 11) and ($cal_first > 1))
			{
	        echo" 
			<tr role='row' class='odd'>
			<td   style='background-color:gold;font-size:20px;color:black;border-radius:5px;'>Approved Investment</td>

				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$tem_invest_id</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$officer_code</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_name</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td> 
				<td>$super_adm2</td> 
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td>
			</tr>";
			
            }else			
			
			if(($invest_id <= 11) or ($cal_first > 1))
			{
	        echo" 
			<tr role='row' class='odd'>
<td   style='background-color:pink;font-size:20px;color:black;border-radius:5px;'>Not fully Approved</td>

				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$tem_invest_id</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$officer_code</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_name</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td> 
				<td>$super_adm2</td> 
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td>
			</tr>";
			
            }	
            else
            {
			if(($invest_id > 11) or ($cal_first > 1) ) 
			{				
	        echo" 
				<tr role='row' class='odd'>
			<td   style='background-color:red;font-size:20px;color:yellow;border-radius:5px;'><a href='index.php?tem_id=$tem_invest_id&refer=$referal_code&user=$username'style='color:white;'>Delete Pending Investment</a></td>				
			<td tabindex='0' class='sorting_1'>$username</td>
					<td>$firstname</td>
					<td>$middlename</td>
					<td>$surname</td>
					<td>$phone</td>
					<td>$city</td>
					<td>$referal_code</td>
					<td>$tem_invest_id</td>
					<td>$investment_id</td>
					<td>$investment_name</td>
					<td>$investment_tandc </td>
					<td>$invest_tandc_date</td>
					<td>$quantity_of_farm_lots</td>
					<td>$first_returns</td>
					<td>$seconde_returns</td>
					<td>$third_returns</td>
					<td>$final_returns</td>
					<td>$principal_repayment</td>
					<td>$investment_amount_paid</td>
					<td>$payment_date</td>
					<td>$officer_code</td>
					<td>$payment_confirmed</td>
					<td>$confirmed_date</td>
					<td>$officer_name</td>
					<td>$home_address</td>
					<td>$cal_first_returns</td>
					<td>$cal_seconde_returns</td>
					<td>$cal_third_returns</td>
					<td>$cal_final_returns</td>
					<td>$cal_total_returns</td>
					<td>$investment_option</td>
					<td>$Off_plan_terminate</td> 
					<td>$super_adm1</td> 
					<td>$super_adm2</td> 
					<td>$first_returns_date</td>
					<td>$seconde_returns_date</td>
					<td>$third_returns_date</td>
					<td>$final_returns_date</td>
					<td>$capital_returns_date</td>
				  
					 
				 
					 
				</tr>";
				}
			}				
        }	
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div>";
}
	
?>

</section>        
 <!----VIEW ALL INVESTORS  TABLE ----->

 <!----VIEW ALL REFERAL LOGIN TABLE AT GLANCE----->
<section>		
<?php
 
if(isset($_GET['all_referal'])){

 

echo"<div lass='card mb-3'style='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
                     ALL    INVESTMENT WITH REFERAL
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12' style='background:white;'><br>
			 <table tyle=' ' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>
								
					<thead>
					<tr role='row' style='font-weight:none;'>
 
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						id
						</th>
						

						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					   Referal Names
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					   Referal Code
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					  investment_name
						</th>
						

						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					 	Old investment ID
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						New investment ID
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Subscriber  names
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					    Subscriber  Email
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						 Total Lots 
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Investment Commission
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						 Investment Payment
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
					 	Investment Complete Date
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						first Returns Payment status
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					   Second Returns Payment Status
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Third Returns Payment Status
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Final Retuns payment staus
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Status
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate 
						</th>						
						
				 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Confirmation
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Referal Commission Status
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Date Referal Commission Paid
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					      Commission Payment Officer
						</th>
						
						 


			 
					</tr>
					</thead>
								
				<tbody>
				";
					
					
					//INVESTOR INVESTMENT TABLE CALL UP/////////////
		$login_table ="SELECT * FROM `all_referal_table` ";
		$investor_result=mysqli_query($homedb, $login_table);
		while ($row = mysqli_fetch_array($investor_result))
		{
    $id                             =  $row['id'];
    $referal_names                  =  $row['referal_names'];
    $referal_code                   =  $row['referal_code'];
    $investment_name                =  $row['investment_name'];
    $tem_invest_id                  =  $row['tem_invest_id'];
    $investment_id                  =  $row['investment_id'];
    $investor_name                  =  $row['investor_name'];
    $investor_email                 =  $row['investor_email'];
    $total_lots_unit                =  $row['total_lots_unit'];
    $invest_commission              =  $row['invest_commission'];
    $investment_amount_paid         =  $row['investment_amount_paid'];
    $invest_complete_date           =  $row['invest_complete_date'];
    $first_returns_payment_status   =  $row['first_returns_payment_status'];
    $second_returns_payment_status  =  $row['second_returns_payment_status'];
    $third_returns_payment_status   =  $row['third_returns_payment_status'];
    $final_returns_payment_status   =  $row['final_returns_payment_status'];
    $principal_repayment_status     =  $row['principal_repayment_status'];
    $investment_option              =  $row['investment_option'];
    $off_plan_terminate             =  $row['off_plan_terminate']; 
    $investment_confirmation        =  $row['investment_confirmation'];
    $referal_commission_payment     =  $row['referal_commission_payment'];
    $date_referal_commission_paid   =  $row['date_referal_commission_paid'];
    $commission_payment_officer     =  $row['commission_payment_officer'];
 	
 	
			
				
echo"			
<tr role='row' class='odd'>
	<td tabindex='0' class='sorting_1'></td> 
	<td>$referal_names</td> 
	<td>$referal_code</td>
	<td> $investment_name</td>
	<td>$tem_invest_id</td>
	<td>$investment_id</td>
	<td>$investor_name</td>
	<td>$investor_email</td>
	<td>$total_lots_unit</td>
	<td>$invest_commission</td>
	<td>$investment_amount_paid</td>
	<td>$invest_complete_date</td>
	<td>$first_returns_payment_status</td>
	<td>$second_returns_payment_status</td>
	<td>$third_returns_payment_status</td>
	<td>$final_returns_payment_status</td>
	<td>$principal_repayment_status</td>
	<td>$investment_option</td>
	<td>$off_plan_terminate</td> 
	<td>$investment_confirmation</td>
	<td>$referal_commission_payment</td>
	<td>$date_referal_commission_paid</td>
	<td>$commission_payment_officer </td> 

</tr>"; 
		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div>";
}
	
?>
</section>  


<!----VIEW ALL CONFIRMED AND ACTIVATE TABLE----->
<section>		
<?php
if(isset($_GET['activate']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  ACTIVATE INVESTMENT </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					    ACTIVATION STATUS
						</th>
						
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>	

								
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						New Investment ID
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
					 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>



						 
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$tem_invest_id         =$row['tem_invest_id']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$rela_officer_code     =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];   
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			

$query_rec_table ="SELECT * FROM `all_receipt` WHERE `invest_autogen_id`='$investment_id'";
$query_ref_result=mysqli_query($homedb,$query_rec_table); 
@$query_num_all_receipt = mysqli_num_rows($query_ref_result);
$not="Not-Approved";								
 $invest_id=strlen($investment_id);								
$cal_first=strlen($cal_first_returns);								
 							
	   if($query_num_all_receipt == 1) 
       {		
	echo"
		
	<tr role='row' class='odd'> 
		<td   style='background-color:green;font-size:20px;color:white;border-radius:5px;'>Investment Activated </td>

		<td tabindex='0' class='sorting_1'>$username</td>
		<td>$firstname</td>
		<td>$middlename</td>
		<td>$surname</td>
		<td>$phone</td>
		<td>$city</td>
		<td>$referal_code</td>
		<td>$investment_id</td>
		<td>$investment_name</td>
		<td>$investment_tandc </td>
		<td>$invest_tandc_date</td>
		<td>$quantity_of_farm_lots</td>
		<td>$first_returns</td>
		<td>$seconde_returns</td>
		<td>$third_returns</td>
		<td>$final_returns</td>
		<td>$principal_repayment</td>
		<td>$investment_amount_paid</td>
		<td>$payment_date</td>
		<td>$rela_officer_code</td>
		<td>$payment_confirmed</td>
		<td>$confirmed_date</td>
		<td>$officer_number</td>
		<td>$home_address</td>
		<td>$cal_first_returns</td>
		<td>$cal_seconde_returns</td>
		<td>$cal_third_returns</td>
		<td>$cal_final_returns</td>
		<td>$cal_total_returns</td>
		<td>$investment_option</td>
		<td>$Off_plan_terminate</td> 
		<td>$super_adm1</td>
		<td>$super_adm2</td>
		<td>$first_returns_date</td>
		<td>$seconde_returns_date</td>
		<td>$third_returns_date</td>
		<td>$final_returns_date</td>
		<td>$capital_returns_date</td> 

	</tr>	



	"; 
}
	   else
	   {		
           if(($invest_id <= 11) and ($cal_first > 1) ) 
			{
				echo"
					
		<tr role='row' class='odd'> 
		 <form  method='POST' action='index.php'>	
		    <input type='hidden' name='1' value='$username'/> 
			<input type='hidden' name='2' value='$firstname'/>
			<input type='hidden' name='3' value='$middlename' />
			<input type='hidden' name='4' value='$surname'/>
			<input type='hidden' name='5' value='$phone'/>
			<input type='hidden' name='6' value='$city'/>
			<input type='hidden' name='7' value='$referal_code'/>
			<input type='hidden' name='8' value='$investment_id'/>
			<input type='hidden' name='41' value='$tem_invest_id'/> 
			<input type='hidden' name='9'  value='$investment_name'/>
			<input type='hidden' name='10' value='$investment_tandc '/>
			<input type='hidden' name='11' value='$invest_tandc_date'/>
			<input type='hidden' name='12' value='$quantity_of_farm_lots'/>
			<input type='hidden' name='13' value='$first_returns'/>
			<input type='hidden' name='14' value='$seconde_returns'/>
			<input type='hidden' name='15' value='$third_returns'/>
			<input type='hidden' name='16' value='$final_returns'/>
			<input type='hidden' name='17' value='$principal_repayment'/>
			<input type='hidden' name='18' value='$investment_amount_paid'/>
			<input type='hidden' name='19' value='$payment_date'/>
			<input type='hidden' name='20' value='$rela_officer_code'/>
			<input type='hidden' name='21' value='$payment_confirmed'/>
			<input type='hidden' name='22' value='$confirmed_date'/>
			<input type='hidden' name='23' value='$officer_number'/>
			<input type='hidden' name='24' value='$home_address'/>
			<input type='hidden' name='25' value='$cal_first_returns'/>
			<input type='hidden' name='26' value='$cal_seconde_returns'/>
			<input type='hidden' name='27' value='$cal_third_returns'/>
			<input type='hidden' name='28' value='$cal_final_returns'/>
			<input type='hidden' name='29' value='$cal_total_returns'/>
			<input type='hidden' name='30' value='$investment_option'/>
			<input type='hidden' name='31' value='$Off_plan_terminate'/> 
			<input type='hidden' name='33' value='$super_adm1'/>
			<input type='hidden' name='34' value='$super_adm2'/>
			<input type='hidden' name='35' value='$first_returns_date'/>
			<input type='hidden' name='36' value='$seconde_returns_date'/>
			<input type='hidden' name='37' value='$third_returns_date'/>
			<input type='hidden' name='38' value='$final_returns_date'/>
			<input type='hidden' name='39' value='$capital_returns_date'/> 

		  <td style='background-color:gold;font-size:20px;color:white;border-radius:10px;'  >  
		  <input type='submit'name='40'  value=' Push to  Activate  ' style='border:none;background-color:gold;'   /> </td> 
				   
					<td tabindex='0' class='sorting_1'>$username</td>
					<td>$firstname</td>
					<td>$middlename</td>
					<td>$surname</td>
					<td>$phone</td>
					<td>$city</td>
					<td>$referal_code</td>
					<td>$investment_id</td>
					<td>$investment_name</td>
					<td>$investment_tandc </td>
					<td>$invest_tandc_date</td>
					<td>$quantity_of_farm_lots</td>
					<td>$first_returns</td>
					<td>$seconde_returns</td>
					<td>$third_returns</td>
					<td>$final_returns</td>
					<td>$principal_repayment</td>
					<td>$investment_amount_paid</td>
					<td>$payment_date</td>
					<td>$rela_officer_code</td>
					<td>$payment_confirmed</td>
					<td>$confirmed_date</td>
					<td>$officer_number</td>
					<td>$home_address</td>
					<td>$cal_first_returns</td>
					<td>$cal_seconde_returns</td>
					<td>$cal_third_returns</td>
					<td>$cal_final_returns</td>
					<td>$cal_total_returns</td>
					<td>$investment_option</td>
					<td>$Off_plan_terminate</td> 
					<td>$super_adm1</td>
					<td>$super_adm2</td>
					<td>$first_returns_date</td>
					<td>$seconde_returns_date</td>
					<td>$third_returns_date</td>
					<td>$final_returns_date</td>
					<td>$capital_returns_date</td> 

					
					

				
				</form>
			</tr>	



				"; 

		    }
			else

			if(($invest_id <= 11) or ($cal_first > 1) ) 
			{
				echo"
					
		<tr role='row' class='odd'> 

					<td   style='background-color:pink;font-size:18px;color:black;border-radius:5px;'>Payment Approved Only ,Investment Approval Required</td>
		 
					<td tabindex='0' class='sorting_1'>$username</td>
					<td>$firstname</td>
					<td>$middlename</td>
					<td>$surname</td>
					<td>$phone</td>
					<td>$city</td>
					<td>$referal_code</td>
					<td>$investment_id</td>
					<td>$investment_name</td>
					<td>$investment_tandc </td>
					<td>$invest_tandc_date</td>
					<td>$quantity_of_farm_lots</td>
					<td>$first_returns</td>
					<td>$seconde_returns</td>
					<td>$third_returns</td>
					<td>$final_returns</td>
					<td>$principal_repayment</td>
					<td>$investment_amount_paid</td>
					<td>$payment_date</td>
					<td>$rela_officer_code</td>
					<td>$payment_confirmed</td>
					<td>$confirmed_date</td>
					<td>$officer_number</td>
					<td>$home_address</td>
					<td>$cal_first_returns</td>
					<td>$cal_seconde_returns</td>
					<td>$cal_third_returns</td>
					<td>$cal_final_returns</td>
					<td>$cal_total_returns</td>
					<td>$investment_option</td>
					<td>$Off_plan_terminate</td> 
					<td>$super_adm1</td>
					<td>$super_adm2</td>
					<td>$first_returns_date</td>
					<td>$seconde_returns_date</td>
					<td>$third_returns_date</td>
					<td>$final_returns_date</td>
					<td>$capital_returns_date</td> 

					
					
				 
			</tr>	



				"; 

		    }
		    else
		    {
			   if(($invest_id > 11) or ($cal_first > 1) ) 
			   {
				 
			echo"
				
			<tr role='row' class='odd'> 
	 				<td   style='background-color:red;font-size:20px;color:white;border-radius:5px;'> Admin-1 approval  required</td>

				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$rela_officer_code</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_number</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td>
				<td>$super_adm2</td>
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td> 
	 
			</tr>";				 
			   }
            }
        } 
 }  
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>  

<!----VIEW ALL CONFIRMED AND ACTIVATE TABLE----->
<section>		
<?php
if(isset($_POST['invest_option']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  ACTIVATE INVESTMENT </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>	

								
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						New Investment ID
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
						 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						ACTIVATE INVESTMENT
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					
						</th>
		 
					</tr>
					</thead>
								
				<tbody>
				";
			$invest_option1     = $_POST['invest_option1'];  		
			$invest_option2     = $_POST['invest_option2'];  		
					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` WHERE `investment_id`='$invest_option1' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$tem_invest_id         =$row['tem_invest_id']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$rela_officer_code     =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];   
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date  =$row['capital_returns_date']; 
			

								
				
echo"
	
<tr role='row' class='odd'> 
<form  method='POST' action='index.php'   >
 
	<input type='hidden' name='5' value='$invest_option2'/>
	<input type='hidden' name='6' value='$username'/>
	<input type='hidden' name='7' value='$referal_code'/>
	<input type='hidden' name='8' value='$investment_id'/>
    <input type='hidden' name='41' value='$tem_invest_id'/> 
    <input type='hidden' name='30' value='$investment_option'/>
	<input type='hidden' name='31' value='$Off_plan_terminate'/> 
	<input type='hidden' name='33' value='$super_adm1'/>
	<input type='hidden' name='34' value='$super_adm2'/>
 

 

		

	<td tabindex='0' class='sorting_1'>$username</td>
	<td>$firstname</td>
	<td>$middlename</td>
	<td>$surname</td>
	<td>$phone</td>
	<td>$city</td>
	<td>$referal_code</td>
 
	<td>$investment_id</td>
	<td>$investment_name</td>
	<td>$investment_tandc </td>
	<td>$invest_tandc_date</td>
	<td>$quantity_of_farm_lots</td>
	<td>$first_returns</td>
	<td>$seconde_returns</td>
	<td>$third_returns</td>
	<td>$final_returns</td>
	<td>$principal_repayment</td>
	<td>$investment_amount_paid</td>
	<td>$payment_date</td>
	<td>$rela_officer_code</td>
	<td>$payment_confirmed</td>
	<td>$confirmed_date</td>
	<td>$officer_number</td>
	<td>$home_address</td>
	<td>$cal_first_returns</td>
	<td>$cal_seconde_returns</td>
	<td>$cal_third_returns</td>
	<td>$cal_final_returns</td>
	<td>$cal_total_returns</td>
	<td>$investment_option</td>
	<td>$Off_plan_terminate</td> 
	<td>$super_adm1</td>
	<td>$super_adm2</td>
	<td>$first_returns_date</td>
	<td>$seconde_returns_date</td>
	<td>$third_returns_date</td>
	<td>$final_returns_date</td>
	<td>$capital_returns_date</td> 

	
	
<td>
   <input type='submit'name='invest_option'  value='Activate Option' style='padding:10px 10px 10px 10px;background-color:green;font-weight:bold;color:white;border-radius:10px;'  />
</td> 
</form>
</tr>	



"; 
		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>  

<!----ACITIVATE REFERAL COMMISSION ---->
<section>		
<?php
if(isset($_POST['referal_commission']))
{

 

echo"<div lass='card mb-3'style='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
ACITIVATE  REFERAL COMMISSION
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12' style='background:white;'><br>
			 <table tyle=' ' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>
								
					<thead>
					<tr role='row' style='font-weight:none;'>
 
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						id
						</th>
						

						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					   Referal Names
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					   Referal Code
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
					  investment_name
						</th>
						

						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					 	Old investment ID
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						New investment ID
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Subscriber  names
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					    Subscriber  Email
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						 Total Lots 
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Investment Commission
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						 Investment payment
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
					 	Investment Complete Date
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						first Investment Returns  
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					   Second Investment Returns 
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Third Investment  Returns 
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 101.2px;' aria-label='Start date: activate to sort column ascending'>
						Final  Investment Retuns 
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Principal Repayment 
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate 
						</th>						
						
				 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Confirmation
						</th>

						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Referal Commission Status
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Date Referal Commission Paid
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					      Commission Payment Officer
						</th>
						
						 


			 
					</tr>
					</thead>
								
				<tbody>
				";
			 
	$r_commission=$_POST['r_commission'];
					
					//ALL INVESTOR INVESTMENT TABLE CALL UP///////////////////////////
		$investor ="SELECT * FROM `all_referal_table` WHERE `referal_code`='$r_commission' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
    $id                             =  $row['id'];
    $referal_names                  =  $row['referal_names'];
    $referal_code                   =  $row['referal_code'];
    $investment_name                =  $row['investment_name'];
    $tem_invest_id                  =  $row['tem_invest_id'];
    $investment_id                  =  $row['investment_id'];
    $investor_name                  =  $row['investor_name'];
    $investor_email                 =  $row['investor_email'];
    $total_lots_unit                =  $row['total_lots_unit'];
    $invest_commission              =  $row['invest_commission'];
    $investment_amount_paid         =  $row['investment_amount_paid'];
    $invest_complete_date           =  $row['invest_complete_date'];
    $first_returns_payment_status   =  $row['first_returns_payment_status'];
    $second_returns_payment_status  =  $row['second_returns_payment_status'];
    $third_returns_payment_status   =  $row['third_returns_payment_status'];
    $final_returns_payment_status   =  $row['final_returns_payment_status'];
    $principal_repayment_status     =  $row['principal_repayment_status'];
    $investment_option              =  $row['investment_option'];
    $off_plan_terminate             =  $row['off_plan_terminate']; 
    $investment_confirmation        =  $row['investment_confirmation'];
    $referal_commission_payment     =  $row['referal_commission_payment'];
    $date_referal_commission_paid   =  $row['date_referal_commission_paid'];
    $commission_payment_officer     =  $row['commission_payment_officer'];


$flens="REFERAL COMMISSION PAYMENT APPROVED & CONFIRMED";	 							
$con_flens=strlen($flens);								
$con_referal_commission_payment=strlen($referal_commission_payment);								
 							
			if($con_referal_commission_payment === $con_flens) 
			{	


			echo"
				
			<tr role='row' class='odd'> 
			  <tr role='row' class='odd'>
				<td tabindex='0' class='sorting_1'></td> 
				<td>$referal_names</td> 
				<td>$referal_code</td>
				<td> $investment_name</td>
				<td>$tem_invest_id</td>
				<td>$investment_id</td>
				<td>$investor_name</td>
				<td>$investor_email</td>
				<td>$total_lots_unit</td>
				<td>$invest_commission</td>
				<td>$investment_amount_paid</td>
				<td>$invest_complete_date</td>
				<td>$first_returns_payment_status</td>
				<td>$second_returns_payment_status</td>
				<td>$third_returns_payment_status</td>
				<td>$final_returns_payment_status</td>
				<td>$principal_repayment_status</td>
				<td>$investment_option</td>
				<td>$off_plan_terminate</td> 
				<td>$investment_confirmation</td>
				<td>$referal_commission_payment</td>
				<td>$date_referal_commission_paid</td>
				<td>$commission_payment_officer </td> 
				<td   style='background-color:green;font-size:18px;color:white;border-radius:5px;'>Referal Commission  Payment has already been confirmed  </td></td> 

			 
			</tr>"; 	
		 
		   }
			else
			{	
					
					echo"
						
					<tr role='row' class='odd'> 
					<form  method='POST' action='index.php'   >

						 
						<input type='hidden' name='1' value='$referal_code'/>
						<input type='hidden' name='2' value='$date_referal_commission_paid'/>
						<input type='hidden' name='3' value='$referal_commission_payment' />
						<input type='hidden' name='4' value='$investment_id' />
					 
					 
							
									
									
						 <tr role='row' class='odd'>
						<td tabindex='0' class='sorting_1'></td> 
						<td>$referal_names</td> 
						<td>$referal_code</td>
						<td> $investment_name</td>
						<td>$tem_invest_id</td>
						<td>$investment_id</td>
						<td>$investor_name</td>
						<td>$investor_email</td>
						<td>$total_lots_unit</td>
						<td>$invest_commission</td>
						<td>$investment_amount_paid</td>
						<td>$invest_complete_date</td>
						<td>$first_returns_payment_status</td>
						<td>$second_returns_payment_status</td>
						<td>$third_returns_payment_status</td>
						<td>$final_returns_payment_status</td>
						<td>$principal_repayment_status</td>
						<td>$investment_option</td>
						<td>$off_plan_terminate</td> 
						<td>$investment_confirmation</td>
						<td>$referal_commission_payment</td>
						<td>$date_referal_commission_paid</td>
						<td>$commission_payment_officer </td> 

													
						
						
			 <td style='background-color:gold;font-size:18px;color:white;border-radius:5px;'>
			   <input type='submit'name='referal_commission'  value='Activate Referal Commission'   />
			 </td>
					
					</form>
					</tr>	"; 
			}
		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>        
 <!----VIEW ALL INVESTORS CONFIRMED ----->




<!----FIRST RETURNS----->
<section>		
<?php
if(isset($_POST['sub_returns']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  <center>INVESTMENT RETURNS CONFIRMATION </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Id
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Second Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
					 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						ACTIVATE INVESTMENT
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					
						</th>
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
$subscriber_returns=$_POST['subscriber_returns'];					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` WHERE `investment_id`='$subscriber_returns' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$investment_officer    =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];  
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			
  
$flens="FIRST RETURNS PAYMENT CONFIRMED";	 							
$con_flens=strlen($flens);								
$con_first=strlen($first_returns);								
 							
		    if($con_first === $con_flens) 
		    {								
				
				echo"
					
				<tr role='row' class='odd'> 
					<td tabindex='0' class='sorting_1'>$username</td>
					<td>$firstname</td>
					<td>$middlename</td>
					<td>$surname</td>
					<td>$phone</td>
					<td>$city</td>
					<td>$referal_code</td>
					<td>$investment_id</td>
					<td>$investment_name</td>
					<td>$investment_tandc </td>
					<td>$invest_tandc_date</td>
					<td>$quantity_of_farm_lots</td>
					<td>$first_returns</td>
					<td>$seconde_returns</td>
					<td>$third_returns</td>
					<td>$final_returns</td>
					<td>$principal_repayment</td>
					<td>$investment_amount_paid</td>
					<td>$payment_date</td>
					<td>$investment_officer</td>
					<td>$payment_confirmed</td>
					<td>$confirmed_date</td>
					<td>$officer_number</td>
					<td>$home_address</td>
					<td>$cal_first_returns</td>
					<td>$cal_seconde_returns</td>
					<td>$cal_third_returns</td>
					<td>$cal_final_returns</td>
					<td>$cal_total_returns</td>
					<td>$investment_option</td>
					<td>$Off_plan_terminate</td> 
					<td>$super_adm1</td>
					<td>$super_adm2</td>
					<td>$first_returns_date</td>
					<td>$seconde_returns_date</td>
					<td>$third_returns_date</td>
					<td>$final_returns_date</td>
					<td>$capital_returns_date</td> 
				  <td   style='background-color:green;font-size:18px;color:white;border-radius:5px;'>First Investment  Returns Payment confirmed  </td></td> 
				 
					



				"; 
		    }
			else
	    	{

echo"
	
<tr role='row' class='odd'> 
<form  method='POST' action='index.php'   >

	<input type='hidden' name='1' value='$username'/> 
	<input type='hidden' name='2' value='$firstname'/>
	<input type='hidden' name='3' value='$middlename' />
	<input type='hidden' name='4' value='$surname'/>
	<input type='hidden' name='5' value='$phone'/>
	<input type='hidden' name='6' value='$city'/>
	<input type='hidden' name='7' value='$referal_code'/>
	<input type='hidden' name='8' value='$investment_id'/>
	<input type='hidden' name='9' value='$investment_name'/>
	<input type='hidden' name='10' value='$investment_tandc '/>
	<input type='hidden' name='11' value='$invest_tandc_date'/>
    <input type='hidden' name='12' value='$quantity_of_farm_lots'/>
	<input type='hidden' name='13' value='$first_returns'/>
	<input type='hidden' name='14' value='$seconde_returns'/>
	<input type='hidden' name='15' value='$third_returns'/>
	<input type='hidden' name='16' value='$final_returns'/>
	<input type='hidden' name='17' value='$principal_repayment'/>
	<input type='hidden' name='18' value='$investment_amount_paid'/>
	<input type='hidden' name='19' value='$payment_date'/>
	<input type='hidden' name='20' value='$investment_officer'/>
	<input type='hidden' name='21' value='$payment_confirmed'/>
	<input type='hidden' name='22' value='$confirmed_date'/>
	<input type='hidden' name='23' value='$officer_number'/>
	<input type='hidden' name='24' value='$home_address'/>
	<input type='hidden' name='25' value='$cal_first_returns'/>
	<input type='hidden' name='26' value='$cal_seconde_returns'/>
	<input type='hidden' name='27' value='$cal_third_returns'/>
	<input type='hidden' name='28' value='$cal_final_returns'/>
	<input type='hidden' name='29' value='$cal_total_returns'/>
	<input type='hidden' name='30' value='$investment_option'/>
	<input type='hidden' name='31' value='$Off_plan_terminate'/> 
	<input type='hidden' name='33' value='$super_adm1'/>
	<input type='hidden' name='34' value='$super_adm2'/>
	<input type='hidden' name='35' value='$first_returns_date'/>
	<input type='hidden' name='36' value='$seconde_returns_date'/>
	<input type='hidden' name='37' value='$third_returns_date'/>
	<input type='hidden' name='38' value='$final_returns_date'/>
	<input type='hidden' name='39' value='$capital_returns_date'/> 
 

		

	<td tabindex='0' class='sorting_1'>$username</td>
	<td>$firstname</td>
	<td>$middlename</td>
	<td>$surname</td>
	<td>$phone</td>
	<td>$city</td>
	<td>$referal_code</td>
	<td>$investment_id</td>
	<td>$investment_name</td>
	<td>$investment_tandc </td>
	<td>$invest_tandc_date</td>
	<td>$quantity_of_farm_lots</td>
	<td>$first_returns</td>
	<td>$seconde_returns</td>
	<td>$third_returns</td>
	<td>$final_returns</td>
	<td>$principal_repayment</td>
	<td>$investment_amount_paid</td>
	<td>$payment_date</td>
	<td>$investment_officer</td>
	<td>$payment_confirmed</td>
	<td>$confirmed_date</td>
	<td>$officer_number</td>
	<td>$home_address</td>
	<td>$cal_first_returns</td>
	<td>$cal_seconde_returns</td>
	<td>$cal_third_returns</td>
	<td>$cal_final_returns</td>
	<td>$cal_total_returns</td>
	<td>$investment_option</td>
	<td>$Off_plan_terminate</td> 
	<td>$super_adm1</td>
	<td>$super_adm2</td>
	<td>$first_returns_date</td>
	<td>$seconde_returns_date</td>
	<td>$third_returns_date</td>
	<td>$final_returns_date</td>
	<td>$capital_returns_date</td> 

	
	
<td style='background-color:gold;font-size:18px;color:white;border-radius:5px;'>
   <input type='submit'name='returns1'  value='ACTIVATE FIRST RETURNS   ID $investment_id'   />
 
</td> 
</form>
</tr>	



";
        }			


} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>        
<!----FIRST RETURNS----->

<!----SECOND RETURNS----->
<section>		
<?php
if(isset($_POST['sub_returns2']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  <center>INVESTMENT RETURNS CONFIRMATION </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Id
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Second Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
					 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						ACTIVATE INVESTMENT
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					
						</th>
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
$subscriber_returns=$_POST['subscriber_returns'];					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` WHERE `investment_id`='$subscriber_returns' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$investment_officer    =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];  
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			

$flens="SECOND RETURNS PAYMENT CONFIRMED";	 							
$con_flens=strlen($flens);								
$con_second=strlen($seconde_returns);								
 							
		    if($con_second === $con_flens) 
		    {								
												
				
			echo"
				
			<tr role='row' class='odd'> 
      <td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$investment_officer</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_number</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td>
				<td>$super_adm2</td>
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td> 
                <td   style='background-color:green;font-size:18px;color:white;border-radius:5px;'>Second Investment  Returns Payment confirmed  </td></td> 




 
	 
			</tr>	



			"; 
	 }
	else
	{
		
	echo"
		
	<tr role='row' class='odd'> 
	<form  method='POST' action='index.php'   >

		<input type='hidden' name='1' value='$username'/> 
		<input type='hidden' name='2' value='$firstname'/>
		<input type='hidden' name='3' value='$middlename' />
		<input type='hidden' name='4' value='$surname'/>
		<input type='hidden' name='5' value='$phone'/>
		<input type='hidden' name='6' value='$city'/>
		<input type='hidden' name='7' value='$referal_code'/>
		<input type='hidden' name='8' value='$investment_id'/>
		<input type='hidden' name='9' value='$investment_name'/>
		<input type='hidden' name='10' value='$investment_tandc '/>
		<input type='hidden' name='11' value='$invest_tandc_date'/>
		<input type='hidden' name='12' value='$quantity_of_farm_lots'/>
		<input type='hidden' name='13' value='$first_returns'/>
		<input type='hidden' name='14' value='$seconde_returns'/>
		<input type='hidden' name='15' value='$third_returns'/>
		<input type='hidden' name='16' value='$final_returns'/>
		<input type='hidden' name='17' value='$principal_repayment'/>
		<input type='hidden' name='18' value='$investment_amount_paid'/>
		<input type='hidden' name='19' value='$payment_date'/>
		<input type='hidden' name='20' value='$investment_officer'/>
		<input type='hidden' name='21' value='$payment_confirmed'/>
		<input type='hidden' name='22' value='$confirmed_date'/>
		<input type='hidden' name='23' value='$officer_number'/>
		<input type='hidden' name='24' value='$home_address'/>
		<input type='hidden' name='25' value='$cal_first_returns'/>
		<input type='hidden' name='26' value='$cal_seconde_returns'/>
		<input type='hidden' name='27' value='$cal_third_returns'/>
		<input type='hidden' name='28' value='$cal_final_returns'/>
		<input type='hidden' name='29' value='$cal_total_returns'/>
		<input type='hidden' name='30' value='$investment_option'/>
		<input type='hidden' name='31' value='$Off_plan_terminate'/> 
		<input type='hidden' name='33' value='$super_adm1'/>
		<input type='hidden' name='34' value='$super_adm2'/>
		<input type='hidden' name='35' value='$first_returns_date'/>
		<input type='hidden' name='36' value='$seconde_returns_date'/>
		<input type='hidden' name='37' value='$third_returns_date'/>
		<input type='hidden' name='38' value='$final_returns_date'/>
		<input type='hidden' name='39' value='$capital_returns_date'/> 
	 

			

		<td tabindex='0' class='sorting_1'>$username</td>
		<td>$firstname</td>
		<td>$middlename</td>
		<td>$surname</td>
		<td>$phone</td>
		<td>$city</td>
		<td>$referal_code</td>
		<td>$investment_id</td>
		<td>$investment_name</td>
		<td>$investment_tandc </td>
		<td>$invest_tandc_date</td>
		<td>$quantity_of_farm_lots</td>
		<td>$first_returns</td>
		<td>$seconde_returns</td>
		<td>$third_returns</td>
		<td>$final_returns</td>
		<td>$principal_repayment</td>
		<td>$investment_amount_paid</td>
		<td>$payment_date</td>
		<td>$investment_officer</td>
		<td>$payment_confirmed</td>
		<td>$confirmed_date</td>
		<td>$officer_number</td>
		<td>$home_address</td>
		<td>$cal_first_returns</td>
		<td>$cal_seconde_returns</td>
		<td>$cal_third_returns</td>
		<td>$cal_final_returns</td>
		<td>$cal_total_returns</td>
		<td>$investment_option</td>
		<td>$Off_plan_terminate</td> 
		<td>$super_adm1</td>
		<td>$super_adm2</td>
		<td>$first_returns_date</td>
		<td>$seconde_returns_date</td>
		<td>$third_returns_date</td>
		<td>$final_returns_date</td>
		<td>$capital_returns_date</td> 

<td style='background-color:gold;font-size:i8px;color:white;border-radius:5px;'>
   <input type='submit'name='returns2'  value='ACTIVATE SECOND RETURNS   ID $investment_id'   />
</td>		
		

	</form>
	</tr>	


							

	"; 
	}	
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>        
<!----SECOND RETURNS----->


<!----THIRD RETURNS----->
<section>		
<?php
if(isset($_POST['sub_returns3']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  <center>INVESTMENT RETURNS CONFIRMATION </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Id
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Second Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option at Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
			 					
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						ACTIVATE INVESTMENT
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					
						</th>
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
$subscriber_returns=$_POST['subscriber_returns'];					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` WHERE `investment_id`='$subscriber_returns' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$investment_officer    =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];   
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			
 
$flens="THIRD RETURNS PAYMENT CONFIRMED";	 							
$con_flens=strlen($flens);								
$con_third=strlen($third_returns);								
 							
		    if($con_third === $con_flens) 
		    {									
				
		echo"
			
		<tr role='row' class='odd'> 
         <td tabindex='0' class='sorting_1'>$username</td>
			<td>$firstname</td>
			<td>$middlename</td>
			<td>$surname</td>
			<td>$phone</td>
			<td>$city</td>
			<td>$referal_code</td>
			<td>$investment_id</td>
			<td>$investment_name</td>
			<td>$investment_tandc </td>
			<td>$invest_tandc_date</td>
			<td>$quantity_of_farm_lots</td>
			<td>$first_returns</td>
			<td>$seconde_returns</td>
			<td>$third_returns</td>
			<td>$final_returns</td>
			<td>$principal_repayment</td>
			<td>$investment_amount_paid</td>
			<td>$payment_date</td>
			<td>$investment_officer</td>
			<td>$payment_confirmed</td>
			<td>$confirmed_date</td>
			<td>$officer_number</td>
			<td>$home_address</td>
			<td>$cal_first_returns</td>
			<td>$cal_seconde_returns</td>
			<td>$cal_third_returns</td>
			<td>$cal_final_returns</td>
			<td>$cal_total_returns</td>
			<td>$investment_option</td>
			<td>$Off_plan_terminate</td> 
			<td>$super_adm1</td>
			<td>$super_adm2</td>
			<td>$first_returns_date</td>
			<td>$seconde_returns_date</td>
			<td>$third_returns_date</td>
			<td>$final_returns_date</td>
			<td>$capital_returns_date</td> 
		 <td   style='background-color:green;font-size:17px;color:white;border-radius:5px;'>Third Investment  Returns Payment confirmed  </td></td> 
 
		</tr>";
		
	 
			}	
            else
            {				



		echo"
			
		<tr role='row' class='odd'> 
		<form  method='POST' action='index.php'   >

			<input type='hidden' name='1' value='$username'/> 
			<input type='hidden' name='2' value='$firstname'/>
			<input type='hidden' name='3' value='$middlename' />
			<input type='hidden' name='4' value='$surname'/>
			<input type='hidden' name='5' value='$phone'/>
			<input type='hidden' name='6' value='$city'/>
			<input type='hidden' name='7' value='$referal_code'/>
			<input type='hidden' name='8' value='$investment_id'/>
			<input type='hidden' name='9' value='$investment_name'/>
			<input type='hidden' name='10' value='$investment_tandc '/>
			<input type='hidden' name='11' value='$invest_tandc_date'/>
			<input type='hidden' name='12' value='$quantity_of_farm_lots'/>
			<input type='hidden' name='13' value='$first_returns'/>
			<input type='hidden' name='14' value='$seconde_returns'/>
			<input type='hidden' name='15' value='$third_returns'/>
			<input type='hidden' name='16' value='$final_returns'/>
			<input type='hidden' name='17' value='$principal_repayment'/>
			<input type='hidden' name='18' value='$investment_amount_paid'/>
			<input type='hidden' name='19' value='$payment_date'/>
			<input type='hidden' name='20' value='$investment_officer'/>
			<input type='hidden' name='21' value='$payment_confirmed'/>
			<input type='hidden' name='22' value='$confirmed_date'/>
			<input type='hidden' name='23' value='$officer_number'/>
			<input type='hidden' name='24' value='$home_address'/>
			<input type='hidden' name='25' value='$cal_first_returns'/>
			<input type='hidden' name='26' value='$cal_seconde_returns'/>
			<input type='hidden' name='27' value='$cal_third_returns'/>
			<input type='hidden' name='28' value='$cal_final_returns'/>
			<input type='hidden' name='29' value='$cal_total_returns'/>
			<input type='hidden' name='30' value='$investment_option'/>
			<input type='hidden' name='31' value='$Off_plan_terminate'/> 
			<input type='hidden' name='33' value='$super_adm1'/>
			<input type='hidden' name='34' value='$super_adm2'/>
			<input type='hidden' name='35' value='$first_returns_date'/>
			<input type='hidden' name='36' value='$seconde_returns_date'/>
			<input type='hidden' name='37' value='$third_returns_date'/>
			<input type='hidden' name='38' value='$final_returns_date'/>
			<input type='hidden' name='39' value='$capital_returns_date'/> 
		 

				

			<td tabindex='0' class='sorting_1'>$username</td>
			<td>$firstname</td>
			<td>$middlename</td>
			<td>$surname</td>
			<td>$phone</td>
			<td>$city</td>
			<td>$referal_code</td>
			<td>$investment_id</td>
			<td>$investment_name</td>
			<td>$investment_tandc </td>
			<td>$invest_tandc_date</td>
			<td>$quantity_of_farm_lots</td>
			<td>$first_returns</td>
			<td>$seconde_returns</td>
			<td>$third_returns</td>
			<td>$final_returns</td>
			<td>$principal_repayment</td>
			<td>$investment_amount_paid</td>
			<td>$payment_date</td>
			<td>$investment_officer</td>
			<td>$payment_confirmed</td>
			<td>$confirmed_date</td>
			<td>$officer_number</td>
			<td>$home_address</td>
			<td>$cal_first_returns</td>
			<td>$cal_seconde_returns</td>
			<td>$cal_third_returns</td>
			<td>$cal_final_returns</td>
			<td>$cal_total_returns</td>
			<td>$investment_option</td>
			<td>$Off_plan_terminate</td> 
			<td>$super_adm1</td>
			<td>$super_adm2</td>
			<td>$first_returns_date</td>
			<td>$seconde_returns_date</td>
			<td>$third_returns_date</td>
			<td>$final_returns_date</td>
			<td>$capital_returns_date</td> 

			<td style='background-color:gold;font-size:18px;color:white;border-radius:5px;'>
			   <input type='submit'name='returns3'  value='ACTIVATE THIRD RETURNS   ID $investment_id'   />
			</td>			
			
 
		</form>
		</tr>";	
             }		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>        
<!----THIRD RETURNS----->


<!----FINAL RETURNS----->
<section>		
<?php
if(isset($_POST['sub_returns4']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  <center>INVESTMENT RETURNS CONFIRMATION </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead>
					<tr role='row'>
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Id
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Second Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option when Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
					 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Second Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						ACTIVATE INVESTMENT
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					
						</th>
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
$subscriber_returns=$_POST['subscriber_returns'];					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` WHERE `investment_id`='$subscriber_returns' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$investment_officer    =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];  
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			
 
 
$flens="FINAL RETURNS PAYMENT CONFIRMED";	 							
$con_flens=strlen($flens);								
$con_final=strlen($final_returns);																

		if($con_final === $con_flens)
		{	
		echo"
			
		<tr role='row' class='odd'> 
			<td tabindex='0' class='sorting_1'>$username</td>
			<td>$firstname</td>
			<td>$middlename</td>
			<td>$surname</td>
			<td>$phone</td>
			<td>$city</td>
			<td>$referal_code</td>
			<td>$investment_id</td>
			<td>$investment_name</td>
			<td>$investment_tandc </td>
			<td>$invest_tandc_date</td>
			<td>$quantity_of_farm_lots</td>
			<td>$first_returns</td>
			<td>$seconde_returns</td>
			<td>$third_returns</td>
			<td>$final_returns</td>
			<td>$principal_repayment</td>
			<td>$investment_amount_paid</td>
			<td>$payment_date</td>
			<td>$investment_officer</td>
			<td>$payment_confirmed</td>
			<td>$confirmed_date</td>
			<td>$officer_number</td>
			<td>$home_address</td>
			<td>$cal_first_returns</td>
			<td>$cal_seconde_returns</td>
			<td>$cal_third_returns</td>
			<td>$cal_final_returns</td>
			<td>$cal_total_returns</td>
			<td>$investment_option</td>
			<td>$Off_plan_terminate</td> 
			<td>$super_adm1</td>
			<td>$super_adm2</td>
			<td>$first_returns_date</td>
			<td>$seconde_returns_date</td>
			<td>$third_returns_date</td>
			<td>$final_returns_date</td>
			<td>$capital_returns_date</td> 
		   <td   style='background-color:green;font-size:18px;color:white;border-radius:5px;'> Final Investment  Returns Payment confirmed  </td></td> 
		 
		 
		</tr>";
		}
		else
		{


		echo"
			
		<tr role='row' class='odd'> 
		<form  method='POST' action='index.php'   >

			<input type='hidden' name='1' value='$username'/> 
			<input type='hidden' name='2' value='$firstname'/>
			<input type='hidden' name='3' value='$middlename' />
			<input type='hidden' name='4' value='$surname'/>
			<input type='hidden' name='5' value='$phone'/>
			<input type='hidden' name='6' value='$city'/>
			<input type='hidden' name='7' value='$referal_code'/>
			<input type='hidden' name='8' value='$investment_id'/>
			<input type='hidden' name='9' value='$investment_name'/>
			<input type='hidden' name='10' value='$investment_tandc '/>
			<input type='hidden' name='11' value='$invest_tandc_date'/>
			<input type='hidden' name='12' value='$quantity_of_farm_lots'/>
			<input type='hidden' name='13' value='$first_returns'/>
			<input type='hidden' name='14' value='$seconde_returns'/>
			<input type='hidden' name='15' value='$third_returns'/>
			<input type='hidden' name='16' value='$final_returns'/>
			<input type='hidden' name='17' value='$principal_repayment'/>
			<input type='hidden' name='18' value='$investment_amount_paid'/>
			<input type='hidden' name='19' value='$payment_date'/>
			<input type='hidden' name='20' value='$investment_officer'/>
			<input type='hidden' name='21' value='$payment_confirmed'/>
			<input type='hidden' name='22' value='$confirmed_date'/>
			<input type='hidden' name='23' value='$officer_number'/>
			<input type='hidden' name='24' value='$home_address'/>
			<input type='hidden' name='25' value='$cal_first_returns'/>
			<input type='hidden' name='26' value='$cal_seconde_returns'/>
			<input type='hidden' name='27' value='$cal_third_returns'/>
			<input type='hidden' name='28' value='$cal_final_returns'/>
			<input type='hidden' name='29' value='$cal_total_returns'/>
			<input type='hidden' name='30' value='$investment_option'/>
			<input type='hidden' name='31' value='$Off_plan_terminate'/> 
			<input type='hidden' name='33' value='$super_adm1'/>
			<input type='hidden' name='34' value='$super_adm2'/>
			<input type='hidden' name='35' value='$first_returns_date'/>
			<input type='hidden' name='36' value='$seconde_returns_date'/>
			<input type='hidden' name='37' value='$third_returns_date'/>
			<input type='hidden' name='38' value='$final_returns_date'/>
			<input type='hidden' name='39' value='$capital_returns_date'/> 
		 

				

			<td tabindex='0' class='sorting_1'>$username</td>
			<td>$firstname</td>
			<td>$middlename</td>
			<td>$surname</td>
			<td>$phone</td>
			<td>$city</td>
			<td>$referal_code</td>
			<td>$investment_id</td>
			<td>$investment_name</td>
			<td>$investment_tandc </td>
			<td>$invest_tandc_date</td>
			<td>$quantity_of_farm_lots</td>
			<td>$first_returns</td>
			<td>$seconde_returns</td>
			<td>$third_returns</td>
			<td>$final_returns</td>
			<td>$principal_repayment</td>
			<td>$investment_amount_paid</td>
			<td>$payment_date</td>
			<td>$investment_officer</td>
			<td>$payment_confirmed</td>
			<td>$confirmed_date</td>
			<td>$officer_number</td>
			<td>$home_address</td>
			<td>$cal_first_returns</td>
			<td>$cal_seconde_returns</td>
			<td>$cal_third_returns</td>
			<td>$cal_final_returns</td>
			<td>$cal_total_returns</td>
			<td>$investment_option</td>
			<td>$Off_plan_terminate</td> 
			<td>$super_adm1</td>
			<td>$super_adm2</td>
			<td>$first_returns_date</td>
			<td>$seconde_returns_date</td>
			<td>$third_returns_date</td>
			<td>$final_returns_date</td>
			<td>$capital_returns_date</td> 
			
		<td style='background-color:gold;font-size:18px;color:white;border-radius:5px;'>
		   <input type='submit'name='returns4'  value='ACTIVATE FINAL RETURNS   ID $investment_id'   />
		</td>

		</form>
		</tr>"; 	

		}


		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>
 
</section>        
<!----FINAL RETURNS----->


<!----PRINCIPAL REPAYMENT----->
<section>		
<?php
if(isset($_POST['sub_returns5']))
{

 


echo"  
<div lass='card mb-3'tyle='font-size:15px;'>
			<div class='card-header-tab card-header'>
				<div class='card-header-title font-size-lg text-capitalize font-weight-normal'>
					 
			  <center>INVESTMENT RETURNS CONFIRMATION </center>
				</div>
				
		 
			</div>
			
			<div class='card-body'>
				<div id='example_wrapper' class='dataTables_wrapper dt-bootstrap4'>
				
				<div class='row'>
 
			 </div>
 
	 <div class='row'>
		  <div lass='col-sm-12'Style='background-color:white;'><br>
			 <table tyle='width: 100%;overflow:auto;' id='example' class='table table-hover table-striped table-bordered tataTable dtr-inline' role='grid' aria-describedby='example_info'>

									
					<thead >
					<tr role='row'>
						<th class='sorting_asc' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 146.2px;' aria-sort='ascending' aria-label='Name: activate to sort column descending'>
						Username
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 225.2px;' aria-label='Position: activate to sort column ascending'>
						Firstname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 104.2px;' aria-label='Office: activate to sort column ascending'>
					     Middlename
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Age: activate to sort column ascending'>
						Surname
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Start date: activate to sort column ascending'>
						Phone
						</th>
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						City
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Referal Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Id
						</th>
 

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment_t&c_confirmed
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 48.2px;' aria-label='Salary: activate to sort column ascending'>
						T&C Date Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Quantity Of Farmlots
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Second Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns
						</th>


						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Amount Paid
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Code
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Payment Confirmed
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Confirmed Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Relationship Officer Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investor Home Address
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Total Returns Cal
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Investment Option when Due
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Off Plan Terminate
						</th>						
						
						 						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Confirmation
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Super Admin Name
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						First Returns Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Seconde Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Third Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Final Returns Date
						</th>						
						
						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						Principal Repayment Date
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
						ACTIVATE INVESTMENT
						</th>

						<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' style='width: 78.2px;' aria-label='Salary: activate to sort column ascending'>
					
						</th>
		 
					</tr>
					</thead>
								
				<tbody>
				";
					
$subscriber_returns=$_POST['subscriber_returns'];					
					//ALL INVESTOR INVESTMENT TABLE CALL UP/////////////
		$investor ="SELECT * FROM `all_investment` WHERE `investment_id`='$subscriber_returns' ";
		$investor_result=mysqli_query($homedb, $investor);
		while ($row = mysqli_fetch_array($investor_result))
		{
			$investor_tab_id       =$row['id']; 
			$username              =$row['username']; 
			$firstname             =$row['firstname'];
			$middlename            =$row['middlename'];
	        $surname               =$row['surname']; 
			$phone                 =$row['phone']; 
			$city                  =$row['city']; 
			$referal_code          =$row['referal_code']; 
			$investment_id         =$row['investment_id']; 
			$investment_name       =$row['investment_name']; 
			$investment_tandc      =$row['investment_t&c_confirmed']; 
			$invest_tandc_date     =$row['invest_t&c_date_confirmed']; 
			$quantity_of_farm_lots =$row['quantity_of_farm_lots']; 
			$first_returns         =$row['first_returns']; 
			$seconde_returns       =$row['seconde_returns'];
			$third_returns         =$row['third_returns']; 
			$final_returns         =$row['final_returns'];
			$principal_repayment   =$row['principal_repayment']; 
			$investment_amount_paid=$row['investment_amount_paid']; 
			$payment_date          =$row['payment_date']; 
			$investment_officer    =$row['relationship_officer_code']; 
			$payment_confirmed     =$row['payment_confirmed']; 
			$confirmed_date        =$row['confirmed_date']; 
			$officer_number        =$row['relationship_officer_name']; 
			$home_address          =$row['home_address']; 
			$cal_first_returns     =$row['cal_first_returns']; 
			$cal_seconde_returns   =$row['cal_seconde_returns']; 
			$cal_third_returns     =$row['cal_third_returns']; 
			$cal_final_returns     =$row['cal_final_returns']; 
			$cal_total_returns     =$row['cal_total_returns']; 
			$investment_option     =$row['investment_option']; 
			$Off_plan_terminate    =$row['Off_plan_terminate'];   
			$super_adm1            =$row['super_adm1']; 
			$super_adm2            =$row['super_adm2']; 
			$first_returns_date    =$row['first_returns_date']; 
			$seconde_returns_date  =$row['seconde_returns_date']; 
			$third_returns_date    =$row['third_returns_date']; 
			$final_returns_date    =$row['final_returns_date']; 
			$capital_returns_date   =$row['capital_returns_date']; 
			

								

$flens="PRINCIPAL REPAYMENT PAID & CONFIRMED";	 							
$con_flens=strlen($flens);								
$con_principal=strlen($principal_repayment);																

		if($con_principal=== $con_flens)
		{			
			echo"
				
			<tr role='row' class='odd'> 
				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$investment_officer</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_number</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td>
				<td>$super_adm2</td>
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td> 
				<td   style='background-color:green;font-size:18px;color:white;border-radius:5px;'>Principal Repayment paid & confirmed  </td></td> 

			 
			</tr>	";

		}
		else
		{

			 echo"
				
			<tr role='row' class='odd'> 
			<form  method='POST' action='index.php'   >

				<input type='hidden' name='1' value='$username'/> 
				<input type='hidden' name='2' value='$firstname'/>
				<input type='hidden' name='3' value='$middlename' />
				<input type='hidden' name='4' value='$surname'/>
				<input type='hidden' name='5' value='$phone'/>
				<input type='hidden' name='6' value='$city'/>
				<input type='hidden' name='7' value='$referal_code'/>
				<input type='hidden' name='8' value='$investment_id'/>
				<input type='hidden' name='9' value='$investment_name'/>
				<input type='hidden' name='10' value='$investment_tandc '/>
				<input type='hidden' name='11' value='$invest_tandc_date'/>
				<input type='hidden' name='12' value='$quantity_of_farm_lots'/>
				<input type='hidden' name='13' value='$first_returns'/>
				<input type='hidden' name='14' value='$seconde_returns'/>
				<input type='hidden' name='15' value='$third_returns'/>
				<input type='hidden' name='16' value='$final_returns'/>
				<input type='hidden' name='17' value='$principal_repayment'/>
				<input type='hidden' name='18' value='$investment_amount_paid'/>
				<input type='hidden' name='19' value='$payment_date'/>
				<input type='hidden' name='20' value='$investment_officer'/>
				<input type='hidden' name='21' value='$payment_confirmed'/>
				<input type='hidden' name='22' value='$confirmed_date'/>
				<input type='hidden' name='23' value='$officer_number'/>
				<input type='hidden' name='24' value='$home_address'/>
				<input type='hidden' name='25' value='$cal_first_returns'/>
				<input type='hidden' name='26' value='$cal_seconde_returns'/>
				<input type='hidden' name='27' value='$cal_third_returns'/>
				<input type='hidden' name='28' value='$cal_final_returns'/>
				<input type='hidden' name='29' value='$cal_total_returns'/>
				<input type='hidden' name='30' value='$investment_option'/>
				<input type='hidden' name='31' value='$Off_plan_terminate'/> 
				<input type='hidden' name='33' value='$super_adm1'/>
				<input type='hidden' name='34' value='$super_adm2'/>
				<input type='hidden' name='35' value='$first_returns_date'/>
				<input type='hidden' name='36' value='$seconde_returns_date'/>
				<input type='hidden' name='37' value='$third_returns_date'/>
				<input type='hidden' name='38' value='$final_returns_date'/>
				<input type='hidden' name='39' value='$capital_returns_date'/> 
			 

					

				<td tabindex='0' class='sorting_1'>$username</td>
				<td>$firstname</td>
				<td>$middlename</td>
				<td>$surname</td>
				<td>$phone</td>
				<td>$city</td>
				<td>$referal_code</td>
				<td>$investment_id</td>
				<td>$investment_name</td>
				<td>$investment_tandc </td>
				<td>$invest_tandc_date</td>
				<td>$quantity_of_farm_lots</td>
				<td>$first_returns</td>
				<td>$seconde_returns</td>
				<td>$third_returns</td>
				<td>$final_returns</td>
				<td>$principal_repayment</td>
				<td>$investment_amount_paid</td>
				<td>$payment_date</td>
				<td>$investment_officer</td>
				<td>$payment_confirmed</td>
				<td>$confirmed_date</td>
				<td>$officer_number</td>
				<td>$home_address</td>
				<td>$cal_first_returns</td>
				<td>$cal_seconde_returns</td>
				<td>$cal_third_returns</td>
				<td>$cal_final_returns</td>
				<td>$cal_total_returns</td>
				<td>$investment_option</td>
				<td>$Off_plan_terminate</td> 
				<td>$super_adm1</td>
				<td>$super_adm2</td>
				<td>$first_returns_date</td>
				<td>$seconde_returns_date</td>
				<td>$third_returns_date</td>
				<td>$final_returns_date</td>
				<td>$capital_returns_date</td> 
			 

					<td style='background-color:gold;font-size:18px;color:white;border-radius:5px;'>
					   <input type='submit'name='returns5'  value='ACTIVATE PRINCIPAL PAYMENT ON   ID $investment_id'   />
					</td
			</form>
			</tr>	"; 



		}
		
} 
									
   
echo"</tbody> 
			
</table>
</div>
</div>


 
 </div>

</div>

</div><br><br><br><br><br><br>";
}
	
?>

</section>        
<!-----PRINCIPAL REPAYMENT------>

</body>
</html>
<script type="text/javascript" src="js_form/main.07a59de7b920cd76b874.js"></script> 
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

$('#example').DataTable( {
    buttons: {
        buttons: [
            { extend: 'copy', className: 'copyButton' },
            { extend: 'excel', className: 'excelButton' }
        ]
    }
} );
</script>