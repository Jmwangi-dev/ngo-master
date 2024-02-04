<?php
@session_start();
$uid = $_SESSION['uid'];
include('functions.php');
$db = new DB_FUNCTIONS();

if(isset($_POST['upload_donor_picture'])) {
	$image = addslashes ($_FILES['donor_pic']['name']);
	$imagetmp=addslashes (file_get_contents($_FILES['donor_pic']['tmp_name']));

  	$target = "img/".basename($image);

	$insert = $db->insert($uid,$image,$imagetmp);
	
	echo "<script>document.location='donor_dashboard.php'</script>";
}

$show = $db->show($uid);
if($show)
{
	foreach($show as $row)
	{
		$image_name = $row['image_name'];
	}
}

echo '
<div class="col-md-8 col-md-offset-2" style="padding-top:20px;">


            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 style="text-align:center;color:grey;">Profile</h3>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="first">
							<div class="col-md-3">
								  <div class="text-center">
										<form method="POST" action="donor_profile.php" enctype="multipart/form-data">';
											if($show)
											{
												echo "<img style='margin-left: auto;margin-right: auto;'  src='data:image/jpeg;base64,".base64_encode($image_name)."' height=120 width=120/>";
											}
											else
											{
												echo '<img src="img/profile.jpg" class="avatar img-circle img-thumbnail" alt="avatar">';
											}
											echo '<h6>Upload a different photo...</h6>
											<input type="file" id="donor_pic" name="donor_pic"/>
											</hr><br>
											<button type="submit" name="upload_donor_picture" class="btn btn-warning">Upload</button>
										</form>
								  </div>
							</div>
							<div class="col-md-9" style="border-left: 1px solid #D3D3D3;">';
							if(!$show)
							{
								echo '<form method="post" id="donor_profile_form">
								  <div class="form-group">
									  
									  <div class="col-xs-6">
										  <label for="donor_fname">First name</label>
										  <input type="text" class="form-control" name="donor_fname" id="donor_fname" placeholder="first name" title="enter your first name if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										<label for="donor_lname">Last name</label>
										  <input type="text" class="form-control" name="donor_lname" id="donor_lname" placeholder="last name" title="enter your last name if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="donor_phone">Phone</label>
										  <input type="text" class="form-control" name="donor_phone" id="donor_phone" placeholder="enter phone" title="enter your phone number if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  <div class="col-md-6">
										 <label for="donor_mobile">Mobile</label>
										  <input type="text" class="form-control" name="donor_mobile" id="donor_mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="donor_email">Email </label>
										  <input type="email" class="form-control" name="donor_email" id="donor_email" placeholder="you@email.com" title="enter your email.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="donor_address">Address</label>
										  <input type="text" class="form-control" id="donor_address" placeholder="Address" title="enter a location">
									  </div>
								  </div>
								  <div class="form-group">
									  
									 
								  </div>
								  <div class="form-group">
									  
									 
								  </div>
								  <div class="form-group">
									   <div class="col-md-6 col-md-offset-4">
											<br>
											<button class="btn btn-lg btn-success" type="button" onclick=donorprofile_dets("'.$uid.'");><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
											<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
										</div>
								  </div>
								  <div class="col-md-10 col-md-offset-2" id="donor_profile_div"></div>
								</form>';
							}
							else{
							
							foreach($show as $row)
							{
								$donor_fname = $row['first_name'];
								$donor_lname = $row['last_name'];
								$donor_phone = $row['phone'];
								$donor_mobile = $row['mobile'];
								$donor_address = $row['address'];
								$donor_email = $row['email'];
							}
							
								echo '<form method="post" id="edonor_profile_form">
								  <div class="form-group">
									  
									  <div class="col-xs-6">
										  <label for="edonor_fname">First name</label>
										  <input type="text" class="form-control" name="edonor_fname" value="'.$donor_fname.'" id="edonor_fname" placeholder="first name" title="enter your first name if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										<label for="edonor_lname">Last name</label>
										  <input type="text" class="form-control" name="edonor_lname" value="'.$donor_lname.'" id="edonor_lname" placeholder="last name" title="enter your last name if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="edonor_phone">Phone</label>
										  <input type="text" class="form-control" name="edonor_phone" id="edonor_phone" value="'.$donor_phone.'" placeholder="enter phone" title="enter your phone number if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  <div class="col-md-6">
										 <label for="edonor_mobile">Mobile</label>
										  <input type="text" class="form-control" name="edonor_mobile" id="edonor_mobile" value="'.$donor_mobile.'" placeholder="enter mobile number" title="enter your mobile number if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="edonor_email">Email </label>
										  <input type="email" class="form-control" name="edonor_email" id="edonor_email" value="'.$donor_email.'" placeholder="you@email.com" title="enter your email.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="edonor_address">Address</label>
										  <input type="text" class="form-control" id="edonor_address" placeholder="Address" value="'.$donor_address.'" title="enter a location">
									  </div>
								  </div>
								  
								  <div class="form-group">
									   <div class="col-md-6 col-md-offset-4">
											<br>
											<button class="btn btn-lg btn-success" type="button" onclick=donorprofile_update("'.$uid.'");><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
											<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
										</div>
								  </div>
								  <div class="col-md-10 col-md-offset-2" id="edonor_profile_div"></div>
								</form>';
							}
							echo '</div>
						 </div>
						  <div class="tab-pane" id="second">
							<div class="namedesig">
							  <h4>Dr. Martin</h4>
							  <p>PhD in Applied Chemistry</p>
							</div>
						  </div>
                    </div>
                </div>
            </div>
        

</div>';

echo "<script>
function donorprofile_dets(uid)
{
	var donor_fname = $('#donor_fname').val();
	var donor_lname = $('#donor_lname').val();
	var donor_phone = $('#donor_phone').val();
	var donor_mobile = $('#donor_mobile').val();
	var donor_email = $('#donor_email').val();
	var donor_address = $('#donor_address').val();
	
	$.ajax({
		type: 'POST',
		url:'add_donor_details.php',
		data: {
			uid : uid,
			donor_fname : donor_fname,
			donor_lname : donor_lname,
			donor_phone : donor_phone,
			donor_mobile : donor_mobile,
			donor_email : donor_email,
			donor_address : donor_address,
			
		},
		success:function(result){
			$('#donor_profile_div').html(result);
			$('#donor_profile_form').trigger('reset');

		}
	});
}

function donorprofile_update(uid)
{
	var donor_fname = $('#edonor_fname').val();
	var donor_lname = $('#edonor_lname').val();
	var donor_phone = $('#edonor_phone').val();
	var donor_mobile = $('#edonor_mobile').val();
	var donor_email = $('#edonor_email').val();
	var donor_address = $('#edonor_address').val();
	
	$.ajax({
		type: 'POST',
		url:'update_donor_details.php',
		data: {
			uid : uid,
			donor_fname : donor_fname,
			donor_lname : donor_lname,
			donor_phone : donor_phone,
			donor_mobile : donor_mobile,
			donor_email : donor_email,
			donor_address : donor_address,
			
		},
		success:function(result){
			$('#edonor_profile_div').html(result);
			$('#edonor_profile_form').trigger('reset');
			donorprofile();

		}
	});
}
</script>";
?>