<?php
    class controller_news_approved extends controller{
        public function __construct(){
			parent::__construct();
			//-------------
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "delete":
					$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:-1;
					
					//thuc thi truy van
                    if($id!=-1){
                        //Xoá news
				        $this->model->execute("delete from news where news_id=$id");
                        //Xoá comment liên quan
                        $this->model->execute("delete from comment where news_id=$id");
                        //Xoá like liên quan
                        $this->model->execute("delete from news_like where news_id=$id");
                    }
					header("location:admin.php?controller=news_approved");
				break;
			}
            //------- get user session ---------
			$username=isset($_SESSION["username"])?$_SESSION["username"]:"";
            if($username!="")
                $user_session=$this->model->fetch_one("select * from users where user_name='$username'");
            //----------------------------------
			//-------------
			//so ban ghi tren trang
			$record_per_page = 10;
			//tinh tong so ban ghi
			$total_record = $this->model->num_rows("select * from news where approved=1");
			//tinh so trang
			$num_page = ceil($total_record/$record_per_page);
			//lay bien p tu url (de xac dinh la den trang thu may)
			$p = isset($_GET["p"])&&$_GET["p"]>0?($_GET["p"]-1):0;
			//xac dinh lay du lieu tu ban ghi nao
			$from = $p*$record_per_page;
			//Lay danh sach news
			$list_news = $this->model->fetch("select * from (users inner join news on users.user_id=news.user_id) where approved=1 order by news_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_news_approved.php";
			//-------------
		}
        function get_quantity_comment($news_id){
            $quantity_comment=$this->model->num_rows("select * from comment where news_id=$news_id");
            return $quantity_comment;
        }
        function get_quantity_like($news_id){
            $quantity_like=$this->model->num_rows("select * from news_like where news_id=$news_id");
            return $quantity_like;
        }
        function get_list_comment($news_id){
            $list_comment=$this->model->fetch("select * from comment where news_id=$news_id");
            return $list_comment;
        }
        function get_user($user_id){
            $user=$this->model->fetch_one("select * from users where user_id=$user_id");
            return($user);
        }
    }
    new controller_news_approved();
?>