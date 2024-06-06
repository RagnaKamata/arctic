<?php /*Template Name: Shop */
get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/column-side.css">

<section class="cls l-_hpx">
    <video autoplay loop muted class="desk_top">
        <source src="<?php echo $asset_path; ?>/assets/images/shop/shop.mp4" type="video/mp4">
    </video>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="content">
                        <h1 class="header_text">Lorem ipsum dolor sit amet </h1>
                        <video autoplay loop muted class="mobile">
                            <source src="<?php echo $asset_path; ?>/assets/images/shop/shop.mp4" type="video/mp4">
                        </video>
                        <p class="m-0">Lorem ipsum dolor sit amet consectetur. Cras mi enim a fermentum tellus et
                            tristique id. Quam
                            vulputate tellus sed sapien scelerisque mauris orci at. Suspendisse amet dui senectus est.
                            Diam sapien sed adipiscing velit orci. Non venenatis dolor et tempus enim.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop-card l-_hpx">
    <div class="container-fluid">
        <div class="wrapper">
            <?php
            // Arguments for WP_Query
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 6,
                'meta_query' => array(
                    array(
                        'value' => 'instock',
                        'compare' => '='
                    ),
                ),
                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
            );

            // The Query
            $loop = new WP_Query($args);

            // The Loop
            if ($loop->have_posts()): ?>
                <div class="row">
                    <?php while ($loop->have_posts()):
                        $loop->the_post();
                        global $product; ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="_cards">
                                <div class="image">
                                    <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                        alt="<?php the_title(); ?>">
                                </div>
                                <div class="contents">
                                    <p class="price"><?php echo $product->get_price_html(); ?></p>
                                    <h3 class="title"><?php the_title(); ?></h3>
                                    <p class="description"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="redirection">View Product</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php
                wp_reset_postdata();
            else:
                echo __('No products found');
            endif;
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>