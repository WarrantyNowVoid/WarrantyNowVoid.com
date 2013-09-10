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
                <h1>WNV License</h1>

                <img class="headliner topbar-system1" src="/assets/img/template/headliner_default.png" />

                <h1>DON'T BE A DICK PUBLIC LICENSE</h1>

                <blockquote>Version 1, December 2009</blockquote>

                <blockquote>Copyright (C) 2009 Philip Sturgeon <email@philsturgeon.co.uk></blockquote>
                 
                <p>Everyone is permitted to copy and distribute verbatim or modified copies of this license document, and changing it is allowed as long as the name is changed.</p>

                <blockquote>DON'T BE A DICK PUBLIC LICENSE TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION</blockquote>

                <ol>
                    <li>Do whatever you like with the original work, just don't be a dick.<br />
                        Being a dick includes - but is not limited to - the following instances:
                        <ul>
                            <li>Outright copyright infringement - Don't just copy this and change the name.</li>
                            <li>Selling the unmodified original with no work done what-so-ever, that's REALLY being a dick. </li>
                            <li>Modifying the original work to contain hidden harmful content. That would make you a PROPER dick.  </li>
                        </ul>
                    </li>

                    <li>If you become rich through modifications, related works/services, or supporting the original work, share the love. Only a dick would make loads off this work and not buy the original works creator(s) a pint.</li>
                     
                    <li>Code is provided with no warranty. Using somebody else's code and bitching when it goes wrong makes you a DONKEY dick. Fix the problem yourself. A non-dick would submit the fix back.</li>
                </ol>

            </article>

<?php

    require('bodySidebar.php');
    require('bodyBottom.php');

?>