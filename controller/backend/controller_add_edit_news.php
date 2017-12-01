<?php
    class controller_add_edit_news extends controller{
        public function __construct(){
            parent::__construct();
            $act=isset($_GET["act"])?$_GET["act"]:"";
            $id=isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
            switch($act){
                case "edit":
                    $form_action="admin.php?controller=add_edit_news&act=do_edit&id=$id";
                    $arr=$this->model->fetch_one("select * from news where news_id=$id");
                    include("view/backend/view_add_edit_news.php");
                    break;
                case "do_edit":
                    $news_title=isset($_POST["news_title"])?$_POST["news_title"]:"";
                    $news_detail=isset($_POST["news_detail"])?$_POST["news_detail"]:"";
                    $approved=isset($_POST["approved"])?1:0;
                    $this->model->execute("update news set news_title='$news_title',news_detail='$news_detail',approved='$approved' where news_id=$id");
                    $controller=$approved==1?"news_approved":"news_unapproved";
                    header("location:admin.php?controller=$controller");
                    break;
                case "add":
                    $form_action="admin.php?controller=add_edit_news&act=do_add";
                    include("view/backend/view_add_edit_news.php");
                    break;
                case "do_add":
                    $news_title=$_POST["news_title"];
                    $news_detail=$_POST["news_detail"];
                    $username=$_SESSION["username"];
                    $user=$this->model->fetch_one("select * from users where user_name='$username'");
                    $user_id=$user->user_id;
                    $approved=1;
                    $today=getdate();
                    $date=$today['year']."-".$today['mon']."-".$today['mday'];
                    $this->model->execute("insert into news(news_title,news_detail,user_id,approved,news_date) values('$news_title','$news_detail','$user_id','$approved','$date')");
                    header("location:admin.php?controller=news_approved");
                    break;
            }
        }
    }
    new controller_add_edit_news();
?>