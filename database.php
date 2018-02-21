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
	public function approveproducts()
	{

		$con=database::connect();
		$res=mysql_query("select product_name,product_photo from product_tbl where product_status=0",$con);

		return $res;	
	}

	public function productbylimit()
	{

		$con=database::connect();
		$res=mysql_query("select product_name,product_photo from product_tbl where product_status=0 ORDER BY product_id DESC LIMIT 3",$con);

		return $res;	
	}

	public function approveusers()
	{

		$con=database::connect();
		$res=mysql_query("select user_first_name,user_photo from user_tbl where user_type=0 ORDER BY user_id DESC LIMIT 3",$con);

		return $res;	
	}
	public function userdisplaybyid($user_email_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where user_email_id='$user_email_id'",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function categorydisplay()
	{
		$con=database::connect();
		$res=mysql_query("select * from category_tbl ",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function categorydisplaybyid($cat_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from category_tbl where cat_id=$cat_id ",$con);
		//$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}
	public function insertcategory($cat_name)
	{
		$con=database::connect();
		$res=mysql_query("insert into category_tbl values (null,'$cat_name')",$con);
		return $res;
		database::disconnect();
	}
	public function updatecategory($cat_id,$cat_name)
	{
		$con=database::connect();
		$res=mysql_query("update category_tbl set cat_name='$cat_name' where cat_id='$cat_id'",$con);
		return $res;			
		database::disconnect();		
	}

	public function categorydelete($cat_id)
	{
		$con=database::connect();
		$res=mysql_query("delete from category_tbl where cat_id='$cat_id'",$con);
		return $res;
		database::disconnect();
	}

	public function categorymuldel($cat_id)
	{
		$con=database::connect();
		$q="delete from category_tbl where cat_id='$cat_id'";
		$res=mysql_query($q,$con);
		//echo $q;
		return $res;
	}	

}

?>