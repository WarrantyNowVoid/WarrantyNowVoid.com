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