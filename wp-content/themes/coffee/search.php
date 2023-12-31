<?php
/**
*Template for displaying Search Results pages. 
*/

get_header(); ?>

             <section id="container">
			<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
			
			   <header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'coffee' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					
				</header>
		    
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
			      <?php else : ?>

				<article id="post-0" class="post no-results not-found">
			    <div class="entry-content">
	<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'coffee' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
				
				
			<?php endif; ?>
	       </section><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
