<?php
class pedidos_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();        
    }            	

    function getProductsByCatalogid($catalogid)
    {
    	$sql="
    		SELECT
    			p.productid AS productid,
    			p.code AS code,
    			p.description AS description,
    			p.price AS price,
    			p.imageurl AS imageurl
    		FROM 
    			products p, catalogproduct cp
    		WHERE
    			p.productid=cp.productid AND
    			cp.catalogid=cp.catalogid AND
    			cp.catalogid=?
    			ORDER BY productid
    	";
    	
    	$q=$this->db->query($sql, array($catalogid));
    	
    	if ($q->num_rows() > 0)
    	{
    		foreach ($q->result() as $row)
    			$data[]=$row;

    		$q->free_result();
    		return $data;
    	}
    }
    
	function getProductsByCatalogidPagination($catalogid, $limit, $offset)
    {
    	$sql="
    		SELECT
    			p.productid AS productid,
    			p.code AS code,
    			p.description AS description,
    			p.price AS price,
    			p.imageurl AS imageurl
    		FROM 
    			products p, catalogproduct cp
    		WHERE
    			p.productid=cp.productid AND
    			cp.catalogid=cp.catalogid AND
    			cp.catalogid=?
    			ORDER BY productid LIMIT $limit OFFSET $offset
    	";
    	
    	$q=$this->db->query($sql, array($catalogid));
    	
    	if ($q->num_rows() > 0)
    	{
    		foreach ($q->result() as $row)
    			$data[]=$row;

    		$q->free_result();
    		return $data;
    	}
    }
    
    function login($user, $pass)
    {
    	$sql="SELECT * FROM users WHERE email=? AND password=?";
    	$q=$this->db->query($sql, array($user, $pass));
    	
    	return ($q->num_rows() > 0) ? $q->row() : FALSE;
    }
    
    function checkOrderUser($userid)
    {
    	$sql="SELECT * FROM orders WHERE userid=? AND statusid=1";
    	$q=$this->db->query($sql, array($userid));
    	
    	if ($q->num_rows() > 0)
    	{
    		$data=$q->row();
    		return $data->orderid;
    	}
    	else
    	{
    		$sql="INSERT INTO orders(userid, statusid) VALUES(?,?);";
    		$r=$this->db->query($sql, array($userid, 1));

    		return $this->db->insert_id();
    	}    
    }
    
    function getProductsByOrderid($orderid)
    {
    	$sql="
    		SELECT 
    			op.detailid AS detailid,
    			op.orderid AS orderid,
    			op.productid AS productid,
    			p.description AS description,
    			p.price AS price,
    			p.code AS code,
    			SUM(op.amount) AS amount 
    		FROM
    			orders o, products p, orderdetail op
    		WHERE 
    			o.orderid=op.orderid AND
    			p.productid=op.productid AND
    			op.orderid=?
    			GROUP BY op.productid ORDER BY op.detailid    			 
    	";
    	
    	$q=$this->db->query($sql, array($orderid));
    	
    	if ($q->num_rows() > 0)
    	{
    		foreach ($q->result() as $row)
    			$data[]=$row;

    		$q->free_result();
    		return $data;
    	}
    }
    
    function saveProductOrder($productid, $orderid, $amount)
    {
    	$sql="INSERT INTO orderdetail(orderid, productid, amount) VALUES(?,?,?);";
    	$res=$this->db->query($sql, array($orderid, $productid, $amount));
    	
    	return $res;
    }
    
    function delProductOrder($productid, $orderid)
    {
    	$sql="DELETE FROM orderdetail WHERE productid=? AND orderid=?";
    	$res=$this->db->query($sql, array($productid, $orderid));
    	
    	return $res;
    }
    
    function deleteOrderByOrderid($orderid, $userid)
    {
    	$sql="DELETE FROM orders WHERE orderid=? AND userid=?";
    	$res=$this->db->query($sql, array($orderid, $userid));
    	
    	return $res;
    }
    
    function getUserByUserid($userid)
    {
    	$sql="SELECT * FROM users WHERE userid=?;";
    	$q=$this->db->query($sql, array($userid));
    	
    	if ($q->num_rows() > 0)
    	{    		
    		$data=$q->row();;

    		$q->free_result();
    		return $data;
    	}
    }
    
    function getOrderByOrderid($orderid)
    {
    	$sql="SELECT * FROM orders WHERE orderid=?;";
    	$q=$this->db->query($sql, array($orderid));
    	
    	if ($q->num_rows() > 0)
    	{    		
    		$data=$q->row();;

    		$q->free_result();
    		return $data;
    	}
    }
    
    function updateStatusOrder($orderid, $status)
    {
    	$sql="UPDATE orders SET statusid=? WHERE orderid=?";
    	$q=$this->db->query($sql, array($status, $orderid));
    	
    	return $q;
    }
    
    function getLastPedidos()
    {
    	$sql="
    		SELECT 
    			*, 
    			(SELECT CONCAT(name,'  ',lastname) FROM users WHERE userid=orders.userid) AS name,
    			(SELECT description FROM status WHERE statusid=orders.statusid) AS status 
    		FROM 
    			orders ORDER BY date DESC LIMIT 20
    	";
    	
    	$q=$this->db->query($sql);    	
    	if ($q->num_rows() > 0)
    	{
    		foreach ($q->result() as $row)
    			$data[]=$row;

    		$q->free_result();
    		return $data;
    	}
    }
    
    function updateamountproduct($orderid, $productid, $amount)
    {
    	$sql="UPDATE orderdetail SET amount=$amount WHERE orderid=$orderid AND productid=$productid;";
    	$q=$this->db->query($sql, array($amount, $orderid, $amount));
    	
    	return $q;
    }
}
?>