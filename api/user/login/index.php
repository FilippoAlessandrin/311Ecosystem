<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/controller/UserController.php";

   $UserController =new UserController();

    echo $UserController->login();
   
    
?>