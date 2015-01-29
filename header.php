<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title><?php if ( !is_home() ) {wp_title( '|', true, 'right' );} elseif (is_404()) {?>ページが見つかりませんでした。 | <?php }bloginfo('name');?></title>
    <meta name="google-site-verification" content="PY-rmkE6_kfIi6H0kQibRDyXqN7PLkNSiTq68oyxAlk" />
    <?php
    if (is_tag() || is_404() || is_search())
      echo '<meta name="robots" content="noindex, follow" />'."\n";
    else//if (is_home() || is_category() || is_single() || is_page())
      echo '<meta name="robots" content="index, follow" />'."\n";
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta name="keywords" content="">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php get_template_part('header_ogp'); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    <noscript>サイトを快適にお楽しみいただくためにも、JavaScriptを有効にしてください。</noscript>
    <!--[if lt IE 9]
    script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"
    script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"--><!--[endif]-->
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="l-global-header">
      <div class="l-logo-area">
        <h1 class="logo">
          <a href="/"><img alt="PengNote" height="55" src="images/logo.png" width="238" /></a>
        </h1>
        <p>勉強した事や行った場所の感想を書くブログ</p>
      </div>
      <nav class="l-global-nav">
        <ul class="l-global-nav-contents">
          <li><a href="#">ナビゲーション</a></li>
        </ul>
      </nav>
    </header>