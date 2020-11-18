<?php
/*
Template Name: Products
*/
get_header();
?>
<main class="products">
    <section class="top">
        <div class="container">
            <p class="simplePage-heading">Products</p>
<!--            <ul class="filterBar revealator-fade revealator-once">-->
<!--                <li class="filterBar-element">-->
<!--                    <button class="btn filterBar-btn">Filter</button>-->
<!--                    <div class="filterBar-submenu">-->
<!--                        <p class="filterBar-title">-->
<!--                            Categorieën-->
<!--                        </p>-->
<!--                        --><?php
//                        $categories = get_categories( [
//                            'taxonomy'     => 'category',
//                            'type'         => 'products',
//                            'orderby'      => 'name',
//                            'order'        => 'ASC',
//                            'hide_empty'   => 1,
//                        ] );
//                        ?>
<!--                        <ul class="filterBar-list">-->
<!--                            --><?php //foreach ($categories as $category) :
//                                $category_id = $category -> term_id;
//                                $category_name = $category -> name;
//                                $category_link = get_category_link($category_id);
//                                ?>
<!--                                <li class="filterBar-item">-->
<!--                                    <a class="filterBar-link" href="--><?php //echo $category_link?><!--">-->
<!--                                        --><?php //echo $category_name; ?>
<!--                                    </a>-->
<!--                                </li>-->
<!--                            --><?php //endforeach;?>
<!--                        </ul>-->
        </div>
    </section>
    <section class="postCards">
        <div class="container">
        <?php
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page'  => -1,
            'post_type' => 'products',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $current_page
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
        <a href="<?php echo $permalink; ?>" class="card">
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
        <div class="container">
            <?php
            wp_pagenavi()
            ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>

