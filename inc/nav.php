

<nav id="main-nav" class="main-navigation" role="navigation">

  <div id="desktop-main">
    <section id="desktop-pre">
      <div class="nav-container nav-flex">
        <?php
          get_template_part('shortcodes/nav', 'contact');

          wp_nav_menu( array(
            'theme_location' => 'social',
            'container' => 'ul',
            'menu_class' => 'social-list',
            'link_before' => '<span class=screen-reader-text>',
            'link_after' => '</span>'
        ) );
          wp_nav_menu( array(
            'theme_location' => 'language',
            'container' => 'ul',
            'menu_class' => 'lang-list'
        ) );
        ?>
      </div><!--.nav-container-->
    </section><!--#desktop-pre-->

<?php if( is_front_page() ) {
  echo '<section id="desktop-menu" class="desktop-float">';
} else {
  echo '<section id="desktop-menu">';
} ?>
      <div class="nav-container nav-flex">
        <div class="site-branding">
          <object type="image/svg+xml" class="desktop-logo" data="<?php echo get_template_directory_uri(); ?>/dist/img/COCO-logo.svg" style="max-width:100px; max-height:100px;"></object>
          <div class="site-info">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="site-description">
              <span class="nowrap">Center for Opportunities,</span>
              <span class="nowrap">Choices &amp; Outcomes</span>
            </p>
          </div><!--.site-info-->
        </div><!--.site-branding-->

        <button id="mobile-open"></button>

        <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => 'ul',
            'menu_class' => 'desktop-list'
        ) ); ?>

      </div><!--.nav-container-->
    </section><!--#desktop-menu-->
  </div><!--#desktop-main-->


  <div id="mobile-main" class="left">
    <section id="mobile-pre">
      <?php wp_nav_menu( array(
          'theme_location' => 'language',
          'container' => 'ul',
          'menu_class' => 'lang-list'
      ) ); ?>

      <button id="mobile-close"></button>
    </section><!--#mobile-pre-->

    <section id="mobile-menu">
      <div class="site-branding">
        <object type="image/svg+xml" class="mobile-logo" data="<?php echo get_template_directory_uri(); ?>/dist/img/COCO-logo.svg" style="max-width:100px; max-height:100px;"></object>
      </div><!-- .site-branding -->

      <?php wp_nav_menu( array(
          'theme_location' => 'primary',
          'container' => 'ul',
          'menu_class' => 'mobile-list'
      ) ); ?>

      <section id="mobile-sub">
        <?php wp_nav_menu( array(
            'theme_location' => 'social',
            'container' => 'ul',
            'menu_class' => 'social-list',
            'link_before' => '<span class=screen-reader-text>',
            'link_after' => '</span>'
        ) ); ?>

        <?php //include("nav-contact.php"); ?>
      </section><!--#mobile-sub-->
    </section><!--#mobile-menu-->
  </div><!--#mobile-main-->

  <div id="dark-overlay"></div>

</nav><!-- #main-nav -->
