<div class="sidebar">
                        <div class="sidebar-search sidebar-wideget wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('search') ) : ?><?php endif; ?>
                        </div>
						    <div class="sidebar-categories sidebar-wideget  wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h4>Categories</h4></div>
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('categories') ) : ?><?php endif; ?>
                        </div>
                        <div class="sidebar-post sidebar-wideget  wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h4>recent posts</h4></div>
								<?php 
		$team = new WP_Query('posts_per_page=10&orderby=post_date&order=DESC');
		while($team->have_posts()) : $team->the_post();
		?>
               <?php $team_img= wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                           <div class="single-post">
                                <div class="img-box"><a href="<?php the_permalink(); ?>"><figure><img src="<?php echo $team_img; ?>" alt="" height="80px" width="80px"></figure></a></div>
                                <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                <div class="date"><?php the_time('jS, F Y'); ?></div>
                            </div><?php endwhile; ?>
                        </div>
                        <div class="sidebar-archive sidebar-wideget  wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h4>archive</h4></div>
                           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('archive') ) : ?><?php endif; ?>
                        </div>
                        <div class="sidebar-keywords sidebar-wideget  wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h4>keywords</h4></div>
                           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('keyword') ) : ?><?php endif; ?>
                        </div>
                    </div>