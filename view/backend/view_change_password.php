<div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
    <!-- error message -->
    <?php
        if(isset($_GET["err"])&&$_GET["err"]=="invalid"){
    ?>
    <div class="alert alert-danger">Mật khẩu không đúng</div>
    <?php
        }
    ?>
    <!-- end error message -->
    <div class="panel panel-primary">
        <div class="panel-heading">Thay đổi mật khẩu</div>
        <form method="post" action="">
            <div class="panel-body">
                <div class="row" style="margin-top: 5px">
                    <div class="col-md-3">Mật khẩu cũ</div>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" required/>
                    </div>
                </div>
                <div class="row" style="margin-top: 7px">
                    <div class="col-md-3">Mật khẩu mới</div>
                    <div class="col-md-9">
                        <input type="password" name="new_password" class="form-control" required/>
                    </div>
                </div>
                <div class="row" style="margin-top: 7px">
                    <div class="col-md-3">Xác nhận mật khẩu</div>
                    <div class="col-md-9">
                        <input type="password" name="confirm_password" class="form-control" required/>
                    </div>
                </div>
                <div class="row" style="margin-top: 7px;">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <input type="submit" value="Lưu" class="btn btn-primary"/>
                        <input type="reset" value="Nhập lại" class="btn btn-danger"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
