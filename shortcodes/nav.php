<header id="masthead" class="site-header" role="banner">
    <!-- <div id="navbar-pre">
      <?php wp_nav_menu( array(
          'theme_location' => 'social',
          'container' => 'div',
          'container_id' => 'social-list',
          'link_before' => '<span class=screen-reader-text>',
          'link_after' => '</span>'
      ) ); ?>

    </div> -->

    <nav id="navbar-main" class="main-navigation container" role="navigation">

        <!-- <div id="mobile-menubar"></div>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coco' ); ?></button>
        <div id="nav-blackscreen"></div> -->


        <div id="nav-menubar">

          <div id="site-branding">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
          </div><!-- .site-branding -->

          <?php wp_nav_menu( array(
              'theme_location' => 'primary',
              'container' => 'ul',
              'menu_id'  => 'nav-list'
          ) ); ?>

        </div>


        <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        ?>


    </nav><!-- #site-navigation -->
</header><!-- #masthead -->
