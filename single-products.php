<?php
/**
 * The template for displaying products single
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package watt
 */

get_header();

while ( have_posts() ) :
    the_post(); ?>
<main class="singleProduct">
    <div class="singlePost">
    <section class="top">
    <div class="container">
        <p class="simplePage-heading"><?php the_title(); ?></p>
    </div></section>
        <section class="content">
            <div class="container">
                <div class="textBlock">
                    <a type="button" class="backBtn" href="/products">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.80912 7.99999L10.781 4.03124C11.0747 3.73749 11.0747 3.26249 10.781 2.97187C10.4872 2.67812 10.0122 2.68124 9.71849 2.97187L5.21849 7.46874C4.93412 7.75312 4.92787 8.20937 5.19662 8.50312L9.71536 13.0312C9.86224 13.1781 10.056 13.25 10.2466 13.25C10.4372 13.25 10.631 13.1781 10.7779 13.0312C11.0716 12.7375 11.0716 12.2625 10.7779 11.9719L6.80912 7.99999Z" fill="currentColor"/>
                        </svg>
                        BACK TO ALL PRODUCTS
                    </a>
                    <div class="textWysiwyg">
                        <?php the_content(); ?>
                    </div>
                    <?php
                    $file = get_field('pdf');
                    if( $file ): ?>
                        <a class="file" href="<?php echo $file['url']; ?>" alt="<?php echo $file['filename']; ?>" download="<?php echo $file['url']; ?>">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 0C10.35 0 9 1.35 9 3V45C9 46.65 10.35 48 12 48H42C43.65 48 45 46.65 45 45V12L33 0H12Z" fill="#E2E5E7"/>
                                <path d="M36 12H45L33 0V9C33 10.65 34.35 12 36 12Z" fill="#B0B7BD"/>
                                <path d="M45 21L36 12H45V21Z" fill="#CAD1D8"/>
                                <path d="M39 39C39 39.825 38.325 40.5 37.5 40.5H4.5C3.675 40.5 3 39.825 3 39V24C3 23.175 3.675 22.5 4.5 22.5H37.5C38.325 22.5 39 23.175 39 24V39Z" fill="#13BE37"/>
                                <path d="M9.53857 28.4204C9.53857 28.0244 9.85057 27.5924 10.3531 27.5924H13.1236C14.6836 27.5924 16.0876 28.6364 16.0876 30.6374C16.0876 32.5334 14.6836 33.5894 13.1236 33.5894H11.1211V35.1734C11.1211 35.7014 10.7851 35.9999 10.3531 35.9999C9.95707 35.9999 9.53857 35.7014 9.53857 35.1734V28.4204ZM11.1211 29.1029V32.0909H13.1236C13.9276 32.0909 14.5636 31.3814 14.5636 30.6374C14.5636 29.7989 13.9276 29.1029 13.1236 29.1029H11.1211Z" fill="white"/>
                                <path d="M18.4364 35.9999C18.0404 35.9999 17.6084 35.7839 17.6084 35.2574V28.4444C17.6084 28.0139 18.0404 27.7004 18.4364 27.7004H21.1829C26.6639 27.7004 26.5439 35.9999 21.2909 35.9999H18.4364ZM19.1924 29.1644V34.5374H21.1829C24.4214 34.5374 24.5654 29.1644 21.1829 29.1644H19.1924Z" fill="white"/>
                                <path d="M28.4879 29.2604V31.1669H31.5464C31.9784 31.1669 32.4104 31.5989 32.4104 32.0174C32.4104 32.4134 31.9784 32.7374 31.5464 32.7374H28.4879V35.2559C28.4879 35.6759 28.1894 35.9984 27.7694 35.9984C27.2414 35.9984 26.9189 35.6759 26.9189 35.2559V28.4429C26.9189 28.0124 27.2429 27.6989 27.7694 27.6989H31.9799C32.5079 27.6989 32.8199 28.0124 32.8199 28.4429C32.8199 28.8269 32.5079 29.2589 31.9799 29.2589H28.4879V29.2604Z" fill="white"/>
                                <path d="M37.5 40.5H9V42H37.5C38.325 42 39 41.325 39 40.5V39C39 39.825 38.325 40.5 37.5 40.5Z" fill="#CAD1D8"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="sliderSide">
                <div class="sliderContainer">
                    <div class="swiper-wrapper">
                        <div class="imgWrap swiper-slide">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <?php
                        $images = get_field('slider');
                        if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                            <div class="imgWrap swiper-slide">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                                <?php endforeach; ?>
                        <?php endif; ?>


                </div>
                    <div class="swiper-pagination"></div>
            </div>
                </div>
        </section>
        <?php
endwhile; ?>

<!--            <div class="singlePost-navigation">-->
<!--                --><?php
//                the_post_navigation(
//                    array(
//                        'prev_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span>',
//                        'next_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span>',
//                    )
//                );
//                ?>
<!--            </div>-->
        <section class="otherProducts postCards">
            <div class="container containerProdSlider">
                <div class="buttons">
                <button class="swiper-button-prev">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9164 20L24.8672 13.0547C25.3813 12.5406 25.3813 11.7094 24.8672 11.2008C24.3532 10.6867 23.5219 10.6922 23.0078 11.2008L15.1329 19.0703C14.6352 19.5679 14.6243 20.3664 15.0946 20.8804L23.0024 28.8047C23.2594 29.0617 23.5985 29.1875 23.9321 29.1875C24.2657 29.1875 24.6047 29.0617 24.8617 28.8047C25.3758 28.2906 25.3758 27.4594 24.8617 26.9508L17.9164 20Z" fill="#13BE37"/>
                        <rect x="0.5" y="0.5" width="39" height="39" rx="7.5" stroke="#13BE37"/>
                    </svg>
                </button>
                <button class="swiper-button-next">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9164 20L24.8672 13.0547C25.3813 12.5406 25.3813 11.7094 24.8672 11.2008C24.3532 10.6867 23.5219 10.6922 23.0078 11.2008L15.1329 19.0703C14.6352 19.5679 14.6243 20.3664 15.0946 20.8804L23.0024 28.8047C23.2594 29.0617 23.5985 29.1875 23.9321 29.1875C24.2657 29.1875 24.6047 29.0617 24.8617 28.8047C25.3758 28.2906 25.3758 27.4594 24.8617 26.9508L17.9164 20Z" fill="#13BE37"/>
                        <rect x="0.5" y="0.5" width="39" height="39" rx="7.5" stroke="#13BE37"/>
                    </svg>
                </button>
                </div>
                <div class="swiper-wrapper">
                <?php
//                $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page'  => 9,
                    'post_type' => 'products',
                    'orderby' => 'date',
                    'order' => 'ASC',
//                    'paged' => $current_page
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

                    ?>
                    <a href="<?php echo $permalink; ?>" class="card swiper-slide">
                        <div class="imgWrap">
                            <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>">
                        </div>
                        <div class="text">
                            <h4><?php echo $title; ?></h4>
                            <p class="caption"><?php short_content(100); ?></p>
                            <div class="property">
                                <p class="caption"></p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            </div>
        </section>
    </div>
</main>

<?php

//
//include_once('contactForm.php');
get_footer(); ?>
