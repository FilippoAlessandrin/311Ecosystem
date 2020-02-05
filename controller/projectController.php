<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/311Ecosystem/dbo/Project.php";
class ProjectController
{
    public function __construct()
    {
        $this->projectDBO = new Project();
    }
    public function insert(){
        
        if(isset($_SESSION["permission"])){
            if($_SESSION["permission"]==1){
                $title=$_POST["title"];
                $descr=$_POST["descr"];
                $sector=$_POST["sector"];
                $start_date=$_POST["start_date"];
                $result=$this->ProjectDBO->insertProject($title,$descr,$sector,$start_date);
                $result>=1 ?  $success=true : $success=false;
                return json_encode(array("result"=>"1201"));  
            }else{
                return json_encode(array("result"=>"1401"));
            }


        }else{
            return json_encode(array("result"=>"1401"));
        }
        /**args */
        
        /*dbo project insert*/ 
    }
}
?>