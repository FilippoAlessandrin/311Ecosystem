<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/controller/auleController.php";

   $AuleController =new AuleController();

    echo $AuleController->toggle();
   
?>