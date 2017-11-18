
<!-- Comment Modal-->
<div id="commentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Post Comment &nbsp;
                    <i class="fa fa-spinner fa-spin" id="loader" style="display: none"></i>
                </h4>
            </div>
            <div class="modal-body">
                <form method="post" id="new_comment">
                    <input type="hidden" id="user_id" value="<?php echo Session::get(Config::get('session/session_name')) ?>">
                    <input type="hidden" id="token" name="token" value="<?php echo Token::generate(); ?>">
                    <input type="hidden" id="post_id" value="">
                    <div class="form-group">
                        <label id="description">Comment</label>
                        <textarea class="form-control" id="comment" rows="2" placeholder="Enter your comment"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                <button class="btn btn-primary btn-xs" onclick="postComment();" id="comment_post">Post</button>
            </div>
        </div>

    </div>
</div>
<!-- end of postModal-->