<?php
@session_start();
$uid = $_SESSION['uid'];
include("functions.php");
$db = new DB_FUNCTIONS();

$help_address = $_POST['help_address'];
$help_amount = $_POST['help_amount'];
$help_income = $_POST['help_income'];
$help_name = $_POST['help_name'];
$help_occupation = $_POST['help_occupation'];
$help_other = $_POST['help_other_val'];
$help_phone= $_POST['help_phone'];
$help_purpose = $_POST['help_purpose'];
$help_relation = $_POST['help_relation'];


$add_help_details = $db->add_help_details($uid,$help_amount,$help_income,$help_name,$help_occupation,$help_other,$help_phone,$help_purpose,$help_relation,$help_address);

if($add_help_details)
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