<?php get_header(); ?>
    <main class="l-contents">
      <article class="l-entry-area post-<?php the_ID(); ?> <?php post_class(); ?>">
        <a class="l-eyecatch-area" href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail())
              the_post_thumbnail( 'archive' );
          else
            // デフォルトサムネイル
            echo '<img src="' . get_bloginfo('template_directory') . '/images/thumbnail.png' . '" width="450" height="279" alt="thumbnail" />';
          ?>
        </a>
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
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
        </div>
      </article>
      <nav class="l-archives-pager">
        <?php pagerNavi($wp_query->max_num_pages,$paged); ?>
      </nav>
    </main>
<?php get_footer(); ?>