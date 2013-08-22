		<div class="clear"></div>
		<footer>
			<header><span><?php bloginfo( 'name' ); ?></span></header>
			<div id="description">
				<?php theme_footer_desc(); ?>
			</div>
			<div id="extras">
				<div>
					<h3>Contato</h3>
					<ul class="profiles">
						<?php if ( is_option_setted('webprofile_linkedin_id') ) { ?><li class="linkedin_icon"><a href="http://www.linkedin.com/company/<?php theme_webprofile_linkedin_id(); ?>" target="_blank"><span>Linkedin</span></a></li><?php } ?>
						<?php if ( is_option_setted('webprofile_facebook') ) { ?><li class="facebook_icon"><a href="http://www.facebook.com/<?php theme_webprofile_facebook(); ?>" target="_blank"><span>Facebook</span></a></li><?php } ?>
						<?php if ( is_option_setted('webprofile_twitter') ) { ?><li class="twitter_icon"><a href="http://twitter.com/<?php theme_webprofile_twitter(); ?>" target="_blank"><span>Twitter</span></a></li><?php } ?>
						<?php if ( is_option_setted('contact_link') ) { ?><li class="email_icon"><a href="<?php theme_contact_link(); ?>"><span>E-mail</span></a></li><?php } ?>
					</ul>
				</div>
			<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
			<!--
				<div>
					<h3>Clientes atuais</h3>
					<img src="<?php bloginfo( 'template_url' ); ?>/images/marcas.png" alt="Nossos clientes" />    
				</div>
			-->
			<?php endif ?>
			</div>
			<div class="clear"></div><hr />
			<div id="copyright">Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>.</div>
		</footer>
	</div><!-- #wrapper -->
	<div id="footer-stripe"></div>

<?php wp_footer(); ?>


	<script>
		
		var scrollerTopOffset = $(".banner").offset().top;
		var scrollerHeight = $(".banner").height();
		var scrollerTopMargin = (scrollerTopOffset - scrollerHeight) - 20;
		
		$(window).scroll(function(){

			var bodyScrollTop = $(window).scrollTop();

			if (bodyScrollTop > scrollerTopMargin ) {
				$(".banner").css({ position: "fixed", top: "20px" });
			}
			else if (bodyScrollTop <= scrollerTopMargin) {
				$(".banner").css({ position: "relative", top: "" });
			}					
		
		});

	</script>
</body>
</html>