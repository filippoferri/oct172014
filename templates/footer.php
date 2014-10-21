<footer class="content-info" role="contentinfo">
  <a class="go-top" href="javascript:void(0);"><span class="icon ff-arrow-up2"></span></a>
  <div class="container">
    <div class="row">
      <div class="widget-footer">

        <?php dynamic_sidebar( 'sidebar-footer'); ?>

      </div><!-- //WIDGET Footer -->
    </div><!-- //ROW -->

    <div class="row">
      <div class="col-md-12">
        <div class="copyright">
        <?php
          $copy = get_theme_mod( 'copy' );
          $blog_title = get_bloginfo();
          $blog_url = get_bloginfo('url');
          echo '<span><a href="'.$blog_url.'" alt="'.$blog_title.'">'.$blog_title.'</a> '.comicpress_copyright().' '.$copy.'</span>';
        ?>
      </div><!-- //COPYRIGHT -->
      </div>
    </div><!-- //ROW -->
  </div><!-- //CONTAINER -->
</footer>
