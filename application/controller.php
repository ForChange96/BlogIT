<?php
    require("model.php");
    class controller{
        public $model;
        function __construct(){
            $this->model = new model();
        }
    }
?>