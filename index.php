<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED(array('Syrup', 'MySQL'));

        $postCount = 20;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        // $totalResultCount = $JACKED->Syrup->Blag->count(array('alive' => 1)); 

        $totalResultCountRes = $JACKED->MySQL->query('SELECT COUNT(*) AS cnt FROM Blag WHERE alive = 1');
        $totalResultCount = $totalResultCountRes[0]['cnt'];

        $posts = $JACKED->Syrup->Blag->find(
            array('alive' => 1), 
            array('field' => 'posted', 'direction' => 'DESC'),
            $postCount,
            (($postCount * $page) - $postCount)
        );
        if(!$posts){
            throw new Exception("No posts found");
        }

        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = '';
        $templateVars['postGrid']['title'] = 'RECENT POSTS' . (($page > 1)? ' <small><em>PAGE ' . $page . '</small></em>': '');

        $templateVars['pager'] = array();
        $templateVars['pager']['pageNum'] = $page;
        $templateVars['pager']['hasNext'] = ($totalResultCount > ($postCount * $page));
        $templateVars['pager']['nextPageLink'] = '/' . ($page + 1);
        $templateVars['pager']['prevPageLink'] = '/' . ($page - 1);

        $templateVars['featuredBox'] = array();

        $featured = $JACKED->MySQL->query('SELECT * FROM featured WHERE 1');

        $templateVars['featuredBox']['posts'] = array();

        foreach ($featured as $fitem){
            $templateVars['featuredBox']['posts'][$fitem['position']] = $fitem['guid'];
        }

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