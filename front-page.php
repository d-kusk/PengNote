<?php get_header(); ?>
    <main class="l-contents">
      <article class="l-entry-area">
        <a class="l-eyecatch-area" href="#"><img alt="アイキャッチ" height="279" src="images/thumbnail.png" width="450" /></a>
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