<?php
/*
Template Name: Materiais p/ Download
*/
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="resources">
  <header class="clearfix">
    <hgroup id="htitle">
      <h1><?php the_title(); ?></h1>
      <div id="subdesc"><?php the_content(); ?></div>
    </hgroup>
    <div class="social-sharing-box">
      <div class="sm-share">
        <a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="<?php the_permalink(); ?>" data-count="vertical" data-text="<?php the_title(); ?>">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      <div class="sm-share">
        <div class="fb-like" data-send="false" data-href="<?php the_permalink(); ?>" data-layout="box_count" data-width="55" data-show-faces="false"></div>
      </div>
      <div class="sm-share">
        <div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>"></div>
      </div>
      <div class="sm-share">
        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="top"></script>
      </div>
    </div>
  </header>
  <aside>
    <h3>Filtrar itens</h3>
    <ul id="por_categoria">
      <?php
        $item = get_term_by('slug', 'downloads-tema', 'category');
        $cat_type = get_terms('category', array(
          'parent' => $item->term_id,
          'orderby' => 'name',
          'hide_empty' => true
         ));
        foreach ($cat_type as $cat):
      ?>
      <li>
        <input type="checkbox" id="<?php echo $cat->slug; ?>" value="<?php echo $cat->slug; ?>" /><label for="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></label>
        <ul id="por_categoria_<?php echo $cat->slug; ?>">
          <?php
            $scat_type = get_terms('category', array(
              'parent' => $cat->term_id,
              'orderby' => 'name',
              'hide_empty' => true
             ));
            foreach ($scat_type as $scat):
          ?>
          <li><input parent_category="<?php echo $cat->slug; ?>" class="parent_<?php echo $cat->slug; ?>" type="checkbox" id="<?php echo $scat->slug; ?>" value="<?php echo $scat->slug; ?>" />
            <label for="<?php echo $scat->slug; ?>"><?php echo $scat->name; ?></label></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endforeach; ?>
    </ul>
  </aside>

  <ul class="resources-grid featured">
    <?php
      $destaque = get_term_by('slug', 'downloads-destaque', 'category');
      $resources_list_args = array (
        'posts_per_page' => -1,
        'post_type' => 'resources',
        'cat' => $destaque->term_id,
        'orderby' => 'rand'
      );
      $resources_list = new WP_Query($resources_list_args);
      while ( $resources_list->have_posts() ) : $resources_list->the_post();
    ?>
    <li class="<?php echo get_all_categories(); ?>">
      <a href="<?php echo get_post_meta(get_the_ID(), '_resource_link', true); ?>">
        <span class="featured">Destaque</span>
        <figure><?php the_post_thumbnail('resource-thumbnail'); ?><figcaption>Clique e veja mais detalhes</figcaption></figure>
        <p><?php the_title(); ?></p>
      </a>
    </li>
    <?php 
      endwhile; 
      wp_reset_query();
    ?>
  </ul>
  <p class="no-posts invisible">Não existem itens disponíveis, por favor refina os filtros de busca</p>
  <ul class="resources-grid">
    <?php
      $resources_list_args = array (
        'posts_per_page' => -1,
        'post_type' => 'resources',
        'cat' => '-' . $destaque->term_id,
        'orderby' => 'rand'
      );
      $resources_list = new WP_Query($resources_list_args);
      while ( $resources_list->have_posts() ) : $resources_list->the_post();
    ?>
    <li class="<?php echo get_all_categories(); ?>">
      <a href="<?php echo get_post_meta(get_the_ID(), '_resource_link', true); ?>">
        <figure><?php the_post_thumbnail('resource-thumbnail'); ?><figcaption>Clique e veja mais detalhes</figcaption></figure>
        <p><?php the_title(); ?></p>
      </a>
    </li>
    <?php 
      endwhile; 
      wp_reset_query();
    ?>
  </ul>
</div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<?php endwhile; endif; ?>

<?php get_footer(); ?>