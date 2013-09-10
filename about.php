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

            </article>

<?php

    require('bodySidebar.php');
    require('bodyBottom.php');

?>