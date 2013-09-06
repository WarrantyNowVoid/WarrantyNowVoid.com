<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED('Syrup');

        if(!(isset($_GET['q'])) || $_GET['q'] == ''){
            throw new MissingQueryException();
        }

        $q = preg_replace("/[^a-z0-9 ]+/i", "", $_GET['q']);

        $posts = array();
        $terms = explode(" ", $q);
        $fulltextTerms = array();
        $tagCriteria = array();
        foreach($terms as $term){
            $term = strtolower($term);
            if(strpos($JACKED->config->stopwords, ',' . $term . ',') === FALSE){
                $tagCriteria['OR']['Curator.name LIKE \'%' . $term . '%\' OR \'\' '] = $term; //lol
                $fulltextTerms[] = $term . '*';
            }
        }

        $tag_posts = $JACKED->Syrup->Blag->find($tagCriteria);

        $query = "SELECT guid, MATCH(title) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE) AS Score 
            FROM Blag WHERE MATCH(title) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE)";
        $titleScores = $JACKED->MySQL->query($query);

        $query = "SELECT guid, MATCH(content) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE) AS Score 
            FROM Blag WHERE MATCH(content) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE)";
        $contentScores = $JACKED->MySQL->query($query);


        $templateVars['pageTitle'] = "Search: " . $q;
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>' . count($posts) . '</strong></em> RESULT' . ((count($posts) == 1)? '' : 'S') . ' FOR "<strong>' . $q . '</strong>"';

        include('bodyTop.php');
        include('bodyPostGrid.php');

    }catch(MissingQueryException $e){
        require('bodyTop.php');
        echo '<h3>No search terms provided.</h3>';
    }catch(Exception $e){
        require('bodyTop.php');
        echo '<h3>No posts found.</h3>';
        echo '<pre><code>' . $e->getMessage() . '</code></pre>';
    }

    require('bodyBottom.php');



    class MissingQueryException extends Exception{
        protected $message = 'No search terms provided.';
    }
?>