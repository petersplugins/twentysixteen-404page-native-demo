<?php
/**
 * This is for 404page native mode demo
 *
 */

global $pp404;
 
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
    
		do {
      
      // using a do while loop ensures that the loop is exuted at least once even if there are no posts - as in case of a 404 error
      
      if ( !is_404() ) {
        the_post();
      }

			// Include the single post content template.
      get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( !is_404() && ( comments_open() || get_comments_number() ) ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		}  while ( have_posts() );
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
