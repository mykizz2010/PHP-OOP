
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Default Modal</h4>
  </div>
    <div class="modal-body">
        <form method="post" id="new_post" enctype="multipart/form-data">
            <div class="form-group">
                <label id="caption">Caption</label>
                <input type="text" class="form-control" id="caption" placeholder="Enter a short caption for your post" name="caption" value="<?php echo sanitize(Input::get('caption')); ?>">
            </div>

            <div class="form-group">
                <label id="description">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Enter a short description for your post" name="description">
                    <?php echo sanitize(Input::get('description')); ?>
                </textarea>
            </div>

            <div class="input-group">
                <input class="form-control" type="file" name="image" accept="image/jpeg">
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        </form>
    </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="sumbit" class="btn btn-primary" form="new_post">Post</button>
  </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
