<?php

    require('JACKED/jacked_conf.php');
    $JACKED = new JACKED();
    
    $templateVars['pageTitle'] = 'About';
    $templateVars['contentType'] = 'system1';
    $templateVars['postURL'] = $JACKED->config->base_url . 'about';
    $templateVars['postHeadline'] = 'Who are we and what the hell are we doing all over your computermajigger?';
    $templateVars['postDatetime'] = '2013-09-04T00:00:18-04:00';

    //find the post image
    $templateVars['postImageURL'] = $JACKED->config->base_url . 'assets/ico/favicon_src/wnv_512.png';

    include('bodyTop.php');
?>

            <article>
                <h1>About Warranty Now Void</h1>

                <img class="headliner topbar-system1" src="/menino_full.png" />

                <p>We like to make you feel uncomfortable. Stupid.</p>

                <div id="post-post">

                    <div class="sharesies">
                        <p class="system1">Show your friends how cool you are <i class="icon-share-alt icon-white"></i></p>
                        <ul id="social-links">
                            <li><a href="http://twitter.com/share?url=<?php echo $templateVars['postURL']; ?>&text=About%20Warranty%20Now%20Void%20%23WNV" target="_blank"><img src="/assets/img/template/share_twitter.png" /></a></li>
                            <li><a href="http://plus.google.com/share?url=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_gplus.png" /></a></li>
                            <li><a href="http://reddit.com/submit?url=<?php echo $templateVars['postURL']; ?>&title=About%20Warranty%20Now%20Void%20" target="_blank"><img src="/assets/img/template/share_reddit.png" /></a></li>
                            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $templateVars['postURL']; ?>" target="_blank"><img src="/assets/img/template/share_facebook.png" /></a></li>
                        </ul>
                    </div>

                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                        var disqus_shortname = 'warrantynowvoid'; // required: replace example with your forum shortname
                        var disqus_identifier = 'wnv.staging.about_page';
                        var disqus_title = 'About Warranty Now Void';
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

    require('bodySidebar.php');
    require('bodyBottom.php');

?>