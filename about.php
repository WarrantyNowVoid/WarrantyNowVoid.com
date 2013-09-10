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

                <img class="headliner topbar-system1" src="/assets/img/template/headliner_default.png" />

                <p>Warranty Now Void, historically speaking, is a project that was first started as a webcomic in 2006. Then it died. Then, miraculously, it undied. Unfortunately, it was shortly thereafter involved in an implosive MySQL coat-hanger-abortion that once again laid it to rest. After that, it was revived as a site dedicated to videos for a while, but that was a lot of work and we hated being confined to just one media format. That brings us to now: the new era. We've revived the site once more as a dumping ground for our psychic excrement in all its many forms. There's <a href="/comics">doodles</a>. There's <a href="/videos">videos</a>. There's <a href="/articles">articles</a>. There's <a onclick="$('#poopButton').click();">a button that makes a naked dude walk out and poop on our website</a>. It's perfect.</p>

                <p>For new visitors to the site, introductions may be in order. The WNV family consists primarily of Nick "Pope" Pettazzoni, Scott Bacon, and "Admiral" Nick Rau, with a variety of part-time deviants thrown in for flavor (umami, if you're curious.) We're more or less based out of Boston, MA, though I realize that statement wrongly suggests that we have a base. To clarify, we do not. We are all gainfully employed, and this site exists as an outlet for what might be seen as socially abhorrent humor were we to loose it from our mouthslings in a place where people could still see our actual faces. WNV does not yet exist in meatspace as a place one can visit and/or raze as he or she sees fit. </p>

                <p>Not that we'd be allowed to set up physical shop within Boston city limits after that Circle Jerks video. Boy, was that ill-conceived. </p>

                <p>The important emails are as follows:
                
                <blockquote>General Contact: <a href="mailto:wnv@warrantynowvoid.com">wnv@warrantynowvoid.com</a><br />
                    Pope: <a href="mailto:pope@warrantynowvoid.com">pope@warrantynowvoid.com</a><br />
                    Scott: <a href="mailto:scawt@warrantynowvoid.com">scawt@warrantynowvoid.com</a><br />
                    The Admiral: <a href="mailto:admiral@warrantynowvoid.com">admiral@warrantynowvoid.com</a><br />
                </blockquote>

                And whoever else is working on this site, I don't actually know anymore…</p>

                <p>In closing, welcome aboard! We hope that you enjoy your time with us, and while we recognize that a lot of what we say and do is wildly inappropriate, we hope that you've the maturity to select what content you can and cannot handle. I can personally guarantee that nothing we produce will make it even 1% of the way to "The Grossest Thing On The Internet," so take some comfort in that. To help get you acclimated to this new environment, we've selected some sample materials for your perusal:</p>

                <ul>
                    <li><a href="/post/0c28c">An article describing the timeless war between Dunkin' Donuts and Starbucks.</a></li>
                    <li><a href="/post/cdb56">A helpful and informative infographic about Bears.</a> I keep a copy in my back pocket at all times in case I meet one.</li>
                    <li><a href="/post/832a3">An insightful and totally scientific look at the Large Hadron Collider</a> that inexplicably managed to take the top spot from CERN's own videos on YouTube's popular results for LHC-related material.</li>
                    <li><a href="/post/b879f">Highly intellectual political commentary.</a></li>
                    <li><a href="/post/d25a7">Something that we all regret being a part of.</a></li>
                </ul>

                <p>Good luck out there.</p>

                <p>Love,<br />
                -WNV
                </p>

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