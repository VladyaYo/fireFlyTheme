<?php
	/**
	 * The template for displaying all single posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package watt
	 */
	
	get_header();
?>
		<?php
			while ( have_posts() ) : the_post();
				$project_fields = get_field('project');
				$numbers = $project_fields['numbers'];
				$related_project = $project_fields['related_project'];
			?>
				<section class="singleProject">
					<div class="container">
            <div class="singleProject-breadcrumb">
              <a href="<?php echo get_page_link(41); ?>">
								<?php echo get_the_title(41); ?>
              </a> | <span><?php the_title(); ?></span>
            </div>
						<div class="singleProject-wrapper">
							<div class="singleProject-left revealator-slideright revealator-once">
								<h1 class="singleProject-heading">
									<?php the_title(); ?>
								</h1>
								<div class="singleProject-description">
									<?php the_content();?>
								</div>
							</div>
							<div class="singleProject-right">
								<div class="singleProject-thumbnail">
									<?php the_post_thumbnail();?>
<!--									<ul class="singleProject-circles">-->
<!--										<li class="singleProject-circle"></li>-->
<!--										<li class="singleProject-circle"></li>-->
<!--										<li class="singleProject-circle"></li>-->
<!--										<li class="singleProject-circle"></li>-->
<!--										<li class="singleProject-circle"></li>-->
<!--									</ul>-->
								</div>
							</div>
						</div>
					</div>
				</section>
        <?php if(!empty($numbers) && count($numbers)) :?>
        <section class="numbers">
          <div class="container">
            <?php if(!empty($numbers['heading'])) : ?>
            <div class="numbers-heading">
              <?php echo $numbers['heading']; ?>
            </div>
            <?php endif; ?>
            <ul class="numbers-list">
              <?php if(!empty($numbers['number_of_lamps'])) : ?>
                <li class="numbers-item">
                  <span class="numbers-icon numbers-icon--lamp"></span>
                  <p class="numbers-text">
                    <span class="numbers-count"><?php echo $numbers['number_of_lamps']; ?></span>
                    <span>&nbsp;Lampen vervangen</span>
                  </p>
                </li>
              <?php endif; ?>
              <?php if(!empty($numbers['euro_saved_per_year'])) : ?>
                <li class="numbers-item">
                  <span class="numbers-icon numbers-icon--euro"></span>
                  <p class="numbers-text">
                    <span class="numbers-count"><?php echo $numbers['euro_saved_per_year']; ?></span>
                    <span>&nbsp;per jaar bespaard</span>
                  </p>
                </li>
              <?php endif; ?>
              <?php if(!empty($numbers['kwh_saved_per_year'])) : ?>
                <li class="numbers-item">
                  <span class="numbers-icon numbers-icon--energy"></span>
                  <p class="numbers-text">
                    <span class="numbers-count"><?php echo $numbers['kwh_saved_per_year']; ?></span>
                    <span>&nbsp;kwh per jaar bespaard</span>
                  </p>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </section>
        <?php endif; ?>
        <?php if(!empty($project_fields['gallery'])) : ?>
        <section class="gallery">
          <div class="container">
              <?php if(!empty($project_fields['gallery_title']) && !empty($project_fields['gallery_description'])) : ?>
                <div class="gallery-item gallery-item--text gallery-item--mob">
                  <div class="gallery-content">
                    <h4 class="gallery-title">
                      <?php echo $project_fields['gallery_title']; ?>
                    </h4>
                    <div class="gallery-description">
                      <?php echo $project_fields['gallery_description']; ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <div class="swiper-container gallery-slider">
                <div class="swiper-wrapper gallery-list">
              <?php if(!empty($project_fields['gallery_title']) && !empty($project_fields['gallery_description'])) : ?>
                <div class="swiper-slide gallery-item--desc">
                  <div class="gallery-item gallery-item--text">
                    <div class="gallery-content">
                      <h4 class="gallery-title">
												<?php echo $project_fields['gallery_title']; ?>
                      </h4>
                      <div class="gallery-description">
												<?php echo $project_fields['gallery_description']; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php foreach ($project_fields['gallery'] as $image) :?>
              <div class="swiper-slide">
                <div class="gallery-item">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
              </div>
              <?php endforeach; ?>
          </div>
                <div class="swiper-pagination"></div>
          </div>
          </div>
        </section>
        <?php endif; ?>
        <?php
					
					$current_post_id = get_the_ID();
					$taxonomy = get_taxonomies()['project_category'];
					$terms = get_the_terms($current_post_id, $taxonomy);
					$terms_ids = [];
					foreach ($terms as $term){
						$terms_ids[] = $term -> term_id;
					}
					$posts = get_posts( array(
						'numberposts' => 2,
						'orderby'     => 'date',
						'order'       => 'DESC',
						'exclude'     => array($current_post_id),
						'post_type'   => 'project',
						'suppress_filters' => true,
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy,
								'terms' => $terms_ids,
							)
						)
					) );
					if(!empty($posts) && count($posts)) :
        ?>
        <section class="related">
          <div class="container">
            <?php if(!empty($related_project['heading'])) : ?>
            <div class="related-heading">
              <?php echo $related_project['heading']; ?>
            </div>
            <?php endif; ?>
            <div class="related-items">
              <?php foreach ($posts as $post) :
                $id = $post -> ID;
                $title = $post -> post_title;
                $link = $post -> guid;
                $description = short_something($post -> post_content, 166);
                $thumbnail = get_the_post_thumbnail_url($id);
                $link_text = get_field('project', $id)['show_more_btn'];
								$all_link = get_page_link(41);
              ?>
                <div class="project">
                  <a href="<?php echo $link; ?>" class="project-img">
                    <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>">
                  </a>
                  <div class="project-content">
                    <h4 class="project-title">
                      <?php echo $title; ?>
                    </h4>
                    <div class="project-description">
                      <?php echo $description; ?>
                    </div>
                    <a class="project-link" href="<?php echo $link; ?>"><?php echo $link_text; ?></a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
						<?php if(!empty($related_project['button_text'])) : ?>
              <div class="related-actions">
                <a href="<?php echo $all_link; ?>" class="btn btn--large">
									<?php echo $related_project['button_text']; ?>
                </a>
              </div>
						<?php endif;?>
          </div>
        </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php
	get_footer();
