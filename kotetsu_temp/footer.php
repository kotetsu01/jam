<footer>
  <div class="footer-inner">
    <div class="footer-nav-area">
      <?php wp_nav_menu( array(
      'theme_location' => 'footer-nav',
      'container' => 'nav',
      'container_class' => 'footer-nav',
      'container_id' => 'footer-nav',
      'fallback_cb' => ''
      ) ); ?>
      </div>
  </div>
</footer>
<div class="copyright">
  <p>copyright ©<?php bloginfo( 'name' ); ?> All Rights Reserved.</p>
</div>
<?php wp_footer(); ?><!--システム・プラグイン用-->
</body>
</html>
