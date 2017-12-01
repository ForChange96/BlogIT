<?php
    class controller_home extends controller{
        public function __construct(){
            parent::__construct();
            $username=isset($_SESSION["username"])?$_SESSION["username"]:"";
            if($username!="")
                $fullname=$this->model->fetch_one("select fullname from users where user_name='$username'");
            include("view/backend/view_home.php");
        }
    }
    new controller_home();
?>