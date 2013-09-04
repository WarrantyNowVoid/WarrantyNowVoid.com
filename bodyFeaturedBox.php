                <div id="featuredbox" class="pull-left">
                <?php
                    $titles = array();
                    for($iter = 1; $iter < 5; $iter++){
                        if($iter == 1){
                            $active = ' active';
                        }else{
                            $active = '';
                        }
                        $post = $JACKED->Syrup->Blag->findOne(array('guid' => $templateVars['featuredBox']['posts'][$iter]));
                        $titles[$iter] = array('title' => $post->title, 'type' => strtolower($post->category->name));
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
                    <div class="item<?php echo $active; ?>" data-itemid="<?php echo $iter; ?>">
                        <a href="/post/<?php echo $post->guid; ?>">
                            <div class="content-preview pull-left">
                                <h3><?php echo $post->title; ?></h3>
                                <p class="byline">
                                    <span class="label <?php echo strtolower($post->category->name); ?>"><?php echo $post->category->name; ?></span> <span class="datestamp"><?php echo date("F j, Y", $post->posted); ?></span>
                                </p>
                                <p><?php echo $post->headline; ?></p>
                            </div>
                            <div class="image-preview pull-right">
                                <img src="<?php echo $postImage; ?>" />
                            </div>
                        </a>
                    </div>
                <?php
                    }   
                ?>
                
                    <div id="featured-nav">
                        <div class="system-hr"></div>
                        <ul class="titletabs">
                            <?php
                                for($iter = 1; $iter < 5; $iter++){
                                    if($iter == 1){
                                        $active = ' active';
                                    }else{
                                        $active = '';
                                    }
                            echo '<li class="' . $titles[$iter]['type'] . $active . '" data-itemid="' . $iter . '">' . $titles[$iter]['title'] . '</li> ' . "\n";
                                }
                            ?>
                        </ul>
                    </div>
                </div>