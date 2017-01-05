<?php wp_footer(); ?>
    <footer class="l-global-footer">
      <div class="l-footer-contents">
        <div class="l-footer-widget isRight">
          <?php if ( is_active_sidebar('footer-widget-left') ) :
            dynamic_sidebar( 'footer-widget-left' );
          else: ?>
          <div class="widget isLeft">
            <h2>No Widget</h2>
            <p>現在、ウィジェットが設定されていません。</p>
          </div>
          <?php endif; ?>
        </div>
        <div class="l-footer-widget isRight">
          <?php if ( is_active_sidebar('footer-widget-right') ) :
            dynamic_sidebar( 'footer-widget-right' );
          else: ?>
          <div class="widget isRight">
            <h2>No Widget</h2>
            <p>現在、ウィジェットが設定されていません。</p>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <p class="copy">
        <small>&copy; 2015 PengNote</small>
      </p>
    </footer>
  </body>
</html>
