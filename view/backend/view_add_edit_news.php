<div class="col-md-12" style="margin-top: 30px;">
    <div class="panel panel-success">
        <div class="panel-heading">Thêm - sửa tin</div>
        <div class="panel-body">
            <!-- form -->
            <form class="form-horizontal" method="post" action="<?php echo $form_action?>" enctype="multipart/form-data">
                <!-- news title -->
                <div class="form-group">
                    <label class="col-md-2">Tiêu đề</label>
                    <div class="col-md-10">
                        <input type="text" value="<?php echo isset($arr->news_title)?$arr->news_title:" "?>" name="news_title" class="form-control" required/>
                    </div>
                </div>
                <!-- end news title -->
                
                <!-- news detail -->
                <div class="form-group">
                    <label class="col-md-2">Chi tiết</label>
                    <div class="col-md-10">
                        <textarea name="news_detail">
                            <?php echo(isset($arr->news_detail)?$arr->news_detail:"")?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'news_detail' );
                        </script>
                    </div>
                </div>
                <!-- end news detail -->
                
                <!-- approved (not for add) -->
                <?php
                if ( isset( $_GET[ "act" ] ) && $_GET[ "act" ] != "add" ) {
                ?>
                <div class="form-group">
                    <label class="col-md-2"></label>
                    <div class="col-md-10">
                        <input type="checkbox" <?php echo(isset($arr->approved)&&$arr->approved==1?"checked":"")?> name="approved"> &nbsp;Đã duyệt
                    </div>
                </div>
                <?php
                }
                ?>
                <!-- end approved -->
                
                <!-- button -->
                <div class="form-group">
                    <label class="col-md-2"></label>
                    <div class="col-md-10">
                        <input type="submit" value="OK" class="btn btn-success"/>
                        <input type="reset" value="Nhập lại" class="btn btn-default"/>
                    </div>
                </div>
                <!-- button -->
            </form>
            <!-- end form -->
        </div>
    </div>
</div>