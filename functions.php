<?php
/**
 * ChristmasPress functions and definitions
 *
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'christmaspress_setup' ) ):

function christmaspress_setup() {
 
    require( get_template_directory() . '/inc/template-tags.php' );
 
    require( get_template_directory() . '/inc/tweaks.php' );
 
    load_theme_textdomain( 'christmaspress', get_template_directory() . '/languages' );
 
   
    add_theme_support( 'automatic-feed-links' );
 
    add_theme_support( 'post-formats', array( 'aside' ) );
 
   
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'christmaspress' ),
    ) );
}
endif; 
add_action( 'after_setup_theme', 'christmaspress_setup' );

function christmaspress_scripts() {

    wp_enqueue_script( 'christmaspress_xmascount', get_template_directory_uri() . '/js/xmascount.js' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }

}
add_action( 'wp_enqueue_scripts', 'christmaspress_scripts' );

function christmaspress_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'christmaspress' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'christmaspress' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'christmaspress_widgets_init' );

add_theme_support('post-thumbnails');
set_post_thumbnail_size(620, 550, true);

class christmaspress_axmascount extends WP_Widget {
  function christmaspress_axmascount()
  {
    $widget_ops = array('classname' => 'christmaspress_axmascount', 'description' => 'Drag this widget to your sidebar to display the ChristmasPress default Christmas countdown.' );
    $this->WP_Widget('christmaspress_axmascount', 'Christmas Countdown', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
}
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 

    echo '<div id="countdown"><div class="countdown-text">
          <script type="text/javascript">
          <!--
          christmaspress_xmascount();
          //--></script></div></div>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("christmaspress_axmascount");') );


function christmaspress_dotborder() {  
    return '<div id="dot-border"></div>';  
}  
add_shortcode('dotborder', 'christmaspress_dotborder');

function christmaspress_countdown() {  
    return '<div style="float:left;padding-right:15px;"><div id="countdown">
<div class="countdown-text">
<script type="text/javascript">
<!--
christmaspress_xmascount();
//--></script>
</div>
</div></div>';  
}  
add_shortcode('christmas-countdown', 'christmaspress_countdown');

function christmaspress_gravatar ($avatar_defaults) {
  $myavatar = get_template_directory_uri() . '/images/gravatar-icon.png';
  $avatar_defaults[$myavatar] = "ChristmasPress Guest";
  return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'christmaspress_gravatar' );

function christmaspress_excerpt_more($more) {
  global $post;
  return '<a href="'. get_permalink($post->ID) . '"><i> ...Continue Reading...
          </i></a>';
}
add_filter('excerpt_more', 'christmaspress_excerpt_more');
