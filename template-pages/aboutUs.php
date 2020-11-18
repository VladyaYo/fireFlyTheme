<?php
	/*
	Template Name: About us
	*/
	get_header();
?>
<?php
	$welcome = get_field('welcome');
	$mission = get_field('mission');
	$team = get_field('team');
	$future = get_field('future');
	$work_with = get_field('work_with');
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
<?php if(!empty($mission) && count($mission)) : ?>
	<section class="mission">
		<div class="container">
			<div class="mission-info">
				<div class="mission-left">
					<?php if(!empty($mission['video'])) : ?>
            <video class="mission-video" autoplay="autoplay" muted="">
              <source src="<?php echo $mission['video']['url']; ?>">
            </video>
          <?php endif;?>
				</div>
				<div class="mission-right revealator-slideleft revealator-once">
					<?php if(!empty($mission['heading'])) : ?>
					<h2 class="mission-heading">
						<?php echo $mission['heading']; ?>
					</h2>
					<?php endif; ?>
					<?php if(!empty($mission['description'])) : ?>
						<div class="mission-description">
							<?php echo $mission['description']; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if(!empty($mission['items'] && count($mission['items']))) : ?>
			<ul class="mission-list">
				<?php foreach ($mission['items'] as $item) : ?>
				<li class="mission-item revealator-zoomin revealator-once">
					<div class="mission-icon">
						<img src="<?php echo $item['icon']['url']; ?>" alt="<?php echo $item['icon']['alt']; ?>">
					</div>
					<div class="mission-content">
						<h3 class="mission-title">
							<?php echo $item['title']; ?>
						</h3>
						<div class="mission-description">
							<?php echo $item['description']; ?>
						</div>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<?php if(!empty($team) && count($team)) : ?>
	<section class="team">
		<div class="container">
			<?php if(!empty($team['heading'])) : ?>
			<div class="team-heading">
				<?php echo $team['heading']; ?>
			</div>
			<?php endif; ?>
   
			<?php if(!empty($team['persons'])) : ?>
      <div class="swiper-container team-slider">
        <div class="swiper-wrapper persons">
					<?php foreach ($team['persons'] as $person) : ?>
            <div class="swiper-slide revealator-zoomin revealator-once">
              <div class="person">
                <div class="person-imgWrapper">
                  <img class="person-img" src="<?php echo $person['image']['url']; ?>" alt="<?php echo $person['image']['alt']; ?>">
                </div>
                <h3 class="person-name">
									<?php echo $person['name']; ?>
                </h3>
                <div class="person-position">
									<?php echo $person['position']; ?>
                </div>
                <ul class="person-socials">
									<?php if(!empty($person['linkedin_link'])) : ?>
                    <li class="social">
                      <a class="social-link" href="<?php echo $person['linkedin_link']; ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path class="social-hover" d="M12 0C5.3736 0 0 5.3736 0 12C0 18.6264 5.3736 24 12 24C18.6264 24 24 18.6264 24 12C24 5.3736 18.6264 0 12 0ZM8.51294 18.1406H5.59039V9.34808H8.51294V18.1406ZM7.05176 8.14746H7.03271C6.052 8.14746 5.41772 7.47235 5.41772 6.6286C5.41772 5.76581 6.07141 5.10938 7.07117 5.10938C8.07092 5.10938 8.68616 5.76581 8.7052 6.6286C8.7052 7.47235 8.07092 8.14746 7.05176 8.14746ZM19.051 18.1406H16.1288V13.4368C16.1288 12.2547 15.7057 11.4485 14.6483 11.4485C13.8409 11.4485 13.3601 11.9923 13.1488 12.5173C13.0715 12.7051 13.0527 12.9677 13.0527 13.2305V18.1406H10.1303C10.1303 18.1406 10.1686 10.173 10.1303 9.34808H13.0527V10.593C13.441 9.9939 14.1359 9.14172 15.6865 9.14172C17.6093 9.14172 19.051 10.3984 19.051 13.099V18.1406Z" fill="#EBEBEB"/>
                        </svg>
                      </a>
                    </li>
									<?php endif; ?>
									<?php if(!empty($person['email'])) : ?>
                    <li class="social">
                      <a class="social-link" href="mailto:<?php echo $person['linkedin_link']; ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle class="social-hover" cx="12" cy="12" r="12" fill="#EBEBEB"/>
                          <path d="M7.4285 7.42859H16.5714C17.1999 7.42859 17.7142 7.94287 17.7142 8.57145V15.4286C17.7142 16.0572 17.1999 16.5714 16.5714 16.5714H7.4285C6.79993 16.5714 6.28564 16.0572 6.28564 15.4286V8.57145C6.28564 7.94287 6.79993 7.42859 7.4285 7.42859Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M17.7142 8.57141L11.9999 12.5714L6.28564 8.57141" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </a>
                    </li>
									<?php endif; ?>
									<?php if(!empty($person['phone'])) : ?>
                    <li class="social">
                      <a class="social-link" href="tel:<?php echo $person['linkedin_link']; ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle class="social-hover" cx="12" cy="12" r="12" fill="#EBEBEB"/>
                          <path d="M17.6503 14.8115V16.5258C17.6509 16.685 17.6183 16.8425 17.5546 16.9883C17.4908 17.1341 17.3973 17.265 17.28 17.3726C17.1628 17.4802 17.0243 17.5621 16.8736 17.6131C16.7228 17.6641 16.5631 17.683 16.4046 17.6687C14.6462 17.4776 12.9571 16.8768 11.4731 15.9144C10.0925 15.0371 8.9219 13.8665 8.04457 12.4858C7.07884 10.9951 6.47785 9.29782 6.29028 7.53154C6.276 7.37352 6.29478 7.21426 6.34543 7.06389C6.39607 6.91353 6.47747 6.77536 6.58443 6.65818C6.6914 6.541 6.8216 6.44737 6.96673 6.38326C7.11187 6.31916 7.26876 6.28597 7.42743 6.28582H9.14171C9.41903 6.28309 9.68788 6.3813 9.89815 6.56213C10.1084 6.74296 10.2458 6.99408 10.2846 7.26868C10.3569 7.81729 10.4911 8.35595 10.6846 8.87439C10.7615 9.07892 10.7781 9.3012 10.7325 9.5149C10.6869 9.72859 10.5811 9.92474 10.4274 10.0801L9.70171 10.8058C10.5152 12.2364 11.6997 13.4209 13.1303 14.2344L13.856 13.5087C14.0114 13.355 14.2075 13.2492 14.4212 13.2036C14.6349 13.158 14.8572 13.1747 15.0617 13.2515C15.5802 13.445 16.1188 13.5792 16.6674 13.6515C16.945 13.6907 17.1985 13.8305 17.3797 14.0444C17.5609 14.2583 17.6572 14.5313 17.6503 14.8115Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </a>
                    </li>
									<?php endif; ?>
                </ul>
              </div>
            </div>
					<?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
				</div>
			<?php endif;?>
		</div>
	</section>
