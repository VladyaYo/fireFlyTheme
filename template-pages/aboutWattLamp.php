<?php
	/*
	Template Name: About Watt Lamp
	*/
	get_header();
	
	$welcome = get_field('welcome');
	$advantages = get_field('advantages');
?>
<?php if(!empty($welcome) && count($welcome)) : ?>
	<section class="welcome aboutUs-welcome">
		<div class="container">
			<div class="welcome-left revealator-slideright revealator-once">
				<?php if(!empty($welcome['heading'])) : ?>
					<h1 class="welcome-heading">
						<?php echo $welcome['heading']; ?>
					</h1>
				<?php endif; ?>
				<?php if(!empty($welcome['description'])) : ?>
					<p class="welcome-description">
						<?php echo $welcome['description']; ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
		<?php if(!empty($welcome['image'])) : ?>
			<div class="welcome-img">
				<img src="<?php echo $welcome['image']['url']; ?>" alt="<?php $welcome['image']['alt']; ?>">
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>
<?php if(isset($advantages) && !empty($advantages)): ?>
		<section class="advantages aboutUs-advantages">
			<div class="container">
				<div class="advantages-info">
					<?php if(isset($advantages['heading'])) :?>
						<div class="advantages-heading">
							<?php echo $advantages['heading']; ?>
						</div>
					<?php endif;?>
					<?php if(isset($advantages['description'])) :?>
						<div class="advantages-description">
							<?php echo $advantages['description']; ?>
						</div>
					<?php endif;?>
				</div>
				<?php if(isset($advantages['cards'])) :?>
            <div class="swiper-container advantages-cards">
              <div class="swiper-wrapper">
						<?php foreach ($advantages['cards'] as $card) :
							?>
              <div class="swiper-slide">
                <div class="advantages-card">
                  <div class="card-icon">
                    <img src="<?php echo $card['icon']['url']; ?>" alt="<?php echo $card['icon']['alt']; ?>">
                  </div>
                  <h4 class="card-title">
										<?php echo $card['title']; ?>
                  </h4>
                  <div class="card-description">
										<?php echo $card['description']; ?>
                  </div>
                </div>
              </div>
						<?php endforeach; ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
					</div>
				<?php endif; ?>
				<?php if(isset($advantages['video_id'])) : ?>
					<div class="video advantages-video">
						<a class="video__link" href="https://youtu.be/<?php echo trim($advantages['video_id']); ?>">
							<picture class="video__picture">
								<source srcset="https://i.ytimg.com/vi_webp/<?php echo trim($advantages['video_id']); ?>/maxresdefault.webp" type="image/webp">
								<img class="video__media" src="https://i.ytimg.com/vi/<?php echo trim($advantages['video_id']); ?>/maxresdefault.jpg">
							</picture>
						</a>
						<button class="video__button" type="button" aria-label="Play">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 41.999 41.999" style="enable-background:new 0 0 41.999 41.999;" xml:space="preserve">
            <path class="video__button-icon" d="M36.068,20.176l-29-20C6.761-0.035,6.363-0.057,6.035,0.114C5.706,0.287,5.5,0.627,5.5,0.999v40  c0,0.372,0.206,0.713,0.535,0.886c0.146,0.076,0.306,0.114,0.465,0.114c0.199,0,0.397-0.06,0.568-0.177l29-20  c0.271-0.187,0.432-0.494,0.432-0.823S36.338,20.363,36.068,20.176z"/>
          </svg>
						</button>
					</div>
				<?php endif; ?>
				<?php if(isset($advantages['progress_cards'])) : ?>
					<div class="progress-cards">
						<?php foreach ($advantages['progress_cards'] as $index => $progress_card) : ?>
							<div class="progress-card">
								<span class="card-index"><?php echo $index + 1; ?></span>
								<h4 class="card-title"><?php echo $progress_card['title']; ?></h4>
								<div class="card-description">
									<?php echo $progress_card['description']; ?>
								</div>
							</div>
						<?php endforeach; ?>
						<svg class="progress-line" width="1432" height="612" viewBox="0 0 1432 612" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M130.5 5.5H28C15.2975 5.5 5 15.7975 5 28.5V367C5 379.703 15.2975 390 28 390H217.5C230.203 390 240.5 400.297 240.5 413V584C240.5 596.703 250.797 607 263.5 607H455.5C468.203 607 478.5 596.703 478.5 584V415C478.5 402.297 488.797 392 501.5 392H692C704.703 392 715 402.297 715 415V584C715 596.703 725.297 607 738 607H929.5C942.203 607 952.5 596.703 952.5 584V415C952.5 402.297 962.797 392 975.5 392H1404C1416.7 392 1427 381.703 1427 369V266.5" stroke="#13BE37" stroke-width="10"/>
						</svg>
						<svg class="progress-lamp" width="138" height="138" viewBox="0 0 138 138" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M52.668 117.516C52.869 118.62 52.83 119.932 52.83 121.585C52.83 130.804 59.9456 138 69.0018 138C77.8961 138 85.1737 130.722 85.1737 121.828C85.1737 119.904 85.1357 118.615 85.3357 117.516L69.0018 109.43L52.668 117.516Z" fill="#EDF4FF"/>
							<path d="M85.1719 121.828C85.1719 119.904 85.1339 118.614 85.3339 117.516L69 109.43V138C77.8943 138 85.1719 130.722 85.1719 121.828Z" fill="#DBE2ED"/>
							<path d="M98.0303 82.8265C90.1869 93.1765 85.7397 105.144 85.3354 117.515H52.6682C52.183 105.548 47.7357 93.6617 39.4072 82.0179C33.8279 74.2554 31.5639 64.714 33.0193 55.1726C36.2187 34.4834 52.6197 24.5323 69.0018 24.597C87.0118 24.6617 104.998 36.8364 105.383 60.1509C105.453 68.6384 103.01 76.1594 98.0303 82.8265Z" fill="#F0F0F0"/>
							<path d="M69 16.4414C66.7653 16.4414 64.957 14.6331 64.957 12.3984V4.04297C64.957 1.80828 66.7653 0 69 0C71.2347 0 73.043 1.80828 73.043 4.04297V12.3984C73.043 14.6331 71.2347 16.4414 69 16.4414Z" fill="#F0F0F0"/>
							<path d="M107.517 38.678C106.396 36.7433 107.059 34.2717 108.994 33.1545L115.998 29.1115C117.932 27.9902 120.404 28.6536 121.517 30.592C122.639 32.5267 121.975 34.9983 120.041 36.1155L113.037 40.1585C111.085 41.2789 108.617 40.5965 107.517 38.678Z" fill="#E9E9E9"/>
							<path d="M16.4827 91.2364C15.3615 89.3017 16.0248 86.8301 17.9592 85.7129L24.9635 81.6699C26.8901 80.5565 29.3698 81.2158 30.4833 83.1505C31.6045 85.0852 30.9412 87.5568 29.0065 88.674L22.0022 92.7169C20.0521 93.8368 17.5832 93.1563 16.4827 91.2364Z" fill="#F0F0F0"/>
							<path d="M91.24 22.3985C89.3053 21.2811 88.642 18.8097 89.7632 16.875L93.8062 9.87478C94.9118 7.93632 97.3912 7.29268 99.3259 8.39425C101.261 9.51172 101.924 11.9831 100.803 13.9178L96.7597 20.918C95.659 22.8441 93.1857 23.5158 91.24 22.3985Z" fill="#E9E9E9"/>
							<path d="M41.2476 20.9188L37.2046 13.9185C36.0834 11.9838 36.7467 9.51224 38.6814 8.39503C40.608 7.2816 43.0877 7.93306 44.2011 9.87557L48.2441 16.8758C49.3654 18.8105 48.702 21.2821 46.7673 22.3993C44.8243 23.5149 42.3495 22.847 41.2476 20.9188Z" fill="#F0F0F0"/>
							<path d="M115.998 92.7171L108.994 88.6742C107.06 87.5567 106.396 85.0854 107.518 83.1507C108.631 81.22 111.118 80.5686 113.037 81.6701L120.041 85.7131C121.976 86.8306 122.639 89.3019 121.518 91.2366C120.42 93.1524 117.953 93.8392 115.998 92.7171Z" fill="#E9E9E9"/>
							<path d="M24.9635 40.1578L17.9592 36.1148C16.0248 34.9973 15.3615 32.526 16.4827 30.5913C17.5962 28.6566 20.0756 28.0014 22.0022 29.1108L29.0065 33.1537C30.9412 34.2712 31.6045 36.7425 30.4833 38.6772C29.3833 40.5963 26.9152 41.2782 24.9635 40.1578Z" fill="#F0F0F0"/>
							<path d="M125.602 64.957H117.516C115.281 64.957 113.473 63.1487 113.473 60.9141C113.473 58.6794 115.281 56.8711 117.516 56.8711H125.602C127.836 56.8711 129.645 58.6794 129.645 60.9141C129.645 63.1487 127.836 64.957 125.602 64.957Z" fill="#E9E9E9"/>
							<path d="M20.4844 64.957H12.3984C10.1638 64.957 8.35547 63.1487 8.35547 60.9141C8.35547 58.6794 10.1638 56.8711 12.3984 56.8711H20.4844C22.7191 56.8711 24.5273 58.6794 24.5273 60.9141C24.5273 63.1487 22.7191 64.957 20.4844 64.957Z" fill="#F0F0F0"/>
							<path d="M73.043 12.3984V4.04297C73.043 1.80828 71.2347 0 69 0V16.4414C71.2347 16.4414 73.043 14.6331 73.043 12.3984Z" fill="#E9E9E9"/>
							<path d="M98.0285 82.8265C90.1852 93.1765 85.7379 105.144 85.3336 117.515H69V24.5969C87.0101 24.6616 104.996 36.8363 105.381 60.1508C105.451 68.6383 103.008 76.1593 98.0285 82.8265Z" fill="#E9E9E9"/>
						</svg>
					</div>
				<?php endif; ?>
			</div>
		</section>
<?php endif; ?>
<?php include_once('template-parts/contactForm.php'); ?>
<?php get_footer(); ?>
