<?php
	/*
	Template Name: Blog
	*/
	get_header();
?>
<section class="blog">
	<div class="container">
    <ul class="filterBar revealator-fade revealator-once">
      <li class="filterBar-element">
        <button class="btn filterBar-btn">Filter</button>
        <div class="filterBar-submenu">
          <p class="filterBar-title">
            Categorieën
          </p>
          <?php
						$categories = get_categories( [
							'taxonomy'     => 'category',
							'type'         => 'post',
							'orderby'      => 'name',
							'order'        => 'ASC',
							'hide_empty'   => 1,
						] );
          ?>
          <ul class="filterBar-list">
            <?php foreach ($categories as $category) :
                $category_id = $category -> term_id;
                $category_name = $category -> name;
                $category_link = get_category_link($category_id);
              ?>
              <li class="filterBar-item">
                <a class="filterBar-link" href="<?php echo $category_link?>">
                  <?php echo $category_name; ?>
                </a>
              </li>
            <?php endforeach;?>
          </ul>
          <p class="filterBar-title">
            Archief
          </p>
					<?php
						$archives = wp_get_archives( [
							'type'     => 'yearly',
							'format'          => 'html',
							'before'          => '',
							'after'           => '',
							'show_post_count' => false,
							'echo'            => false,
							'post_type'       => 'post',
						] );
					?>
          <ul class="filterBar-archives">
              <?php echo $archives; ?>
          </ul>
        </div>
      </li>
      <li class="filterBar-element">
        <button class="btn filterBar-btn">Tags</button>
        <div class="filterBar-submenu">
          <p class="filterBar-title">
            Tags
          </p>
          <?php
						wp_tag_cloud( array(
							'smallest'  => 12,
							'largest'   => 12,
							'unit'      => 'px',
							'number'    => 0,
							'format'    => 'list',
							'orderby'   => 'name',
							'order'     => 'ASC',
							'exclude'   => null,
							'include'   => null,
							'link'      => 'view',
							'taxonomy'  => 'post_tag',
							'echo'      => true,
							'topic_count_text_callback' => 'default_topic_count_text',
						) );
          ?>
        </div>
      </li>
    </ul>
		<div class="blog-wrapper">
			<div class="blog-grid">
				<?php
					$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'posts_per_page'  => 4,
						'post_type' => 'post',
						'orderby' => 'date',
						'order' => 'ASC',
						'paged' => $current_page
					);
					
					query_posts( $args );
					$wp_query->is_archive = true;
					$wp_query->is_home = false;
					while(have_posts()): the_post(); ?>
						<?php
						$title = get_the_title();
						$id = get_the_ID();
						$thumbnail = get_the_post_thumbnail_url();
						$permalink = get_the_permalink();
						$day = get_the_date('d');
						$month = get_the_date('M');
						?>
						<div class="project revealator-zoomin revealator-once">
							<a href="<?php echo $permalink; ?>" class="project-img">
								<img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>">
                <div class="project-date">
                  <span><?php echo $day; ?></span>
                  <span><?php echo $month; ?></span>
                </div>
							</a>
							<div class="project-content">
								<h4 class="project-title">
									<?php echo $title; ?>
								</h4>
								<div class="project-description">
									<?php short_content(100); ?>
								</div>
								<a class="project-link" href="<?php echo $permalink; ?>">Read more</a>
							</div>
						</div>
					<?php endwhile; ?>
			</div>
		</div>
		<?php
			wp_pagenavi()
		?>
	</div>
</section>

<?php
	include_once('contactForm.php');
	get_footer(); ?>
