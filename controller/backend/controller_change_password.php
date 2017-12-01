<?php
    class controller_login extends controller{
       public function __construct(){
           parent::__construct();
           if($_SERVER['REQUEST_METHOD']== "POST"){
               $user_name=isset($_GET['username'])?$_GET['username']:"";
               $c_password=$_POST["password"];
               $check=$this->model->fetch_one("select user_name,user_password from users where user_name='$user_name'");
               if(isset($check->user_name)){
                   if($check->user_password==md5($c_password)){
                      if($_POST['new_password']!=$_POST['confirm_password']){
                        $act="show";
                        $notification="Mật khẩu xác nhận không khớp!";
                        include "view/backend/alert_change_password_notification.php";
                      }else{
                        $new_password=md5($_POST['new_password']);
                        $this->model->execute("update users set user_password='$new_password' where user_name='$user_name'");
                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                        header("location:admin.php");
                      }
                   }
                   else{
                       header("location:admin.php?controller=change_password&err=invalid");
                   }
               }
               else
                   header("location:admin.php?controller=change_password&err=invalid");
           }
           include("view/backend/view_change_password.php");
       } 
        
    }
    new controller_login();
?>