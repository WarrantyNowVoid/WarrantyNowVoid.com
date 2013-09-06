<?php
    if(!isset($templateVars['pageType'])){
        $templateVars['pageType'] = 'system';
    }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Warranty Now Void<?php echo isset($templateVars['pageTitle'])? ' - ' . $templateVars['pageTitle'] : ''; ?></title>
        <meta name="viewport" content="width=1024px, height=device-height">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta property="og:site_name" content="Warranty Now Void"/>

        <?php if($templateVars['pageType'] == 'post'){ ?>

        <meta property="og:title" content="<?php echo $templateVars['pageTitle']; ?> - Warranty Now Void" />
        <meta property="og:url" content="<?php echo $templateVars['postURL']; ?>" />
        <meta property="og:image" content="<?php echo $templateVars['postImageURL']; ?>" />
        <meta property="og:description" content="<?php echo $templateVars['postHeadline']; ?>" />
        <meta property="og:updated_time" content="<?php echo $templateVars['postDatetime']; ?>" />

        <?php } ?>

        <!-- Le styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/main.css" rel="stylesheet">

        <!-- Modernizr -->
        <script type="text/javascript" src="/assets/js/modernizr.min.js"></script>

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
          <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
                        <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
                                       <link rel="shortcut icon" href="/assets/ico/favicon.ico">
    </head>

    <body>
        <div id="wrap">
            <div id="poopGuy"></div>
            <audio id="pushit" src="/assets/mp3/bsg.mp3"></audio>
            <header class="staremaster">
                <div class="item active">
                    <div class="container">
                        <a href="<?php echo $JACKED->config->base_url; ?>"><img id="logo" src="/assets/img/template/wnv_white.png" data-at2x="/assets/img/template/wnv_white@2x.png" /></a>
                        <nav>
                            <ul id="thenavbar">
                                <li class="videos">
                                    <a href="/videos">Videos</a>
                                </li>
                                <li class="comics">
                                    <a href="/comics">Comics</a>
                                </li>
                                <li class="articles">
                                    <a href="/articles">Articles</a>
                                </li>
                                <li class="junk">
                                    <a href="/junk">Junk</a>
                                </li>
                                <li class="spacer"></li>
                                <li class="about system1">
                                    <a href="/about">About</a>
                                </li>
                                <li class="searchbox">
                                    <form method="GET" action="/search">
                                        <input type="search" id="wnv-search" name="q" />
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <div class="container container-main"><!--main page container-->