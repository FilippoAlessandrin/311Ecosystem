<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/dbo/Aule.php";
    class AuleController{
        public function __construct() {
            $this->auleDBO = new Aule();

        }
        public function insert(){
            if(!isset($_SESSION["permission"])){
                if(/*$_SESSION["permission"]>=1*/true){
                    if(
                        isset($_POST["nome"]) &&
                        isset($_POST["capienza"]) 
                   

                    ){
                        $name=$_POST["nome"];
                        $capienza=$_POST["capienza"];
                       

                        
                        $zona = isset($_POST['zona']) ? $_POST['zona'] : null;
                        
                        $result=$this->auleDBO->insert($name,$zona,$capienza);

                        if($result){
                            return json_encode(array("result"=>"1201", "message"=>"insert completed!"));
                        }else{
                            return json_encode(array("result"=>"1500", "message"=>"Insert Error, evento esiste già"));
                        }
    
                
                        
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
        
        public function toggle(){
            if(!isset($_SESSION["permission"])){
                if(/*$_SESSION["permission"]>=1*/true){
                    if(
                        isset($_POST["active"])
                    ){
                        $userid="2";
                        $eventid=$_POST["active"];
                        $result=$this->AuleDBO->select($eventid);
                        if($result["id_user"]==$userid || $_SESSION["permission"]==1){
                            $result=$this->AuleDBO->toggle($eventid);
                            $result>=1 ?  $success=true : $success=false;
                            if($result){
                                return json_encode(array("result"=>"1201", "message"=>"toggle completed!"));
                            }else{
                                return json_encode(array("result"=>"1400", "message"=>"toggle error!"));
                            }
                        }else{
                            return json_encode(array("result"=>"1403", "message"=>"Doesn't have permission"));
                        }
                     
                       
                        
                     
                  
                
                
                        
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
            public function selectAll(){
                echo $this->auleDBO->selectAll();
            }
        }
       

       

?>