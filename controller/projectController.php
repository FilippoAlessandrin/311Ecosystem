<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/311Ecosystem/dbo/Project.php";
class ProjectController
{
    public function __construct()
    {
        $this->projectDBO = new Project();
    }
    public function getAllProjects(){
        return json_encode($this->projectDBO->selectAll());
    }
        public function insert(){
            if(isset($_SESSION["permission"])){
                if(!$_SESSION["permission"] < 3){
                    if(
                        isset($_POST["title"]) 
                        && isset($_POST["descr"]) 
                        && isset($_POST["sector"]) 
                        && isset($_POST["start_date"])
                    ){
    
                        $title=$_POST["title"];
                        $descr=$_POST["descr"];
                        $sector=$_POST["sector"];
                        $start_date=$_POST["start_date"];                
                    }else{
                        return json_encode(array("result"=>"1400", "message"=>"Missing arguments"));
                    }
                }else{
                    return json_encode(array("result"=>"1403", "message"=>"Doesn't have permission"));
                }


                }else{
                    return json_encode(array("result"=>"1403", "message"=>"Not logged in"));
                }
        }

        /**args */
        
        /*dbo project insert*/ 
    }

?>