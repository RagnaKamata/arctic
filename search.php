<?php
get_header();
global $wp_query;
$s = sanitize_text_field($_GET['s']); // Sanitize the search term
$img = get_stylesheet_directory_uri() . '/assets/img/homepage';
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/search.css">
<section class="searchResults">
    <div id="overlay" style="display: none;">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h1 class="text-center">Search Result For “<?php echo esc_html($s); ?>”</h1>
                </div>
            </div>
            <div class="row product mb-4">
                <?php
                // Set up the query
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    's' => $s,
                    'paged' => $paged,
                    'posts_per_page' => 3,
                    'post_type' => array('product'), // Search for products and posts
                );
                $search_query = new WP_Query($args);
                // Counter for columns to control layout
                $count = 0;
                global $product;
                $productLoop = new WP_Query($args);
                if ($productLoop->have_posts()):
                    while ($productLoop->have_posts()):
                        $productLoop->the_post();
                        $product_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $product = wc_get_product(get_the_ID());
                        $product_id = get_the_ID();
                        $video_iframe = get_field('video_iframe', $product_id);
                        $title = get_the_title();
                        // $add_to_cart = '<a href="' . ($product->get_stock_status() === 'outofstock' ? 'javascript:void(0);' : esc_url(wc_get_cart_url() . '?add-to-cart=' . esc_attr($product_id))) . '" target="_blank" class="red_button w-100 text-center">Add to cart</a>';
                        $product_url = get_the_permalink();
                        if ($product) {
                            if ($product->is_type('variable')) {
                                $min_variation_price = number_format($product->get_variation_price('min'), 2);
                                $max_variation_price = number_format($product->get_variation_price('max'), 2);
                                $price_range = '₱' . $min_variation_price . ' - ' . '₱' . $max_variation_price;
                                $price = $price_range;
                            } else {
                                $price = $product->get_price_html();
                            }
                        } ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="content">
                                <div class="product_image">
                                    <img src="<?php echo $product_image ?>" alt="">
                                </div>
                                <div class="main_content">
                                    <span class="product">Product</span>
                                    <h3><?php echo $title; ?></h3>
                                    <p class="description"><?php echo get_the_content(); ?></p>
                                    <a href="<?php echo get_the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                        <span class="text-uppercase">view product</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                            fill="none">
                                            <g clip-path="url(#clip0_2327_7372)">
                                                <path
                                                    d="M24.7136 11.8087C24.7133 11.8084 24.713 11.8081 24.7127 11.8078L19.61 6.72968C19.2277 6.34926 18.6094 6.35068 18.2289 6.733C17.8484 7.11528 17.8499 7.73359 18.2321 8.11406L21.6581 11.5234H0.976562C0.437207 11.5234 0 11.9606 0 12.5C0 13.0394 0.437207 13.4766 0.976562 13.4766H21.6581L18.2322 16.8859C17.8499 17.2664 17.8484 17.8847 18.2289 18.267C18.6094 18.6494 19.2278 18.6507 19.61 18.2703L24.7127 13.1922C24.713 13.1919 24.7133 13.1915 24.7136 13.1913C25.0961 12.8095 25.0949 12.1892 24.7136 11.8087Z"
                                                    fill="#20201F" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2327_7372">
                                                    <rect width="25" height="25" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    // Reset query to restart from the beginning
                    wp_reset_postdata(); ?>
                    <?php
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="row post">
                <?php
                // Set up the query
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    's' => $s,
                    'paged' => $paged,
                    'posts_per_page' => 6,
                    'post_type' => array('post'), // Search for products and posts
                );
                $search_query = new WP_Query($args);
                // Counter for columns to control layout
                $col_counter = 0;
                // Display the product in the first row
                $product_displayed = false; // To track whether a product has been displayed
                if ($search_query->have_posts()):
                    // First, loop through the results to display only one product in the first row
                    while ($search_query->have_posts()):
                        $search_query->the_post();
                        $searchID = get_the_ID();
                        $post_type = get_post_type(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="small_content d-flex">
                                <div class="blog_image">
                                    <img src="<?php echo get_the_post_thumbnail_url($searchID); ?>" alt="" class="w-100">
                                </div>
                                <div class="content">
                                    <span class="date"><?php echo get_the_date(); ?></span>
                                    <h3><?php echo esc_html(get_the_title()); ?></h3>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" target="_blank" rel="noopener noreferrer"
                                        class="read_more">Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M16 12.0169C15.9981 12.2799 15.9426 12.5397 15.8369 12.7805C15.7312 13.0212 15.5776 13.2378 15.3854 13.4169L9.69722 18.7469C9.50277 18.9204 9.24835 19.0109 8.98827 18.999C8.7282 18.9871 8.48306 18.8737 8.30519 18.6832C8.12732 18.4927 8.0308 18.24 8.03624 17.9791C8.04167 17.7182 8.14864 17.4698 8.3343 17.2869L13.9626 12.0169L8.3343 6.7469C8.23488 6.6582 8.15418 6.5504 8.09695 6.43C8.03972 6.3096 8.00711 6.1789 8.00104 6.0456C7.99497 5.9123 8.01557 5.7792 8.06161 5.654C8.10766 5.5289 8.17823 5.4142 8.26917 5.3168C8.36011 5.2194 8.46957 5.1412 8.59112 5.0868C8.71266 5.0324 8.84383 5.003 8.97691 5.0002C9.10998 4.9974 9.24226 5.0214 9.36597 5.0706C9.48968 5.1198 9.6023 5.1934 9.69722 5.2869L15.3844 10.6129C15.5772 10.7924 15.7313 11.0095 15.8372 11.251C15.9431 11.4925 15.9985 11.7531 16 12.0169Z"
                                                fill="#FF0000"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="paging d-flex justify-content-center align-items-center">
                        <?php
                        $totalPages = $search_query->max_num_pages;
                        echo paginate_links(
                            array(
                                'total' => $totalPages,
                                'mid_size' => 2
                            )
                        );
                        ?>
                    </div>
                    <?php
                    // Reset query to restart from the beginning
                    wp_reset_postdata(); ?>
                    <?php
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>