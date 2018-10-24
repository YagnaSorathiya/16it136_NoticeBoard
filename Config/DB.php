<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * @author	CodexWorld.com
 * @url		http://www.codexworld.com
 * @license	http://www.codexworld.com/license
 if (!defined('localfunction')) exit('No data available!');
 */

 
class DB{
   	/* private $dbHost     = "localhost";
     private $dbUsername = "root";
     private $dbPassword = "";
	 private $dbName     = "ys_rto";*/
	 
	 private $dbHost     = "localhost";
     private $dbUsername = "root";
     private $dbPassword = "";
	 private $dbName     = "noticeboard";

	
	public function __construct(){
		if(!isset($this->db)){
			// Connect to the database
			$conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
			 
			if($conn->connect_error){
				die("Failed to connect with MySQL: " . $conn->connect_error);
			}else{
				$this->db = $conn;
			}
		}
	}
    
	/*
	 * Returns rows from the database based on the conditions
	 * @param string name of the table
	 * @param array select, where, order_by, limit and return_type conditions
	 */
 
	 public function selectQuery($sqlqry)
	 {
		$result = $this->db->query($sqlqry);
		//$data = $result->fetch_assoc();
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$data[] = $row;
				}
			}
		 
		return !empty($data)?$data:false;
	}
	public function getRows($table,$conditions = array()){
		$sql = 'SELECT ';
		$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
		$sql .= ' FROM '.$table;
		if(array_key_exists("where",$conditions)){
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions['where'] as $key => $value){
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$key." = '".$value."'";
				$i++;
			}
		}
		
		if(array_key_exists("order_by",$conditions)){
			$sql .= ' ORDER BY '.$conditions['order_by']; 
		}
		
		if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
			$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
		}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
			$sql .= ' LIMIT '.$conditions['limit']; 
		}
		
		$result = $this->db->query($sql);
		
		if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
			switch($conditions['return_type']){
				case 'count':
					$data = $result->num_rows;
					break;
				case 'single':
					$data = $result->fetch_assoc();
					break;
				default:
					$data = '';
			}
		}
		
		else
		
		{
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
		}
		return !empty($data)?$data:false;
	}
	
	/*
	 * Insert data into the database
	 * @param string name of the table
	 * @param array the data for inserting into the table
	 */
	public function insert($table,$data){
		if(!empty($data) && is_array($data)){
			$columns = '';
			$values  = '';
			$i = 0;
			if(!array_key_exists('created',$data)){
				$data['created'] = date("Y-m-d H:i:s");
			}
			if(!array_key_exists('modified',$data)){
				$data['modified'] = date("Y-m-d H:i:s");
			}
			foreach($data as $key=>$val){
				$pre = ($i > 0)?', ':'';
				$columns .= $pre.$key;
				$values  .= $pre."'".$val."'";
				$i++;
			}
			$query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
		 
			
			$insert = $this->db->query($query);
			return $insert?$this->db->insert_id:false;
		}else{
			return false;
		}
	}
	public function insertentry($table,$data){
		if(!empty($data) && is_array($data)){
			$columns = '';
			$values  = '';
			$i = 0;
		/* 	if(!array_key_exists('created',$data)){
				$data['created'] = date("Y-m-d H:i:s");
			}
			if(!array_key_exists('modified',$data)){
				$data['modified'] = date("Y-m-d H:i:s");
			} */
			foreach($data as $key=>$val){
				$pre = ($i > 0)?', ':'';
				$columns .= $pre.$key;
				$values  .= $pre."'".$val."'";
				$i++;
			}
			$query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
			 
			$insert = $this->db->query($query);
			return $insert?$this->db->insert_id:false;
		}else{
			return $query;
		}
	}
	
	/*
	 * Update data into the database
	 * @param string name of the table
	 * @param array the data for updating into the table
	 * @param array where condition on updating data
	 */
	public function update($table,$data,$conditions){
		if(!empty($data) && is_array($data)){
			$colvalSet = '';
			$whereSql = '';
			$i = 0;
			if(!array_key_exists('modified',$data)){
				$data['modified'] = date("Y-m-d H:i:s");
			}
			foreach($data as $key=>$val){
				$pre = ($i > 0)?', ':'';
				$colvalSet .= $pre.$key."='".$val."'";
				$i++;
			}
			if(!empty($conditions)&& is_array($conditions)){
				$whereSql .= ' WHERE ';
				$i = 0;
				foreach($conditions as $key => $value){
					$pre = ($i > 0)?' AND ':'';
					$whereSql .= $pre.$key." = '".$value."'";
					$i++;
				}
			}
			$query = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
			$update = $this->db->query($query);
			return $update?$this->db->affected_rows:false;
		}else{
			return false;
		}
	}
	
	/*
	 * Delete data from the database
	 * @param string name of the table
	 * @param array where condition on deleting data
	 */
	public function delete($table,$conditions){
		$whereSql = '';
		if(!empty($conditions)&& is_array($conditions)){
			$whereSql .= ' WHERE ';
			$i = 0;
			foreach($conditions as $key => $value){
				$pre = ($i > 0)?' AND ':'';
				$whereSql .= $pre.$key." = '".$value."'";
				$i++;
			}
		}
		$query = "DELETE FROM ".$table.$whereSql;
		$delete = $this->db->query($query);
		return $delete?true:false;
	}
	public function DeleteUpdate($qry){
		$delete = $this->db->query($qry);
		return $delete?true:false;
	}
	/*
	
	*General Function
	*/
	public function GetProductNamebyID($id)
	{
	$result = $this->db->query("SELECT pname FROM product_master WHERE product_id='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['pname'];	 
     }	
	 public function GetGroupNamebyID($id)
	{
	$result = $this->db->query("SELECT groupname FROM product_master WHERE product_id='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['groupname'];	 
     }
	 public function GetUnitNamebyID($id)
	{
	$result = $this->db->query("SELECT unit FROM product_master WHERE product_id='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['unit'];	 
     }
	public function GetPartyNameByID($id)
{ 
	 
	$result = $this->db->query("SELECT pname FROM party_master WHERE pid='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['pname'];
	
}
public function GetUserNameByID($id)
{ 
	 
	$result = $this->db->query("SELECT username FROM user_master WHERE id='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['username'];
	
}
public function GetVehicleNameByID($id)
{
	 
	$result = $this->db->query("SELECT vehicle_no FROM vehicle_master WHERE vid='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['vehicle_no'];
	
}
public function GetSiteNameByID($id)
{
	 
	$result = $this->db->query("SELECT sname FROM site_master WHERE sid='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['sname'];
	
}
public function GetGradeNameByID($id)
{
	$result = $this->db->query("SELECT gname FROM grade_master WHERE gid='$id'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['gname'];
}
public function GetInwardOpeningQty($datefrom,$dateto)
{
	$result = $this->db->query("select sum(qty) as qty from inward_entry where inward_date<'$datefrom'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['qty'];
}
public Function GetOpeningQtyBalance($dateto)
{
	$result = $this->db->query("select sum(qty) as qty from inward_entry where inward_date<'$dateto'") or die(mysql_error());
	$data = $result->fetch_assoc();
	$inQty= $data['qty'];
	
   	$result = $this->db->query("select sum(qty) as qty from outward_entry where outward_date<'$dateto'") or die(
	mysql_error());
	
	//	$result = $this->db->query("select sum(qty) as qty from outward_entry where outward_date<DATE_ADD('$dateto',INTERVAL -1 DAY)") or die(
	//mysql_error());
	
	$data = $result->fetch_assoc();
	$outQty= $data['qty'];
	return $inQty-$outQty;
}
public function GetTodayInwardQty($date)
{
	$result = $this->db->query("select sum(qty) as qty FROM inward_entry where inward_date='$date'") or die(mysql_error());
	$data = $result->fetch_assoc();
	//if(is_null($data['Qty1'])) {return 0; } else { return 1;}
	return $data['qty'];
}
public function GetTodayOutwardQty($date)
{
	$result = $this->db->query("select sum(qty) as qty from outward_entry where outward_date='$date'") or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data['qty'];
}

public function FillOption($qry)
{
	 
	$result = $this->db->query($qry) or die(mysql_error());
	$data = $result->fetch_assoc();
	return $data;
	
}
public function checkLogin($username,$password)
{
	$user=mysqli_real_escape_string($this->db,$username);
	$pass=mysqli_real_escape_string($this->db,$password);
	$result = $this->db->query("SELECT id FROM user_master WHERE username='$user' and password='$pass'") or die(mysql_error());
	$data = $result->num_rows;
	if($data>0)
	{
	return 1;
	}
	else
	{return 0;}
}
public function checkDuplicateParty($fieldName)
{
	$result = $this->db->query("SELECT pid FROM party_master WHERE pname='$fieldName'") or die(mysql_error());
	$data = $result->num_rows;
	if($data>0)
	{ return 1;}
	else
	{return 0;}
}
public function countRecord($sql)
{
	$result = $this->db->query($sql) or die(mysql_error());
	$data = $result->num_rows;
	if($data>0)
	{ return $data;}
	else
	{return 0;}
}
//calculate total stock
public function calinwordqty($sq)
	{
		$result = $this->db->query("SELECT SUM(qty) as qty FROM inward_entry WHERE product_id=".$sq) or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PQTY = $data['qty'];
		$toqty = (int)$PQTY;
		
		return $toqty;
	}
	public function calinwordamt($sq)
	{
		$result = $this->db->query("SELECT SUM(amt) as amt FROM inward_entry WHERE product_id=".$sq) or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PAMT = $data['amt'];
	
		$toamt = (int)$PAMT;
		
		return $toamt;
	}
	public function caloutwordqty($sq)
	{
		$result = $this->db->query("SELECT SUM(qty) as qty FROM outward_entry WHERE product_id=".$sq) or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PQTY = $data['qty'];
		
		$toqty = (int)$PQTY ;
		
		return $toqty;
	}
	public function calioutwordamt($sq)
	{
		$result = $this->db->query("SELECT SUM(amt) as amt FROM outward_entry WHERE product_id=".$sq) or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PAMT = $data['amt'];
		
		$toamt = (int)$PAMT ;
		return $toamt;
	}
//for date wise 
 public function calinwordqtydt($sq,$dtfrom,$dtto)
	{
		$result = $this->db->query("SELECT SUM(qty) as qty FROM inward_entry WHERE ".$sq." inward_date >='".$dtfrom."' and inward_date <='".$dtto."'") or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PQTY = $data['qty'];
		$toqty = (int)$PQTY;
		
		return $toqty;
	}
	public function calinwordamtdt($sq,$dtfrom,$dtto)
	{
		$result = $this->db->query("SELECT SUM(amt) as amt FROM inward_entry WHERE ".$sq." inward_date >='".$dtfrom."' AND inward_date <='".$dtto."'") or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PAMT = $data['amt'];
	
		$toamt = (int)$PAMT;
		
		return $toamt;
	}
	public function caloutwordqtydt($sq,$dtfrom,$dtto)
	{ 
		$result = $this->db->query("SELECT SUM(qty) as qty FROM outward_entry WHERE ".$sq." outward_date >='".$dtfrom."' AND outward_date <='".$dtto."'") or die (mysql_error());
		$data = $result -> fetch_assoc();
		$PQTY = $data['qty'];
		
		$toqty = (int)$PQTY ;
		
		return $toqty;
	}
	public function calioutwordamtdt($sq,$dtfrom,$dtto)
	{
		$result = $this->db->query("SELECT SUM(amt) as amt FROM outward_entry WHERE  ".$sq." outward_date >='".$dtfrom."' AND outward_date <='".$dtto."'") or die (mysql_error());
		$data = $result -> fetch_assoc(); 
		$PAMT = $data['amt'];
		
		$toamt = (int)$PAMT ;
		return $toamt;
	}
	public function getidbytb()
{
	
	$result = $this->db->query("SELECT MAX(inward_id) AS inwardid FROM inward_entry") or die(mysql_error());
	$data = $result->fetch_assoc();
	return  $data['inwardid'];
	
}
public function getidbytbo()
{
	
	$result = $this->db->query("SELECT MAX(outward_id) AS otid FROM outward_entry") or die(mysql_error());
	$data = $result->fetch_assoc();
	return  $data['otid'];
	
}
public function getsid($sid)
{
	
	$result = $this->db->query("SELECT slotid FROM rackdetail where rsid=".$sid) or die(mysql_error());
	$data = $result->fetch_assoc();
	
	return  $data['slotid'];
	
}
public function getrack($qry)
{
	
	$result = $this->db->query($qry) or die(mysql_error());
	$data = $result->fetch_assoc();
	return  $data;
	
}
//


 
}