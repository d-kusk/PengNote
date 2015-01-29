<?php
// カスタムメニューを有効化
add_theme_support( 'menus' );
register_nav_menu( 'place_global', 'グローバルナビゲーション' );

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
add_image_size( 'archive', 450, 280, true );
add_image_size( 'large', 660, 460, false );

// ウィジェットの有効化
function footer_widgets_init() {
  register_sidebar(array(
   'name' => 'フッターウィジェット',
   'description' => 'フッターに置くウィジェット',
   'id' => 'footer-widget',
   'before_widget' => '<div class="l-footer-widget">',
   'after_widget' => '</div>',
  ));
}
add_action( 'widgets_init', 'footer_widgets_init' );

// ページャー
function pagerNavi($maxNum,$pCur){
  global $wp_rewrite;
  $paginate_base = get_pagenum_link(1);
  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
      $paginate_format = '';
      $paginate_base = add_query_arg('paged','%#%');
  }
  else{
      $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
      user_trailingslashit('page/%#%/','paged');;
      $paginate_base .= '%_%';
  }
  echo paginate_links(array(
      'base' => $paginate_base,
      'format' => $paginate_format,
      'total' => $maxNum,
      'mid_size' => 4,
      'current' => ($pCur ? $pCur : 1),
      'prev_text' => '«',
      'next_text' => '»',
  ));
}
