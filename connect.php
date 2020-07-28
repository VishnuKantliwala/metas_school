<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$path = substr( dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT']));
$domain = $protocol . $_SERVER['HTTP_HOST'] . $path."/";
//$domain=$_SERVER['HTTP_HOST'];

/*
* Mysql database class - only one connection alowed
*/
class connect {
	public $_connection;
	private static $_instance; //The single instance
private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	public $_database = "iced_metas_s";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
	//private function __construct()
	public function connectdb() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
			//echo "connected...";
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
				 E_USER_ERROR);
				 //echo "noy connected...";
		}
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	public function setdomain()
	{
		global $domain;
		
			
		echo "<base href='$domain'/>";
		
		
	}
	
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
	
	public function getCategories($cat_id)
    {
        
        if($cat_id==0)
        {
            echo '<li><a href="Home/">Home</a></li><li class="bread_active"><a href="Categories/all/">Categories</a></li>';
           
        }            
        else
        {
			//echo $cat_id;
            $sql =mysqli_query($this->_connection,"SELECT slug,cat_name,cat_parent_id,cat_id FROM  `tbl_category` where cat_id='".$cat_id."'");
            $row=mysqli_fetch_assoc($sql);
            $this->getCategories($row['cat_parent_id']);
			$sqlC=mysqli_query($this->_connection,"select * from tbl_product where cat_id like '%".$row['cat_id']."%' ");
			
            //echo "select * from tbl_product where cat_id like '%".$row['cat_id']."%' ";
            if( mysqli_num_rows($sqlC) > 0 )
            {
                echo '<li><a href="Products/'.$row['slug'].'/">'.$row['cat_name'].'</a></li>';
                
            }
            else
            {
                echo '<li><a href="Categories/'.$row['slug'].'/" class="link">'.$row['cat_name'].'</a></li>';
            }

            
        }
	}
	public function selectdb($qry)
	{
		$rs=mysqli_query($this->_connection, $qry);
		return $rs;
	}
	public function insertdb($qry)
	{
		mysqli_query($this->_connection,$qry);
	}
	public function fillcombo($cmbname,$qry)
	{
		print ("<select name='$cmbname' style='width:160px'>");
		//query
		$sql = mysqli_query($this->_connection,$qry);
		while($row=$sql->fetch_assoc())
		{
		$ID = $row[0];
		$Name = $row[1];
		$Name = stripslashes($Name);
		print ("<option value='$ID'>$Name</option>");
		} 
		print ("</select>");
	}
	public function Deletedata($tablename,$primarykey,$id)
	{
		mysqli_query($this->_connection,"delete from $tablename where $primarykey=$id");
	}
	public function getname($tablename,$tablekey,$dispname,$value)
	{
		$sql2=mysqli_query($this->_connection,"select $dispname from $tablename where $tablekey=$value");
		while($row2=$sql2->fetch_row())
		{
		//print_r($row2);die;
		echo $row2[0];
		}
	}
	
	public function gethax($tablename,$tablekey,$dispname,$value)
	{
		$sql2=mysqli_query($this->_connection,"select $dispname from $tablename where $tablekey=$value");
		$hax="";
		while($row2=$sql2->fetch_row())
		{
//			print_r($row2);die;
		 $hax=$row2[0];
		}
		return $hax;
	}
	public function selectedcombo($cmbname,$qry,$id)
	{
		print ("<select name='$cmbname' style='width:160px'>");
		//$con=mysql_connect('localhost','root','');
		//mysql_select_db("myprint",$con);

		//query
		$sql = mysqli_query($this->_connection,$qry);
		while($row=$sql->fetch_assoc())
		{
			$ID = $row[0];
			$Name = $row[1];
			$Name = stripslashes($Name);
			//echo $id;
			if($id==$ID)
			{
				print ("<option value='$ID' selected='selected'>$Name</option>");
			}
			else
			{
				print ("<option value='$ID'>$Name</option>");
			}
		} 
		print ("</select>");
	}
	public function idretval($param)
	{
		
		$pieces = explode("|", $param);
		for ($number = 0; $number < sizeof($pieces); $number++) 
		{
			//echo $pieces[$number]; 
			$result=mysqli_query($this->_connection,"select colour_name from colour where colour_id=$pieces[$number]");
			while($row=$result->fetch_assoc())
			{
				$name=$row[0];
				echo $name;
				echo ",";
				
			}
		}
	}
	
	 // close opened html tags
    function closetags ( $html )
        {
        #put all opened tags into an array
        preg_match_all ( "#<([a-z]+)( .*)?(?!/)>#iU", $html, $result );
        $openedtags = $result[1];
        #put all closed tags into an array
        preg_match_all ( "#</([a-z]+)>#iU", $html, $result );
        $closedtags = $result[1];
        $len_opened = count ( $openedtags );
        # all tags are closed
        if( count ( $closedtags ) == $len_opened )
        {
        return $html;
        }
        $openedtags = array_reverse ( $openedtags );
        # close tags
        for( $i = 0; $i < $len_opened; $i++ )
        {
            if ( !in_array ( $openedtags[$i], $closedtags ) )
            {
            $html .= "</" . $openedtags[$i] . ">";
            }
            else
            {
            unset ( $closedtags[array_search ( $openedtags[$i], $closedtags)] );
            }
        }
        return $html;
    }
}
?>