<?php get_header(); ?>

		<section id="content">
			<h1>Posts para <?php wp_title(); ?></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>">

<?php include (TEMPLATEPATH . '/frag-social.php'); ?>

				<div class="entry">
					<header>
						<p class="post-meta"><time><?php the_time( 'j F Y' ); ?></time> | <span class="author">Por <?php the_author_posts_link() ?></span><!-- <a rel="author" href="<?php the_author_meta('jabber'); ?>" target="_blank" ><img src="http://www.google.com/images/icons/ui/gprofile_button-16.png" width="12" height="12"></a> --></p>
						<h2><?php if ( !is_single() ) { echo '<a href="'; the_permalink(); echo '" rel="bookmark">'; } ?><?php the_title(); ?><?php if ( !is_single() ) { echo '</a>'; } ?></h2>
					</header>
					
					<?php if (function_exists('the_post_thumbnail')) the_post_thumbnail( array(250,9999), array( 'class' => ' alignleft' )); ?>
					<?php the_content( 'Leia mais...' ); ?>
					<hr />
				</div> <!-- end .entry -->
			</article> <!-- end #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>
			<nav>
				<?php if ( function_exists('wp_pagenavi') ) { ?>
					<?php wp_pagenavi(); ?>
				<?php } else { ?>
					<span><?php next_posts_link('&laquo; Posts anteriores'); ?></span>
					<span><?php previous_posts_link('Posts recentes &raquo;'); ?></span>
				<?php } ?>
			</nav>
		<?php else: ?>
<?php include (TEMPLATEPATH . '/frag-noposts.php'); ?>
		<?php endif; ?>
		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>