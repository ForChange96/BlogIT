<!DOCTYPE html>
<html>
<head>
	<title>Blog IT - Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <!-- menu for small screen -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <!-- end menu for small screen -->
            
        <!-- navbar-brand IT Blog -->
          <span class="navbar-brand view_layout_text_" style="color: #B80001; font-weight: bold;">IT Blog</span>
        <!-- end navbar-brand IT Blog -->
        </div>
        <!-- menu for medium screen -->
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav" style="padding-left: 30px;">
            <li class="<?php echo !isset($_GET["controller"])||(isset($_GET["controller"])&&$_GET["controller"]=="home")?"active":""?>"><a href="admin.php?controller=home">Home</a></li>
            <li class="<?php echo (isset($_GET["controller"])&&$_GET["controller"]=="news_approved")?"active":""?>"><a href="admin.php?controller=news_approved">Bài viết đã duyệt</a></li>
             <li class="<?php echo (isset($_GET["controller"])&&$_GET["controller"]=="news_unapproved")?"active":""?>"><a href="admin.php?controller=news_unapproved">Bài viết chưa duyệt</a></li>
             <li class="<?php echo (isset($_GET["controller"])&&$_GET["controller"]=="user")?"active":""?>"><a href="admin.php?controller=user">Người dùng</a></li>
              <li class="<?php echo (isset($_GET["controller"])&&$_GET["controller"]=="add_edit_news")&&(isset($_GET["act"])&&$_GET["act"]=="add")?"active":""?>"><a href="admin.php?controller=add_edit_news&act=add">Đăng bài</a></li>
              <li class="<?php echo (isset($_GET["controller"])&&$_GET["controller"]=="change_password")?"active":""?>"><a href="admin.php?controller=change_password&username=<?php echo $_SESSION['username']?>">Đổi password</a></li>
             <li><a href="admin.php?controller=logout">Đăng xuất</a></li>
          </ul>
        </div>
        <!-- end menu for medium screen -->
      </div>
</nav>
    <!-- content -->
    <div class="container" style="margin-top: 50px;">
        <div class="col-md-10 col-md-offset-1">
    	<?php 
    		if(file_exists("controller/backend/$controller"))
    			include "controller/backend/$controller";
    	 ?>
        </div>
    </div>
    <!-- end content -->
</body>
</html>