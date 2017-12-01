<?php
    class controller_accept_news extends controller{
        public function __construct(){
            parent::__construct();
            $news_id=isset($_GET["id"])?$_GET["id"]:0;
            $today=getdate();
            $date=$today['year']."-".$today['mon']."-".$today['mday'];
            $this->model->execute("update news set approved=1,news_date='$date' where news_id=$news_id");
            header("location:admin.php?controller=news_unapproved");
        }
    }
new controller_accept_news();
?>