<?php
/**
 * This is for 404page native mode demo
 *
 */
 
global $pp404;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <h1 class="entry-title">
      <?php 
        if ( is_404() ) {
            if ( $pp404 ) {
              pp_404_the_title();
            } else {
              echo 'Ooops, something went wrong here...';
            }
        } else {
          the_title(); 
        }
      ?>
    </h1>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
    <?php 
      if ( is_404() ) {
          if ( $pp404 ) {
            pp_404_the_content();
            echo '<p><strong>&gt;&gt;&gt; THIS MESSAGE INDICATES THAT THE 404page NATIVE MODE IS WORKING PROPERLY &lt;&lt;&lt;</p>';
          } else {
            echo '<p>This child theme was made to demonstrate the native mode of the 404page plugin.</p>';
            echo '<p>There is not custom 404 error page to display. To make this work please ensure that</p>';
            echo '<ul>';
            echo '<li>the 404page plugin is installed and activated</li>';
            echo '<li>a custom 404 error page was selected</li>';
            echo '<li>the selected page still exists</li>';
            echo '</ul>';
          }
      } else {
        the_content();
      }

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( ! is_404() ) { twentysixteen_entry_meta(); } ?>
		<?php if ( ! is_404() ) {
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
    ); }
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
