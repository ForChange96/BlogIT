<!-- alert -->
<script>
  $(document).ready(function(){
      $("#alert_change_password").modal("<?php echo isset($act)?$act:"hide"?>");
  });
</script>
<div id="alert_change_password" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span> &nbsp;Đổi mật khẩu</h5>
        </div>
        <div class="modal-body">
          <h4><?php echo isset($notification)?$notification:""?></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
</div>