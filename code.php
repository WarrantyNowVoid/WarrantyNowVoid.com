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
                <h1>WNV Code</h1>

                <img class="headliner topbar-system1" src="/assets/img/template/headliner_default.png" />

                <p>Being a modern and useful website, WNV is made of lots of different bits of code. This page is to acknowledge the amazingly helpful libraries and frameworks we used to build our empire, without which this site would be a steaming pile of non-functionality, and as a place to show off our own creations.</p>

                <p>All WNV code is licensed under the <a href="/license">DBAD License</a></p>

                <h3>Bug Reports/Enhancement Ideas</h3>
                <p>
                    <a href="https://github.com/WarrantyNowVoid/WarrantyNowVoid.com">WNV GitHub Issue Tracker</a>
                </p>

                <h3>Acknowledgements</h3>

                <h4>WarrantyNowVoid.com</h4>
                <p>
                    <blockquote><a href="http://getbootstrap.com/2.3.2/">Twitter Bootstrap</a><br />
                        <a href="http://jquery.com/">jQuery</a><br />
                        <a href="http://www.google.com/fonts">Google Fonts</a><br />
                        <a href="http://retinajs.com/">Retina.js</a> by Imulus<br />
                        <a href="http://modernizr.com/">Modernizr</a> and <a href="http://yepnopejs.com/">yepnope.js</a><br />
                    </blockquote>
                </p>

                <h4>JACKED</h4>
                <p>
                    <blockquote><a href="http://getbootstrap.com/2.3.2/">Twitter Bootstrap</a><br />
                        <a href="http://jquery.com/">jQuery</a><br />
                        <a href="http://www.dropzonejs.com/">Dropzone.js</a><br />
                        <a href="http://epiceditor.com/">EpicEditor</a><br />
                        <a href="http://ivaynberg.github.io/select2/">Select2</a><br />
                        <a href="http://bitari.com">MarkovLetterChain</a><br />
                        <a href="http://www.openwall.com/phpass/">PasswordHash</a>
                        <a href="http://www.michelf.com/projects/php-markdown">PHP Markdown</a>
                        <a href="http://milianw.de/">Markdownify</a><br />
                    </blockquote>
                </p>

                <h3>Our Code</h3>

                <p>All WNV code is available on our <a href="https://github.com/WarrantyNowVoid/">GitHub</a>, pull requests and bug reports are more than welcome.</p>

                <p>
                    <blockquote><a href="https://github.com/WarrantyNowVoid/WarrantyNowVoid.com">Frontend Website</a><br />
                        <a href="https://github.com/WarrantyNowVoid/JACKED">Backend/Admin</a><br />                        
                    </blockquote>
                </p>

            </article>

<?php

    require('bodySidebar.php');
    require('bodyBottom.php');

?>