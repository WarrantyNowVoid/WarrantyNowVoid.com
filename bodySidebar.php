                <aside class="<?php echo isset($templateVars['fixedWidth'])? 'fixed-width' : ''; ?> pull-right">
                    <div class="madmen">
                        <div class="box-behind">
                            <a href="/advertising"><img src="/assets/img/template/adblock_info_square.png" /></a>
                        </div>
                        <div class="box-front">
                            <?php
                                if($JACKED->config->environment == 'production' || $JACKED->config->environment == 'staging'){
                            ?>
                            <!-- Project Wonderful Ad Box Code -->
                            <div id="pw_adbox_70777_7_0"></div>
                            <script type="text/javascript"></script>
                            <noscript><map name="admap70777" id="admap70777"><area href="http://www.projectwonderful.com/out_nojs.php?r=0&c=0&id=70777&type=7" shape="rect" coords="0,0,300,250" title="" alt="" target="_blank" /></map>
                            <table cellpadding="0" cellspacing="0" style="width:300px;border-style:none;background-color:#ffffff;"><tr><td><img src="http://www.projectwonderful.com/nojs.php?id=70777&type=7" style="width:300px;height:250px;border-style:none;" usemap="#admap70777" alt="" /></td></tr><tr><td style="background-color:#ffffff;" colspan="1"><center><a style="font-size:10px;color:#0000ff;text-decoration:none;line-height:1.2;font-weight:bold;font-family:Tahoma, verdana,arial,helvetica,sans-serif;text-transform: none;letter-spacing:normal;text-shadow:none;white-space:normal;word-spacing:normal;" href="http://www.projectwonderful.com/advertisehere.php?id=70777&type=7" target="_blank">Ads by Project Wonderful!  Your ad here, right now: $0</a></center></td></tr></table>
                            </noscript>
                            <?php
                                }else{
                            ?>
                            <!-- End Project Wonderful Ad Box Code -->
                            <a href="/advertising"><img src="/assets/img/template/your_ad_here_square.png" /></a>
                            <?php
                                }
                            ?>
                        </div>
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
                        
                        // I do not know how it knows
                        // that we are monsters 
                        // but the site has seen the face of its God
                        // and it has wept, for it saw only its reflection
                        
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