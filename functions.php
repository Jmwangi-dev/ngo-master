<?php
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPWD","");
define("DB","NGO");


class DB_FUNCTIONS
{
	public function __construct(){
		 $this->db = @mysqli_connect(DBHOST,DBUSER,DBPWD,DB);
	}
	
	public function register_user($username,$type,$hashed_password)
	{
		$query = "INSERT INTO users(username,type,password) VALUES('$username','$type',$hashed_password)";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function login_donor($login_username,$login_password)
	{
		$saltquery = "select * from users where username = '$login_username' and password = '$login_password' and type = 'donor';";
		$result = @mysqli_query($this->db,$saltquery);
		$data = @mysqli_fetch_assoc($result);
		return $data;
	}
	
	public function login_needy($login_username,$login_password)
	{
		$saltquery = "select * from users where username = '$login_username' and password = '$login_password' and type = 'needy';";
		$result = @mysqli_query($this->db,$saltquery);
		$data = @mysqli_fetch_assoc($result);
		return $data;
	}
	
	public function login_admin($login_username,$login_password)
	{
		$saltquery = "select * from users where username = '$login_username' and password = '$login_password' and type = 'admin';";
		$result = @mysqli_query($this->db,$saltquery);
		$data = @mysqli_fetch_assoc($result);
		return $data;
	}
	
	public function add_donations($uid,$myRange,$allVals,$other,$address1,$address2,$address3,$message)
	{
		$query = "INSERT INTO donations(userid,amount,favour,other,address1,address2,address3,message) VALUES('$uid','$myRange','$allVals','$other','$address1','$address2','$address3','$message')";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function get_alldonations($uid)
	{
		$query = "SELECT * from donations where userid = '$uid'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function donations_allocations($uid)
	{
		$query = "SELECT * from donations where id = '$uid'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function get_donations()
	{
		$query = "SELECT * from donations where 1";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function insert($userid,$image,$imagename)
	{
		$query = "UPDATE donor SET image = '$image',image_name = '$imagename' WHERE userid = '$userid'";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function insert_needy($userid,$image,$imagename)
	{
		$query = "UPDATE needy SET image = '$image',image_name = '$imagename' WHERE userid = '$userid'";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function add_donor_details($uid,$donor_lname,$donor_fname,$donor_phone,$donor_mobile,$donor_address,$donor_email)
	{
		$query = "INSERT into donor(userid,last_name,first_name,phone,mobile,address,email) values('$uid','$donor_lname','$donor_fname','$donor_phone','$donor_mobile','$donor_address','$donor_email')";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function add_needy_details($uid,$donor_lname,$donor_fname,$donor_phone,$donor_mobile,$donor_address,$donor_email)
	{
		$query = "INSERT into needy(userid,last_name,first_name,phone,mobile,address,email) values('$uid','$donor_lname','$donor_fname','$donor_phone','$donor_mobile','$donor_address','$donor_email')";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function show($userid)
	{
		$query = "SELECT * from donor where userid = '$userid'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function updated_amount($updated_amount,$donationid,$donate,$other_donation_select)
	{
		$query = "UPDATE donations SET amount = '$updated_amount',donate = '$donate',other_d = '$other_donation_select' WHERE id = '$donationid'";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function show_needy($userid)
	{
		$query = "SELECT * from needy where userid = '$userid'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function retreive_donations($id)
	{
		$query = "SELECT * from grant_donations where needy_app_id = '$id'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function retreive_donations_bydonorid($id)
	{
		$query = "SELECT * from grant_donations where donationid = '$id'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function grant_donations($donorid,$donationid,$donate_to_name,$amtgranted,$other_donation_select,$name,$address,$phone)
	{
		$query = "INSERT into grant_donations(donorid,donationid,needy_app_id,amount_granted,other,name,address,phone) values('$donorid','$donationid','$donate_to_name','$amtgranted','$other_donation_select','$name','$address','$phone')";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
	
	public function get_allapplications($userid)
	{
		$query = "SELECT * from help where userid = '$userid'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function get_applications()
	{
		$query = "SELECT * from help where 1";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function donated_name($id)
	{
		$query = "SELECT * from help where id = '$id'";
		$enter = @mysqli_query($this->db,$query);
		$num_rows = @mysqli_num_rows($enter);
		if($num_rows>0) {
        	while($row=@mysqli_fetch_assoc($enter))
			{$data1[]=$row;}
		return $data1;
		}	
	}
	
	public function update_donor_details($uid,$donor_lname,$donor_fname,$donor_phone,$donor_mobile,$donor_address,$donor_email)
	{
		$query ="update donor set first_name = '$donor_fname', last_name = '$donor_lname' , phone = '$donor_phone', mobile = '$donor_mobile', address = '$donor_address', email = '$donor_email' where userid = '$uid'";
		$result = @mysqli_query($this->db,$query);
		return $result;
		
	}
	
	public function update_needy_details($uid,$donor_lname,$donor_fname,$donor_phone,$donor_mobile,$donor_address,$donor_email)
	{
		$query ="update needy set first_name = '$donor_fname', last_name = '$donor_lname' , phone = '$donor_phone', mobile = '$donor_mobile', address = '$donor_address', email = '$donor_email' where userid = '$uid'";
		$result = @mysqli_query($this->db,$query);
		return $result;
		
	}
	
	public function add_help_details($uid,$help_amount,$help_income,$help_name,$help_occupation,$help_other,$help_phone,$help_purpose,$help_relation,$help_address)
	{
		$query = "INSERT into help(userid,amount,income,name,occupation,other,phone,purpose,relation,address) values('$uid','$help_amount','$help_income','$help_name','$help_occupation','$help_other','$help_phone','$help_purpose','$help_relation','$help_address')";
		$result = @mysqli_query($this->db,$query);
		return $result;
	}
}
?>