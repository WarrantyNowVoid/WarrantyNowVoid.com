                <aside class="<?php echo isset($templateVars['fixedWidth'])? 'fixed-width' : ''; ?> pull-right">
                    <div class="madmen">
                        <img src="/fake_ad.png" />
                    </div>

                    <div class="poop">
                        <div class="poopPreloader"></div>
                        <button id="poopButton" class="btn btn-inverse">POOP BUTTON<br /><small>(PRESS FOR POOP)</small></button>
                    </div>

                    <ul id="social-links">
                        <li><a href="http://twitter.com/warrantynowvoid" target="_blank"><img src="/assets/img/template/aside_twitter.png" /></a></li>
                        <li><a href="https://plus.google.com/101358114440767552212" rel="publisher" target="_blank"><img src="/assets/img/template/aside_gplus.png" /></a></li>
                        <li><a href="http://www.youtube.com/user/WarrantyNowVoid/" target="_blank"><img src="/assets/img/template/aside_youtube.png" /></a></li>
                        <li><a href="http://facebook.com/warrantynowvoid" target="_blank"><img src="/assets/img/template/aside_facebook.png" /></a></li>
                    </ul>


                    <?php
                        //related posts! 
                        if($templateVars['pageType']  == 'post' && !(isset($templateVars['error']) && $templateVars['error'])){ 
                            $relatedIDs = array();
                            foreach($post->Curator as $tag){
                                $rels = $JACKED->Syrup->CuratorRelation->find(array('Curator' => $tag->guid));
                                foreach($rels as $rel){
                                    if(!($rel->target == $post->guid)){
                                        if(isset($relatedIDs[$rel->target])){
                                            $relatedIDs[$rel->target]++;
                                        }else{
                                            $relatedIDs[$rel->target] = 1;
                                        }
                                    }
                                }
                            }
                            arsort($relatedIDs);
                            if(count($relatedIDs) > 0){

                            $relPosts = array();
                            $posted = 0;
                            while((list($id, $count) = each($relatedIDs)) && $posted < 6){ 
                                $relPost = $JACKED->Syrup->Blag->findOne(array('guid' => $id));
                                if($relPost->alive == 1){ 
                                    $posted++;
                                    $relPosts[] = $relPost;
                                }
                            }
                            if(count($relPosts > 0)){
                    ?>

                    <div class="related">
                        <h3 class="system1">Related Posts</h3>
                        <ul id="related-posts">
                        <?php
                                foreach($relPosts as $relPost){
                                ?>

                            <li class="<?php echo strtolower($relPost->category->name); ?>-hover">
                                <a href="/post/<?php echo $relPost->guid; ?>"><span class="label <?php echo strtolower($relPost->category->name); ?>"><?php echo $relPost->category->name; ?></span> <span class="related-name"><?php echo $relPost->title; ?></span></a>
                            </li>

                            <?php 
                                }
                            }
                        ?>
                        </ul>
                    </div>

                    <?php
                            } 
                        } //end related posts
                    ?>

                </aside>

                <div class="clearfix"></div>