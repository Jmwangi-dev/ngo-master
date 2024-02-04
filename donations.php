<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$get_donations = $db->get_donations($uid);

echo '
<div class="container">
	<div class="row">
    	<div class="col-md-8" style="padding-top:20px;">
							<div class="widget blank no-padding">
								<div class="panel panel-default work-progress-table">
									  <!-- Default panel contents -->
									<div class="panel-heading">Donations recieved for Good Samaritan
										
									</div>';
if($get_donations)
{
									echo '<table id="mytable" class="table">
										<thead>
										  <tr>
											<th>Date</th>
                                            <th>Name</th>
                                            <th>Amount</th>
											<th>Other Donations</th>
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>';
										 foreach($get_donations as $row)
										 {	
											$id = $row['id'];
											 $show = $db->show($row['userid']);
											 foreach($show as $drow)
											 {
												$userid = $drow['userid'];
												 $first_name = $drow['first_name'];
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
			
										 echo ' <tr>
										<td>'.$date.'</td>
                                            <td>'.$first_name.'</td>
                                            <td>'.$amount.'</td>
											<td>
												'.$other.'
											</td>
										    <td><button type="button" onclick=allocate_donations("'.$id.'","'.$userid.'");>Manage</button></td>
										  </tr>';
										 }
										echo '</tbody>
									</table>';
}		
								echo '</div>
							</div>
		</div>
		<div class="col-md-4" id="allocate_div" style="padding-top:20px;">
		</div>
					</div>
</div>';

echo "<script>
function allocate_donations(uid,userid)
{
	$.ajax({
		type: 'POST',
		url:'allocate_donations.php',
		data: {
			uid : uid,
			userid : userid,
		},
		success:function(result){
			$('#allocate_div').html(result);
		}
	});
}
</script>";
	?>