<div class="col-md-10 col-md-offset-1" style="margin-top:30px;">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<?php 
				if ($act=="add") {
					echo "Thêm người dùng";
				}
				if ($act=="edit") {
					echo "Sửa thông tin người dùng";
				}
			?>
		</div>
		<div class="panel-body" style="padding: 25px 30px 10px 30px;">
			<form class="form-horizontal" method="post" action="<?php echo $form_action;?>" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-md-3">Tên đăng nhập</label>
					<div class="col-md-9">
						<input type="text" name="user_name" class="form-control" value="<?php echo isset($arr->user_name)?$arr->user_name:"";?>" <?php echo isset($arr->user_name)?"disabled":"";?> <?php echo isset($err)&&$err=="exists"?"autofocus":"";?> required>

						<!-- alert -->
						<?php
							if(isset($_GET["err"])&&$_GET["err"]=="exists"){
						?>
							<div style="height: 10px;"></div>
							<div class="alert alert-danger">Tên tài khoản đã tồn tại</div>		
						<?php }?>
						<!-- end alert -->

					</div>
				</div>
				<!--Ktra nếu là add thì hiện ô điền password (edit sẽ có nút đổi password riêng)-->
				<?php
					if($act=="add"){
				?>
					<div class="form-group">
						<label class="col-md-3">Mật khẩu</label>
						<div class="col-md-9">
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>
				<?php }?>
				<div class="form-group">
					<label class="col-md-3">Họ tên</label>
					<div class="col-md-9">
						<input type="text" name="fullname" class="form-control" value="<?php echo isset($arr->user_name)?$arr->fullname:"" ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Ảnh đại diện</label>
					<div class="col-md-9">
						<input type="file" name="photo" style="width: 70%;">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Quyền admin</label>
					<div class="col-md-9">
						<input type="checkbox" name="isadmin" <?php echo isset($arr->admin)&&$arr->admin==1?"checked":"";?>>
					</div>
				</div>
				<div style="height: 1px; width: 100%; margin: 10px 0 10px 0; border-top: 1px solid #999"></div>
				<!--Phần thông tin bổ sung-->
				<div style="margin: 15px 0 15px 0;">
					<span class="glyphicon glyphicon-edit"></span>&nbsp;
					<span style="color: #999;">Phần thông tin bổ sung (Có thể cập nhật sau)</span>
				</div>
				<div class="form-group">
					<label class="col-md-3">Địa chỉ</label>
					<div class="col-md-9">
						<input type="text" name="address" value="<?php echo isset($arr->address)?$arr->address:""?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Nghề nghiệp</label>
					<div class="col-md-9">
						<input type="text" name="user_work" value="<?php echo isset($arr->user_work)?$arr->user_work:""?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Ngày sinh</label>
					<div class="col-md-9">
						<input type="date" name="birthday" value="<?php echo isset($arr->birthday)?$arr->birthday:""?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3"></label>
					<div class="col-md-9">
						<input type="submit" value="Lưu" class="btn btn-success">
						<a href="admin.php?controller=user" class="btn btn-default">Huỷ</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>