<?php
// スクリプトの読み込みコードを関数にまとめる
function pengnote_scripts() {
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  wp_enqueue_style( 'highlight-style', get_template_directory_uri() . '/css/atelier-forest-light.css' );
  // Naverプラグインを読み込むためのスクリプト
  wp_enqueue_script( 'naver-script', get_template_directory_uri() . '/js/jquery.fs.naver.min.js', array( 'jquery' ), '20150813', true );
  // スクリプトの実行やオプション指定なんかに使うスクリプトファイル
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.min.js', array( 'jquery' ), '20150813', true );
  // highlight.jsを読み込むためのスクリプト
  wp_enqueue_script( 'highlight-script', get_template_directory_uri() . '/js/highlight.pack.js', array(), '20150813', true );
}
// pengnote_scripts() をサイト公開側で呼び出す。
add_action( 'wp_enqueue_scripts', 'pengnote_scripts' );

// タイトルの表示
add_theme_support( 'title-tag' );

function page_title( $title ) {
    // トップページの条件分岐
    if ( is_front_page() && is_home() ) {
        $title = get_bloginfo( 'name', 'display' );

    // 個別記事や固定ページの条件分岐
    } elseif ( is_singular() ) {
        $title = single_post_title( '', false );
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'page_title' );

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
   'before_widget' => '<aside class="l-footer-widget">',
   'after_widget' => '</aside>',
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
      'mid_size' => 3, // ページャーの…前の数
      'current' => ($pCur ? $pCur : 1),
      'prev_text' => '«',
      'next_text' => '»',
  ));
}

// 個別ページのナビゲーションの設定
function Custom_previous_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
  Custom_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, true, $maxlen);
}
function Custom_next_post_link($maxlen = -1, $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
  Custom_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, false);
}

function Custom_adjacent_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '', $previous = true) {

  if ( $previous && is_attachment() )
    $post = & get_post($GLOBALS['post']->post_parent);
  else
    $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

  if ( !$post )
    return;

  $tCnt = mb_strlen( $post->post_title, get_bloginfo('charset') );

  if(($maxlen > 0)&&($tCnt > $maxlen)) {
    $title = mb_substr( $post->post_title, 0, $maxlen, get_bloginfo('charset') ) . '…';
  } else {
    $title = $post->post_title;
  }

  if ( empty($post->post_title) )
    $title = $previous ? __('Previous Post') : __('Next Post');

  $title = apply_filters('the_title', $title, $post->ID);
  $date = mysql2date(get_option('date_format'), $post->post_date);
  $rel = $previous ? 'prev' : 'next';

  $string = '<a href="'.get_permalink($post).'" rel="'.$rel.'">';
  $link = str_replace('%title', $title, $link);
  $link = str_replace('%date', $date, $link);
  $link = $string . $link . '</a>';

  $format = str_replace('%link', $link, $format);
  echo $format;
}

// タグクラウドの不要なクラスを削除
function ex_wp_tag_cloud( $tags ) {
    $match = array(
        "/ class='tag-link-(\d+)'/i",                //クラス、除去しないならこの行を削除
        "/ title='([^']+)'/i",                    //マウスホバーで表示されるタイトル、除去しないならこの行を削除
        "/ style='font-size: \d+(\.)*\d*(pt|px|em|\%);'/i",    //文字サイズ
    );
    return preg_replace( $match, '',  $tags );
}
add_filter( 'wp_tag_cloud', 'ex_wp_tag_cloud' );

//ログイン画面のロゴ変更
function login_logo() {
echo '<style type="text/css">
#login h1 a {
  background: url('.get_template_directory_uri().'/images/logo.png) no-repeat;
  width: 238px;
  height: 55px;
  background-size:100% auto;
}
</style>';
}
add_action('login_head', 'login_logo');

//カテゴリをラジオボタンに
function my_print_footer_scripts() {
echo '<script type="text/javascript">
  //<![CDATA[
  jQuery(document).ready(function($){
    $(".categorychecklist input[type=\"checkbox\"]").each(function(){
      $check = $(this);
      var checked = $check.attr("checked") ? \' checked="checked"\' : \'\';
      $(\'<input type="radio" id="\' + $check.attr("id")
        + \'" name="\' + $check.attr("name") + \'"\'
    + checked
  + \' value="\' + $check.val()
  + \'"/>\'
      ).insertBefore($check);
      $check.remove();
    });
  });
  //]]>
  </script>';
}
add_action('admin_print_footer_scripts', 'my_print_footer_scripts', 21);

// WordPressのバージョンを消す
remove_action('wp_head','wp_generator');
