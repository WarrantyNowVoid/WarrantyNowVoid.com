<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED('Syrup');

        if(!(isset($_GET['catname']) && is_string($_GET['catname']))){
            throw new MissingCategoryException();
        }

        $postCount = 20;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        $category = $JACKED->Syrup->BlagCategory->findOne(array('name' => trim(strtolower($_GET['catname']))));
        if(!$category){
            throw new Exception("No posts found");
        }

        $totalResultCount = count($JACKED->Syrup->Blag->find(
            array('AND' => array('category.guid' => $category->guid, 'alive' => 1)), 
            array('field' => 'posted', 'direction' => 'DESC')
        ));

        $posts = $JACKED->Syrup->Blag->find(
            array('AND' => array('category.guid' => $category->guid, 'alive' => 1)), 
            array('field' => 'posted', 'direction' => 'DESC'),
            $postCount,
            (($postCount * $page) - $postCount)
        );

        if(!$posts){
            throw new Exception("No posts found");
        }

        $templateVars['pageTitle'] = $category->name;
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>' . $totalResultCount . '</strong></em> ' . strtoupper($category->name);
        if($page > 1){
            $templateVars['postGrid']['title'] .= ' <em><small>PAGE ' . $page . '</small></em>';
        }
        
        $templateVars['pager'] = array();
        $templateVars['pager']['pageNum'] = $page;
        $templateVars['pager']['hasNext'] = ($totalResultCount > ($postCount * $page));
        $templateVars['pager']['nextPageLink'] = '/' . $_GET['catname'] . '/' . ($page + 1);
        $templateVars['pager']['prevPageLink'] = '/' . $_GET['catname'] . '/' . ($page - 1);

    }catch(MissingCategoryException $e){
        $posts = array();
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em>NO CATEGORY GIVEN</em>';
    }catch(Exception $e){
        $posts = array();
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>0</strong></em> POSTS IN CATEGORY: "<strong>' . $_GET['catname'] . '</strong>"';
    }

    require('bodyTop.php');
    require('bodyPostGrid.php');
    require('bodyBottom.php');



    class MissingCategoryException extends Exception{
        protected $message = 'No category name provided.';
    }
?>