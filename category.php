<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED('Syrup');

        if(!(isset($_GET['catname']) && is_string($_GET['catname']))){
            throw new MissingCategoryException();
        }

        $category = $JACKED->Syrup->BlagCategory->findOne(array('name' => trim(strtolower($_GET['catname']))));
        if(!$category){
            throw new Exception("No posts found");
        }

        $posts = $JACKED->Syrup->Blag->find(
            array('AND' => array('category.guid' => $category->guid, 'alive' => 1)), 
            array('field' => 'posted', 'direction' => 'DESC')
        );
        if(!$posts){
            throw new Exception("No posts found");
        }

        $templateVars['pageTitle'] = $category->name;
        include('bodyTop.php');
?>
            </div> <!-- kill the main container, we have our own here -->
            <div id="postgrid" class="pushup">
                <div class="container"><!-- other...main container?-->
                    <h3 class="debold"><em><strong><?php echo count($posts); ?></strong></em> <?php echo strtoupper($category->name); ?></h3>
                    <?php
                        foreach($posts as $post){ 
                            $postType = strtolower($post->category->name);
                            
                            //find the post image
                            $tagExists = !(strpos($post->content, '<img class="headliner ') === FALSE);
                            if($tagExists){
                                $postImageTag = strstr($post->content, '/>', TRUE) . '/>';
                                $srcpos = strpos($postImageTag, 'src="/') + 6;
                                $quotpos = strpos($postImageTag, '"', $srcpos);
                                $postImage = '/' . substr($postImageTag, $srcpos, $quotpos - $srcpos);
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
                                if($tagExists){ 
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

    }catch(MissingCategoryException $e){
        require('bodyTop.php');
        echo '<h3>No category given.</h3>';
    }catch(Exception $e){
        require('bodyTop.php');
        echo '<h3>No posts found.</h3>';
        echo '<pre><code>' . $e->getMessage() . ' (' . $e->getLine() . ')</code></pre>';
    }

    require('bodyBottom.php');



    class MissingCategoryException extends Exception{
        protected $message = 'No category name provided.';
    }
?>