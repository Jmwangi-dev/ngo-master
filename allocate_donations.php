<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_POST['uid'];
$userid = $_POST['userid'];

$donations_allocations = $db->donations_allocations($uid);
$get_applications = $db->get_applications();
//echo $uid."<br>".$userid;
if($donations_allocations)
{
	foreach($donations_allocations as $row)
		{
			$amount = $row['amount'];
			$favour = $row['favour'];
			$favour = json_decode($favour);
			$other = $row['other'];
			$address1 = $row['address1'];
			$address2 = $row['address2'];
			$address3 = $row['address3'];
			$message = $row['message'];
			$date = date('d-m-Y', strtotime($row["timestamp"]));
		}
}
echo '<form id="grant_donations_form">
<div class="col-md-12 well" id="grant_donations_div">
	<input type="hidden" value="'.$amount.'" id="donatedamount"/>
						<div class="form-group">
							<label class="control-label" for="help_address">Amount Received </label>
							<input type="text" class="form-control" value="'.$amount.'" placeholder="Amount Received" id="help_address" name="help_address" disabled>
						 </div>
		<div class="form-group">
							<label for="donate_to_name">  Donate To </label>
							<select class="selectpicker form-control" name="donate_to_name" id="donate_to_name">
								<option value="">  Donate To </option> ';
								foreach($get_applications as $prow)
								{
									$id = $prow['id'];
									$name = $prow['name'];
									$phone = $prow['phone'];
									$address = $prow['address'];
									$show_needy = $db->show_needy($userid);
									foreach($show_needy as $rrow)
									{
										$first_name = $rrow['first_name'];
										$last_name = $rrow['last_name'];
									}
									echo '<option value="'.$id.'">'.$name.' </option>';
								}
								echo '</select>
						</div>';
					if($other)
					{
						echo '<div class="form-group">
						<label for="other_donation_select">Donate '.$other.'</label>
						<select class="selectpicker form-control" name="other_donation_select" id="other_donation_select">
						<option value="">- Select Option -</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
						</select>
					</div> ';
					}
					
					echo '<div class="form-group">
							<label class="control-label" for="amtgranted">Amount to be given </label>
							<input type="text" class="form-control" placeholder="Amount to be given " id="amtgranted" name="amtgranted">
							<span id="alertdonateion"></span>
						 </div>
						 <center><button type="button" id="donationbtn" onclick=grant_donations("'.$uid.'","'.$userid.'"); class="btn btn-success">Submit</button></center>
						 </form>';

echo '</div>';

echo "<script>
$('#amtgranted').on('input', function() {
  var donatedamount = parseInt($('#donatedamount').val());
  var amtgranted = parseInt($('#amtgranted').val());
  if(amtgranted > donatedamount)
  {
	$('#alertdonateion').html('Amount cannot be greater than '+donatedamount);
	$('#donationbtn').attr('disabled', true);
  }
  else
  {
	$('#donationbtn').attr('disabled', false);
  }
  
});

function grant_donations(donationid,donorid)
{
	var donatedamount = $('#donatedamount').val();
	var donate_to_name = $('#donate_to_name').val();
	var other_donation_select = $('#other_donation_select').val();
	var amtgranted = $('#amtgranted').val();
	
	$.ajax({
			  type: 'POST',
			  url:'grant_donations.php',
			  data: {
					 donatedamount : donatedamount,
					 donate_to_name : donate_to_name,
					 other_donation_select : other_donation_select,
					 amtgranted : amtgranted,
					 donationid : donationid,
					 donorid : donorid,
					 
					},
					success:function(result){
					alert(result);
					 donations();
				}
			});
}
</script>";
?>