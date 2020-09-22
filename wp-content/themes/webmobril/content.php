
                    <div class="blog-details-content">
                        <div class="content-style-one">
                            <?php if(has_post_thumbnail()) : ?><div class="img-box  wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><figure><?php the_post_thumbnail('full-thumb'); ?>        </figure></div><?php endif; ?>
                            <div class="lower-content single-item">
                                <div class="meta-content">
                                    <ul class="meta-left"> 
                                        <li>By <span><?php the_author(); ?></span></li>
                                        <li><?php the_time('jS, F Y'); ?></li>
                                    </ul>
                                   
                                </div>
                                <div class="title"><?php the_title(); ?></div>
                                <?php the_content(); ?>
                        </div>
                        <div class="post-share-option">
                            <ul class="left-option">
							<?php if(has_tag()) : ?>
			 <li>
				<?php the_tags("",""); ?>
			</li>
		<?php endif; ?>	
                                
                            </ul>
							<?php  $url = get_permalink($post->ID); 
			 $url = esc_url($url);
			?>
                            <div class="right-option">
                                <div class="text">Share</div>
                                <ul class="post-share">
                                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/share?url=<?php echo $url; ?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?url=<?php echo $url; ?>"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="http://pinterest.com/pin/create/link/?url=<?php echo $url; ?>"><i class="fa fa-pinterest"></i></a></li>
									                                </ul>
                            </div>
                        </div>
                    <?php if(is_single()) : ?>
                        <div class="comment-form  wow slideInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="comment-title"><h3>Post a Comment</h3></div>
                           <?php if ( comments_open() || get_comments_number() ) {
				comments_template();
			} ?>
                        </div><?php endif; ?>
                    </div>
                </div>
				
    <!-- blog details -->	
	

