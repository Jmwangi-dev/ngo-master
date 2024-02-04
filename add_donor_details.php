<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$donor_lname = $_POST['donor_lname'];
$donor_fname = $_POST['donor_fname'];
$donor_phone = $_POST['donor_phone'];
$donor_mobile = $_POST['donor_mobile'];
$donor_address = $_POST['donor_address'];
$donor_email = $_POST['donor_email'];

$add_donor_details = $db->add_donor_details($uid,$donor_lname,$donor_fname,$donor_phone,$donor_mobile,$donor_address,$donor_email);

if($add_donor_details)
{
	echo '<div class="alert alert-success alert-dismissable">
			  <a class="panel-close close" data-dismiss="alert">×</a>
			  <i class="fa fa-thumbs-up"></i>
			   <strong>Records Successfully entered</strong>
			</div>';
}
else
{
	echo '<div class="alert alert-danger alert-dismissable">
			  <a class="panel-close close" data-dismiss="alert">×</a>
			  <i class="fa fa-times"></i>
			  <strong> Error! Records not added</strong>
			</div>';
}
?>