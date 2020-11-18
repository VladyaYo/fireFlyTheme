<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package watt
 */

?>
</main>
<?php
  $footer = get_field('footer', 'option');
	$contacts = get_field('contacts', 'option');
?>
<footer class="footer">
  <div class="container">
    <div class="footer-wrapper">
      <div class="footer-left">
        <div class="footer-titles">
					<?php if(!empty($footer['left_title'])) : ?>
            <h4 class="footer-title footer-title--branches"><?php echo $footer['left_title']; ?></h4>
					<?php endif; ?>
					<?php if(!empty($footer['menu_title'])) : ?>
            <h4 class="footer-title footer-title--menu"><?php echo $footer['menu_title']; ?></h4>
					<?php endif; ?>
        </div>
				<?php wp_nav_menu(array(
					'container' => 'nav',
					'container_class' => 'footer-nav',
					'theme_location' => 'footer_menu',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
					'menu_class' => 'footer-menu'
				)); ?>
        <div class="copyright copyright--desc">&copy; <?php echo date('Y'); ?> WATT-LAMP</div>
      </div>
      <div class="footer-right">
				<?php if(!empty($footer['right_title'])) : ?>
          <h4 class="footer-title"><?php echo $footer['right_title']; ?></h4>
				<?php endif; ?>
        <div class="footer-contacts">
          <?php if(!empty($contacts['email'])) : ?>
          <div class="footer-contact">
            <div class="contact-title">
              Email
            </div>
            <a href="mailto:<?php echo $contacts['email']; ?>" class="contact-link">
              <span class="contact-icon contact-icon--email"></span>
              <span class="contact-text"><?php echo $contacts['email']; ?></span>
            </a>
          </div>
          <?php endif; ?>
          <?php if(!empty($contacts['telephone'])) : ?>
          <div class="footer-contact">
            <div class="contact-title">
              Telefoon
            </div>
            <a href="tel:<?php echo $contacts['telephone']; ?>" class="contact-link">
              <span class="contact-icon contact-icon--phone"></span>
              <span class="contact-text"><?php echo $contacts['telephone']; ?></span>
            </a>
          </div>
          <?php endif; ?>
					<?php if(!empty($contacts['facebook_link']) || !empty($contacts['linkedin_link'])) : ?>
          <div class="footer-contact">
            <div class="contact-title">
              Sociaal
            </div>
            <?php if(!empty($contacts['facebook_link'])) : ?>
              <a href="<?php echo $contacts['facebook_link']; ?>" target="_blank" class="contact-link">
                <span class="contact-icon contact-icon--facebook"></span>
              </a>
						<?php endif; ?>
						<?php if(!empty($contacts['linkedin_link'])) : ?>
              <a href="<?php echo $contacts['linkedin_link']; ?>" target="_blank" class="contact-link">
                <span class="contact-icon contact-icon--linkedin"></span>
              </a>
						<?php endif; ?>
          </div>
					<?php endif; ?>
        </div>
        <?php if(!empty($footer['logos'])) : ?>
        <ul class="footer-logos">
          <?php foreach ($footer['logos'] as $item) : ?>
          <li>
            <img src="<?php echo $item['logo']['url']; ?>" alt="<?php echo $item['logo']['alt']; ?>">
          </li>
          <?php endforeach;?>
        </ul>
        <?php endif; ?>
        <div class="footer-bottom">
          <div class="copyright copyright--mob">&copy; <?php echo date('Y'); ?> WATT-LAMP</div>
					<?php wp_nav_menu(array(
						'container' => false,
						'theme_location' => 'footer_bottom_menu',
						'items_wrap' => '<ul class="%2$s">%3$s</ul>',
						'menu_class' => 'footer-extraMenu'
					)); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
