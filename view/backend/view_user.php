	<div class="col-md-10 col-md-offset-1">	
		<div style="margin: 20px 0 5px 0;">
			<a href="admin.php?controller=add_edit_user&act=add" class="btn btn-primary">Thêm</a>
		</div>
		<table class="table table-hover table-bordered" style="border: double grey;">
			<thead>
				<tr>
					<th>Username</th>
					<th>Fullname</th>
					<th>Address</th>
					<th style="width: 130px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_user as $row)
					{
				?>
				<tr>
					<td><?php echo "$row->user_name"; ?></td>
					<td><?php echo "$row->fullname"; ?></td>
					<td><?php echo "$row->address"; ?></td>
					<td>
						<a href="admin.php?controller=add_edit_user&act=edit&user_id=<?php echo $row->user_id ?>">Sửa</a>&nbsp; &nbsp;
						<a href="admin.php?controller=user&act=delete&user_id=<?php echo $row->user_id ?>">Xoá</a>
					</td>	
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>