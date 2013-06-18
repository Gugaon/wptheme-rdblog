<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<title><?php if ( is_author() ) {
		echo 'Posts de &quot;'; wp_title(''); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_category() || is_tag() || is_archive() ) {
		echo 'Arquivo para &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Busca para &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	}  elseif ( is_404() ) {
		echo 'Erro 404 - Conteúdo não encontrado | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'description' ); echo ' | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		wp_title(''); echo ' | '; bloginfo( 'name' );
} ?></title>

<meta http-equiv="imagetoolbar" content="no" />
<meta property="fb:admins" content="159732357452275" /> 
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
	
<?php if ( is_option_setted('webprofile_feedburner') ) { ?>
  <link rel="alternate" type="application/rss+xml" title="Feed RSS" href="http://feeds.feedburner.com/<?php theme_webprofile_feedburner(); ?>" />
<?php } else { ?>
  <link rel="alternate" type="application/rss+xml" title="Feed RSS" href="<?php bloginfo('rss2_url'); ?>" />
<?php } ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/resources-style.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/modernizr.js"></script>   
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/script.js"></script> 
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/jquery.float.box.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/jquery.placeholder.js"></script>
	
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

  <div id="bg-stripe"></div>
	<div id="wrapper">
		<header>
			<div id="headerlogo">
        <?php if ( is_option_setted('logo_url') ) { ?>
          <a href="<?php theme_logo_link(); ?>" title="Página inicial"><img src="<?php theme_logo_url(); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
        <?php } else { ?>
          <a href="<?php bloginfo( 'siteurl' ); ?>" title="Página inicial"><?php bloginfo( 'name' ); ?></a>
        <?php } ?>
      </div>
			<div class="desc">
				<?php if ( is_home() || is_404() || is_category() || is_tag() || is_search() ) { ?>
				  <h1 id="headertitle"><?php theme_header_title(); ?></h1>
				<?php } else { ?>
				  <p id="headertitle"><?php theme_header_title(); ?></p>
				<?php } ?>

        <?php if ( is_home() || is_404() || is_search() ) { ?>
          <h2 id="headerdesc"><?php theme_header_desc(); ?></h2>
        <?php } else { ?>
          <p id="headerdesc"><?php theme_header_desc(); ?></p>
        <?php } ?>
			</div>
		</header>
		<nav>
			<ul>
				<li<?php if ( is_home() ) echo( ' class="current_page_item"' ); ?>><a href="<?php bloginfo( 'siteurl' ); ?>/">Blog</a></li>
				<?php wp_list_pages('title_li=&depth=1'); ?>
			</ul>
		</nav>
		<div id="search">
			<form method="get" action="<?php bloginfo( 'siteurl' ); ?>/">
				<input type="text" name="s" placeholder="Buscar" />
				<input type="submit" value="" />
			</form>
		</div>

    <?php if ( ! dynamic_sidebar( 'Site Top' ) ) : ?>
    <?php endif ?>
