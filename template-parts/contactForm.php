<?php
	$contact_form = get_field('contact_form', 'option');
	$contact_form_logo_src = '';
	$contact_form_logo_alt = '';
	$contact_form_left_title = '';
	$contact_form_left_description = '';
	$contact_form_right_title = '';
	$contact_form_right_description = '';
	if(!empty($contact_form) && count($contact_form)){
		if($contact_form['logo']){
			$contact_form_logo_src = $contact_form['logo']['url'];
			$contact_form_logo_alt = $contact_form['logo']['alt'];
		}
		$contact_form_left_title = $contact_form['left_title'];
		$contact_form_left_description = $contact_form['left_description'];
		$contact_form_right_title = $contact_form['right_title'];
		$contact_form_right_description = $contact_form['right_description'];
	}
	$contacts = get_field('contacts', 'option');

?>
<section class="contactForm">
	<div class="container">
		<div class="contactForm-wrapper">
			<div class="contactForm-left revealator-slideright revealator-once">
				<div class="contactForm-top">
					<img src="<?php echo $contact_form_logo_src; ?>" alt="<?php echo $contact_form_logo_alt; ?>">
				</div>
				<div class="contactForm-content">
					<h3 class="contactForm-title">
						<?php echo $contact_form_left_title; ?>
					</h3>
					<div class="contactForm-description">
						<?php echo $contact_form_left_description; ?>
					</div>
					<div class="footer-contacts contactForm-contacts">
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
				</div>
			</div>
			<div class="contactForm-right revealator-slideleft revealator-once">
				<h3 class="contactForm-title">
					<?php echo $contact_form_right_title; ?>
				</h3>
				<div class="contactForm-caption">
					<?php echo $contact_form_right_description; ?>
				</div>
				<div class="contactForm-form">
					<?php echo do_shortcode('[contact-form-7 id="278" title="Contact Form"]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>