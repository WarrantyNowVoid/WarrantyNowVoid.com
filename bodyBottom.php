            </div><!--/main container-->

            
        </div><!--/wrap-->


        <footer class="rotateNormal">
            <div class="footer-perspective">
                <div class="container footer-front">
                    <div class="row">
                        <div class="span1 offset1">
                            <br />
                            <a href="/advertising">Advertise</a>
                        </div>
                        <div class="span1">
                            <br />
                            <a href="/code">Code</a>
                        </div>
                        <div class="span1">
                            <br />
                            <a href="/legal">Legal</a>
                        </div>
                        <div class="span3 offset1">
                            <br />
                            <a href="/license">&copy 2013 Warranty Now Void</a>
                        </div>
                        <div class="span2 offset1">
                            <img class="bottom-logo" src="/assets/img/template/wnv_small_white.png" data-at2x="/assets/img/template/wnv_small_white@2x.png"  /> 
                        </div>
                    </div>
                </div>
                <div class="container footer-back">
                    <div class="row">
                        <div class="span3 offset2">
                            <br />
                            HAHAHA, OH WOW
                        </div>
                        <div class="span3 offset2">
                            <img class="bottom-logo" src="/assets/img/template/wnv_small_white.png" data-at2x="/assets/img/template/wnv_small_white@2x.png"  /> 
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="/assets/js/retina.js"></script>
        <script type="text/javascript" src="/assets/js/page.js"></script>
        <?php 
            switch($JACKED->config->environment){
                case 'production':
                    $ua = 'UA-43751768-1';
                    break;
                case 'staging':
                    $ua = 'UA-43751768-2';
                    break;
                case 'local':
                    $ua = 'UA-lolnope';
                    break;
                default:
                    $ua = 'UA-sorrygooger';
                    break;
            }
        ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php echo $ua; ?>', 'warrantynowvoid.com');
          ga('send', 'pageview');

        </script>
    </body>
</html>