<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED('Syrup');

        $posts = $JACKED->Syrup->Blag->find(
            array('alive' => 1), 
            array('field' => 'posted', 'direction' => 'DESC'),
            20
        );
        if(!$posts){
            throw new Exception("No posts found");
        }

        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = '';
        $templateVars['postGrid']['title'] = 'RECENT POSTS';

        include('bodyTop.php');
?>
            
                <div id="featuredbox" class="pull-left">
                    <div class="item active" data-itemid="1">
                        <a href="/post.htm">
                            <div class="content-preview pull-left">
                                <h3>Dunkin Donuts vs. Starbucks</h3>
                                <p class="byline">
                                    <span class="label articles">Article</span> <span class="datestamp">March 28, 2012</span>
                                </p>
                                <p>This is where we would put a brief intro or teaser type thing of the article to convince people that it's cool and they should read it. The container won't expand dynamically at all, so these should overall be kept relatively short. Because otherwise the text will overflow down into the tabs below, and my shiny css will actually just truncate it at an awkward point. </p>
                            </div>
                            <div class="image-preview pull-right">
                                <img src="/menino_full.png" data-at2x="/menino_full@2x.png" />
                            </div>
                        </a>
                    </div>

                    <div class="item" data-itemid="2">
                        <a href="/post.htm">
                            <div class="content-preview pull-left">
                                <h3>The Night Before Fistmas</h3>
                                <p class="byline">
                                    <span class="label comics">Comic</span> <span class="datestamp">December 25, 2012</span>
                                </p>
                                <p>Oh god why. </p>
                            </div>
                            <div class="image-preview pull-right">
                                <img src="/menino_full.png" data-at2x="menino_full@2x.png" />
                            </div>
                        </a>
                    </div>

                    <div class="item" data-itemid="3">
                        <a href="/post.htm">
                            <div class="content-preview pull-left">
                                <h3>Boston Mayor Thomas M. Menino</h3>
                                <p class="byline">
                                    <span class="label articles">Article</span> <span class="datestamp">March 28, 2013</span>
                                </p>
                                <p>This is where we would put a brief intro or teaser type thing of the article to convince people that it's cool and they should read it. The container won't expand dynamically at all, so these should overall be kept relatively short. Because otherwise the text will overflow down into the tabs below, and my shiny css will actually just truncate it at an awkward point. </p>
                            </div>
                            <div class="image-preview pull-right">
                                <img src="/menino_full.png" data-at2x="menino_full@2x.png" />
                            </div>
                        </a>
                    </div>

                    <div class="item" data-itemid="4">
                        <a href="/post.htm">
                            <div class="content-preview pull-left">
                                <h3>The Large Hadron Collider</h3>
                                <p class="byline">
                                    <span class="label videos">Video</span> <span class="datestamp">May 22, 2012</span>
                                </p>
                                <p>More like Large Hardon Collider amirite </p>
                            </div>
                            <div class="image-preview pull-right">
                                <img src="/lhc.png" data-at2x="lhc@2x.png" />
                            </div>
                        </a>
                    </div>
                    <div id="featured-nav">
                        <div class="system-hr"></div>
                        <ul class="titletabs">
                            <li class="articles active" data-itemid="1">Dunkin Donuts vs. Starbucks</li>
                            <li class="comics" data-itemid="2">The Night Before Fistmas</li>
                            <li class="articles" data-itemid="3">Boston Mayor Thomas M. Menino</li>
                            <li class="videos" data-itemid="4">The Large Hadron Collider</li>
                        </ul>
                    </div>
                </div>

<?php
        include('bodySidebar.php');
        include('bodyPostGrid.php');

    }catch(Exception $e){
        require('bodyTop.php');
        echo '<h3>No posts found.</h3>';
        echo '<pre><code>' . $e->getMessage() . ' (' . $e->getLine() . ')</code></pre>';
    }

    require('bodyBottom.php');
?>