<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/controller/prenotazioneController.php";

   $prenotazioneController =new prenotazioneController();

    echo $prenotazioneController->insert();
   
?>