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

    public function insert(){
        /*chiamate mysql con pdo*/
    }
}



?>
