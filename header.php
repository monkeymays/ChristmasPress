<?php
/**
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;
 
wp_title( '|', true, 'right' );
 
// Add the blog name.
bloginfo( 'name' );
 
// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";
 
// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', 'christmaspress' ), max( $paged, $page ) );
 
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="header-wrapper" role="banner">
		<div id="header">
			<div id="website-name" class="website-name"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
	   			<div class="slogan"><?php bloginfo('description'); ?>
				</div>
			</div>
		</div>
	</header>
		<div id="main-nav" role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
<div id="main" class="site-main">