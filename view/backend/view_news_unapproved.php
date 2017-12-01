<?php
foreach ( $list_news as $rows ) {
    $date=date_create($rows->news_date);
?>
        <div class="panel panel-default backend_news_approved_panel">
            <div class="media" style="overflow: visible;">
                <!-- avatar -->
                <span class="pull-left">
                    <img class="media-object avt" src="<?php echo $rows->photo?>"/>
                </span>
                <!-- end avatar -->
                <div class="media-body">
                    <h4 class="media-heading">
                        <!-- fullname & date -->
                        <div class="name_and_date">
                             <a href="#" class="fullname"><?php echo $rows->fullname?></a><br/>
                             <i class="date"><?php echo date_format($date,"d/m/Y")?></i>
                        </div>
                        <!-- end fullname & date -->
                        
                        <!--- Dropdown delete & edit -->
                        <div class="dropdown dropdown_edit_news">
                            <button class="btn dropdown-toggle btn-default" type="button" id="dropdownEditNews" style="border: 0;" data-toggle="dropdown"><span class="caret"></span></button>                    
                            <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownEditNews">
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="admin.php?controller=add_edit_news&act=edit&id=<?php echo $rows->news_id?>">Chỉnh sửa</a>
                                </li>
                                <li role="presentation">
                                    <a href="" data-toggle="modal" data-target="#dialog_ok_cancel_news<?php echo $rows->news_id?>">Xoá</a>
                                </li>  
                            </ul>
                        </div>
                        <!--- End Dropdown delete & edit -->
<!-- Modal delete news-->
<form method="post" action="admin.php?controller=news_unapproved&act=delete&id=<?php echo $rows->news_id?>">
  <div class="modal fade" id="dialog_ok_cancel_news<?php echo $rows->news_id?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="color: #930002;">
          <p class="modal-title"><span class="glyphicon glyphicon-alert"></span> &nbsp;Cảnh báo!</p>
        </div>
        <div class="modal-body">
          <h4>Bạn có chắc chắn xoá?</h4>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-default">Ok</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
</form>
<!-- end Modal delete news-->
                    </h4>
                    <div class="line"></div>
                    <!-- news title-->
                    <h4 class="news_title">
                        <?php echo $rows->news_title ?>
                    </h4>
                    <!-- end news title-->
                    
                    <!-- news detail-->
                    <div>
                        <?php echo $rows->news_detail?>
                    </div>
                    <!-- end news detail-->
                </div>
            </div>  
            <div class="panel-footer" style="text-align: center">
                <form method="post" action="admin.php?controller=accept_news&id=<?php echo($rows->news_id)?>">
                    <input type="submit" class="btn btn-primary" name="approved" value="Duyệt bài">
                </form>
            </div>
        </div>
    
<?php
    }
?>

        <!-- pagination -->
            <ul class="pagination">
                <li><a>Trang</a></li>
                <!-- list num_page -->
                <?php for($i = 1; $i <= $num_page; $i++)
                    {                
                ?>
                <li>
                    <a href="admin.php?controller=news_unapproved&p=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
                <?php }?>
                <!-- end list num_page -->
            </ul>
        <!-- end pagination -->
