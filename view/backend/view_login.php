<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css"/>
</head>

<body>
    <div class="container" style="margin-top: 60px">
        <div class="col-md-6 col-md-offset-3">
            <!-- error message -->
            <?php
                if(isset($_GET["err"])&&$_GET["err"]=="invalid"){
            ?>
            <div class="alert alert-danger">Sai username hoặc password</div>
            <?php
                }
            ?>
            <!-- end error message -->
            <div class="panel panel-primary">
                <div class="panel-heading">Đăng nhập</div>
                <form method="post" action="">
                    <div class="panel-body">
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-2">Username</div>
                            <div class="col-md-10">
                                <input type="text" name="username" class="form-control" required/>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7px">
                            <div class="col-md-2">Password</div>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" required/>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 7px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <input type="submit" value="Đăng nhập" class="btn btn-primary"/>
                                <input type="reset" value="Nhập lại" class="btn btn-danger"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>