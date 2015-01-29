    <footer class="l-global-footer">
      <div class="l-footer-contents">
        <?php if ( is_active_sidebar('footer-widget') ) :
          dynamic_sidebar( 'footer-widget' );
        else: ?>
        <div class="widget">
          <h2>No Widget</h2>
          <p>現在、ウィジェットが設定されていません。</p>
        </div>
        <?php endif; ?>
      </div>
      <p class="copy">
        <small>&copy; 2015 PengNote</small>
      </p>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fs.naver.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
  </body>
</html>