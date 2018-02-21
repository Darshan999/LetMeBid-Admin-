 <?php
class database
{
	private static $host='localhost';
	private static $uname='root';
	private static $pwd='';
	private static $con=NULL;
	//static uses one connection throughout whole programme. Hence it is best method to use.
	public static function connect()
	{
		self::$con=mysql_connect(self::$host,self::$uname,self::$pwd);
		mysql_select_db('letmebid',self::$con);
		return self::$con;
	}
	public static function disconnect()
	{
		mysql_close(self::$con);
		self::$con=NULL;
	}
	public function login($email,$password)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where user_email_id='$email' and user_password='$password'",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function getalluser()
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl ",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function getallproducts()
	{
		$con=database::connect();
		$res=mysql_query("select * from product_tbl ",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function getallcategory()
	{
		$con=database::connect();
		$res=mysql_query("select * from category_tbl ",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function getallsubcategory()
	{
		$con=database::connect();
		$res=mysql_query("select * from subcategory_tbl ",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
public function userdetail($u_email_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where user_email_id='$u_email_id'",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function userdetail1($user_id)
	{
		$con=database::connect();
		$res=mysql_query("select  * from user_tbl where user_id='$user_id'",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function userdetail2()
	{
		$con=database::connect();
		$res=mysql_query("select  * from user_tbl where user_type=1",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}

	public function usermuldel($u_email_id)
	{
		$con=database::connect();
		$q="delete from user_tbl where user_email_id='$u_email_id'";
		$res=mysql_query($q,$con);
		//echo $q;
	return $res;
	}
	public function userdisplay()
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where user_type=0",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function userdelete($u_email_id)
	{
		$con=database::connect();
		$res=mysql_query("delete from user_tbl where user_email_id='$u_email_id'",$con);
		return $res;
		database::disconnect();
	}
	public function userapprove($user_email_id,$user_first_name,$user_last_name,$user_contact_no,$user_photo,$user_password,$user_type,$user_aadhar_card_number,$user_address,$fk_city_id,$fk_state_id)
	{
		$con=database::connect();
		$res=mysql_query("update user_tbl set user_email_id='$user_email_id' , user_first_name='$user_first_name',user_last_name='$user_last_name',user_contact_no='$user_contact_no',user_photo='$user_photo',user_password='$user_password',user_type='$user_type',
			user_aadhar_card_number='$user_aadhar_card_number',user_address='$user_address',fk_city_id='$fk_city_id',fk_state_id='$fk_state_id' where user_email_id='$user_email_id'  ",$con);
		return $res;
		database::disconnect();
	}
	public function productdisplay()
	{
		$con=database::connect();
		$res=mysql_query("select * from product_tbl where product_status=0",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	
	public function productdisplay1()
	{
		$con=database::connect();
		$res=mysql_query("select DISTINCT fk_user_id from product_tbl where product_status=1",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function productdetail($product_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from product_tbl where product_id='$product_id'",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function productapprove($product_id)
	{
		$con=database::connect();
		$res=mysql_query("update product_tbl set product_status=1 where product_id='$product_id'",$con);
		return $res;
		database::disconnect();
	}
	public function productdelete($product_id)
	{
		$con=database::connect();
		$res=mysql_query("delete from product_tbl where product_id='$product_id'",$con);
		return $res;
		database::disconnect();
	}
}

?>