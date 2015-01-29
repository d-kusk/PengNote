<?php get_header(); ?>
    <main class="l-contents">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
    ?>  
      <article class="l-entry-area post-<?php the_ID(); ?> <?php post_class(); ?>">
        <header class="entry-header">
          <h2 class="entry-title">
            <?php the_title(); ?>
          </h2>
        </header>
        <div class="entry-body">
          <?php if(has_post_thumbnail())
            the_post_thumbnail( 'large' );
          ?>
          <?php the_content(); ?>
        </div>
      </article>
    <?php
      endwhile;
    else :
    ?>
    <p>申し訳ありません。何らかの理由により記事が表示できませんでした。</p>
  <?php endif; ?>
    </main>
<?php get_footer(); ?>