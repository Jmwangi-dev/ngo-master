<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$get_alldonations = $db->get_alldonations($uid);

echo '<div class="col-md-12" style="padding-top:20px;">
<h1 style="text-align:center;">All Donations</h1>
<div class="col-md-9  col-md-offset-2" >';

if($get_alldonations)
{
	echo '<table class="table table-bordered">
	<thead>
		<th width="10%">Donated On</th>
		<th width="30%">In favour of</th>
		<th width="5%">Amount</th>
		<th width="20%">Other Donations</th>
		<th width="5%">Status</th>
		<th width="20%">Granted To</th>
		<th width="10%">Amount</th>
	</thead>
	<tbody>';
		foreach($get_alldonations as $row)
		{
			$id = $row['id'];
			$retreive_donations_bydonorid = $db->retreive_donations_bydonorid($id);
			if($retreive_donations_bydonorid)
			{
				foreach($retreive_donations_bydonorid as $zrow)
				{
					$amount = $zrow['amount_granted'];
					
						$name = $zrow['name'];
						$phone = $zrow['phone'];
						$address = $zrow['address'];
					
				}
			}
			
			
			$amount = $row['amount'];
			$favour = $row['favour'];
			$favour = json_decode($favour);
			$other = $row['other'];
			$address1 = $row['address1'];
			$address2 = $row['address2'];
			$address3 = $row['address3'];
			$message = $row['message'];
			$date = date('d-m-Y', strtotime($row["timestamp"]));
			
			echo '<tr class="danger">
			<td>'.$date.'</td>
			<td>'; 
			foreach($favour as $p)
			{
				echo $p."<br>";
			}
			echo'</td>
			<td> Rs. '.$amount.'</td>
			<td>'.$other.'</td>
			<td>';
			if($retreive_donations_bydonorid)
			{
				echo 'Granted';
			}
			else{
				echo 'Pending';
			}
			echo '</td>
			<td>';
			if($retreive_donations_bydonorid)
			{
				foreach($retreive_donations_bydonorid as $zrow)
				{
						$name = $zrow['name'];
						$phone = $zrow['phone'];
						$address = $zrow['address'];
						echo "Name:".$name."<br>Phone:".$phone."<br>Address:".$address;
				}
			}
			else{
				echo '-';
			}
			echo '</td>
			<td>';
			if($retreive_donations_bydonorid)
			{
				foreach($retreive_donations_bydonorid as $zrow)
				{
					echo $zrow['amount_granted'];					
				}
			}
			else{
				echo '-';
			}
			echo '</tr>';
		}
	echo '</tbody>';
}
else
{
	echo '<h4 style="text-align:center;">No Records Found!</h4>';
}



echo '</div></div>';
?>