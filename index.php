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

        $templateVars['featuredBox'] = array();
        $templateVars['featuredBox']['posts'] = array(
            1 => '031a4',
            2 => '8024a',
            3 => '832a3',
            4 => '031a4'
        );

        include('bodyTop.php');
        include('bodyFeaturedBox.php');
        include('bodySidebar.php');
        include('bodyPostGrid.php');

    }catch(Exception $e){
        require('bodyTop.php');
        echo '<h3>No posts found.</h3>';
        echo '<pre><code>' . $e->getMessage() . ' (' . $e->getLine() . ')</code></pre>';
    }

    require('bodyBottom.php');
?>