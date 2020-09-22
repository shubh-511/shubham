<?php get_header();?>
	<section class="page-title">
        <div class="container">
            <div class="content-box">
			<div><h1>Category</h1></div>
                <ul class="bread-crumb"> 
                    <li><a href="index.html">Home</a></li>
                    <li>&nbsp;/&nbsp;</li>
                    <li>category</li>
                </ul>
                
            </div>
        </div>
    </section> 
	 <section class="blog-details sidebar-page-container news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 content-side">
 <?php if (have_posts()) : 
	while (have_posts()) : the_post(); 
						 
 	get_template_part('content'); 
	
    endwhile; ?>	
	<?php endif; ?>	
	</div>
                <div class="col-md-3 col-sm-6 col-xs-12 sidebar-side">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>