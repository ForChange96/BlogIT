<?php
    class controller_logout extends controller{
        public function __construct(){
            unset($_SESSION["username"]);
            header("location:admin.php?controller=login");
        }
    }
    new controller_logout();
?>