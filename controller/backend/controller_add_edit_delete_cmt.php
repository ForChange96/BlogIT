<?php
    $news_id=isset($_GET["news_id"])?$_GET["news_id"]:0;
    class controller_add_edit_delete_cmt extends controller{
        public function __construct($news_id){
            parent::__construct();
            $act=isset($_GET["act"])?$_GET["act"]:-1;
            $comment_id=isset($_GET["id"])?$_GET["id"]:-1;
            if(isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                $user_id_session=$this->model->fetch_one("select user_id from users where user_name='$username'")->user_id;
            }
            else
                header("location:admin.php?controller=login");
            switch($act){
                case "delete":
                    $this->model->execute("delete from comment where comment_id=$comment_id");
                    header("location:admin.php?controller=news_approved"); 
                    break;
                case "add":
                    $comment_detail=isset($_POST["txt_insert_comment"])?$_POST["txt_insert_comment"]:"";
                    $this->model->execute("insert into comment(comment_detail,user_id,news_id) values('$comment_detail','$user_id_session','$news_id')");
                    header("location:admin.php?controller=news_approved");
                    break;
                case "edit":
                    $comment_detail=isset($_POST["comment_detail"])?$_POST["comment_detail"]:"";
                    $this->model->execute("update comment set comment_detail='$comment_detail' where comment_id='$comment_id'");
                    header("location:admin.php?controller=news_approved");
                    break;
            }
            
        }
    }
new controller_add_edit_delete_cmt($news_id);
?>