<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/controller/auleController.php";
    $auleController =new AuleController();
    echo $auleController->insert();
   
?>