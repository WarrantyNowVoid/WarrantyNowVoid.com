<?php

    require('JACKED/jacked_conf.php');
    $JACKED = new JACKED();
    
    $templateVars['pageTitle'] = 'Advertising';
    $templateVars['contentType'] = 'system1';
    $templateVars['postURL'] = $JACKED->config->base_url . 'advertising';
    $templateVars['postHeadline'] = 'Want to know about or ads, or want to become one of them? This is the right place to be.';
    $templateVars['postDatetime'] = '2013-09-10T00:00:18-04:00';

    //find the post image
    $templateVars['postImageURL'] = $JACKED->config->base_url . 'assets/ico/favicon_src/wnv_512.png';

    include('bodyTop.php');
?>

            <article>
                <h1>Advertising on WNV</h1>

                <img class="headliner topbar-system1" src="/assets/img/template/headliner_default.png" />

                <h3>About the Ads on WNV</h3>

                <p>We try not to be assholes to the people we like. And as a reader of our site, we really, <em>really</em> like you. I mean, you may have to put some serious thought into a restraining order. You're just that important to us. So in the interests of not being assholes, we try not to smother you in advertisements made of flashing gifs and "HIT THREE MONKEYS AND WIN A PRIZE" bullshit. (Do these even exist anymore? It's not 2002, but still.) We have exactly two ad spaces, the square one on the sidebar you see to the right here, and a banner across the top of comics and videos when the screen width is too small to show the sidebar. This may someday expand to a third banner below all the rest of the content, down in the dark lands which no one looks at anyway. That's it.</p>

                <p>If you like the site and want us to keep making all this idiotic crap, consider <a href="https://adblockplus.org/en/faq_basics#disable" target="_blank">disabling AdBlock for WNV</a>. We use it too, ads can be annoying, but we promise never to be dicks about it. We hang around our site too, so annoying any ads will be promptly told to fuck off. If you don't feel like it, maybe buy a shirt or something from our upcoming merch store. We'd probably keep doing website here even if no one paid any attention, but voting with your wallets to pay for all this is an even better way to keep us from getting lazy and ignoring it.</p>

                <p>&lt;3 WNV</p>

                <h3>Want to Advertise on WNV?</h3>

                <p>Ad space on WNV is managed by <a href="http://www.projectwonderful.com/advertisehere.php?id=70777" target="_blank">Project Wonderful</a>, in rotation with our own ads. If you'd like to get in on the ground floor and show the poor souls lost enough to find themselves on WNV a good time, contact us at <a href="mailto:wnv@warrantynowvoid.com">wnv@warrantynowvoid.com</a>.</p>

            </article>

<?php

    require('bodySidebar.php');
    require('bodyBottom.php');

?>