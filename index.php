<?php get_header(); ?>
    <main class="l-contents">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) :
          the_post();
      ?>
      <article class="l-entry-area post-<?php the_ID(); ?> <?php post_class(); ?>">
        <div class="l-entry-content">
          <ul class="entry-data-lists">
            <li class="postedtime">
              <time datetime="<?php echo get_the_date('Y-m-d'); ?>" pubdate="pubdate"><?php the_time(get_option('date_format')); ?></time>
            </li>
            <li class="category">
              <?php if (get_the_category()) the_category(', '); ?>
            </li>
          </ul>
          <h2 class="entry-title">
            <a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
          </h2>
        </div>
      </article>
      <?php endwhile;?>
      <?php else : ?>
        <h2>記事はありません</h2>
        <p>お探しの記事は見つかりませんでした。</p>
      <?php endif; ?>
      <nav class="l-archives-pager">
        <?php pagerNavi($wp_query->max_num_pages,$paged); ?>
      </nav>
    </main>
<?php get_footer(); ?>
