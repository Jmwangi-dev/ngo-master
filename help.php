<?php
@session_start();
$uid = $_SESSION['uid'];

echo '<div class="col-md-8 col-md-offset-2" style="padding-top:20px;"> <div class="panel panel-danger">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
					 <h3 style="text-align:center;color:grey;">Request Form</h3>
					</ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
					<form id="help_form">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label" for="help_name">Name</label>
							<input type="text" class="form-control" placeholder="Name" id="help_name" name="help_name">
						 </div>
						 <div class="form-group">
							<label class="control-label" for="help_relation">Relation to account holder </label>
							<input type="text" class="form-control" placeholder="Relation to account holder" id="help_relation" name="help_relation">
						 </div>
						 <div class="form-group">
							<label class="control-label" for="help_amount">Amount of help required </label>
							<input type="text" class="form-control" placeholder="Amount of help required" id="help_amount" name="help_amount">
						 </div>
						
					</div>
					<div class="col-md-4">
						 <div class="form-group">
							<label class="control-label" for="help_phone">Phone</label>
							<input type="text" class="form-control" placeholder="Phone" id="help_phone" name="help_phone">
						 </div>
						<div class="form-group">
							<label class="control-label" for="help_income">Annual income </label>
							<input type="text" class="form-control" placeholder="Annual income" id="help_income" name="help_income">
						 </div>
						<div class="form-group">
							<label class="control-label" for="help_purpose">Purpose</label>
							<input type="text" class="form-control" placeholder="Purpose" id="help_purpose" name="help_purpose">
						 </div>
					</div>
					<div class="col-md-4">
						 <div class="form-group">
							<label class="control-label" for="help_address">Address</label>
							<input type="text" class="form-control" placeholder="Address" id="help_address" name="help_address">
						 </div>
						  <div class="form-group">
							<label class="control-label" for="help_occupation">Occupation</label>
							<input type="text" class="form-control" placeholder="Occupation" id="help_occupation" name="help_occupation">
						 </div>
						 <div class="form-group">
							<label class="control-label" for="help_other">Other help</label>
							<select class="form-control" style="height:30px;" id="help_other_val">
								<option value=""> - Select category - </option>
								<option value="Clothes"> Clothes </option>
								<option value="Books"> Books </option>
								<option value="Shoes"> Shoes </option>
								<option value="Toys"> Toys </option>
								<option value="Electronics"> Electronics </option>
								<option value="Furniture"> Furniture </option>
							</select>
						 </div>
						 
					</div>
					<div class="col-md-10 col-md-offset-2" id="help_div_tag"></div>
					<div class="col-md-4 col-md-offset-5">
						
					</div>
					<button type="button" class="btn btn-lg btn-success"  onclick=add_data_form();><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
						
					</form>
					</div>
				</div>
		</div>
	</div>';
	
echo "<script>

function add_data_form()
{
	var help_address = $('#help_address').val();
	var help_amount = $('#help_amount').val();
	var help_income = $('#help_income').val();
	var help_name = $('#help_name').val();
	var help_occupation = $('#help_occupation').val();
	var help_other_val = $('#help_other_val').val();
	var help_phone = $('#help_phone').val();
	var help_purpose = $('#help_purpose').val();
	var help_relation = $('#help_relation').val();
	
	$.ajax({
		type: 'POST',
		url: 'help_application.php',
		data: {
			help_address : help_address,
			help_amount : help_amount,
			help_income : help_income,
			help_name : help_name,
			help_occupation : help_occupation,
			help_other_val : help_other_val,
			help_phone : help_phone,
			help_purpose : help_purpose,
			help_relation : help_relation,
			
		},
		success:function(result){
			$('#help_div_tag').html(result);
			$('#help_form').trigger('reset');

		}
	});
}
</script>";
?>