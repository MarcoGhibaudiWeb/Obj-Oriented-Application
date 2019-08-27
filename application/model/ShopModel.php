<?php

class ShopModel extends BaseModel
{
	public function addCart($pID,$uID,$qt){

		$stmt = $this->db->prepare("SELECT * FROM cart WHERE pID=:pID AND uID=:uID");
		$stmt->execute(array('uID'=>$uID ,'pID'=>$pID));
		$cart= $stmt->fetch(PDO::FETCH_ASSOC);

		if($stmt->rowCount()){

			$stmt =$this->db->prepare("UPDATE cart SET qt = qt+:qt WHERE pID=:pID  and uID=:uID ");
			$stmt->execute(array('uID'=>$uID ,'pID'=>$pID, 'qt'=>$qt ));

		} else {

			$stmt =$this->db->prepare("INSERT INTO cart (uID, pID, qt, status) VALUES (:uID,:pID,:qt,'Active')");
			$stmt->execute(array('uID'=>$uID ,'pID'=>$pID, 'qt'=>$qt ));
		
		} 

		return true;
				
	}

	public function displayCart($uID){

		$stmt = $this->db->prepare("SELECT * FROM cart,product WHERE uID=:uID and product.pID = cart.pID");
		$stmt->execute(array(':uID'=>$uID));
		$cart= $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($stmt->rowCount()){

			return $cart; 
		
		}

	}

	public function deleteCart($pID,$uID){
	
		$stmt = $this->db->prepare("DELETE FROM cart WHERE uID=:uID and pID=:pID");
		$stmt->execute(array('uID'=>$uID ,'pID'=>$pID ));

			return TRUE; 
						
	}	

	public function addOrder($uID,$cart){

		

		$stmt = $this->db->prepare("INSERT INTO orders (uID ,date) values(:uID,CURRENT_TIME)");
		$stmt->execute(array('uID'=>$uID));

		$stmt = $this->db->prepare("SELECT oID FROM orders WHERE uID=:uID and status='active'");
		$stmt->execute(array('uID'=>$uID));
		$oID = $stmt->fetch(PDO::FETCH_ASSOC);
		$oID = $oID['oID'];
		


			foreach($cart as $event){ 

				$pID = $event['pID'];
				$qt = $event['qt'];

				$stmt = $this->db->prepare("INSERT INTO orderline (oID, pID, qt) values(:oID, :pID, :qt)");
				$stmt->execute(array('oID'=>$oID, 'pID'=>$pID, ':qt'=>$qt));
		
			} 

			

			$stmt = $this->db->prepare("DELETE FROM cart WHERE uID=:uID");
			$stmt->execute(array('uID'=>$uID));

			$stmt = $this->db->prepare("UPDATE orders set status='done' WHERE oID=:oID");
			$stmt->execute(array(':oID'=>$oID));

			

			return TRUE;
	  
		
	
	
	}

	public function getOrders($uID){

		$stmt = $this->db->prepare("SELECT * FROM orders WHERE uID=:uID");
		$stmt->execute(array('uID'=>$uID));
		$orders = $stmt->fetchAll();
					
		if($stmt->rowCount() > 0){ 
			
			return $orders;
					
		} 
			
  	}

	public function getOrder($oID){

		$stmt = $this->db->prepare("SELECT * FROM product, orderline, orders WHERE orderline.oID=orders.oID and orderline.pID=product.pID and orders.oID=:oID");
		$stmt->execute(array('oID'=>$oID));
		$order = $stmt->fetchAll();

		return $order;

	}
	
}




