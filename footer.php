<?php wp_footer(); ?>
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
  </body>
</html>
