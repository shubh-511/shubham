    <!-- page title -->
    <div class="about-bg centered">
        <div class="container">
            <div class="text"><?php the_title(); ?></div>
        </div>
    </div>

    
    <!-- call-back-section -->
    <section style="background-image:url(images/c-bg.jpeg); background-size: 100% 100%;" class="call-back contact-info">
        <div class="container">
            <div class="row">
                <div  class="col-md-12 col-sm-12 col-xs-12 colmun">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-entry">
					  <?php the_content(); ?>
				    </div>
		
				 </article>
              </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->    