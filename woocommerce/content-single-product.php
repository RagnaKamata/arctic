<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$post_id = get_the_ID();
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/single-product.css">

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>


	<section class="single_product l-_hpx">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="row">
					<div class="col-xl-6 col-lg-12">
						<div class="single_images">
							<?php
							if (function_exists('woocommerce_show_product_images')) {
								woocommerce_show_product_images();
							}
							?>

						</div>
					</div>
					<div class="col-xl-6 col-lg-12">
						<div class="summary entry-summary">
							<?php
							if ($post_id == 111) {
								echo '<h2 class="header_text product_title">' . get_the_title() . '</h2>';
							} else {
								echo '<h1 class="header_text product_title">' . get_the_title() . '</h1>';
							}
							?>
							<?php if (!wc_review_ratings_enabled()) {
								return;
							}
							$rating_count = $product->get_rating_count();
							$review_count = $product->get_review_count();
							$average = $product->get_average_rating();
							if ($rating_count > 0): ?>
								<div class="product_reviews d-flex align-items-center">
									<?php
									for ($i = 1; $i <= 5; $i++): ?>
										<?php if ($i <= $review_count): ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"
												fill="#FFD600">
												<path
													d="M10 0.5L12.2451 7.40983H19.5106L13.6327 11.6803L15.8779 18.5902L10 14.3197L4.12215 18.5902L6.36729 11.6803L0.489435 7.40983H7.75486L10 0.5Z" />
											</svg>
										<?php else: ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"
												fill="#A9A9A9">
												<path
													d="M10 0.5L12.2451 7.40983H19.5106L13.6327 11.6803L15.8779 18.5902L10 14.3197L4.12215 18.5902L6.36729 11.6803L0.489435 7.40983H7.75486L10 0.5Z" />
											</svg>
										<?php endif; ?>
									<?php endfor; ?>
									<div class="review_summary">
										<span><?php echo number_format($review_count, 1); ?></span>
									</div>
								</div>
							<?php endif; ?>
							<div class="product_price">
								<?php if ($price_html = $product->get_price_html()): ?>
									<span class="price h-3"><?php echo $price_html; ?></span>
								<?php endif; ?>
							</div>
							<div class="info">
								<p>
									<?php echo apply_filters('woocommerce_short_description', $product->get_short_description()); ?>
								</p>
							</div>
							<?php
							// Display variation dropdown if variations exist
							if ($product->is_type('variable')) {
								woocommerce_template_single_add_to_cart();
							} else {
								// If product does not have variations, display regular add to cart form
								?>
								<?php if (!$product->is_purchasable()) {
									return;
								}
								echo wc_get_stock_html($product); // WPCS: XSS ok.
								if ($product->is_in_stock()): ?>
									<?php do_action('woocommerce_before_add_to_cart_form'); ?>
									<form class="cart"
										action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
										method="post" enctype='multipart/form-data'>
										<?php do_action('woocommerce_before_add_to_cart_button'); ?>
										<?php
										do_action('woocommerce_before_add_to_cart_quantity');
										woocommerce_quantity_input(
											array(
												'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
												'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
												'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
											)
										);
										do_action('woocommerce_after_add_to_cart_quantity');
										?>
										<button type="submit" name="add-to-cart"
											value="<?php echo esc_attr($product->get_id()); ?>"
											class="single_add_to_cart_button buttont alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
										<?php do_action('woocommerce_after_add_to_cart_button'); ?>
									</form>
									<?php do_action('woocommerce_after_add_to_cart_form'); ?>
								<?php endif;
							}
							?>

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Summary -->
	<!-- Product Reviews -->
	<section>
		<div class="container-fluid">
			<div class="wrapper">
				<div class="review">

				</div>
			</div>
		</div>
	</section>
	<!-- Product Reviews -->
</div>

<?php do_action('woocommerce_after_single_product'); ?>

