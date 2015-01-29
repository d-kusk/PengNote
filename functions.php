<?php
// カスタムメニューを有効化
add_theme_support( 'menus' );
register_nav_menu( 'place_global', 'グローバルナビゲーション' );

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
