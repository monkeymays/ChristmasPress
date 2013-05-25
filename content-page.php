<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->
    	     	                <?php the_post_thumbnail(); ?>
     <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'christmaspress' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'christmaspress' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->