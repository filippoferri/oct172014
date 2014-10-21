<header class="banner" role="banner">
  <div class="container clearfix">
    <div class="navbar navbar-default">

      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hidden-lg" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <span class="navbar-text visible-lg-inline-block tk-nimbus-sans-condensed"><span class="icon ff-phone"></span> <?php echo get_theme_mod( 'phone' ); ?></span>

        <div class="logo visible-lg-inline-block"><a href="<?php bloginfo('template_url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-circle.png" alt=""></a></div>
    </div>

      <nav class="collapse navbar-collapse navbar-right" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav tk-nimbus-sans-condensed'));
        endif;
      ?>
    </nav>

    </div><!-- //MENU -->
  </div><!-- //CONTAINER -->
</header><!-- //HEADER -->

<?php if ( is_front_page() ) { ?>
<!--
<div class="jumbotron">
  <div class="container">
-->
    <?php putRevSlider( "home" ) ?>
<!--
    <div class="slider">
      <div class=" slide slide1">
        <div class="col-lg-6 FromRight">
            <p>Say Something Wonderful Here</p>
            <span>Aliquam tempus est sit amet orci porta condimentum. Quisque hendrerit velit erat, in bibendum eros ultricies sit amet. Sed tempor hendrerit purus vitae</span>
            <a class="btn btn-lg btn-dark" href="javascript:void(0);">Call To Action</a>
        </div>
        <div class="col-lg-5 FromBottom"><img src="http://lorempixel.com/705/386/technics" alt=""></div>
      </div>
      <div class="slide slide2">
        <div class="col-lg-6 FromRight"><img src="http://lorempixel.com/705/386/technics" alt=""></div>
        <div class="col-lg-6 FromLeft">
            <span>Aliquam tempus est sit amet orci porta condimentum. Quisque hendrerit velit erat, in bibendum eros ultricies sit amet. Sed tempor</span>
            <p>Say Something Wonderful Here</p>
            <a class="btn btn-lg btn-dark" href="javascript:void(0);">Call To A ction</a>
        </div>
      </div>
    </div>
-->
<!--
  </div>
</div>
-->
<?php } else {
      get_template_part('templates/page', 'header');
 } ?>
