<?php
	/*
	Template Name: Projecten
	*/
	get_header();
?>
	<?php
		$main_section = get_field('main_section');
		if(!empty($main_section) && count($main_section)) :
	?>
	<section class="mainSection">
		<div class="container">
			<div class="mainSection-wrapper">
				<div class="mainSection-left revealator-slideright revealator-once">
					<?php if(!empty($main_section['heading'])) : ?>
					<h1 class="mainSection-heading">
						<?php echo $main_section['heading']; ?>
					</h1>
					<?php endif; ?>
					<?php if(!empty($main_section['description'])) : ?>
					<div class="mainSection-description">
						<?php echo $main_section['description']; ?>
					</div>
					<?php endif;?>
				</div>
<!--				<div class="mainSection-right">-->
<!--					--><?php //if(!empty($main_section['images'])) : ?>
<!--					<ul class="mainSection-decorative">-->
<!--						--><?php //foreach ($main_section['images'] as $item) : ?>
<!--						<li class="mainSection-item">-->
<!--							<img class="mainSection-img" src="--><?php //echo $item['image']['url']; ?><!--" alt="--><?php //echo $item['image']['alt']; ?><!--">-->
<!--						</li>-->
<!--						--><?php //endforeach;?>
<!--						<li class="mainSection-item mainSection-item--empty"></li>-->
<!--						<li class="mainSection-item mainSection-item--empty"></li>-->
<!--						<li class="mainSection-item mainSection-item--empty"></li>-->
<!--						<li class="mainSection-item mainSection-item--empty"></li>-->
<!--						<li class="mainSection-item mainSection-item--empty"></li>-->
<!--					</ul>-->
<!--					--><?php //endif; ?>
<!--				</div>-->
        <div class="singleProject-right">
          <div class="singleProject-thumbnail">
						<?php the_post_thumbnail();?>
<!--            <ul class="singleProject-circles">-->
<!--              <li class="singleProject-circle"></li>-->
<!--              <li class="singleProject-circle"></li>-->
<!--              <li class="singleProject-circle"></li>-->
<!--              <li class="singleProject-circle"></li>-->
<!--              <li class="singleProject-circle"></li>-->
<!--            </ul>-->
          </div>
        </div>
			</div>
		</div>
	</section>
	<?php endif; ?>
  <section class="allProjects">
    <div class="container">
      <?php
				$categories = get_categories( [
					'taxonomy'     => 'project_category',
					'type'         => 'project',
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => false,
				] );
      ?>
      <ul class="allProjects-list">
        <li class="allProjects-item allProjects-item--enabled active" data-filter="*">
					Alle
        </li>
        <?php foreach ($categories as $category) :
            $category_name = trim($category -> name);
            $category_slug = trim($category -> slug);
            if($category -> count > 0) {
							$category_class = 'allProjects-item--enabled';
            }else{
							$category_class = 'allProjects-item--disabled';
						}
          ?>
        <li class="allProjects-item <?php echo $category_class; ?>" data-filter=".<?php echo $category_slug; ?>">
					<?php echo $category_name; ?>
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="allProjects-grid">
        <?php
					$projects = get_posts( array(
						'numberposts' => -1,
						'orderby'     => 'date',
						'order'       => 'DESC',
						'post_type'   => 'project',
						'suppress_filters' => true,
					) );
					
					
					foreach ($projects as $project) :
            $id = $project -> ID;
            $title = $project -> post_title;
            $link = $project -> guid;
            $description = short_something($project -> post_content, 166);
            $thumbnail = get_the_post_thumbnail_url($id);
            $link_text = get_field('project', $id)['show_more_btn'];
            $terms = get_the_terms($id, 'project_category');
					  $classes = [];
					  foreach ($terms as $term) {
					    $classes[] = $term -> slug;
            }
            $classes = implode (' ', $classes);
						?>
          <div class="project <?php echo $classes; ?>">
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
    </div>
  </section>
<?php
  include_once('contactForm.php');
	get_footer();
?>
