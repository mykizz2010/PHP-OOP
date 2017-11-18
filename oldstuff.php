 <section class="content">
      <!-- Main row -->
      <div class="row">

        <!-- Left col -->
        <?php
        if($posts) {
            foreach ($posts as $post) {
        ?>
        <div class="col-sm-8">
        
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
          <div class="col-md">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#"><?php echo (new User($post->user_id))->data()->name ?></a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="<?php echo $post->media_path; ?>" alt="Photo">

              <p><h5><strong><?php echo $post->caption; ?></strong></h5></p>
              <?php if ($post->user_id !== Session::get(Config::get('session/session_name'))) {
                        ?>
                    <div class="col-xs-4 col-sm-4 col-lg-4 text-right">
                        <?php $following = (new Follow())->following(Session::get(Config::get('session/session_name')), $post->user_id); ?>
                        <button class="btn follow_button_<?php echo $post->user_id; ?> btn-sm<?php echo (($following) ? ' btn-success' : ' btn-primary'); ?>"
                                style="margin-top: 1em;"
                                onclick="<?php echo (($following) ? 'unfollow('.$post->user_id .')' : 'follow('.$post->user_id .')'); ?>">
                            <?php echo (($following) ? 'Following' : 'Follow'); ?>
                        </button>
                    </div>
                    <?php } ?>

              <button type="button" class="btn btn-warning btn-xs" id="like_button_<?php echo $post->id; ?>" class="glyphicon glyphicon-heart<?php echo (($liked) ? ' liked' : ' not-liked'); ?>"onclick="<?php echo (($liked) ? 'unlike('.$post->id .')' : 'like('.$post->id .')'); ?>"><i class="fa fa-thumbs-o-up"></i> Like</button>


              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <p><?php echo $post->description; ?></p>
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="dist/img/user3-128x128.jpg" alt="User Image">
                
                <div class="comment-text" id="comment_section_<?php echo $post->id; ?>">
                <?php 
                  if($comments = (new Comment())->getPostComments($post->id)){
                      foreach ($comments as $comment) {
                        ?>
                      <span class="username">
                        <strong><?php echo (new User($comment->user_id))->data()->name; ?></strong>
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                    <p><?php echo $comment->comment; ?></p>
                </div>
                <?php
                      }
                    }
                ?>    
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" name="comment" id="comment" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.row -->
          <!-- /.box -->
          
        </div>
        <?php
          }
        } else {
              echo 'There are no posts at the moment';
          }
      ?>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Post</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Followers</span>
              <span class="info-box-number">92,050</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Followed</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="box box-default">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="dist/img/user1-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="dist/img/user8-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="dist/img/user7-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user6-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user2-160x160.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user5-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user4-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user3-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>