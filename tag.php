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
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>' . $mainTag->usage . '</strong></em> POSTS TAGGED WITH "<strong>' . $mainTag->name . '</strong>"';

        include('bodyTop.php');
        include('bodyPostGrid.php');

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