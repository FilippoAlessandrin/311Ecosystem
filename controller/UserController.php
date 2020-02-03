<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/dbo/User.php";
    class UserController{
        public function __construct() {
            $this->userDBO=new User();

        }

        public function getAllUsers(){
            return json_encode($this->userDBO->selectAll());
        }
        public function insertUser(){
            if(isset($_SESSION["permission"])){
                if($_SESSION["permission"]==1){
                    $name=$_POST["name"];
                    $l_name=$_POST["l_name"];
                    $birthdate=$_POST["birthdate"];
                    $username=$_POST["username"];
                    $password=password_hash($_POST["password"], PASSWORD_DEFAULT );
                    $role_id=$_POST["role_id"];
                    $result=$this->userDBO->insertUser($name,$l_name,$birthdate,$username,$password,$role_id);
                    $result>=1 ?  $success=true : $success=false;
                    return json_encode(array("result"=>"1201"));  
                }else{
                    return json_encode(array("result"=>"1401"));
                }


            }else{
                return json_encode(array("result"=>"1401"));
            }
        }

        public function registeruser(){
            $name=$_POST["name"];
            $l_name=$_POST["l_name"];
            $birthdate=$_POST["birthdate"];
            $username=$_POST["username"];
            $password=$_POST["password"];
            $password2=$_POST["password2"];
            if($password==$password2){
                $password=password_hash($_POST["password"], PASSWORD_DEFAULT );
                $role_id=3;
                $result=$this->userDBO->insertUser($name,$l_name,$birthdate,$username,$password,$role_id);
                $result>=1 ?  $success=true : $success=false;
                if($success){
                    return json_encode(array("result"=>"1201", "message"=>"Registration completed!"));
                }else{
                    return json_encode(array("result"=>"1500", "message"=>"Insert Error"));
                }
            }else{
                return json_encode(array("result"=>"1400", "message"=>"Wrong password"));
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
            $username=$_POST["username"];
            $password=$_POST["password"];
            $result=$this->userDBO->selectUser($username);
            $hash=$result["password"];
            if($result["disabled"]==0){
                $logged=false;
                if(password_verify($password,$hash)){
                    session_start();
                    $_SESSION["permission"] = $result["role_id"];
                    $_SESSION["userid"]=$result["id_user"];
                    $logged=true;
                }
            }

            if($logged){
                return json_encode(array("result"=>"1200", "message"=>"Login succs!"));
            }else{
                return json_encode(array("result"=>"1401", "message"=>"Login Error! check email or password"));
            }
            
        }

        public function logout(){
            session_start();
            session_unset();
            header('Location:../index.php');
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