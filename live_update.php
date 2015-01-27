<?php

    require('JACKED/jacked_conf.php');
    $JACKED = new JACKED(array('Syrup'));

    $liveid = '94c7c';

    $post = $JACKED->Syrup->Blag->findOne(array('guid' => $liveid));

    header('Content-Type: application/json');

    echo json_encode(array('body' => $post->content));

?>