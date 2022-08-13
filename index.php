<?php
get_header();
?>
<main id="primary" class="site-main container">
	<section>
		<?php get_template_part('template-parts/create-todo'); ?>
	</section>
	<section class="mb-4">
		<?php get_template_part('template-parts/all-todos'); ?>
	</section>
</main>
