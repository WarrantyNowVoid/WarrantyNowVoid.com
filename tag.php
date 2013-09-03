<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED('Syrup');

        if(!(isset($_GET['tagname']) && is_string($_GET['tagname']))){
            throw new MissingTagException();
        }

        $posts = $JACKED->Syrup->Blag->find(
            array('AND' => array('Curator.canonicalName' => trim($_GET['tagname']), 'alive' => 1)),
            array('field' => 'posted', 'direction' => 'DESC')
        );
        $mainTag = $JACKED->Syrup->Curator->findOne(array('canonicalName' => trim($_GET['tagname'])));

        if(!$posts){
            throw new Exception("No posts found");
        }

        $templateVars['pageTitle'] = "Tag: " . $mainTag->name;
        include('bodyTop.php');
?>
            </div> <!-- kill the main container, we have our own here -->
            <div id="postgrid" class="pushup">
                <div class="container"><!-- other...main container?-->
                    <h3 class="debold"><em><strong><?php echo $mainTag->usage; ?></strong></em> POSTS TAGGED WITH "<strong><?php echo $mainTag->name; ?></strong>"</h3>
                    <?php
                        foreach($posts as $post){ 
                            $postType = strtolower($post->category->name);
                            //find the post image
                            $tagStart = strstr($post->content, '/>', TRUE);
                            if($tagStart){
                                $postImageTag = $tagStart . '/>';
                                $srcpos = strpos($postImageTag, 'src="/') + 6;
                                $quotpos = strpos($postImageTag, '"', $srcpos);
                                $postImage = '/' . substr($postImageTag, $srcpos, $quotpos - $srcpos);
                            }else{
                                $postImageTag = FALSE;
                            }
                            ?>
                    <div class="post-preview topbar-<?php echo $postType; ?> bottombar-<?php echo $postType; ?>">
                        <a href="/post/<?php echo $post->guid; ?>">
                            <div class="content-preview">
                                <h3><?php echo $post->title; ?></h3>
                                <p class="byline">
                                    <span class="label <?php echo $postType; ?>"><?php echo $postType; ?></span> <span class="datestamp"><?php echo date("F j, Y", $post->posted); ?></span>
                                </p>
                                <p><?php echo $post->headline; ?></p>
                            </div>
                            <?php
                                if($postImageTag){ 
                            ?>
                            <div class="image-preview">
                                <img src="<?php echo $postImage; ?>" />
                            </div>
                            <?php
                                }
                            ?>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="clearfix"></div>

                    <!--pagination
                    <ul class="pager pull-right">
                      <li class="disabled">
                        <a href="#">&larr; Newer</a>
                      </li>
                      <li>
                        <a href="#">Older &rarr;</a>
                      </li>
                    </ul>-->

                </div><!--/main container2-->
            

<?php

    }catch(MissingTagException $e){
        require('bodyTop.php');
        echo '<h3>No tag given.</h3>';
    }catch(Exception $e){
        require('bodyTop.php');
        echo '<h3>No posts found.</h3>';
        echo '<pre><code>' . $e->getMessage() . '</code></pre>';
    }

    require('bodyBottom.php');



    class MissingTagException extends Exception{
        protected $message = 'No canonical tag name provided.';
    }
?>