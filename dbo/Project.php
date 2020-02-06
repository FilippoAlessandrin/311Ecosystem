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

class Project extends DBO
{
    public function __construct()
    {
        parent::__construct("project");
    }

    public function insert($title, $descr, $sector, $start_date, $user_id){
        /*chiamate mysql con pdo*/
        $start_date == "" ? $start_date = Null : $start_date;
        $stmt = $this->db->prepare("insert into " . $this->table . "(title,descr,sector,start_date,user_id) values(?,?,?,?,?,?)");
        $stmt->execute([$title, $descr, $sector, $start_date, $user_id]);
        return $stmt->rowCount();
    }
    public function register($title, $descr, $sector, $start_date, $user_id){
        //var_dump([$username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap,]);
        $stmt = $this->db->prepare("insert into " .$this->table. "(title,descr,sector,start_date,user_id) values(?,?,?,?,?,?)");
        $stmt->execute([$title, $descr, $sector, $start_date, $user_id]);
    }
}