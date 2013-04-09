				<aside class="social<?php if ( is_single() || is_page() ) { echo "_floating"; } ?>">
				<?php if (function_exists('btn_vert_tweet')) : ?>
					<?php btn_vert_tweet(); ?><br />
					<div class="vspace"></div>
				<?php endif; ?>
				<?php if (function_exists('btn_vert_fblike')) : ?>
					<?php btn_vert_fblike(); ?><br />
					<div class="vspace"></div>
				<?php endif; ?>
				<?php if (function_exists('btn_vert_gplusone')) : ?>
					<?php btn_vert_gplusone(); ?><br />
					<div class="vspace"></div>
				<?php endif; ?>
				<?php if (function_exists('btn_vert_linkedin')) : ?>
					<?php btn_vert_linkedin(); ?><br />
					<div class="vspace"></div>
				<?php endif; ?>
				<?php if (function_exists('wp_email')) : ?>
					<?php email_link(); ?><br />
					<div class="vspace"></div>
				<?php endif; ?>
				</aside>