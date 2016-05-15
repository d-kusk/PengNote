<?php get_header(); ?>
    <main class="l-contents">
      <h1 class="archive-title"><?php single_cat_title(); ?>の記事一覧</h1>
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
    ?>
      <article class="l-entry-area post-<?php the_ID(); ?> <?php post_class(); ?>">
        <a class="l-eyecatch-area" href="#">
          <?php if (has_post_thumbnail())
              the_post_thumbnail( 'archive' );
          else
            // デフォルトサムネイル
            echo '<img src="' . esc_url( get_template_directory_uri() ) . '/images/thumbnail.png' . '" width="450" height="279" alt="thumbnail" />';
          ?>
        </a>
        <div class="l-entry-content">
          <ul class="entry-data-lists">
            <li class="postedtime">
              <time datetime="<?php echo get_the_date('Y-m-d'); ?>" pubdate="pubdate"><?php the_time(get_option('date_format')); ?></time>
            </li>
            <li class="category">
              <?php if (get_the_category()) the_category(', '); ?></a>
            </li>
          </ul>
          <h2 class="entry-title">
            <a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
          </h2>
        </div>
      </article>
      <?php endwhile; ?>
    <?php else : ?>
      <h2>記事はありません</h2>
      <p>お探しの記事は見つかりませんでした。</p>
    <?php endif; ?>
      <nav class="l-archives-pager">
        <?php pagerNavi($wp_query->max_num_pages,$paged); ?>
      </nav>
      <?php get_template_part('adsense'); ?>
    </main>
<?php get_footer(); ?>
