<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <?php if (is_single() || is_page()): ?>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <?php else: ?>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# blog: http://ogp.me/ns/blog#">
  <?php endif; ?>
    <meta charset="UTF-8">
    <title><?php if ( !is_home() ) {wp_title( '|', true, 'right' );} elseif (is_404()) {?>ページが見つかりませんでした。 | <?php }bloginfo('name');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/style.css">
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    <noscript>サイトを快適にお楽しみいただくためにも、JavaScriptを有効にしてください。</noscript>
    <!--[if lt IE 9]
    script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"
    script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"--><!--[endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="l-global-header">
      <div class="l-logo-area">
        <h1 class="logo">
          <a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="PengNote" width="233" height="57"></a>
        </h1>
        <p class="site-description"><?php bloginfo('description'); ?></p>
      </div>
      <nav class="l-global-nav naver">
      <?php
      // グローバルメニュー
      $args = array(
          'container' => false,
          'menu_class' => 'l-global-nav-contents',
          'theme_location' => 'place_global',
        );
      wp_nav_menu( $args );
      ?>
      </nav>
    </header>
    <?php if(is_single()): ?>
    <ul class="l-breadcrumbs">
      <li><a href="<?php echo esc_url( home_url() ); ?>">HOME</a>&gt;</li>
      <li><a href="<?php $cat = get_the_category(); $cat = $cat[0]; echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->cat_name; ?></a>&gt;</li>
      <li class="current"><?php the_title(''); ?></li>
    </ul>
    <?php elseif(is_page()): ?>
    <ul class="l-breadcrumbs">
      <li><a href="<?php echo esc_url( home_url() ); ?>">HOME</a>&gt;</li>
      <?php foreach ( array_reverse(get_post_ancestors($post->ID)) as $parid ) { ?>
      <li><a href="<?php echo get_page_link( $parid );?>" title="<?php echo get_page($parid)->post_name; ?>">
      <?php echo get_page($parid)->post_name; ?></a>&gt;</li>
      <?php } ?>
      <li class="current"><?php the_title(''); ?></li>
    </ul>
    <?php endif;?>
