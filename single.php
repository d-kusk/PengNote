<?php get_header(); ?>
    <main class="l-contents">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
    ?>
      <article class="l-entry-area post-<?php the_ID(); ?> <?php post_class(); ?>">
        <header class="entry-header">
          <ul class="entry-data-lists">
            <li class="postedtime">
              <time datetime="<?php echo get_the_date('Y-m-d'); ?>" pubdate="pubdate"><?php the_time(get_option('date_format')); ?></time>
            </li>
            <li class="category">
              <?php if (get_the_category()) the_category(', '); ?>
            </li>
          </ul>
          <h2 class="entry-title">
            <?php the_title(); ?>
          </h2>
          <ul class="entry-data-lists">
            <li>
              <?php if (get_the_tags()) the_tags('', ', ', ''); ?>
            </li>
          </ul>
        </header>
        <div class="entry-body">
          <?php if(has_post_thumbnail())
            the_post_thumbnail( 'large' );
          ?>
          <?php the_content(); ?>
        </div>
      </article>
      <nav class="l-single-pager">
        <ul>
          <?php if ( get_previous_post() ) : ?>
          <li class="previous">
            <?php previous_post_link('%link', '&laquo 前の記事<br> %title'); ?>
          </li>
          <?php endif; ?>
          <?php if( get_next_post() ) : ?>
          <li class="next">
            <?php next_post_link('%link', '次の記事 &raquo<br> %title'); ?>
          <?php endif;?>
          </li>
        </ul>
      </nav>
      <?php
        endwhile;
      else :
      ?>
      <p>申し訳ありません。何らかの理由により記事が表示できませんでした。</p>
    <?php endif; ?>
    </main>
<?php get_footer(); ?>