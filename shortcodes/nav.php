
<nav id="navbar-main" class="main-navigation" role="navigation">

  <div id="pre-menubar">
    <div class="nav-container">
      <ul id="site-contact">
        <li id="site-mail">
            <span class="email name">contact</span>
            <span class="email mail">mail</span>
            <span class="email com">com</span>
        </li>
        <li id="site-phone">
            <span class="phone areacode">(917)</span>
            <span class="phone number">575.9855</span>
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
    <div class="nav-container">

    <div id="site-branding">
      <object type="image/svg+xml" class="logo" data="<?php echo get_template_directory_uri(); ?>/src/img/COCO-logo.svg" style="display:inline-block; width:80px; height:80px;"></object>

      <div class="site-info">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
      </div>
    </div><!-- .site-branding -->

    <button class="mobile-toggle"></button>

    <?php wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => 'ul',
        'menu_id' => 'nav-list'
    ) ); ?>

    </div><!--container-nav-->
  </div><!-- #nav-menubar -->

  <div id="mobile-menu">
    <button class="close-toggle"></button>
    <div class="dark-overlay"></div>

    <?php wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => 'ul',
        'menu_id' => 'mobile-list'
    ) ); ?>

  </div><!-- #mobile-menu -->

</nav><!-- #navbar-main -->
