<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED('Syrup');

        if(!(isset($_GET['postid']) && is_string($_GET['postid']))){
            throw new MissingPostIDException();
        }

        $templateVars['postid'] = $_GET['postid'];

        $post = $JACKED->Syrup->Blag->findOne(array('guid' => $templateVars['postid']));
        if(!$post){
            throw new InvalidPostIDException($templateVars['postid']);
        }

        $templateVars['pageType'] = 'post';
        $templateVars['pageTitle'] = $post->title;
        $templateVars['contentType'] = strtolower($post->category->name);
        $templateVars['postURL'] = $JACKED->config->base_url . 'post/' . $post->guid;
        $templateVars['postHeadline'] = $post->headline;
        $templateVars['postDatetime'] = date('c', $post->posted);
        if($templateVars['contentType'] == 'comics' || $templateVars['contentType'] == 'videos'){
            $templateVars['fixedWidth'] = TRUE;
        }
        //find the post image
        $templateVars['postImage'] = strstr($post->content, '/>', TRUE) . '/>';
        $srcpos = strpos($templateVars['postImage'], 'src="/') + 6;
        $quotpos = strpos($templateVars['postImage'], '"', $srcpos);
        $templateVars['postImageURL'] = $JACKED->config->base_url . substr($templateVars['postImage'], $srcpos, $quotpos - $srcpos);


        include('bodyTop.php');
?>

            <article class="<?php echo isset($templateVars['fixedWidth'])? 'fixed-width' : ''; ?>">
                <div class="madmen">
                    <img src="/leaderboard_ad.png" />
                </div>

                <h1><?php echo $post->title; ?></h1>
                <p class="byline">
                    <span class="label <?php echo $templateVars['contentType']; ?>"><?php echo $templateVars['contentType']; ?></span> <span class="datestamp"><?php echo date("F j, Y", $post->posted); ?></span>
                </p>

                <?php echo $post->content; ?>

                <div id="post-post">
                    <div class="tags">
                        <?php
                            foreach($post->Curator as $tag){
                                echo '<span class="label label-tag ' . $templateVars['contentType'] . '"><a href="/tag/' . $tag->name . '"><i class="icon-tag"></i> ' . $tag->name . '</a></span>' . "\n";
                            }
                        ?>
                    </div>

                    <div class="sharesies">
                        <p class="system1">Show your friends how cool you are <i class="icon-share-alt icon-white"></i></p>
                        <ul id="social-links">
                            <li><a href="http://twitter.com/share?url=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_twitter.png" /></a></li>
                            <li><a href="http://plus.google.com/share?url=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_gplus.png" /></a></li>
                            <li><a href="http://reddit.com/submit?url=<?php echo $templateVars['postURL']; ?>&title=<?php echo $post->title; ?>" target="_blank"><img src="/assets/img/template/share_reddit.png" /></a></li>
                            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_facebook.png" /></a></li>
                        </ul>
                    </div>

                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                        var disqus_shortname = 'warrantynowvoid'; // required: replace example with your forum shortname
                        var disqus_identifier = 'wnv.staging.<?php echo $post->guid; ?>';
                        var disqus_title = '<?php echo $post->title; ?>';
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
        $templateVars['error'] = TRUE;
        include('bodyTop.php');
        include('bodyError.php');
    }catch(MissingPostIDException $ie){
        $templateVars['error'] = TRUE;
        include('bodyTop.php');
        include('bodyError.php');
    }catch(Exception $e){
        $templateVars['error'] = TRUE;
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