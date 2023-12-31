<?php

/* Front page (index / blog page) template */

get_header(); ?>

		<section id="container">
			<div id="content" role="main">
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <nav id="nav-below">
      <div class="nav-previous">
        <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'coffee' ) ); ?>
      </div>
      <div class="nav-next">
        <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'coffee' ) ); ?>
      </div>
    </nav>
    <!-- end nav-below -->
    <?php endif; ?>
	
			
			 </div><!-- #content -->
		         </section><!--#container -->
			  
		   <?php get_sidebar();  ?>
		    <?php get_footer(); ?>
