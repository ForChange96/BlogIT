<?php
    class controller_login extends controller{
       public function __construct(){
           parent::__construct();
           if($_SERVER['REQUEST_METHOD']== "POST"){
               $c_username=$_POST["username"];
               $c_password=$_POST["password"];
               $check=$this->model->fetch_one("select user_name,user_password,admin from users where user_name='$c_username'");
               if(isset($check->user_name)){
                   if($check->user_password==md5($c_password)&&$check->admin==1){
                       $_SESSION["username"]=$c_username;
                       header("location:admin.php");
                   }
                   else{
                       header("location:admin.php?err=invalid");
                   }
               }
               else
                   header("location:admin.php?err=invalid");
           }
           include("view/backend/view_login.php");
       } 
        
    }
    new controller_login();
?>