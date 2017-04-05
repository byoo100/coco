
<nav id="navbar-main" class="main-navigation" role="navigation">

  <div id="pre-menubar">
    <div class="container-nav">
      <ul id="site-mail">
        <li>
            <span class="email name">contact</span>
            <span class="email mail">mail</span>
            <span class="email com">com</span>
        </li>
      </ul>
      <?php wp_nav_menu( array(
          'theme_location' => 'social',
          'container' => 'ul',
          'menu_id' => 'social-list',
          'link_before' => '<span class=screen-reader-text>',
          'link_after' => '</span>'
      ) ); ?>

      <?php wp_nav_menu( array(
          'theme_location' => 'language',
          'container' => 'ul',
          'menu_id' => 'lang-list'
      ) ); ?>
  </div><!--container-nav-->
  </div><!--pre-menubar-->


  <div id="nav-menubar">
    <div class="container-nav">

    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coco' ); ?></button>

    <div id="site-branding">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
    </div><!-- .site-branding -->

    <?php wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => 'ul',
        'menu_id' => 'nav-list'
    ) ); ?>

    </div><!--container-nav-->
  </div><!-- #nav-menubar -->


  <!-- <?php
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  ?> -->

</nav><!-- #navbar-main -->
