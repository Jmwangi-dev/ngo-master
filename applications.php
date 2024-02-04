<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$get_applications = $db->get_applications($uid);

echo '<div class="col-md-12" style="padding-top:20px;">
<h1 style="text-align:center;">All Donations</h1>
<div class="col-md-8 col-md-offset-2" >';

if($get_applications)
{
	echo '<table class="table table-bordered">
	<thead>
		<th>Submitted On</th>
		<th>Name</th>
		<th>Purpose</th>
		<th>Amount</th>
		<th>Other Requests</th>
		<th>Status</th>
		<th>Donor Name</th>
		<th>Amount in Rs</th>
	</thead>
	<tbody>';
		foreach($get_applications as $row)
		{
			$id = $row['id'];
			$retreive_donations = $db->retreive_donations($id);
			if($retreive_donations)
			{
				foreach($retreive_donations as $zrow)
				{
					$amount = $zrow['amount_granted'];
					$show = $db->show($zrow['donorid']);
					foreach($show as $prow)
					{
						$first_name = $prow['first_name'];
					}
				}
			}
			$amount = $row['amount'];
			$other = $row['other'];
			$name = $row['name'];
			$purpose = $row['purpose'];
			$date = date('d-m-Y', strtotime($row["timestamp"]));
			
			echo '<tr class="danger">
			<td>'.$date.'</td>
			<td>'.$name.'</td>
			<td>'.$purpose.'</td>
			<td> Rs. '.$amount.'</td>
			<td>'.$other.'</td>
			<td>';
			if($retreive_donations)
			{
				echo 'Granted';
			}
			else{
				echo 'Pending';
			}
			echo '</td>
			<td>';
			if($retreive_donations)
			{
				foreach($retreive_donations as $zrow)
				{
					$amount = $zrow['amount_granted'];
					$show = $db->show($zrow['donorid']);
					foreach($show as $prow)
					{
						echo $prow['first_name']."<br>";
					}
				}
			}
			else{
				echo '-';
			}
			echo '</td>
			<td>';
			if($retreive_donations)
			{
				foreach($retreive_donations as $zrow)
				{
					echo  $zrow['amount_granted']."<br>";
				}
			}
			else{
				echo '-';
			}
			echo '</td>
			</tr>';
		}
	echo '</tbody>';
}
else
{
	echo '<h4 style="text-align:center;">No Records Found!</h4>';
}



echo '</div></div>';
?>