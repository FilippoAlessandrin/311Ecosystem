<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/controller/prenotazioneController.php";

   $prenotazioneController =new prenotazioneController();

    echo json_encode($prenotazioneController->selectBetween());
   
?>