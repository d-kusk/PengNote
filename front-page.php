<?php get_header(); ?>
    <main class="l-contents">
      <article class="l-entry-area">
        <a class="l-eyecatch-area" href="#">
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
              <time datetime="2015-01-09" pubdate="pubdate">2015-01-09</time>
            </li>
            <li class="category">
              <a href="#">カテゴリー</a>
            </li>
          </ul>
          <h2 class="entry-title">
            <a href="#">エントリータイトル</a>
          </h2>
        </div>
      </article>
      <nav class="l-archives-pager">
        <?php pagerNavi($wp_query->max_num_pages,$paged); ?>
      </nav>
    </main>
<?php get_footer(); ?>