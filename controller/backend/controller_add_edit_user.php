<?php
	/**
	* 
	*/
	class controller_add_edit_user extends controller
	{
		public function __construct()
		{
			parent::__construct();
			$act=isset($_GET["act"])?$_GET["act"]:"";
			$user_id=isset($_GET['user_id'])?$_GET['user_id']:0;
			switch ($act) {
				case "add":
					$form_action="admin.php?controller=add_edit_user&act=do_add";
					include "view/backend/view_add_edit_user.php";
					break;
				case "do_add":
					$user_name=isset($_POST['user_name'])?$_POST['user_name']:"";
					//ktra user_name đã tồn tại chưa
					$list_user=$this->model->fetch("select *from users");
					$check_user=1;
					foreach ($list_user as $row) {
						if($user_name==$row->user_name)
							$check_user=0;
					}
					if ($check_user==0) {
						header("location:admin.php?controller=add_edit_user&act=add&err=exists");
					}
					else{
						$password=isset($_POST['password'])?md5($_POST['password']):"";
						$fullname=isset($_POST['fullname'])?$_POST['fullname']:"";
						$photo="";
						if($_FILES["photo"]["name"] != ""){
							$photo="user_".time().$_FILES["photo"]["name"];
							$photo_target="public/img/user/".$photo;
							move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_target);
						}
						else{
							$photo_target="public/img/user/user_default.png";
						}
						$isadmin=isset($_POST["isadmin"])?1:0;
						$address=isset($_POST['address'])?$_POST['address']:"";
						$user_work=isset($_POST['user_work'])?$_POST['user_work']:"";
						$this->model->execute("insert into users(user_name,fullname,user_password,photo,admin,address,user_work) values('$user_name','$fullname','$password','$photo_target',$isadmin,'$address','$user_work')");
						$birthday=isset($_POST['birthday'])?$_POST['birthday']:"";
						if ($birthday!="") {
							$this->model->execute("update users set birthday='$birthday' where user_name='$user_name'");
						}
						header("location:admin.php?controller=user");
					}
					break;
				case "edit":
					$form_action="admin.php?controller=add_edit_user&act=do_edit&user_id=$user_id";
					$arr=$this->model->fetch_one("select * from users where user_id=$user_id");
					include "view/backend/view_add_edit_user.php";
					break;
				
				case "do_edit":
					$user_id=isset($_GET["user_id"])?$_GET["user_id"]:-1;
					$fullname=$_POST['fullname'];
					$isadmin=isset($_POST['isadmin'])?1:0;
					$address=$_POST['address'];
					$user_work=$_POST['user_work'];
					$birthday=$_POST['birthday'];
					if($user_id!=-1)
						$this->model->execute("update users set fullname='$fullname',admin=$isadmin,address='$address',user_work='$user_work',birthday='$birthday' where user_id=$user_id");
					$photo="";
					if ($_FILES['photo']['name']!="") {
						$arr_old_img=$this->model->fetch_one("select *from users where user_id=$user_id");
						$old_img=isset($arr_old_img->photo)?$arr_old_img->photo:"";
						if($old_img!="" && $old_img!="public/img/user/user_default.png" && file_exists($old_img))
							unlink("$old_img");
						$photo="user_".time().$_FILES['photo']['name'];
						$photo_target="public/img/user/".$photo;
						move_uploaded_file($_FILES['photo']['tmp_name'],$photo_target);
						$this->model->execute("update users set photo='$photo_target' where user_id=$user_id");
					}
					header("location:admin.php?controller=user");
					break;
			}
		}
	}
	new controller_add_edit_user();
?>