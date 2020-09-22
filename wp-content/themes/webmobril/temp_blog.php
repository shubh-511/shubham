<?php
/*
Template Name: Blog Page Template
*/

/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="page-title">
        <div class="container">
            <div class="content-box">
			<div><h1><?php the_title(); ?></h1></div>
                <ul class="bread-crumb"> 
                    <li><a href="index.html">Home</a></li>
                    <li>&nbsp;/&nbsp;</li>
                    <li>Blog</li>
                </ul>
                
            </div>
        </div>
    </section>

 <section class="blog-details sidebar-page-container news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 content-side">


 <div class="vspace"></div>
    <div class="portfolio">
        <div id="options" class="clearfix">
            <ul id="filter" class="option-set clearfix" data-option-key="filter">
       <?php          $taxonomies = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => false
) );
 
if ( !empty($taxonomies) ) :
    $output = '';
    foreach( $taxonomies as $category ) {
        if( $category->parent == 0 ) {
			$image = get_field('cat_image', 'trophies_categories_'.$category->term_id);
            $output.= '<li><a href="'. esc_url( get_term_link( $category ) ) .'" data-filter=".'. esc_attr( $category->slug ) .' "> 
			'. esc_attr( $category->name ) .'';
            
            $output.='</a></li>';
        }
    }
    $output.='';
    echo $output;
	//print_r($category); 
endif; ?>
				
                
            </ul>
        </div>
        <ul id="isotope-container" class="clearfix fullwidth-portfolio fullwidth-portfolio1 intro1">
		<?php //
global $post; 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array( 'posts_per_page' => 15, 'order'=> 'DESC', 'orderby' => 'ID','paged' => $paged);
$the_query = new WP_Query( $args );  
if($the_query->have_posts()) 
	{ ?>  
 <?php while ( $the_query->have_posts() ) {
	  $the_query->the_post(); 
  ?>
				<?php $cma_blog_img= wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<li class="isotope-item col-md-4  item view">
                <div class="image-wrapper">
                    
					<div class="image-overlay">
                        <div class="arrow-left"></div>
                        <div class="rectangle"></div>
                    </div>
					
                    
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $cma_blog_img; ?>" alt="img" /></a>
                   
                </div>
				
				<div class="blog-desc" style="border: 3px solid #ff7326;
    padding: 10px;"> <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a></h2><?php the_excerpt(); ?>
					</div>
            </li><?php } } else { ?>

            <p><?php _e( 'No Record Found.' ); ?></p>



<?php }  ?>  
<?php
$pages = '';
$range=2;
$showitems = ($range * 2)+1;  
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '')
	{
		global $the_query;
		$pages = $the_query->max_num_pages;
		if(!$pages)
		{
		$pages = 1;
		}
		}   
		if(1 != $pages)
			{
		echo "<div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center'>
                        <div class='pagination-area'>";

         echo "<ul>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";



         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? " <li class='active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":" <li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a><li>";

             }

         }



         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";

         echo "</ul>\n";

		 echo "</div>
                    </div>
                </div>\n";

     }


wp_reset_postdata();
	 ?>
			
			
			
			

            
	            
<?php            // print_r($category); 
     ?>   </ul>
    </div>
    <div class="vspace"></div>



</div></div>
        </div>
    </section>



				
<?php get_footer(); ?>	