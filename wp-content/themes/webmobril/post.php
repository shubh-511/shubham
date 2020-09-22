<?php get_header();?>
 <?php if (have_posts()) : 
	while (have_posts()) : the_post(); 
						 
 	get_template_part('content'); 
	
    endwhile; ?>	
	<?php endif; ?>	
<?php get_footer(); ?>