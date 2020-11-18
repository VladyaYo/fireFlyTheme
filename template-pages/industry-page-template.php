<?php
	/*
	Template Name: Industry Page
	*/
	get_header();
	
	$content = get_field('content');
	$block_index = 0;
//	var_dump($content);
?>
<?php if(count($content) && !empty($content)) : ?>
	<?php foreach ($content as $block) :
		$block_type = $block['acf_fc_layout']; ?>
	 	<?php if($block_type === 'welcome') : ?>
    <section class="welcome industry-welcome industry-welcome--<?php echo $block['image_сlass']?>">
      <div class="container">
        <div class="welcome-left">
					<?php if(!empty($block['heading'])) : ?>
            <h1 class="welcome-heading">
							<?php echo $block['heading']; ?>
            </h1>
					<?php endif; ?>
					<?php if(!empty($block['description'])) : ?>
            <div class="welcome-description">
							<?php echo $block['description']; ?>
            </div>
					<?php endif; ?>
          <?php if(!empty($block['button_text'])) : ?>
            <a class="btn btn--medium" href="<?php echo $block['button_link']; ?>">
							<?php echo $block['button_text']; ?>
            </a>
          <?php endif;?>
        </div>
<!--				--><?php //if(!empty($block['image'])) : ?>
<!--          <img class="welcome-img welcome-img----><?php //echo $block['image_сlass']?><!--" src="--><?php //echo $block['image']['url']; ?><!--" alt="--><?php //echo $block['image']['alt']; ?><!--">-->
<!--				--><?php //endif;?>
				<?php if(!empty($block['video'])) : ?>
          <?php
            $is_loop = 'loop="true"';
            if(
                $block['image_сlass'] === 'industrie' ||
                $block['image_сlass'] === 'sportvelden' ||
                $block['image_сlass'] === 'woningbouw' ||
                $block['image_сlass'] === 'atex' ||
                $block['image_сlass'] === 'onderwijs'
            ){
              $is_loop = '';
            }
          ?>
          <video class="welcome-img welcome-img--<?php echo $block['image_сlass']?>" autoplay="autoplay" muted="" <?php echo $is_loop; ?>>
            <source src="<?php echo $block['video']['url']; ?>">
          </video>
				<?php endif;?>
      </div>
			
    </section>
    <?php elseif ($block_type === 'block_with_cards') : ?>
      <div class="infoBlock">
        <div class="container">
          <?php if(!empty($block['heading'])) : ?>
          <div class="infoBlock-heading revealator-fade revealator-once">
            <?php echo $block['heading']; ?>
          </div>
          <?php endif;?>
          <?php if(!empty($block['items'])) : ?>
          <div class="swiper-container infoBlock-slider">
            <div class="swiper-wrapper infoBlock-list">
              <?php foreach ($block['items'] as $item) : ?>
                <div class="swiper-slide revealator-zoomin revealator-once">
                  <div class="infoBlock-item">
                    <img class="infoBlock-icon" src="<?php echo $item['icon']['url']; ?>" alt="<?php echo $item['icon']['alt']; ?>">
                    <h4 class="infoBlock-title"><?php echo $item['title']; ?></h4>
                    <div class="infoBlock-description"><?php echo $item['description']; ?></div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <?php endif;?>
        </div>
      </div>
		<?php elseif ($block_type === 'calculator') : ?>
      <?php if($block['show_calculator']) {
        include_once('calculator.php');
      } ?>
	  <?php elseif ($block_type === 'description_block') :
      $block_index = 0;
    ?>
    <div class="descBlock">
      <div class="container">
        <?php if(!empty($block['heading'])) : ?>
        <div class="descBlock-heading">
          <?php echo $block['heading']; ?>
        </div>
        <?php endif;?>
        <div class="descBlock-wrapper">
					<?php if(!empty($block['image'])) : ?>
            <img class="descBlock-img revealator-fade revealator-once" src="<?php echo $block['image']['url']; ?>" alt="<?php echo $block['image']['alt']; ?>">
					<?php endif;?>
					<?php if(!empty($block['blocks'])) : ?>
              <div class="swiper-container descBlock-slider">
                <div class="swiper-wrapper descBlock-list">
							<?php foreach ($block['blocks'] as $item) : ?>
                <div class="swiper-slide descBlock-item">
                  <h4 class="descBlock-title revealator-slideup revealator-once revealator-delay4"><?php echo $item['title']; ?></h4>
                  <span class="descBlock-separator"></span>
                  <div class="descBlock-description revealator-slidedown revealator-once revealator-delay10">
                    <?php echo $item['description']; ?>
                  </div>
                </div>
							<?php endforeach;?>
              </div>
                <div class="swiper-pagination"></div>
            </div>
					<?php endif;?>
        </div>
      </div>
    </div>
	  <?php elseif ($block_type === 'heading') : ?>
    <div class="container">
      <div class="heading revealator-fade revealator-once">
        <?php echo $block['heading']; ?>
      </div>
    </div>
    <?php elseif ($block_type === 'advantages') : ?>
      <div class="pluses revealator-fade revealator-once">
        <div class="container">
          <?php if(!empty($block['heading'])) : ?>
          <div class="pluses-heading">
            <?php echo $block['heading']; ?>
          </div>
          <?php endif;?>
          <?php if(!empty($block['items'])) : ?>
          <ul class="pluses-list">
            <?php foreach ($block['items'] as $item) :?>
            <li class="pluses-item">
              <img src="<?php echo $item['icon']['url']; ?>" alt="<?php echo $item['icon']['alt']; ?>">
              <span><?php echo $item['text']; ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif;?>
        </div>
      </div>
	  <?php elseif ($block_type === 'block_with_caption') : ?>
      <div class="block block--reversed block--withCaption revealator-fade revealator-once">
      <div class="container">
				<?php if(!empty($block['heading'])) : ?>
          <h3 class="block-heading">
						<?php echo $block['heading']; ?>
          </h3>
				<?php endif;?>
				<?php if(!empty($block['caption'])) : ?>
          <div class="block-caption">
						<?php echo $block['caption']; ?>
          </div>
				<?php endif;?>
        <div class="block-wrapper">
          <div class="block-left ">
						<?php if(!empty($block['description'])) :
							$limit = 350;
							
							$description_length = strlen(trim($block['description']));
							if($description_length > $limit) :
								$description = strip_tags($block['description'], '<ul><li><br><a>');
								$short_desc = substr($description, 0, $limit);
								$other_desc = substr($description, $limit);
								?>
                <div class="block-description">
                  <span class="block-short"><?php echo $short_desc; ?></span><span class="block-extra"><?php echo $other_desc; ?></span>
                </div>
                <p class="block-btn">Show more</p>
							<?php else :?>
                <div class="block-description">
									<?php echo $block['description']; ?>
                </div>
							<?php endif;?>
						<?php endif;?>
          </div>
          <div class="block-right">
						<?php if(!empty($block['image'])) : ?>
              <img src="<?php echo $block['image']['url']; ?>" alt="<?php echo $block['image']['alt']; ?>">
						<?php endif;?>
          </div>
        </div>
      </div>
    </div>
	
	<?php elseif ($block_type === 'two_columns_block') :
      if($block_index % 2);
    ?>
      <div class="block <?php echo ($block_index % 2) ? 'block--reversed' : ''?>">
        <div class="container">
          <div class="block-wrapper">
            <div class="block-left revealator-once <?php echo ($block_index % 2) ? 'revealator-slideleft' : 'revealator-slideright'?>">
              <?php if(!empty($block['heading'])) : ?>
                <h3 class="block-heading">
                  <?php echo $block['heading']; ?>
                </h3>
              <?php endif;?>
              <?php if(!empty($block['description'])) :
								$limit = 350;
        
								$description_length = strlen(trim($block['description']));
								if($description_length > $limit) :
                  $description = strip_tags($block['description'], '<ul><li><br><a>');
									$short_desc = substr($description, 0, $limit);
									$other_desc = substr($description, $limit);
              ?>
                <div class="block-description">
                  <span class="block-short"><?php echo $short_desc; ?></span><span class="block-extra"><?php echo $other_desc; ?></span>
                </div>
                <p class="block-btn">Show more</p>
								<?php else :?>
                <div class="block-description">
                  <?php echo $block['description']; ?>
                </div>
								<?php endif;?>
              <?php endif;?>
              <?php if(!empty($block['button_text'])) : ?>
                <a class="btn block-btn--desc" href="<?php echo $block['button_link']; ?>">
                  <?php echo $block['button_text']; ?>
                </a>
              <?php endif; ?>
            </div>
            <div class="block-right">
              <?php if(!empty($block['image'])) : ?>
                  <img src="<?php echo $block['image']['url']; ?>" alt="<?php echo $block['image']['alt']; ?>">
              <?php endif;?>
            </div>
						<?php if(!empty($block['button_text'])) : ?>
              <a class="btn block-btn--mob" href="<?php echo $block['button_link']; ?>">
								<?php echo $block['button_text']; ?>
              </a>
						<?php endif; ?>
          </div>
        </div>
      </div>
      <?php $block_index++; ?>
    <?php elseif ($block_type === 'clients') : ?>
      <section class="clients revealator-fade revealator-once">
      <div class="container">
        <div class="clients-info">
					<?php if(!empty($block['heading'])) : ?>
            <div class="clients-heading">
							<?php echo $block['heading']; ?>
            </div>
					<?php endif; ?>
					<?php if(!empty($block['description'])) : ?>
            <div class="clients-description">
							<?php echo $block['description']; ?>
            </div>
					<?php endif; ?>
        </div>
				<?php if(!empty($block['logos'])) : ?>
          <div class="swiper-container clients-list">
            <div class="swiper-wrapper">
							<?php foreach ($block['logos'] as $item) : ?>
                <div class="swiper-slide clients-item">
                  <img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>">
                </div>
							<?php endforeach; ?>
            </div>
          </div>
				<?php endif; ?>
      </div>
    </section>
    <?php elseif ($block_type === 'simple_block') : ?>
      <section class="cta revealator-fade revealator-once">
      <div class="container">
				<?php if(!empty($block['heading'])) : ?>
          <div class="cta-heading">
						<?php echo $block['heading']; ?>
          </div>
				<?php endif; ?>
				<?php if(!empty($block['button_text'])) : ?>
          <a href="<?php echo $block['button_link']; ?>" class="btn btn--large">
						<?php echo $block['button_text']; ?>
          </a>
				<?php endif;?>
      </div>
    </section>
	  <?php elseif ($block_type === 'small_simple_block') : ?>
      <section class="cta cta--small revealator-fade revealator-once">
      <div class="container">
				<?php if(!empty($block['heading'])) : ?>
          <h2 class="cta-heading">
						<?php echo $block['heading']; ?>
          </h2>
				<?php endif; ?>
				<?php if(!empty($block['description'])) : ?>
          <div class="cta-description">
						<?php echo $block['description']; ?>
          </div>
				<?php endif; ?>
				<?php if(!empty($block['button_text'])) : ?>
          <a href="<?php echo $block['button_link']; ?>" class="btn btn--large">
						<?php echo $block['button_text']; ?>
          </a>
				<?php endif;?>
      </div>
    </section>
	  <?php elseif ($block_type === 'about_future') : ?>
      <section class="future">
      <div class="container">
				<?php if(!empty($block['heading'])) : ?>
          <div class="future-heading revealator-fade revealator-once">
						<?php echo $block['heading']; ?>
          </div>
				<?php endif;?>
				<?php if(!empty($block['items'])) : ?>
          <div class="swiper-container future-slider">
            <div class="swiper-wrapper future-grid">
							<?php foreach ($block['items'] as $item) : ?>
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
    <?php elseif ($block_type === 'projects') : ?>
		<?php
      $term = $block['project_category'];
      $posts = get_posts( array(
        'numberposts' => 2,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'project',
        'suppress_filters' => true,
        'tax_query' => array(
          array(
            'taxonomy' => 'project_category',
            'terms' => $term,
          )
        )
      ) );
		if(!empty($posts) && count($posts)) :
			?>
      <section class="related related--withDesc revealator-fade revealator-once">
        <div class="container">
          <div class="related-info">
						<?php if(!empty($block['heading'])) : ?>
              <div class="related-heading">
								<?php echo $block['heading']; ?>
              </div>
						<?php endif;?>
						<?php if(!empty($block['description'])) : ?>
              <div class="related-description">
								<?php echo $block['description']; ?>
              </div>
						<?php endif;?>
          </div>
          <div class="related-items">
						<?php foreach ($posts as $post) :
							$id = $post -> ID;
							$title = $post -> post_title;
							$link = $post -> guid;
							$description = short_something($post -> post_content, 166);
							$thumbnail = get_the_post_thumbnail_url($id);
							$link_text = get_field('project', $id)['show_more_btn'];
							$all_link = get_page_link(41);
							?>
              <div class="project">
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
					<?php if(!empty($block['button_text'])) : ?>
            <div class="related-actions">
              <a href="<?php echo $all_link; ?>" class="btn btn--large">
								<?php echo $block['button_text']; ?>
              </a>
            </div>
					<?php endif;?>
        </div>
      </section>
		<?php endif; ?>
    <?php elseif ($block_type === 'block_with_cards') : ?>
      block_with_cards
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>


<?php
	include_once('contactForm.php');
	get_footer();
	