<?php endif; ?>
<?php if(!empty($future) && count($future)) : ?>
	<section class="future">
		<div class="container">
			<?php if(!empty($future['heading'])) : ?>
			<div class="future-heading revealator-fade revealator-once">
				<?php echo $future['heading']; ?>
			</div>
			<?php endif;?>
			<?php if(!empty($future['items'])) : ?>
        <div class="swiper-container future-slider">
          <div class="swiper-wrapper future-grid">
				<?php foreach ($future['items'] as $item) : ?>
          <div class="swiper-slide revealator-zoomin revealator-once">
            <div class="future-card">
              <img class="card-img" src="<?php echo $item['logo']['url']; ?>" alt="<?php echo $item['logo']['alt']; ?>">
              <h3 class="card-title"><?php echo $item['name']; ?></h3>
              <div class="card-description">
								<?php echo $item['description']; ?>
              </div>
            </div>
          </div>
				<?php endforeach; ?>
          </div>
        </div>
			<?php endif;?>
		</div>
	</section>
<?php endif;?>
<?php if(!empty($work_with) && count($work_with)) : ?>
	<div class="work">
		<div class="container">
			<?php if(!empty($work_with['heading'])) : ?>
			<div class="work-heading">
				<?php echo $work_with['heading'];?>
			</div>
			<?php endif;?>
			<?php if(!empty($work_with['logos'])) :
					$logos_per_slide = $work_with['logos_per_slide'];
					$slides = ceil(count($work_with['logos']) / $logos_per_slide);
				?>
				<div class="swiper-container work-slider">
					<div class="swiper-wrapper">
						<?php for($i = 0; $i < $slides; $i++) : ?>
							<div class="swiper-slide">
								<div class="work-logos">
									<?php for($l = $i * $logos_per_slide; $l < $logos_per_slide + $logos_per_slide * $i && $l < count($work_with['logos']); $l++ ) : ?>
										<img class="work-logo" src="<?php echo $work_with['logos'][$l]['url']; ?>" alt="<?php echo $work_with['logos'][$l]['alt']; ?>">
									<?php endfor; ?>
								</div>
							</div>
						<?php endfor; ?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<div class="swiper-button-prev">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M17.0233 20L26.953 10.0781C27.6873 9.34375 27.6873 8.15625 26.953 7.42969C26.2186 6.69532 25.0311 6.70313 24.2967 7.42969L13.0467 18.6719C12.3358 19.3828 12.3202 20.5234 12.992 21.2578L24.2889 32.5781C24.6561 32.9453 25.1405 33.125 25.617 33.125C26.0936 33.125 26.578 32.9453 26.9451 32.5781C27.6795 31.8438 27.6795 30.6563 26.9451 29.9297L17.0233 20Z" fill="#61CD78"/>
					</svg>
				</div>
				<div class="swiper-button-next">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M22.9765 20L13.0469 10.0781C12.3125 9.34375 12.3125 8.15625 13.0469 7.42969C13.7812 6.70313 14.9687 6.70313 15.7031 7.42969L26.9531 18.6719C27.664 19.3828 27.6797 20.5234 27.0078 21.2578L15.7109 32.5781C15.3437 32.9453 14.8594 33.125 14.3828 33.125C13.9062 33.125 13.4219 32.9453 13.0547 32.5781C12.3203 31.8438 12.3203 30.6562 13.0547 29.9297L22.9765 20Z" fill="#61CD78"/>
					</svg>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif;?>
<?php
	get_footer();
?>
