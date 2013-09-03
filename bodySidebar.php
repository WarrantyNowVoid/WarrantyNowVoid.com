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
                        <li><a href="http://plus.google.com/warrantynowvoid" target="_blank"><img src="/assets/img/template/aside_gplus.png" /></a></li>
                        <li><a href="http://www.youtube.com/channel/UCzNtkqE8sqdNwxRIAhzI2eg" target="_blank"><img src="/assets/img/template/aside_youtube.png" /></a></li>
                        <li><a href="http://facebook.com/warrantynowvoid" target="_blank"><img src="/assets/img/template/aside_facebook.png" /></a></li>
                    </ul>
                    <?php if($templateVars['pageType']  == 'post' && !isset($templateVars['error'])){ ?>
                    <div class="related">
                        <h3 class="system1">Related Posts</h3>
                        <ul id="related-posts">
                            <li class="articles-hover">
                                <a href="/post.htm"><span class="label articles">Article</span> <span class="related-name">Dunkin Donuts vs. Starbucks</span></a>
                            </li>
                            <li class="comics-hover">
                                <a href="/comic.htm"><span class="label comics">Comic</span> <span class="related-name">A Love Story By Scott</span></a>
                            </li>
                            <li class="junk-hover">
                                <a href="/comic.htm"><span class="label junk">Junk</span> <span class="related-name">King of Fuck Mountain: Week 1</span></a>
                            </li>
                            <li class="articles-hover">
                                <a href="/post.htm"><span class="label articles">Article</span> <span class="related-name">Cats</span></a>
                            </li>
                            <li class="articles-hover">
                                <a href="/post.htm"><span class="label articles">Article</span> <span class="related-name">These Shorts I'm Wearing</span></a>
                            </li>
                            <li class="videos-hover">
                                <a href="/comic.htm"><span class="label videos">Video</span> <span class="related-name">List of Terrifying Things: Volume 1</span></a>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </aside>

                <div class="clearfix"></div>