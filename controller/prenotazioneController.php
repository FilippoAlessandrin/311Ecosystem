<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/dbo/Prenotazione.php";
    class prenotazioneController{
        public function __construct() {
            $this->PrenotazioneDBO=new Prenotazione();

        }
        public function insert(){
            if(!isset($_SESSION["permission"])){
                if(/*$_SESSION["permission"]>=1*/true){
                    if(
                        isset($_POST["title"]) 
                        && isset($_POST["start_date"]) 
                        && isset($_POST["end_date"])
                        && isset($_POST["aulaid"])
                        && isset($_POST["userid"])
                    ){
                        $userid=$_POST["userid"];
                        $title=$_POST["title"];
                        $start_date=$_POST["start_date"];
                        $end_date=$_POST["end_date"];
                        $aulaId=$_POST["aulaid"];
                     
                       
                        
                        $description = isset($_POST['description']) ? $_POST['description'] : null;
                        $isPublic = isset($_POST['isPublic']) ? $_POST['isPublic'] : 0;
                       
                        $datetime=new DateTime();
                        $start_datetime=$datetime->createFromFormat('d/m/Y H:i',  $start_date);
                        $end_datetime = $datetime->createFromFormat('d/m/Y H:i',  $end_date);
                        
                        if($start_datetime >  $end_datetime){
                            return json_encode(array("result"=>"1500", "message"=>"Insert Error, end date is earlier than start date"));
                        }else{
                            $start_datetimestring = $start_datetime->format('Y/m/d H:i:s');
                            $end_datetimestring = $end_datetime->format('Y-m-d H:i:s');
                        }
                    
                        
                        
                        $diff = $end_datetime->diff($start_datetime);
                      
                        $tot_ore=$diff->format("%H:%i");

                        if($tot_ore<=0){
                            return json_encode(array("result"=>"1500", "message"=>"Insert Error, The diff equals 0"));
                        }

                        $_SESSION["permission"]=2;/*cancellare*/
                        $active = $_SESSION["permission"]<=2 ? 1 : 0; // se interno subito attivo senno aspetta conferma
                        $resultconflict=$this->PrenotazioneDBO->getEventsBetween($start_datetimestring,$end_datetimestring,$active,$aulaId);
                        if(!$resultconflict){
                            $result=$this->PrenotazioneDBO->insert($title,$start_datetimestring,$end_datetimestring,$description,$isPublic,$tot_ore,$active,$aulaId,$userid);
                        }else{
                            $result=0;
                        }
                       
                        $result>=1 ?  $success=true : $success=false;
                        if($success){
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
                        isset($_POST["eventid"])
                    ){
                        $userid="2";
                        $eventid=$_POST["eventid"];
                        $result=$this->PrenotazioneDBO->select($eventid);
                        if($result["id_user"]==$userid || $_SESSION["permission"]==1){
                            $result=$this->PrenotazioneDBO->toggle($eventid);
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
                return $this->PrenotazioneDBO->selectAll();
            }

            public function selectBetween(){
                if(
                    isset($_POST["start_date"]) 
                    && isset($_POST["end_date"])
                
                ){
                    $start_date=$_POST["start_date"];
                    $start_date=$_POST["end_date"];



                
                $datetime=new DateTime();
                $start_datetime=$datetime->createFromFormat('d/m/Y H:i',  $start_date);
                $end_datetime = $datetime->createFromFormat('d/m/Y H:i',  $end_date);
                
                if($start_datetime >  $end_datetime){
                    return json_encode(array("result"=>"1500", "message"=>"Insert Error, end date is earlier than start date"));
                }else{
                    $start_datetimestring = $start_datetime->format('Y/m/d H:i:s');
                    $end_datetimestring = $end_datetime->format('Y-m-d H:i:s');
                }
                    $start_datetimestring = $start_datetime->format('Y/m/d H:i:s');
                    return $this->PrenotazioneDBO->getEventsBetweenAll($start_datetimestring,$end_datetimestring)
            }
            }
        }

       

?>