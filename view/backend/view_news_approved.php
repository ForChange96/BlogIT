<?php
foreach ( $list_news as $rows ) {
    $date=date_create($rows->news_date);
    $list_comment=$this->get_list_comment($rows->news_id);
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#line_comment<?php echo $rows->news_id?>").hide();
        $("#news_cmt<?php echo $rows->news_id?>").hide();
        $("#news_detail<?php echo $rows->news_id?>").hide();
        $("#box_insert_comment<?php echo $rows->news_id?>").hide();
        
        $("#icon_cmt<?php echo $rows->news_id?>").click(function(){
            $("#news_cmt<?php echo $rows->news_id?>").toggle(300);
            $("#line_comment<?php echo $rows->news_id?>").toggle(300);
            $("#box_insert_comment<?php echo $rows->news_id?>").toggle(300);
        });
        
        $("#btn_show_hide<?php echo $rows->news_id?>").click(function(){
            $("#news_detail<?php echo $rows->news_id?>").toggle(300);
            $("#icon_collapse<?php echo $rows->news_id?>").toggleClass("glyphicon-collapse-down");
            $("#icon_collapse<?php echo $rows->news_id?>").toggleClass("glyphicon-collapse-up");
        });
    });
</script>
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
                                    <a href="admin.php?controller=add_edit_news&act=edit&id=<?php echo $rows->news_id?>">Chỉnh sửa</a>
                                </li>
                                <li role="presentation">
                                    <a href="" data-toggle="modal" data-target="#dialog_ok_cancel_news<?php echo $rows->news_id?>">Xoá</a>
                                </li>  
                            </ul>
                        </div>
                        <!--- End Dropdown delete & edit -->
                        
                        
<!-- Modal delete news-->
<form method="post" action="admin.php?controller=news_approved&act=delete&id=<?php echo $rows->news_id?>">
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
                    <div id="news_detail<?php echo $rows->news_id?>">
                        <?php echo $rows->news_detail?>
                    </div>
                    <!-- end news detail-->
                </div>
                <div class="line100"></div>
                <!-- quantity like & comment -->
                <div class="num_like_comment">
                    <img src="public\icon\like.png" width="24px"/>&nbsp;<?php echo($this->get_quantity_like($rows->news_id))?>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <img src="public\icon\comment.png" id="icon_cmt<?php echo $rows->news_id?>" width="24px"/>&nbsp;<?php echo($this->get_quantity_comment($rows->news_id))?>
                    <!-- button show/hide news -->
                    <div class="btn_show_hide" id="btn_show_hide<?php echo $rows->news_id?>">
                        <span id="icon_collapse<?php echo $rows->news_id?>" class="glyphicon glyphicon-collapse-down"></span>
                    </div>
                    <!-- end button show/hide news -->
                </div>
                <!-- end quantity like & comment -->
                
                <!-- insert comment -->
                <div class="box_insert_comment" id="box_insert_comment<?php echo $rows->news_id?>">
                    <form method="post" action="admin.php?controller=add_edit_delete_cmt&act=add&news_id=<?php echo $rows->news_id?>">
                        <div class="media">
                            <span class="pull-left">
                                <img src="<?php echo($user_session->photo)?>" class="media-object avt_cmt"/>
                            </span>
                            <div class="media-body" style="padding-top: 3px;">
                                <input type="text" placeholder="Thêm bình luận..." name="txt_insert_comment" class="form-control"/>
                            </div>
                            <div class="button_add_comment">
                                <input style="line-height: 15px !important" type="submit" value="Bình luận" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end insert comment -->
                <div class="line100_comment_top" id="line_comment<?php echo $rows->news_id?>"></div>
            <!-- comment box -->
                <div id="news_cmt<?php echo $rows->news_id?>" class="backend_comment_panel">
                <!-- news_comment -->
                <?php
                    foreach ( $list_comment as $cmt ) {
                        $user = $this->get_user( $cmt->user_id );
                ?>
                <div class="media box_one_comment">
                    <!-- avatar comment -->
                    <span class="pull-left">
                        <img class="media-object avt_cmt" src="<?php echo $user->photo?>"/>
                    </span>

                    <!-- end avatar comment-->
                    <div class="media-body">
                        <h5 class="media-heading">
                            <!-- fullname & date -->
                            <b>
                                <a href="#"><?php echo $user->fullname?></a>
                            </b>
                            <!-- end fullname & date -->

                            <!--- Dropdown delete -->
                            <div class="dropdown dropdown_comment">
                                <button class="btn dropdown-toggle btn-default" style="line-height: 5px; border: 0; color: #9D9A9A" type="button" id="dropdownDeleteCmt<?php echo $cmt->comment_id?>" data-toggle="dropdown">&#8226;&#8226;&#8226;</button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownDeleteCmt<?php echo $cmt->comment_id?>">
                                    <li role="presentation">
                                        <a href="" data-toggle="modal" data-target="#dialog_ok_cancel_cmt<?php echo $cmt->comment_id?>">Xoá</a>
                                    </li>
                                    <!-- ktra neu la comment cua minh thi them chuc nang edit_comment -->
                                    <?php
                                        if($user->user_id==$user_session->user_id){
                                    ?>
                                    <li role="presentation">
                                        <a href="" data-toggle="modal" data-target="#form_edit_cmt<?php echo $cmt->comment_id?>">Chỉnh sửa</a>
                                    </li>
                                    <?php
                                        }        
                                    ?>
                                </ul>
                            </div>
                            <!--- End Dropdown delete -->
                        </h5>
<!-- Modal delete-->
<form method="post" action="admin.php?controller=add_edit_delete_cmt&act=delete&id=<?php echo $cmt->comment_id?>&news_id=<?php echo $rows->news_id?>">
  <div class="modal fade" id="dialog_ok_cancel_cmt<?php echo $cmt->comment_id?>" role="dialog">
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
<!-- end Modal delete-->
                        
<!-- Modal edit-->
<form method="post" action="admin.php?controller=add_edit_delete_cmt&act=edit&id=<?php echo $cmt->comment_id?>&news_id=<?php echo $rows->news_id?>">
  <div class="modal fade" id="form_edit_cmt<?php echo $cmt->comment_id?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="color: #267BFF;">
          <p class="modal-title"><span class="glyphicon glyphicon-pencil"></span> &nbsp;Sửa bình luận</p>
        </div>
        <div class="modal-body">
          <textarea placeholder="Sửa bình luận" name="comment_detail" style="width: 100%; height: 100px; padding: 8px;"><?php echo $cmt->comment_detail?></textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-default">Ok</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
</form>
<!-- end Modal edit-->
                        <!-- comment detail-->
                        <?php echo $cmt->comment_detail?>
                        <!-- end comment detail-->
                    </div>
                </div>
                <?php }?>
                <!-- end news_comment -->
            </div>
        <!-- end comment box -->
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
                    <a href="admin.php?controller=news_approved&p=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
                <?php }?>
                <!-- end list num_page -->
            </ul>
        <!-- end pagination -->
