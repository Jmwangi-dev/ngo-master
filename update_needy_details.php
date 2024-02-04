<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$needy_lname = $_POST['eneedy_lname'];
$needy_fname = $_POST['eneedy_fname'];
$needy_phone = $_POST['eneedy_phone'];
$needy_mobile = $_POST['eneedy_mobile'];
$needy_address = $_POST['eneedy_address'];
$needy_email = $_POST['eneedy_email'];

$update_needy_details = $db->update_needy_details($uid,$needy_lname,$needy_fname,$needy_phone,$needy_mobile,$needy_address,$needy_email);

if($update_needy_details)
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