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
        $stmt = $this->db->prepare("select * from ".$this->table."");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}

class Aule extends DBO {
		public function __construct(){
			parent::__construct("prenotazione");
		}
		public function insert($title,$start_date,$end_date,$description,$isPublic,$tot_ore,$active,$aulaid,$iduser){
			$stmt = $this->db->prepare("insert into " .$this->table. "(id_user,id_aula,titolo,descrizione,isPublic,start_date,end_date,tot_ore,active) values(?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$iduser,$aulaid,$title,$description,$isPublic,$start_date,$end_date,$tot_ore,$active]);
	
			return $stmt->rowCount();
		}
		public function getEventsBetween($start_datetimestring,$end_datetimestring,$active,$aulaId){
			$stmt = $this->db->prepare("select * from ".$this->table." WHERE active ='1' AND start_date >= '$start_datetimestring' AND end_date <= '$end_datetimestring' AND id_aula='$aulaId'");
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		
	}
?>