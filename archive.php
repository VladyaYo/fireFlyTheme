<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package watt
 */

get_header();
	$id = get_queried_object()->term_id;
?>
  <section class="blog">
  <div class="container">
  <ul class="filterBar">
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
  <?php if(is_category()) : ?>
  <div class="blog-heading">
    CATEGORIE ARCHIEVEN: <?php echo get_cat_name($id); ?>
  </div>
  <?php elseif (is_tag()) : ?>
  <div class="blog-heading">
    Tag: <?php echo get_tag($id) -> name; ?>
  </div>
	<?php else: ?>
    <div class="blog-heading">
      <?php echo get_the_archive_title($id); ?>
    </div>
  <?php endif; ?>
  <div class="blog-wrapper">
    <div class="blog-grid">

		<?php if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

        $title = get_the_title();
        $id = get_the_ID();
        $thumbnail = get_the_post_thumbnail_url();
        $permalink = get_the_permalink();
        $day = get_the_date('d');
        $month = get_the_date('M');
        ?>
          <div class="project">
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
			<?php endif;?>
			</div>
		<?php
			wp_pagenavi()
		?>
	</div>
</section>
<?php
  include_once('contactForm.php');
get_footer();
