<?php

class DBO {
    // constructor
    public function __construct($table) {
        $hostname="localhost";
        $dbname="ecodb";
        $user="Ecouser";
        $pass="Ecouser";
        $this->table=$table;
        try {
            $this->db= new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            return json_encode(array("result"=>"1201"));  
        }
        
        
    }

    public function selectAll() {
        $stmt = $this->db->prepare("select * from ".$this->table." where toggle='1'" );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}

class Aule extends DBO {
		public function __construct(){
			parent::__construct("aule");
		}
		public function insert($name,$zona,$capienza){
			$stmt = $this->db->prepare("insert into " .$this->table. "(nome,zona,capienza) values(?,?,?)");
			$stmt->execute([$name,$zona,$capienza]);
	
			return $stmt->rowCount();
		}
		
		public function toggle($eventid){
			$stmt = $this->db->prepare("select * from ".$this->table." WHERE id='$eventid'");
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			
			
			
	
			$toggled=$result['toggle']==1 ? 0 : 1;
			$sql = "UPDATE ".$this->table." SET active=".$toggled.", WHERE id=".$eventid."";

			// Prepare statement
			$stmt = $this->db->prepare($sql);
		
			// execute the query
			$stmt->execute();
			return $stmt->rowCount();


		}
	}
?>