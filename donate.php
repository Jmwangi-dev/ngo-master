<?php
@session_start();
$uid = $_SESSION['uid'];
echo '<div class="col-md-12" style="padding-top:20px;">
<h1 style="text-align:center;">Donation Form</h1>
<form id="donate_form">

<div class="col-md-6 col-md-offset-3" >
<div class="col-md-10 col-md-offset-2" id="donation_div"></div>
	<div class="slidecontainer" style="padding-bottom:20px;">
  
  <input type="range" min="0" max="10000" class="slider" id="myRange">

</div>

 <p class="alert alert-danger" style="text-align:center;font-weight:bold;" role="alert">Amount : Rs. <span id="demo"></span></p>
 
  
	<h4>Donation for the favour of</h4>
	<div id="checkbox_div">
    <div class="checkbox">
      <label><input type="checkbox" name="favour" value="Stop child labour  by helping their parents educate their children">Stop child labour  by helping their parents educate their children </label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="favour" value="Give children a healthy start to life by connecting them to proper healthcare">Give children a healthy start to life by connecting them to proper healthcare </label>
    </div>
	<div class="checkbox">
      <label><input type="checkbox" name="favour[]" value="Provide food and shelter to the needy ">Provide food and shelter to the needy </label>
    </div>
	</div>
	<div class="form-group">
		<textarea class="form-control" id="message" placeholder="Send a message"/>
	</div>
	
    <h4>Other ways to donate</h4>
	<div class="form-group">
		<select class="form-control" style="max-width:60%;height:30px;" id="other" id="select_job">
			<option value=""> - Select other ways to donate - </option>
			<option value="Clothes"> Clothes </option>
			<option value="Books"> Books </option>
			<option value="Shoes"> Shoes </option>
			<option value="Toys"> Toys </option>
			<option value="Electronics"> Electronics </option>
			<option value="Furniture"> Furniture </option>
		</select>
	</div>
	<h4>Pick up address</h4>
	<div class="col-md-4 form-group">
		 <input type="text" class="form-control" name="address1" id="address1" placeholder="Address line 1" title="enter your first name if any.">
	</div>
	<div class="col-md-4 form-group">
		 <input type="text" class="form-control" name="address2" id="address2" placeholder="Address line 2" title="enter your first name if any.">
	</div>
	<div class="col-md-4 form-group">
		 <input type="text" class="form-control" name="address3" id="address3" placeholder="Pin code" title="enter your first name if any.">
	</div>
	<div class="col-md-6 col-md-offset-4">
		<br>
		<button class="btn btn-lg btn-success" type="button" onclick=donate_form("'.$uid.'");><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
		<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
	</div>
  </form>
</div>

  

</div>
';

echo '<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

function donate_form(uid)
{
	var myRange = $("#myRange").val();
	 var allVals = [];
     $("#checkbox_div :checked").each(function() {
       allVals.push($(this).val());
     });
	var other = $("#other").val();
	var address1 = $("#address1").val();
	var address2 = $("#address2").val();
	var address3 = $("#address3").val();
	var message = $("#message").val();
	
	$.ajax({
		type: "POST",
		url:"add_donations.php",
		data: {
			uid : uid,
			myRange : myRange,
			allVals : allVals,
			other : other,
			address1 : address1,
			address2 : address2,
			message : message,
			address3 : address3,
			
		},
		success:function(result){
			$("#donation_div").html(result);
			$("#donate_form").trigger("reset");
		}
	});
		
}

</script>';
?>