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

class User extends DBO {
		public function __construct(){
			parent::__construct("users");
		}
		public function register($username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap){
			//var_dump([$username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap,]);
	
			$stmt = $this->db->prepare("insert into " .$this->table. "(username,email,password,first_name,last_name,birthdate,profession,tel,description,freelancer,state,address,province,city,cap) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap]);
		
			return $stmt->rowCount();
		}
		public function insert($username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap,$role_id){
			$stmt = $this->db->prepare("insert into " .$this->table. "(username,email,password,first_name,last_name,birthdate,profession,tel,description,freelancer,state,address,province,city,cap,role_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap,$role_id]);
		
			return $stmt->rowCount();
		}
		public function selectUser($username){
			$stmt = $this->db->prepare("select * from ".$this->table." WHERE username='$username'");
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		public function selectUsers(){
			$stmt = $this->db->prepare("select * from ".$this->table." WHERE disabled=1");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		public function modifyUser($id_usermod,$name,$l_name,$birthdate,$username,$password,$role_id){
			session_start();
			$id_user=$_SESSION["userid"];
			if($_SESSION["permission"]=="1" || $id_usermod==$id_user){
				if($_SESSION["permission"]=="1"){
					$query="UPDATE ".$this->table." SET name=?, l_name=?, birthdate=?, username=?,password=?,role_id=? WHERE id_user=?";
					$stmt = $this->db->prepare($query);
					$stmt->execute([$name,$l_name,$birthdate,$username,$password,$role_id,$id_usermod]);
				}else{
					$query="UPDATE ".$this->table." SET name=?, l_name=?, birthdate=?, username=?,password=? WHERE id_user=?";
					$stmt = $this->db->prepare($query);
					$stmt->execute([$name,$l_name,$birthdate,$username,$password,$id_usermod]);
					
				}
				return $stmt->rowCount();;
				
			}
			return false;
			

		}
		public function changeuserstatus($user_id){
			$query="UPDATE ".$this->table." SET disabled = IF(disabled=1, 0, 1);";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

		}
		
		
	}
?>