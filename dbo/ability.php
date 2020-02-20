<?php

class DBO
{
    // constructor
    public function __construct($table)
    {
        $hostname = "localhost";
        $dbname = "ecodb";
        $user = "Ecouser";
        $pass = "Ecouser";
        $this->table = $table;
        try {
            $this->db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            return json_encode(array("result" => "1201"));
        }
    }
    public function selectAll()
    {
        $stmt = $this->db->prepare("select * from " . $this->table . "");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
class User extends DBO {
		public function __construct(){
			parent::__construct("skills");
		}
        public function register($skillname, $category){

        //var_dump([$username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap,]);
	
			$stmt = $this->db->prepare("insert into " .$this->table. "(skillname, category) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$skillname, $category]);		
			return $stmt->rowCount();
        }
    }