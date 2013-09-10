            </div> <!-- kill the main container, we have our own here -->
            <div id="postgrid" class="<?php echo $templateVars['postGrid']['class']; ?>">
                <div class="container"><!-- other...main container?-->
                    <h3 class="debold"><?php echo $templateVars['postGrid']['title']; ?></h3>
                    <?php
                        $counter = 1;
                        foreach($posts as $post){ 
                            $postType = strtolower($post->category->name);
                            
                            //find the post image
                            $tagExists = !(strpos($post->content, '<img class="headliner ') === FALSE);
                            if($tagExists){
                                $postImageTag = strstr($post->content, '/>', TRUE) . '/>';
                                $srcpos = strpos($postImageTag, 'src="/') + 6;
                                $quotpos = strpos($postImageTag, '"', $srcpos);
                                $postImage = '/' . substr($postImageTag, $srcpos, $quotpos - $srcpos);
                            }else{
                                $postImage = '/assets/img/template/headliner_default.png';
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
                            
                            <div class="image-preview">
                                <img src="<?php echo $postImage; ?>" />
                            </div>
                            
                        </a>
                    </div>
                    <?php
                            $counter++;
                            if($counter&1){
                                echo '<div class="clearfix"></div>';
                            }
                        }
                    ?>
                    <div class="clearfix"></div>

                    <?php 
                    if(isset($templateVars['pager'])){
                        echo '
                        <ul class="pager pull-right">';
                        if($templateVars['pager']['pageNum'] == 1){
                            echo'
                            <li class="disabled">
                                <a>&larr; Newer</a>';
                        }else{
                            echo '
                            <li>    
                                <a href="' . $templateVars['pager']['prevPageLink'] . '">&larr; Newer</a>';
                        }
                        echo '
                            </li>';
                        if(!$templateVars['pager']['hasNext']){
                            echo '
                            <li class="disabled">
                                <a>Older &rarr;</a>';
                        }else{
                            echo '
                            <li>
                                <a href="' . $templateVars['pager']['nextPageLink'] . '">Older &rarr;</a>';
                        }
                        echo '
                            </li>
                        </ul>';
                    }
                    ?>

                </div><!--/main container2-->
                <!--/postgrid is taken over by main template's /container-->