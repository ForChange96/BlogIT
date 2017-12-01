<?php 
	//file model: chứa các hàm thao tác với csdl
	$conn = mysqli_connect($hostname,$username,$password,$database);
	mysqli_set_charset($conn,"UTF8");
	class model{
		//duyet cac ban ghi, tra ve array la object cua ban ghi
		public function fetch($sql){
			global $conn;
			$result = mysqli_query($conn,$sql);
			$arr = array();
			while($rows = mysqli_fetch_object($result))
				$arr[] = $rows;
			return $arr;
		}
		//tra ve 1 ban ghi
		public function fetch_one($sql){
			global $conn;
			$result = mysqli_query($conn,$sql);
			$arr = mysqli_fetch_object($result);
			return $arr;
		}
		//thuc hien truy van va tra ve id neu co
		public function execute($sql){
			global $conn;
			if(mysqli_query($conn,$sql) == true)
				return mysqli_insert_id($conn);
			return 0;
		}
		//lay so luong ban ghi
		public function num_rows($sql){
			global $conn;
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}
	}
 ?>