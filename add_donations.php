<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$myRange = $_POST['myRange'];
$allVals = $_POST['allVals'];
$other = $_POST['other'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address3 = $_POST['address3'];
$message = $_POST['message'];
$allVals = json_encode($allVals);
$add_donations = $db->add_donations($uid,$myRange,$allVals,$other,$address1,$address2,$address3,$message);
if($add_donations)
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