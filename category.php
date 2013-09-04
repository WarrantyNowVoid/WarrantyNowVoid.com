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
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>' . count($posts) . '</strong></em> ' . strtoupper($category->name);
        
        include('bodyTop.php');
        include('bodyPostGrid.php');

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