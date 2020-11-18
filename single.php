<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package watt
 */

get_header();

while ( have_posts() ) :
  the_post(); ?>
  <div class="singlePost">
    <header class="singlePost-header revealator-fade revealator-once" style="background-image: url('<?php echo get_field('header_background_image');?>')">
      <div class="container">
        <button type="button" class="backBtn" onclick="history.back();">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.80912 7.99999L10.781 4.03124C11.0747 3.73749 11.0747 3.26249 10.781 2.97187C10.4872 2.67812 10.0122 2.68124 9.71849 2.97187L5.21849 7.46874C4.93412 7.75312 4.92787 8.20937 5.19662 8.50312L9.71536 13.0312C9.86224 13.1781 10.056 13.25 10.2466 13.25C10.4372 13.25 10.631 13.1781 10.7779 13.0312C11.0716 12.7375 11.0716 12.2625 10.7779 11.9719L6.80912 7.99999Z" fill="currentColor"/>
          </svg>
          BACK
        </button>
        <div class="singlePost-wrapper">
					<?php $categories = join( ", ", wp_get_post_categories(get_the_ID(), array(
						'fields' => 'names',
					))); ?>
					<?php if(!empty($categories)) : ?>
            <p class="singlePost-categories"><?php echo $categories; ?></p>
					<?php endif;?>
          <h4 class="singlePost-title"><?php the_title(); ?></h4>
          <p class="singlePost-date">Posted on <?php echo get_the_date('d M Y')?> by <?php echo get_the_author(); ?></p>
        </div>
      </div>
    </header>
    <div class="singlePost-wrapper">
      <div class="singlePost-content">
        <?php the_content(); ?>
      </div>
      <p class="singlePost-info">
				<?php $categories_arr = wp_get_post_categories(get_the_ID(), array(
					'fields' => 'ids',
				));
				  $categories_hrml = [];
				  foreach ($categories_arr as $id){
				    $categories_html[] = '<a href="' . get_category_link($id) . '">' . get_cat_name($id) . '</a>';
          }
				?>
        Dit bericht is gepost in <?php echo join(', ', $categories_html); ?>. Bookmark de
        <a href="#" class="js-bookmark" title="Add to favourites">link</a>
      </p>
      <div class="singlePost-navigation">
        <?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span>',
						)
					);
        ?>
      </div>
    </div>
  </div>
<!--  -->

<?php
endwhile; // End of the loop.

include_once('contactForm.php');
get_footer();
