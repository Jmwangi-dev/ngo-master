<?php
include("functions.php");
$db = new DB_FUNCTIONS();
@session_start();
$uid = $_SESSION['uid'];

$donatedamount = 0;
$amtgranted = 0;

$donatedamount = $_POST['donatedamount'];
$donate_to_name = $_POST['donate_to_name'];
$other_donation_select = $_POST['other_donation_select'];
$amtgranted = $_POST['amtgranted'];
$donationid = $_POST['donationid'];
$donorid = $_POST['donorid'];

$donate = 1;
$updated_amount = $donatedamount - $amtgranted;

$update_Amount = $db->updated_amount($updated_amount,$donationid,$donate,$other_donation_select);

$donated_name = $db->donated_name($donate_to_name);
foreach($donated_name as $row)
{
	$name = $row['name'];
	$address = $row['address'];
	$phone = $row['phone'];
}
//echo $name."<br>".$address."<br>".$phone;

$grant_donations = $db->grant_donations($donorid,$donationid,$donate_to_name,$amtgranted,$other_donation_select,$name,$address,$phone);
//echo $update_Amount."<br>".$grant_donations;
if($donated_name && $grant_donations)
{
	echo 'Records Successfully entered</strong>';
}
else
{
	echo 'Error! Records not added</strong>';
}
?>