<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/dbo/User.php";
    class UserController{
        public function __construct() {
            $this->userDBO=new User();

        }

        public function getAllUsers(){
            return json_encode($this->userDBO->selectAll());
        }
        public function insert(){
            if(isset($_SESSION["permission"])){
                if(!$_SESSION["permission"]==1){
                    if(
                        isset($_POST["username"]) 
                        && isset($_POST["email"]) 
                        && isset($_POST["password"]) 
                        && isset($_POST["password2"]) 
                        && isset($_POST["f_name"])
                        && isset($_POST["l_name"])
                    ){
    
                        $username=$_POST["username"];
                        $email=$_POST["email"];
                        $password=$_POST["password"];
                        $password2=$_POST["password2"];
                        $f_name=$_POST["f_name"];
                        $l_name=$_POST["l_name"];
                        $professione = isset($_POST['profession']) ? $_POST['profession'] : null;
                        $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
                        $description = isset($_POST['description']) ? $_POST['description'] : null;
                        $freelancer = isset($_POST['freelancer']) ? $_POST['freelancer'] : 0;
                        $state = isset($_POST['state']) ? $_POST['state'] : null;
                        $address = isset($_POST['address']) ? $_POST['address'] : null;
                        $province = isset($_POST['province']) ? $_POST['province'] : null;
                        $city = isset($_POST['city']) ? $_POST['city'] : null;
                        $cap = isset($_POST['cap']) ? $_POST['cap'] : null;
                        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
                        $role_id = isset($_POST['role_id']) ? $_POST['role_id'] : 3;
                        if($password==$password2){
                            $password=password_hash($_POST["password"], PASSWORD_DEFAULT );
                            $role_id=3;
                            $result=$this->userDBO->insert($username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap,$role_id);
                            $result>=1 ?  $success=true : $success=false;
                            if($success){
                                return json_encode(array("result"=>"1201", "message"=>"insert completed!"));
                            }else{
                                return json_encode(array("result"=>"1500", "message"=>"Insert Error"));
                            }
                        }else{
                            return json_encode(array("result"=>"1400", "message"=>"Wrong password"));
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

        public function register(){
            if(isset($_POST["username"]) 
                && isset($_POST["email"]) 
                && isset($_POST["password"]) 
                && isset($_POST["password2"]) 
                && isset($_POST["f_name"])
                && isset($_POST["l_name"])
            ){

                $username=$_POST["username"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                $password2=$_POST["password2"];
                $f_name=$_POST["f_name"];
                $l_name=$_POST["l_name"];


                $professione = isset($_POST['profession']) ? $_POST['profession'] : null;
                var_dump( $professione);
                $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
                $description = isset($_POST['description']) ? $_POST['description'] : null;
                $freelancer = isset($_POST['freelancer']) ? $_POST['freelancer'] : 0;
                $state = isset($_POST['state']) ? $_POST['state'] : null;
                $address = isset($_POST['address']) ? $_POST['address'] : null;
                $province = isset($_POST['province']) ? $_POST['province'] : null;
                $city = isset($_POST['city']) ? $_POST['city'] : null;
                $cap = isset($_POST['cap']) ? $_POST['cap'] : null;
                $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
                if($password==$password2){
                    $password=password_hash($_POST["password"], PASSWORD_DEFAULT );
                    $role_id=3;
                    $result=$this->userDBO->register($username,$email,$password,$f_name,$l_name,$birthdate,$professione,$tel,$description,$freelancer,$state,$address,$province,$city,$cap);
                    $result>=1 ?  $success=true : $success=false;
                    if($success){
                        return json_encode(array("result"=>"1201", "message"=>"Registration completed!"));
                    }else{
                        return json_encode(array("result"=>"1500", "message"=>"Insert Error"));
                    }
                }else{
                    return json_encode(array("result"=>"1400", "message"=>"Wrong password"));
                }
           
                
            }else{
                return json_encode(array("result"=>"1400", "message"=>"Missing arguments"));
            }
            
     
   
        }

        public function updateuser(){
            $name=$_POST["name"];
            $l_name=$_POST["l_name"];
            $birthdate=$_POST["birthdate"];
            $username=$_POST["username"];
            $password=password_hash($_POST["password"], PASSWORD_DEFAULT );
            isset($_POST["role_id"]) ? $role_id=$_POST["role_id"] : $role_id="";
            $id_usermod=$_POST["user_id"];
            $result=$this->userDBO->modifyUser($id_usermod,$name,$l_name,$birthdate,$username,$password,$role_id);
            $result>=1 ?  $success=true : $success=false;
            if($success){
                return json_encode(array("result"=>"1201", "message"=>"User update completed!"));
            }else{
                return json_encode(array("result"=>"1500", "message"=>"Update Error"));
            }

        }

        public function login(){
            if(!isset($_SESSION["permission"])){
                if(isset($_POST["username"]) && $_POST["password"]){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $result=$this->userDBO->selectUser($username);
                    $hash=$result["password"];
                    if(!$result["role_id"]==0){
                        $logged=false;
                        if(password_verify($password,$hash)){
                            session_start();
                            $_SESSION["permission"] = $result["role_id"];
                            $_SESSION["userid"]=$result["id"];
                            $logged=true;
                        }
                    }
        
                    if($logged){
                        return json_encode(array("result"=>"1200", "message"=>"Login succs!"));
                    }else{
                        return json_encode(array("result"=>"1400", "message"=>"Login Error! check email or password"));
                    }
                }else{
                    return json_encode(array("result"=>"1400", "message"=>"Login bad request"));
                }

            }else{
                return json_encode(array("result"=>"1400", "message"=>"bad request"));
            }
      
           
            
        }

        public function logout(){
            session_start();
            session_unset();
            return json_encode(array("result"=>"1200", "message"=>"logout succs"));
        }

        public function disable(){
            session_start();
            if(isset($_SESSION["permission"])){
                if($_SESSION["permission"]==1){
                    $this->userDBO->changeuserstatus();
                }

            }
        }
     

		

    }

?>