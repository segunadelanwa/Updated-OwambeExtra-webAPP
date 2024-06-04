<?php


$investor ="SELECT * FROM `clone_invest` WHERE `username`='$username' AND `running_invest`='Running' ORDER BY `id` DESC";
 
$investor_result      =mysqli_query($homedb, $investor);
@$investment_num_rows  =mysqli_num_rows($investor_result);

if($investment_num_rows > '0')
{
	foreach($investor_result as $keys => $row)
	{	
		$invoice_no_chart           =$row['invoice_no'];
		$duration_of_plan_chart     =$row['duration_of_plan'];
		$expected_returns_cart      =$row['expected_returns'];
		$montinv_returns            =$row['1st_month'];
		$_1mon_date                 =$row['1month_date'];
		$_2mon_date                 =$row['2month_date'];
		$_3mon_date                 =$row['3month_date'];
		$_4mon_date                 =$row['4month_date'];
		$_5mon_date                 =$row['5month_date'];
		$_6mon_date                 =$row['6month_date'];
		$_7mon_date                 =$row['7month_date'];
		$_8mon_date                 =$row['8month_date'];
		$_9mon_date                 =$row['9month_date'];
		$_10mon_date                =$row['10month_date'];
		$_11mon_date                =$row['11month_date'];
		$_12mon_date                =$row['12month_date'];
	 

	 $montinv_cal =$row['1st_month'];
	 $two   =($montinv_cal + $montinv_cal);
	 $three =($montinv_cal + $montinv_cal + $montinv_cal);
	 $four  =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal);
	 $five  =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal);
	 $six   =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal);
	 $seven =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal);
	 $eight =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal);
	 $nine  =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal);
	 $ten   =($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal);
	 $eleven=($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal);
	 $twelve=($montinv_cal + $montinv_cal + $montinv_cal + $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal+ $montinv_cal);
	}
	
	 
	 if($duration_of_plan_chart == '12')
	 { 
 
            if($sys_date < $_1mon_date) 
 			{
				$labelPoints = array("1st Returns");
				 
				$dataPoints = array(0);
			}

			else
			if(($sys_date >= $_1mon_date) && ($sys_date <  $_2mon_date))
			{  
				$labelPoints = array("1st Returns");
				 
				$dataPoints = array($montinv_returns);
			}
			else
			if(($sys_date >= $_2mon_date) and ($sys_date <  $_3mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns");
				 
				$dataPoints = array($montinv_returns, $two);
			}
			else
			if(($sys_date >= $_3mon_date) and ($sys_date <  $_4mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three);
			 
			}
			else
			if(($sys_date >= $_4mon_date) and ($sys_date <  $_5mon_date))
			{
				
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four);
			 
			}
			else
			if(($sys_date >= $_5mon_date) and ($sys_date <  $_6mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five);
			 
			} 
			else
			if(($sys_date >= $_6mon_date) and ($sys_date <  $_7mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five,$six);
			 
			} 
			else
			if(($sys_date >= $_7mon_date) and ($sys_date <  $_8mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven);
			 
			} 				 
			else
			if(($sys_date >= $_8mon_date) and ($sys_date <  $_9mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns", "8th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven, $eight);
			 
			} 
			else
			if(($sys_date >= $_9mon_date) and ($sys_date <  $_10mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns", "8th Returns", "9th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven, $eight, $nine);
			 
			} 
			else
			if(($sys_date >= $_10mon_date) and ($sys_date <  $_11mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns", "8th Returns", "9th Returns", "10th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten);
			 
			} 
			else
			if(($sys_date >= $_11mon_date) and ($sys_date <  $_12mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns", "8th Returns", "9th Returns", "10th Returns","11th Retruns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $eleven);
			 
			} 
			else
			if(($sys_date >= $_12mon_date) and ($sys_date >  $_11mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns", "8th Returns", "9th Returns", "10th Returns", "11th Retruns", "12th Retruns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $eleven, $twelve);
			 
			} 
 
 

	 }
	 else
	 if($duration_of_plan_chart == '8')
	 {
			
			if($sys_date < $_1mon_date)  
			{
				$labelPoints = array("1st Returns");
				 
				$dataPoints = array(0);
			}

			else
			if(($sys_date >= $_1mon_date) && ($sys_date <  $_2mon_date))
			{  
				$labelPoints = array("1st Returns");
				 
				$dataPoints = array($montinv_returns);
			}
			else
			if(($sys_date >= $_2mon_date) and ($sys_date <  $_3mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns");
				 
				$dataPoints = array($montinv_returns, $two);
			}
			else
			if(($sys_date >= $_3mon_date) and ($sys_date <  $_4mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three);
			 
			}
			else
			if(($sys_date >= $_4mon_date) and ($sys_date <  $_5mon_date))
			{
				
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four);
			 
			}
			else
			if(($sys_date >= $_5mon_date) and ($sys_date <  $_6mon_date))
			{
				$labelPoints = array("1st Month Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five);
			 
			} 
			else
			if(($sys_date >= $_6mon_date) and ($sys_date <  $_7mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six);
			 
			} 
			else
			if(($sys_date >= $_7mon_date) and ($sys_date <  $_8mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven);
			 
			} 				 
			else
			if(($sys_date >= $_8mon_date) and ($sys_date >  $_7mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns", "6th Returns", "7th Returns", "8th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five, $six, $seven, $eight);
			 } 				 
		 
			 
	 }
	 else
	 if($duration_of_plan_chart == '5')
	 {
			if($sys_date < $_1mon_date)  
			{
				$labelPoints = array("1st Returns");
				 
				$dataPoints = array(0);
			}

			else
			if(($sys_date >= $_1mon_date) && ($sys_date <  $_2mon_date))
			{  
				$labelPoints = array("1st Returns");
				 
				$dataPoints = array($montinv_returns);
			}
			else
			if(($sys_date >= $_2mon_date) and ($sys_date <  $_3mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns");
				 
				$dataPoints = array($montinv_returns, $two);
			}
			else
			if(($sys_date >= $_3mon_date) and ($sys_date <  $_4mon_date))
			{
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three);
			 
			}
			else
			if(($sys_date >= $_4mon_date) and ($sys_date <  $_5mon_date))
			{
				
				$labelPoints = array("1st Returns", "2nd Returns", "3rd Returns", "4th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four);
			 
			}
			else
			if(($sys_date >= $_5mon_date) and ($sys_date >  $_4mon_date))
			{
				$labelPoints = array("1st Month Returns", "2nd Returns", "3rd Returns", "4th Returns", "5th Returns");
				 
				$dataPoints = array($montinv_returns, $two, $three, $four, $five);
			 
			} 
	 
	 }


	echo'                              
			<div class="card mb-4">
				<div class="card-header">
				<i class="fa fa-bar-chart mr-1"></i>
				"'.$duration_of_plan_chart.'"Months Investment "'.$invoice_no_chart.'"   Growth
				</div>

				<div class="card-body">
				<canvas id="myAreaChart" width="100%" height="40"></canvas>
				</div>
			</div>

	';
}
 ?>