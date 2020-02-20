<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/dbo/ability.php";
    class abilityController{
        public function __construct() {
            $this->abilityDBO=new ability();
        }

        public function toggle(){
            if(!isset($_SESSION["permission"])){
                if(/*$_SESSION["permission"]>=1*/true){
                    if(
                        isset($_POST["eventid"])
                    ){
                        $userid="2";
                        $eventid=$_POST["eventid"];
                        $result=$this->abilityDBO->select($eventid);
                        if($result["id_user"]==$userid || $_SESSION["permission"]==1){
                            $result=$this->abilityDBO->toggle($eventid);
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
        }
