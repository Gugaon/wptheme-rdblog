<?php get_header(); ?>

		<section id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="page" id="page-<?php the_ID(); ?>">
				<div class="entry">
					<header>
						<h1><?php the_title(); ?></h1>
					</header>

					<?php the_content('Leia mais...'); ?>                        
					<hr />
				</div> <!-- end .entry -->
			</article> <!-- end #page-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>

		<?php endwhile; else: ?>
<?php include (TEMPLATEPATH . '/frag-noposts.php'); ?>
		<?php endif; ?>
		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>