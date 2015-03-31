<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED(array('Syrup', 'admin', 'MySQL'));

        if(!(isset($_GET['postid']) && is_string($_GET['postid']))){
            throw new MissingPostIDException();
        }

        $templateVars['postid'] = $_GET['postid'];

        $post = $JACKED->Syrup->Blag->findOne(array('guid' => $templateVars['postid']));
        if(!$post){
            throw new InvalidPostIDException($templateVars['postid']);
        }

        if(!$post->alive){
            if(!$JACKED->admin->checkLogin()){
                throw new InvalidPostIDException($templateVars['postid']);
            }
        }

        $templateVars['pageType'] = 'post';
        $templateVars['pageTitle'] = $post->title;
        $templateVars['contentType'] = strtolower($post->category->name);
        $templateVars['postURL'] = $JACKED->config->base_url . 'post/' . $post->guid;
        $templateVars['postHeadline'] = htmlentities($post->headline);
        $templateVars['postDatetime'] = date('c', $post->posted);
        if($templateVars['contentType'] == 'comics' || $templateVars['contentType'] == 'videos'){
            $templateVars['fixedWidth'] = TRUE;
        }
        //if we have a thumbnail, pass it along
        if($post->thumbnail){
            $templateVars['postImageURL'] = $JACKED->config->base_url . 'assets/img/lol/' . $post->thumbnail;
        }else{
            // otherwise find the post image
            //  TODO: make this less fucking stupid
            $tagExists = strpos($post->content, '<img class="headliner ');
            if(!($tagExists === FALSE)){
                $templateVars['postImage'] = strstr($post->content, '/>', TRUE) . '/>';
                $srcpos = strpos($templateVars['postImage'], 'src="/') + 6;
                $quotpos = strpos($templateVars['postImage'], '"', $srcpos);
                $templateVars['postImageURL'] = $JACKED->config->base_url . substr($templateVars['postImage'], $srcpos, $quotpos - $srcpos);
            }else{
                $templateVars['postImageURL'] = $JACKED->config->base_url . 'assets/ico/favicon_src/wnv_512.png';
            }
        }

        include('bodyTop.php');
