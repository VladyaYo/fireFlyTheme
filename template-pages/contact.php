<?php
	/*
	Template Name: Contact
	*/
	get_header();
?>
	<?php
		$heading = get_field('heading');
		$description = get_field('description');
		$faq = get_field('faq');
		$address = get_field('address');
		$latitude_coordinates = get_field('latitude_coordinates');
		$longitude_coordinates = get_field('longitude_coordinates');
		if(isset($faq) && !empty($faq)) :
	?>
		<section class="welcome contact-welcome">
			<div class="container">
				<div class="welcome-left revealator-slideright revealator-once">
					<?php if(!empty($heading)) : ?>
					<h1 class="welcome-heading">
						<?php echo $heading; ?>
					</h1>
					<?php endif; ?>
					<?php if(!empty($description)) : ?>
					<p class="welcome-description">
						<?php echo $description; ?>
					</p>
					<?php endif; ?>
				</div>
				<div class="welcome-img"></div>
			</div>
		</section>
		<section class="faq contact-faq">
			<div class="container">
				<?php if(!empty($faq['heading'])) : ?>
					<div class="faq-heading">
						<?php echo $faq['heading']; ?>
					</div>
				<?php endif; ?>
				<div class="faq-info">
					<?php if(!empty($faq['items_left'])) : ?>
						<div class="js-Accordion faq-accordion faq-accordion--left" id="accordion">
							<?php foreach ($faq['items_left'] as $item) :?>
								<button><?php echo $item['question']; ?></button>
								<div>
									<?php echo $item['answer']; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if(!empty($faq['items_right'])) : ?>
						<div class="js-Accordion faq-accordion faq-accordion--right" id="accordion2">
							<?php foreach ($faq['items_right'] as $item) :?>
								<button><?php echo $item['question']; ?></button>
								<div>
									<?php echo $item['answer']; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<div class="container">
		<div class="mapWrapper">
			<div id="map" class="map"></div>
			<?php if(!empty($address)) : ?>
			<h2 class="mapWrapper-address">
				<?php echo $address; ?>
			</h2>
			<?php endif;?>
		</div>
	</div>
<script>
  function initMap() {
		var center = {lat: <?php echo (float)$latitude_coordinates; ?>,
			lng: <?php echo (float)$longitude_coordinates; ?>};
		var map = new google.maps.Map(
			document.getElementById('map'), {zoom: 11, center: center});
	}
</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASq-qh7GZ9Hr1RQXg_ro2pyqXC5nR-b5c&callback=initMap">
</script>
<?php
	include_once('contactForm.php');
	get_footer();
?>
