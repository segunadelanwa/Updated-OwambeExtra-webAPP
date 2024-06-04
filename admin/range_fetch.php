<?php
 
include('core.php');

$exam = new config;

$current_date  = date('Y-m-d');	

 
if($_POST['page'] == 'view_table')
{
	
 
 

		if($_POST['action'] == 'fetch_matured_invest')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'invest_approval', 'cash_invested', 'expected_returns','returns_date','date_approved');


			$exam-> query = "
			SELECT * FROM `clone_mortgagevest` WHERE `running_invest` = 'Running' AND '$current_date' <`returns_date`
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
	   SELECT * FROM `clone_mortgagevest` WHERE `running_invest` = 'Running' AND '$current_date' <`returns_date`";
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

		if($_POST['action'] == 'fetch_approved_invest')
		{
			
			$output = array();
			
	        $columns = array('id', 'invoice_no', 'invest_approval', 'cash_invested', 'expected_returns','returns_date','date_approved');


			$exam-> query = "
			 SELECT * FROM clone_mortgagevest WHERE running_invest = 'Running' AND $current_date < returns_date 
			AND ";


			 

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
           
			$exam->query = "SELECT * FROM clone_mortgagevest WHERE running_invest = 'Running' AND $current_date < returns_date ";
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
				$date_of_purchase=$row['date_of_purchase'];
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

				$upfront=" 	<div class='btn btn-success'> Not Requested</div> ";

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
		 $sub_array[] = $date_of_purchase;
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


		if($_POST['action'] == 'fetch_all_invest')
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
				




				
			$shares_allocation=" "; 
							
		 		  
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
			 
						
 
			 
		 $sub_array = array(); 
		 $sub_array[] = $inv_details;
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
