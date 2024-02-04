<?php
@session_start();
$uid = $_SESSION['uid'];
include('functions.php');
$db = new DB_FUNCTIONS();

if(isset($_POST['upload_needy_picture'])) {
	$image = addslashes ($_FILES['needy_pic']['name']);
	$imagetmp=addslashes (file_get_contents($_FILES['needy_pic']['tmp_name']));

  	$target = "img/".basename($image);

	$insert_needy = $db->insert_needy($uid,$image,$imagetmp);
	
	echo "<script>document.location='needy_dashboard.php'</script>";
}

$show_needy = $db->show_needy($uid);
if($show_needy)
{
	foreach($show_needy as $row)
	{
		$image_name = $row['image_name'];
	}
}
echo '
<div class="col-md-8 col-md-offset-2" style="padding-top:20px;">


            <div class="panel panel-danger">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
					 <h3 style="text-align:center;color:grey;">Profile</h3>
					</ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="first">
							<div class="col-md-3">
								  <div class="text-center">
										<form method="POST" action="needy_profile.php" enctype="multipart/form-data">';
											if($show_needy)
											{
												echo "<img style='margin-left: auto;margin-right: auto;'  src='data:image/jpeg;base64,".base64_encode($image_name)."' height=120 width=120/>";
											}
											else
											{
												echo '<img src="img/profile.jpg" class="avatar img-circle img-thumbnail" alt="avatar">';
											}
											echo '<h6>Upload a different photo...</h6>
											<input type="file" id="needy_pic" name="needy_pic"/>
											</hr><br>
											<button type="submit" name="upload_needy_picture" class="btn btn-warning">Upload</button>
										</form>
								  </div>
							</div>
							<div class="col-md-9" style="border-left: 1px solid #D3D3D3;">';
							if(!$show_needy)
							{
								echo '<form method="post" id="needy_profile_form">
								  <div class="form-group">
									  
									  <div class="col-xs-6">
										  <label for="needy_first_name">First name</label>
										  <input type="text" class="form-control" name="needy_first_name" id="needy_first_name" placeholder="first name" title="enter your first name if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										<label for="needy_last_name">Last name</label>
										  <input type="text" class="form-control" name="needy_last_name" id="needy_last_name" placeholder="last name" title="enter your last name if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="needy_phone">Phone</label>
										  <input type="text" class="form-control" name="needy_phone" id="needy_phone" placeholder="enter phone" title="enter your phone number if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  <div class="col-md-6">
										 <label for="needy_mobile">Mobile</label>
										  <input type="text" class="form-control" name="needy_mobile" id="needy_mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="needy_email">Email </label>
										  <input type="email" class="form-control" name="needy_email" id="needy_email" placeholder="you@email.com" title="enter your email.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="needy_email">Location</label>
										  <input type="text" class="form-control" id="needy_address" placeholder="somewhere" title="enter a location">
									  </div>
								  </div>
								  
								  <div class="form-group">
									   <div class="col-md-6 col-md-offset-4">
											<br>
											<button class="btn btn-lg btn-success" type="submit" onclick=submit_needy_profile("'.$uid.'");><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
											<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
										</div>
								  </div>
								  <div class="col-md-10 col-md-offset-2" id="needy_profile_div"></div>
								</form>';
							}
							else{
							foreach($show_needy as $row)
							{
								$needy_fname = $row['first_name'];
								$needy_lname = $row['last_name'];
								$needy_phone = $row['phone'];
								$needy_mobile = $row['mobile'];
								$needy_address = $row['address'];
								$needy_email = $row['email'];
							}
							
								echo '<form method="post" id="eneedy_profile_form">
								  <div class="form-group">
									  
									  <div class="col-xs-6">
										  <label for="eneedy_first_name">First name</label>
										  <input type="text" class="form-control" name="eneedy_first_name" value="'.$needy_fname.'" id="eneedy_first_name" placeholder="first name" title="enter your first name if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										<label for="eneedy_last_name">Last name</label>
										  <input type="text" class="form-control" name="eneedy_last_name" value="'.$needy_lname.'" id="eneedy_last_name" placeholder="last name" title="enter your last name if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="eneedy_phone">Phone</label>
										  <input type="text" class="form-control" name="eneedy_phone" value="'.$needy_phone.'" id="eneedy_phone" placeholder="enter phone" title="enter your phone number if any.">
									  </div>
								  </div>
					  
								  <div class="form-group">
									  <div class="col-md-6">
										 <label for="eneedy_mobile">Mobile</label>
										  <input type="text" class="form-control" name="eneedy_mobile" value="'.$needy_mobile.'" id="eneedy_mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="eneedy_email">Email </label>
										  <input type="email" class="form-control" name="eneedy_email" value="'.$needy_email.'" id="eneedy_email" placeholder="you@email.com" title="enter your email.">
									  </div>
								  </div>
								  <div class="form-group">
									  
									  <div class="col-md-6">
										  <label for="eneedy_email">Location</label>
										  <input type="text" class="form-control" id="eneedy_address" value="'.$needy_address.'" placeholder="somewhere" title="enter a location">
									  </div>
								  </div>
								 
								  <div class="form-group">
									   <div class="col-md-6 col-md-offset-4">
											<br>
											<button class="btn btn-lg btn-success" type="button" onclick=update_needy_profile("'.$uid.'");><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
											<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
										</div>
								  </div>
								  <div class="col-md-10 col-md-offset-2" id="eneedy_profile_div"></div>
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
function submit_needy_profile(uid)
{
	var needy_fname = $('#needy_first_name').val();
	var needy_lname = $('#needy_last_name').val();
	var needy_phone = $('#needy_phone').val();
	var needy_mobile = $('#needy_mobile').val();
	var needy_email = $('#needy_email').val();
	var needy_address = $('#needy_address').val();
	
	$.ajax({
		type: 'POST',
		url:'add_needy_details.php',
		data: {
			uid : uid,
			needy_fname : needy_fname,
			needy_lname : needy_lname,
			needy_phone : needy_phone,
			needy_mobile : needy_mobile,
			needy_email : needy_email,
			needy_address : needy_address,
			
		},
		success:function(result){
			$('#needy_profile_div').html(result);
			$('#needy_profile_form').trigger('reset');

		}
	});
}

function update_needy_profile(uid)
{
	var eneedy_fname = $('#eneedy_first_name').val();
	var eneedy_lname = $('#eneedy_last_name').val();
	var eneedy_phone = $('#eneedy_phone').val();
	var eneedy_mobile = $('#eneedy_mobile').val();
	var eneedy_email = $('#eneedy_email').val();
	var eneedy_address = $('#eneedy_address').val();
	
	$.ajax({
		type: 'POST',
		url:'update_needy_details.php',
		data: {
			uid : uid,
			eneedy_fname : eneedy_fname,
			eneedy_lname : eneedy_lname,
			eneedy_phone : eneedy_phone,
			eneedy_mobile : eneedy_mobile,
			eneedy_email : eneedy_email,
			eneedy_address : eneedy_address,
			
		},
		success:function(result){
			$('#eneedy_profile_div').html(result);
			$('#eneedy_profile_form').trigger('reset');
			needyprofile();
		}
	});
}
</script>";
?>