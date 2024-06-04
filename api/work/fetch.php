<?php
header('content-type:	application/json;');
header("Access-Control-Allow-Origin:  *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

 





$api_url = "https://owambextra.com/api/api/call_api.php?action=fetch_login"; 
$client = curl_init($api_url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
$output = '';

	if(count($result)> 0)
	{
		
		foreach($result as $row)
		{
		$output.='
		<tr>
		<td>'.$row->surname.' '.$row->firstname.'</td>
		<td>'.$row->username.'</td>
		<td>'.$row->password.'</td>
 
		<td><button type="button" name="edit" class="btn btn-warning btn-xs edit"    id="'.$row->id.'">Edit   </button></td>
		<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete </button></td>
		
		</tr>
		
		     ';	
			
		}
		
		
	}
	else
	{
		$output.='
		
		<tr>
		<td colspan="4" align="center">No Data Found</td>
		</tr>
		';
		
	}


  echo $output;







?>