?>

            <article class="<?php echo isset($templateVars['fixedWidth'])? 'fixed-width' : ''; ?>">
                <h1><?php echo $post->title; ?></h1>
                <p class="byline">
                    <span class="label <?php echo $templateVars['contentType']; ?>"><?php echo $templateVars['contentType']; ?></span> <span class="datestamp"><?php echo date("F j, Y", $post->posted); ?></span>
                    <?php
                        if(!$post->alive){
                            echo '<span class="label label-danger"><i class="icon-eye-open"></i> DRAFT PREVIEW</span>';
                        }
                    ?>
                </p>

                <?php 
                    echo $post->content; 

                    if($templateVars['contentType'] == 'comics'){
                        $queryStart = "SELECT Blag.guid FROM Blag, BlagCategory WHERE BlagCategory.name = 'Comics' AND Blag.category = BlagCategory.guid AND Blag.alive = 1 ";

                        $queryLast = $queryStart . "ORDER BY Blag.posted DESC LIMIT 1";
                        $lastResult = $JACKED->MySQL->query($queryLast);
                        $lastid = $lastResult[0]['guid']? $lastResult[0]['guid'] : $post->guid;

                        $queryNext = $queryStart . "AND Blag.posted > " . $post->posted . " ORDER BY Blag.posted ASC LIMIT 1";
                        $nextResult = $JACKED->MySQL->query($queryNext);
                        $nextid = $nextResult[0]['guid']? $nextResult[0]['guid'] : $post->guid;

                        $queryPrev = $queryStart . "AND Blag.posted < " . $post->posted . " ORDER BY Blag.posted DESC LIMIT 1";
                        $prevResult = $JACKED->MySQL->query($queryPrev);
                        $previd = $prevResult[0]['guid']? $prevResult[0]['guid'] : $post->guid;

                        $queryFirst = $queryStart . "ORDER BY Blag.posted ASC LIMIT 1";
                        $firstResult = $JACKED->MySQL->query($queryFirst);
                        $firstid = $firstResult[0]['guid']? $firstResult[0]['guid'] : $post->guid;

                        echo '
                        <ul id="comic-controls">
                            <li class="system1"><a href="/post/' . $previd . '"><i class="icon-backward icon-white"></i> Previous</a></li>
                            <li class="system1"><a href="/post/' . $firstid . '"><i class="icon-fast-backward icon-white"></i> First</a></li>
                            <li class="system1"><a href="/post/' . $lastid . '">Last <i class="icon-fast-forward icon-white"></i></a></li>
                            <li class="system1"><a href="/post/' . $nextid . '">Next <i class="icon-forward icon-white"></i></a></li>
                        </ul>';
                    }
                ?>

                <div class="clearfix"></div>

                <div id="post-post">
                    <div class="tags">
                        <?php
                            foreach($post->Curator as $tag){
                                echo '<span class="label label-tag ' . $templateVars['contentType'] . '"><a href="/tag/' . $tag->canonicalName . '"><i class="icon-tag"></i> ' . $tag->name . '</a></span>' . "\n";
                            }
                        ?>
                    </div>

                    <div class="sharesies">
                        <p class="system1">Show your friends how cool you are <i class="icon-share-alt icon-white"></i></p>
                        <ul id="social-links">
                            <li><a href="http://twitter.com/share?url=<?php echo $templateVars['postURL']; ?>&text=<?php echo rawurlencode($post->title); ?> %23WNV" target="_blank"><img src="/assets/img/template/share_twitter.png" /></a></li>
                            <li><a href="http://plus.google.com/share?url=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_gplus.png" /></a></li>
                            <li><a href="http://reddit.com/submit?url=<?php echo $templateVars['postURL']; ?>&title=<?php echo rawurlencode($post->title); ?>" target="_blank"><img src="/assets/img/template/share_reddit.png" /></a></li>
                            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_facebook.png" /></a></li>
                        </ul>
                    </div>

                    <div class="madmen">
                        <div class="box-behind">
                            <a href="/advertising"><img src="/assets/img/template/adblock_info_leaderboard.png" /></a>
                        </div>
                        <div class="box-front">
                            <?php
                                if($JACKED->config->environment == 'production' || $JACKED->config->environment == 'staging'){
                            ?>
                            <!-- Project Wonderful Ad Box Code -->
                            <div id="pw_adbox_76089_1_0"></div>
                            <script type="text/javascript"></script>
                            <noscript><map name="admap76089" id="admap76089"><area href="http://www.projectwonderful.com/out_nojs.php?r=0&c=0&id=76089&type=1" shape="rect" coords="0,0,468,60" title="" alt="" target="_blank" /></map>
                            <table cellpadding="0" cellspacing="0" style="width:468px;border-style:none;background-color:#ffffff;"><tr><td><img src="http://www.projectwonderful.com/nojs.php?id=76089&type=1" style="width:468px;height:60px;border-style:none;" usemap="#admap76089" alt="" /></td></tr><tr><td style="background-color:#ffffff;" colspan="1"><center><a style="font-size:10px;color:#0000ff;text-decoration:none;line-height:1.2;font-weight:bold;font-family:Tahoma, verdana,arial,helvetica,sans-serif;text-transform: none;letter-spacing:normal;text-shadow:none;white-space:normal;word-spacing:normal;" href="http://www.projectwonderful.com/advertisehere.php?id=76089&type=1" target="_blank">Ads by Project Wonderful!  Your ad here, right now: $0</a></center></td></tr></table>
                            </noscript>
                            <!-- End Project Wonderful Ad Box Code -->
                            <?php
                                }else{
                            ?>
                            <a href="/advertising"><img src="/assets/img/template/your_ad_here_leaderboard.png" /></a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                        var disqus_shortname = 'warrantynowvoid'; // required: replace example with your forum shortname
                        var disqus_identifier = 'wnv.<?php echo $JACKED->config->environment; ?>.<?php echo $post->guid; ?>';
                        var disqus_title = "<?php echo $post->title; ?>";
                        var disqus_url = '<?php echo $templateVars['postURL']; ?>';

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                        
                </div>

            </article>

<?php

        
    }catch(InvalidPostIDException $ie){
        $templateVars['error'] = array();
        $templateVars['error']['message'] = 'INVALID POST ID';
        include('bodyTop.php');
        include('bodyError.php');
    }catch(MissingPostIDException $ie){
        $templateVars['error'] = array();
        $templateVars['error']['message'] = 'NO POST ID PROVIDED';
        include('bodyTop.php');
        include('bodyError.php');
    }catch(Exception $e){
        $templateVars['error'] = array();
        $templateVars['error']['message'] = 'SERVER ERROR: ' . $e->getMessage();
        include('bodyTop.php');
        include('bodyError.php');
    }
    
    require('bodySidebar.php');
    require('bodyBottom.php');



    class MissingPostIDException extends Exception{
        protected $message = 'No post ID provided.';
    }

    class InvalidPostIDException extends Exception{
        public function __construct($id, $code = 0, Exception $previous = null){
            $message = "Could not find a post with id: $id.";
            
            parent::__construct($message, $code, $previous);
        }
    }

?>