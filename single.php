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
            <li class="tag">
              <?php if (get_the_tags()) the_tags('', ' ', ''); ?>
            </li>
          </ul>
        </header>
        <div class="entry-body">
          <?php if(has_post_thumbnail())
            the_post_thumbnail( 'large' );
          ?>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- Bottomthumbnail -->
          <ins class="adsbygoogle"
               style="display:inline-block;width:468px;height:60px"
               data-ad-client="ca-pub-5766460361259641"
               data-ad-slot="2527203811"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
          <?php the_content(); ?>
          <?php
          get_template_part('adsense');
          related_posts();
          ?>
        </div>
      </article>
      <nav class="l-single-pager">
        <ul>
          <?php if ( get_previous_post() ) : ?>
          <li class="previous">
            <?php Custom_previous_post_link(15, '%link', '&#139; %title', true) ?>
          </li>
          <?php endif; ?>
          <?php if ( get_next_post() ) : ?>
          <li class="next">
            <?php Custom_next_post_link(15, '%link', '%title &#155;', true) ?>
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