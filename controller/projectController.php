<?php

include_once $_SERVER['DOCUMENT_ROOT']."/311Ecosystem/dbo/project.php";
    class projectController{
        public function __construct() {
            $this->userDBO=new Project();

        }
    }
?>