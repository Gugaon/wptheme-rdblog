  <?php if ( $related_query->have_posts() ) : ?>
          <p class="more">Leia também:</p>
          <ol>
          <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
            <li><a href="<?php the_permalink() ?>?ref=yarpp" rel="bookmark"><?php the_title(); ?></a><!-- (<?php the_score(); ?>)--></li>
          <?php endwhile; ?>
          </ol>
  <?php endif; ?>
