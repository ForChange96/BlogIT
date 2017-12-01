<?php
    class controller_user extends controller{
        public function __construct(){
            parent::__construct();
            $act=isset($_GET["act"])?$_GET["act"]:"";
            $user_id=isset($_GET["user_id"])?$_GET["user_id"]:-1;
            switch($act){
                case "delete":
                    $arr=$this->model->fetch_one("select *from users where user_id=$user_id");
                    if($arr->photo != "public/img/user/user_default.png"){
                        unlink("$arr->photo");
                       //echo "<h1>$arr->photo</h1>";
                    }
                    $this->model->execute("delete from users where user_id=$user_id");
                    $this->model->execute("delete from comment where user_id=$user_id");
                    $this->model->execute("delete from news where user_id=$user_id");
                    $this->model->execute("delete from news_like where user_id=$user_id");
                    header("location:admin.php?controller=user");
                    break;
            }
            //-------------
			//so ban ghi tren trang
			$record_per_page = 20;
			//tinh tong so ban ghi
			$total_record = $this->model->num_rows("select * from users");
			//tinh so trang
			$num_page = ceil($total_record/$record_per_page);
			//lay bien p tu url (de xac dinh la den trang thu may)
			$p = isset($_GET["p"])&&$_GET["p"]>0?($_GET["p"]-1):0;
			//xac dinh lay du lieu tu ban ghi nao
			$from = $p*$record_per_page;
			//Lay danh sach news
			$list_user = $this->model->fetch("select * from users order by user_id asc limit $from,$record_per_page");
			//load view
			include "view/backend/view_user.php";
			//-------------
            
        }
    }
    new controller_user();
?>