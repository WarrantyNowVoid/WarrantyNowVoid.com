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
        $templateVars['postGrid']['title'] = '<em><strong>' . count($posts) . '</strong></em> POSTS TAGGED WITH "<strong>' . $mainTag->name . '</strong>"';

    }catch(MissingTagException $e){
        $posts = array();
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em>NO TAG PROVIDED</strong>';
    }catch(Exception $e){
        $posts = array();
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>0</strong></em> POSTS TAGGED WITH "<strong>' . $_GET['tagname'] . '</strong>"';
    }

    require('bodyTop.php');
    require('bodyPostGrid.php');
    require('bodyBottom.php');



    class MissingTagException extends Exception{
        protected $message = 'No canonical tag name provided.';
    }
?>