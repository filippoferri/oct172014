<?php


// Testimonials
//
function testimonials_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));

    $testimonialHtml = '';
    $testimonialHtml .= '
    </div></div> <!-- /.MotoPress span close -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->';
    $testimonialHtml .= '
  <!-- TESTIMONIALS -->
  <section class="testimonials">
    <div class="container">';
      $args = array(
        'post_type'           => 'testimonials',
        'order'               => 'ASC',
        'ignore_sticky_posts' => 1,
    );
    $the_query = new WP_Query( $args );
    // The Loop
    if ( $the_query->have_posts() ) {
        $testimonialHtml .= '
        <!-- TESTIMONIALS CAROUSEL -->
          <div class="testimonials_slider">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $the_author = get_post_meta(get_the_ID(), 'cite', true);
            $the_quote = get_post_meta(get_the_ID(), "quote", true);
            $testimonialHtml .= '<div class="testimonials_content"><p>"</span>'.$the_quote.'"</p></div>';
            $testimonialHtml .= '<div class="testimonials_author">'.$the_author.'</div>';
        }
        $testimonialHtml .= '
        </div>
        <!-- //TESTIMONIALS CAROUSEL -->';
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    $testimonialHtml .= '
    </div>
    <!-- //CONTAINER -->

    <div class="overlay"></div>
  </section>
  <!-- //TESTIMONIALS -->';
    $testimonialHtml .= '
  <div class="wrap container" role="document">
    <div class="content row">
    <div class="mp-row-fluid motopress-row ">
    <div class="mp-span12 motopress-span">';

	return $testimonialHtml;
}
// register your shortcode
add_shortcode('testimonials', 'testimonials_shortcode');


// Create function. Everything will be done here.
function testimonials_slider($motopressCELibrary) {

    global $motopressCELang;

    // Create an object with your shortcode specific parameters
	$testimonialsObject = new MPCEObject('testimonials', _('Testimonials'), 'wordpress.png',
        array(
//            'content' => array(
//                'type' => 'longtext-tinymce',
//                'label' => _('Content:'),
//                'default' => '',
//                'text' => $motopressCELang->CEOpenInWPEditor,
//                'saveInContent' => 'true'
//            ),
//            'color' => array(
//                'type' => 'color-picker',
//                'label' => _('Background Color:'),
//                'default' => '#eeeeee',
//            ),
        ),
        0,
        MPCEObject::ENCLOSED
	);

	// Add this object into any group you need
	$motopressCELibrary->addObject($testimonialsObject, $group = 'wordpress');
}

// Integrate your shortcode into MotoPress Content Editor
add_action('mp_library', 'testimonials_slider', 10, 1);

// Services
//
function services_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
        's1_title' => 'Repair service',
        's1_desc'  => 'Quisque porttitor ligula ut nunc dictum, ac eleifend libero',
        's1_icon'  => 'adjust',
        's2_title' => 'Repair service',
        's2_desc'  => 'Quisque porttitor ligula ut nunc dictum, ac eleifend libero',
        's2_icon'  => 'adjust',
        's3_title' => 'Repair service',
        's3_desc'  => 'Quisque porttitor ligula ut nunc dictum, ac eleifend libero',
        's3_icon'  => 'adjust',
        's4_title' => 'Repair service',
        's4_desc'  => 'Quisque porttitor ligula ut nunc dictum, ac eleifend libero',
        's4_icon'  => 'adjust',
        's5_title' => 'Repair service',
        's5_desc'  => 'Quisque porttitor ligula ut nunc dictum, ac eleifend libero',
        's5_icon'  => 'adjust',
	), $atts));

    if (!empty($classes)) $classes = ' ' . $classes;

    $servicesHtml = '
    <!-- SERVICES -->
    <section class="services_block">';
    $servicesHtml .= '
        <div class="service_item bg1">
          <a href="" alt="">
            <i class="icon ff-'.$s1_icon.'"></i>
            <p>'.$s1_title.'</p>
            <span>'.$s1_desc.'</span>
          </a>
        </div>';
    $servicesHtml .= '
        <div class="service_item bg2">
          <a href="" alt="">
            <i class="icon ff-'.$s2_icon.'"></i>
            <p>'.$s2_title.'</p>
            <span>'.$s2_desc.'</span>
          </a>
        </div>';
    $servicesHtml .= '
        <div class="service_item bg3">
          <a href="" alt="">
            <i class="icon ff-'.$s1_icon.'"></i>
            <p>'.$s3_title.'</p>
            <span>'.$s3_desc.'</span>
          </a>
        </div>';
    $servicesHtml .= '
        <div class="service_item bg4">
          <a href="" alt="">
            <i class="icon ff-'.$s4_icon.'"></i>
            <p>'.$s4_title.'</p>
            <span>'.$s4_desc.'</span>
          </a>
        </div>';
    $servicesHtml .= '
        <div class="service_item bg5">
          <a href="" alt="">
            <i class="icon ff-'.$s5_icon.'"></i>
            <p>'.$s5_title.'</p>
            <span>'.$s5_desc.'</span>
          </a>
        </div>';
    $servicesHtml .= '
    </div>
    <!-- SERVICES -->';

	return $servicesHtml;
}
// register your shortcode
add_shortcode('services', 'services_shortcode');


