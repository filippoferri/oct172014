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
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
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
<div class="jumbotron">
  <div class="container">
    <div class="slider">
      <div class="slide">your content1</div>
      <div class="slide">your content2</div>
      <div class="slide">your content3</div>
    </div>
  </div>

</div>
<?php } else {
      get_template_part('templates/page', 'header');
 } ?>
