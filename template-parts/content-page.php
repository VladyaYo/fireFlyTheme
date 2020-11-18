<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package watt
 */

?>

<div class="container">
  <div class="simplePage">
    <button type="button" class="backBtn" onclick="history.back();">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.80912 7.99999L10.781 4.03124C11.0747 3.73749 11.0747 3.26249 10.781 2.97187C10.4872 2.67812 10.0122 2.68124 9.71849 2.97187L5.21849 7.46874C4.93412 7.75312 4.92787 8.20937 5.19662 8.50312L9.71536 13.0312C9.86224 13.1781 10.056 13.25 10.2466 13.25C10.4372 13.25 10.631 13.1781 10.7779 13.0312C11.0716 12.7375 11.0716 12.2625 10.7779 11.9719L6.80912 7.99999Z" fill="currentColor"/>
      </svg>
      BACK
    </button>
    <h1 class="simplePage-heading">
			<?php the_title();?>
    </h1>
    <div class="simplePage-content">
      <?php the_content();?>
    </div>
  </div>
</div>
