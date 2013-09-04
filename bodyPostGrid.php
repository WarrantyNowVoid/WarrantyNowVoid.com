            </div> <!-- kill the main container, we have our own here -->
            <div id="postgrid" class="<?php echo $templateVars['postGrid']['class']; ?>">
                <div class="container"><!-- other...main container?-->
                    <h3 class="debold"><?php echo $templateVars['postGrid']['title']; ?></h3>
                    <?php
                        foreach($posts as $post){ 
                            $postType = strtolower($post->category->name);
                            
                            //find the post image
                            $tagExists = !(strpos($post->content, '<img class="headliner ') === FALSE);
                            if($tagExists){
                                $postImageTag = strstr($post->content, '/>', TRUE) . '/>';
                                $srcpos = strpos($postImageTag, 'src="/') + 6;
                                $quotpos = strpos($postImageTag, '"', $srcpos);
                                $postImage = '/' . substr($postImageTag, $srcpos, $quotpos - $srcpos);
                            }
                            ?>
                    <div class="post-preview topbar-<?php echo $postType; ?> bottombar-<?php echo $postType; ?>">
                        <a href="/post/<?php echo $post->guid; ?>">
                            <div class="content-preview">
                                <h3><?php echo $post->title; ?></h3>
                                <p class="byline">
                                    <span class="label <?php echo $postType; ?>"><?php echo $postType; ?></span> <span class="datestamp"><?php echo date("F j, Y", $post->posted); ?></span>
                                </p>
                                <p><?php echo $post->headline; ?></p>
                            </div>
                            <?php
                                if($tagExists){ 
                            ?>
                            <div class="image-preview">
                                <img src="<?php echo $postImage; ?>" />
                            </div>
                            <?php
                                }
                            ?>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="clearfix"></div>

                    <!--pagination
                    <ul class="pager pull-right">
                      <li class="disabled">
                        <a href="#">&larr; Newer</a>
                      </li>
                      <li>
                        <a href="#">Older &rarr;</a>
                      </li>
                    </ul>-->

                </div><!--/main container2-->
                <!--/postgrid is taken over by main template's /container-->