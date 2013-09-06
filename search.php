<?php

    try{
        require('JACKED/jacked_conf.php');
        $JACKED = new JACKED(array('MySQL', 'Syrup'));

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
                // $tagCriteria['OR']['Curator.name LIKE \'%' . $term . '%\' OR \'\' '] = $term; //lol
                $fulltextTerms[] = $term . '*';
            }
        }

        // $tag_posts = $JACKED->Syrup->Blag->find($tagCriteria);

        $query = "SELECT Blag.guid, MATCH(Curator.name) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE) AS Score 
            FROM Blag, Curator, CuratorRelation WHERE MATCH(Curator.name) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE) AND CuratorRelation.Curator = Curator.guid AND Blag.guid = CuratorRelation.target";
        $tagScores = $JACKED->MySQL->query($query);

        $query = "SELECT guid, MATCH(title) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE) AS Score 
            FROM Blag WHERE MATCH(title) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE)";
        $titleScores = $JACKED->MySQL->query($query);

        $query = "SELECT guid, MATCH(content) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE) AS Score 
            FROM Blag WHERE MATCH(content) AGAINST ('" . implode(' ', $fulltextTerms) . "' IN BOOLEAN MODE)";
        $contentScores = $JACKED->MySQL->query($query);

        $guidScores = array();

        if($titleScores){
            foreach($titleScores as $val){
                if(isset($guidScores[$val['guid']])){
                    $guidScores[$val['guid']] += $val['Score'] * 3;
                }else{
                    $guidScores[$val['guid']] = $val['Score'] * 3;
                }
            }
        }
        if($tagScores){
            foreach($tagScores as $val){
                if(isset($guidScores[$val['guid']])){
                    $guidScores[$val['guid']] += $val['Score'] * 2;
                }else{
                    $guidScores[$val['guid']] = $val['Score'] * 2;
                }
            }
        }
        if($contentScores){
            foreach($contentScores as $val){
                if(isset($guidScores[$val['guid']])){
                    $guidScores[$val['guid']] += $val['Score'];
                }else{
                    $guidScores[$val['guid']] = $val['Score'];
                }
            }
        }

        arsort($guidScores);

        $posts = array();
        foreach($guidScores as $guid => $score){
            $posts[] = $JACKED->Syrup->Blag->findOne(array('guid' => $guid));
        }

        $templateVars['pageTitle'] = "Search: " . $q;
        $templateVars['postGrid'] = array();
        $templateVars['postGrid']['class'] = 'pushup';
        $templateVars['postGrid']['title'] = '<em><strong>' . count($posts) . '</strong></em> RESULT' . ((count($posts) == 1)? '' : 'S') . ' FOR "<strong>' . $q . '</strong>"';

        include('bodyTop.php');
        include('bodyPostGrid.php');

    }catch(MissingQueryException $e){
        require_once('bodyTop.php');
        echo '<h3>No search terms provided.</h3>';
    }catch(Exception $e){
        require_once('bodyTop.php');
        echo '<h3>No posts found.</h3>';
        echo '<pre><code>' . $e->getMessage() . ' @ ' . $e->getFile() . ':' . $e->getLine() . '</code></pre>';
    }

    require('bodyBottom.php');



    class MissingQueryException extends Exception{
        protected $message = 'No search terms provided.';
    }
?>