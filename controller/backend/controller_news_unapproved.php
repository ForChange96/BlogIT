<?php
    class controller_news_unapproved extends controller{
        public function __construct(){
            parent::__construct();
            $act=isset($_GET["act"])?$_GET["act"]:"";
            $news_id=isset($_GET["id"])?$_GET["id"]:0;
            switch($act){
                case "delete":
                    $this->model->execute("delete from news where news_id=$news_id");
                    header("location:admin.php?controller=news_unapproved");
                    break;
                case "approved":
                    $this->model->execute("update news set approved=1 where news_id=$news_id");
                    header("location:admin.php?controller=news_approved");
                    break;
            }
            //-------------
			//so ban ghi tren trang
			$record_per_page = 10;
			//tinh tong so ban ghi
			$total_record = $this->model->num_rows("select * from news where approved=0");
			//tinh so trang
			$num_page = ceil($total_record/$record_per_page);
			//lay bien p tu url (de xac dinh la den trang thu may)
			$p = isset($_GET["p"])&&$_GET["p"]>0?($_GET["p"]-1):0;
			//xac dinh lay du lieu tu ban ghi nao
			$from = $p*$record_per_page;
			//Lay danh sach news
			$list_news = $this->model->fetch("select * from (users inner join news on users.user_id=news.user_id) where approved=0 order by news_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_news_unapproved.php";
			//-------------
            
        }
    }
new controller_news_unapproved();
?>