// Create function. Everything will be done here.
function services($motopressCELibrary) {

    global $motopressCELang;
        $servicesObject = new MPCEObject('services', _('Services'), 'accordion.png', array(
          's1_title' => array(
              'type' => 'text',
              'label' => __('Service 1 - Title', 'roots'),
              'default' => '',
          ),
          's1_desc' => array(
              'type' => 'longtext',
              'label' => __('Service 1 - Description', 'roots'),
              'default' => '',
          ),
          's1_icon' => array(
              'type' => 'select',
              'label' => __('Service 1 - Icon', 'roots'),
              'default' => '',
              'list' => array(
                '' => '--- Select value ---',
                'battery' => 'Battery',
                'adjust' => 'Adjust',
                'water' => 'Water',
                'wheel' => 'Wheel',
                'cardoor' => 'Car Door'
              )
          ),
          's2_title' => array(
              'type' => 'text',
              'label' => __('Service 2 - Title', 'roots'),
              'default' => '',
          ),
          's2_desc' => array(
              'type' => 'longtext',
              'label' => __('Service 2 - Description', 'roots'),
              'default' => '',
          ),
          's2_icon' => array(
              'type' => 'select',
              'label' => __('Service 2 - Icon', 'roots'),
              'default' => '',
              'list' => array(
                '' => '--- Select value ---',
                'battery' => 'Battery',
                'adjust' => 'Adjust',
                'water' => 'Water',
                'wheel' => 'Wheel',
                'cardoor' => 'Car Door'
              )
          ),
          's3_title' => array(
              'type' => 'text',
              'label' => __('Service 3 - Title', 'roots'),
              'default' => '',
          ),
          's3_desc' => array(
              'type' => 'longtext',
              'label' => __('Service 3 - Description', 'roots'),
              'default' => '',
          ),
          's3_icon' => array(
              'type' => 'select',
              'label' => __('Service 3 - Icon', 'roots'),
              'default' => '',
              'list' => array(
                '' => '--- Select value ---',
                'battery' => 'Battery',
                'adjust' => 'Adjust',
                'water' => 'Water',
                'wheel' => 'Wheel',
                'cardoor' => 'Car Door'
              )
          ),
          's4_title' => array(
              'type' => 'text',
              'label' => __('Service 4 - Title', 'roots'),
              'default' => '',
          ),
          's4_desc' => array(
              'type' => 'longtext',
              'label' => __('Service 4 - Description', 'roots'),
              'default' => '',
          ),
          's4_icon' => array(
              'type' => 'select',
              'label' => __('Service 4 - Icon', 'roots'),
              'default' => '',
              'list' => array(
                '' => '--- Select value ---',
                'battery' => 'Battery',
                'adjust' => 'Adjust',
                'water' => 'Water',
                'wheel' => 'Wheel',
                'cardoor' => 'Car Door'
              )
          ),
          's5_title' => array(
              'type' => 'text',
              'label' => __('Service 5 - Title', 'roots'),
              'default' => '',
          ),
          's5_desc' => array(
              'type' => 'longtext',
              'label' => __('Service 5 - Description', 'roots'),
              'default' => '',
          ),
          's5_icon' => array(
              'type' => 'select',
              'label' => __('Service 5 - Icon', 'roots'),
              'default' => '',
              'list' => array(
                '' => '--- Select value ---',
                'battery' => 'Battery',
                'adjust' => 'Adjust',
                'water' => 'Water',
                'wheel' => 'Wheel',
                'cardoor' => 'Car Door'
              )
          ),
        ), 11, MPCEObject::ENCLOSED, MPCEObject::RESIZE_NONE);
//        $servicesItemObject = new MPCEObject('service_item', _('Service'), null, array(
//          's1_title' => array(
//              'type' => 'text',
//              'label' => __('Service 1 - Title', 'roots'),
//              'default' => '',
//          ),
//          's1_url' => array(
//              'type' => 'text',
//              'label' => __('Service 1 - Url', 'roots'),
//              'default' => '',
//          ),
//          's1_desc' => array(
//              'type' => 'longtext',
//              'label' => __('Service 1 - Description', 'roots'),
//              'default' => '',
//          ),
//          's1_icon' => array(
//              'type' => 'select',
//              'label' => __('Service 1 - Icon', 'roots'),
//              'default' => '',
//              'list' => array(
//                '' => '--- Select value ---',
//                'battery' => 'Battery',
//                'adjust' => 'Adjust',
//                'water' => 'Water',
//                'wheel' => 'Wheel',
//                'cardoor' => 'Car Door'
//              )
//          ),
//        ), 11, MPCEObject::ENCLOSED, MPCEObject::RESIZE_NONE, false);

	// Add this object into any group you need
	$motopressCELibrary->addObject($servicesObject);
}

// Integrate your shortcode into MotoPress Content Editor
add_action('mp_library', 'services', 10, 2);



