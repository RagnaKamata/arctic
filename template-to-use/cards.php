<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/card.css">


<!-- For Blogs/PostType  -->
<div class="wrapper">
    <?php
    // Arguments for WP_Query
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
    );

    // The Query
    $loop = new WP_Query($args);

    // The Loop
    if ($loop->have_posts()): ?>
        <div class="row main_card">
            <?php while ($loop->have_posts()): $loop->the_post(); ?>
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="_cards">
                        <div class="image">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="contents">
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <h4 class="title"><?php the_title(); ?></h4>
                            <div class="description m-0"><?php the_content(); ?></div>
                            <a href="<?php the_permalink(); ?>"
                                class="redirection d-flex align-items-center text-black h-4 fw-bold text-uppercase text-decoration-none">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                                    <g clip-path="url(#clip0_2064_2936)">
                                        <path
                                            d="M25.2136 11.8087C25.2133 11.8084 25.213 11.8081 25.2127 11.8078L20.11 6.72968C19.7277 6.34926 19.1094 6.35068 18.7289 6.733C18.3484 7.11528 18.3499 7.73359 18.7321 8.11406L22.1581 11.5234H1.47656C0.937207 11.5234 0.5 11.9606 0.5 12.5C0.5 13.0394 0.937207 13.4766 1.47656 13.4766H22.1581L18.7322 16.8859C18.3499 17.2664 18.3484 17.8847 18.7289 18.267C19.1094 18.6494 19.7278 18.6507 20.11 18.2703L25.2127 13.1922C25.213 13.1919 25.2133 13.1915 25.2136 13.1913C25.5961 12.8095 25.5949 12.1892 25.2136 11.8087Z"
                                            fill="#20201F" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2064_2936">
                                            <rect width="25" height="25" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        // Pagination
        $big = 999999999; // need an unlikely integer
        $pagination_args = array(
            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'  => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total'   => $loop->max_num_pages,
            'prev_text'    => __('« Previous'),
            'next_text'    => __('Next »'),
        );

        echo '<div class="pagination">';
        echo paginate_links($pagination_args);
        echo '</div>';
        
        wp_reset_postdata();
    else:
        echo __('No posts found');
    endif;
    ?>
</div>


<!-- for Products  -->
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
        <div class="row main_card main_products">
            <?php while ($loop->have_posts()):
                $loop->the_post();
                global $product; ?>
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="_cards product">
                        <div class="image">
                            <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                alt="<?php the_title(); ?>">
                        </div>
                        <div class="contents">
                            <p class="price header_text h-4 fw-bold"><?php echo $product->get_price_html(); ?></p>
                            <h4 class="title"><?php the_title(); ?></h4>
                            <div class="description m-0"><?php the_content(); ?></div>
                            <a href="<?php the_permalink(); ?>"
                                class="redirection d-flex align-items-center text-black h-4 fw-bold text-uppercase text-decoration-none">
                                View Product
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                                    <g clip-path="url(#clip0_2064_2936)">
                                        <path
                                            d="M25.2136 11.8087C25.2133 11.8084 25.213 11.8081 25.2127 11.8078L20.11 6.72968C19.7277 6.34926 19.1094 6.35068 18.7289 6.733C18.3484 7.11528 18.3499 7.73359 18.7321 8.11406L22.1581 11.5234H1.47656C0.937207 11.5234 0.5 11.9606 0.5 12.5C0.5 13.0394 0.937207 13.4766 1.47656 13.4766H22.1581L18.7322 16.8859C18.3499 17.2664 18.3484 17.8847 18.7289 18.267C19.1094 18.6494 19.7278 18.6507 20.11 18.2703L25.2127 13.1922C25.213 13.1919 25.2133 13.1915 25.2136 13.1913C25.5961 12.8095 25.5949 12.1892 25.2136 11.8087Z"
                                            fill="#20201F" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2064_2936">
                                            <rect width="25" height="25" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
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