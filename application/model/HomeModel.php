<?php

class HomeModel extends BaseModel
{
   
	public function getAllEvents() {

		$stmt = $this->db->prepare("SELECT * FROM product");
        $stmt->execute();
		$events = $stmt->fetchAll();
			
		if($stmt->rowCount() > 0){ 
				
			return $events;

			} else {

				return false;
			} 
		
		}

	public function getEvent($id) {		

		$stmt = $this->db->prepare("SELECT * FROM product WHERE pID=:id");
        $stmt->execute(array(':id'=>$id));
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($event['pID'] == $id) {
				
			return $event;

		} else {
				
			return false;
			
		}

	}

	public function getEventByCity($city) {	

		$stmt = $this->db->prepare("SELECT * FROM product WHERE city=:city");
		$stmt->execute(array(':city'=>$city));
		$events = $stmt->fetchAll();
					
		if($stmt->rowCount() > 0){ 
						
			return $events;
					
		} else {
						
			return false;
					
		} 
		
	}

}