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
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/accordion.css">

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>


	<section class="single_product l-_hpx">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="main_ row">
					<div class="col-lg-6 col-12">
						<div class="single_images <?php the_field('product_gallery_layout'); ?>">
							<?php
							if (function_exists('woocommerce_show_product_images')) {
								woocommerce_show_product_images();
							}
							?>

						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="summary entry-summary mb-0">
							<?php
							if ($post_id == 111) {
								echo '<h2 class="header_text product_title">' . get_the_title() . '</h2>';
							} else {
								echo '<h1 class="header_text product_title">' . get_the_title() . '</h1>';
							}
							?>
							<!-- reviews count -->

							<?php
							$count = $product->get_review_count();
							$average = $product->get_average_rating();

							if ($count > 0 && wc_review_ratings_enabled()):
								?>
								<div class="single_star d-none">
									<!-- <div class="star-rating" title="<?php echo esc_attr($average); ?>">
										<span style="width:<?php echo (floatval($average) / 5) * 100; ?>%">
											<strong class="rating">
												<?php echo esc_html($average); ?>
											</strong> out of 5
										</span>
									</div> -->
									<?php
									$product_id = $product->get_id();
									$review_count = get_comments_number($product_id);

									// Calculate total ratings and average again for clarity
									$reviews = get_comments(
										array(
											'post_id' => $product_id,
											'status' => 'approve',
											'type' => 'review'
										)
									);

									$total_rating = 0;
									foreach ($reviews as $review) {
										$rating = intval(get_comment_meta($review->comment_ID, 'rating', true));
										$total_rating += $rating;
									}

									if (count($reviews) > 0) {
										$average = $total_rating / count($reviews);
									}
									?>
									<!-- <p class="m-0"><?php echo number_format($average, 1); ?> ( <?php echo $review_count; ?> Reviews )</p> -->
								</div>
							<?php endif; ?>

							<div class="product_price">
								<?php if ($price_html = $product->get_price_html()): ?>
									<span class="price h-3"><?php echo $price_html; ?></span>
								<?php endif; ?>
							</div>
							<div class="info">
									<?php echo apply_filters('woocommerce_short_description', $product->get_short_description()); ?>
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
	<!-- Product Details -->
	<section class="product_details  l-_hpx tab-top">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="accordion faqs_main" id="productAccordion">
					<div class="accordion-item">
						<div class="accordion-header" id="productDetailsHeader">
							<button class="accordion-button" type="button" data-bs-toggle="collapse"
								data-bs-target="#productDetails" aria-expanded="true" aria-controls="productDetails">
								Product Details
							</button>
						</div>
						<div id="productDetails" class="accordion-collapse collapse show"
							aria-labelledby="productDetailsHeader">
							<div class="accordion-body">
								<ul>
									<?php if (have_rows('product_details')):
										while (have_rows('product_details')):
											the_row(); ?>
											<li>
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/ice.svg"
													class="w-100"><?php the_sub_field('list'); ?>
											</li>
										<?php endwhile;
									endif; ?>
								</ul>
							</div>
						</div>
					</div>

					<div class="accordion-item">
						<div class="accordion-header" id="productSpecificationsHeader">
							<button class="accordion-button" type="button" data-bs-toggle="collapse"
								data-bs-target="#productSpecifications" aria-expanded="true"
								aria-controls="productSpecifications">
								Product Specifications
							</button>
						</div>
						<div id="productSpecifications" class="accordion-collapse collapse show"
							aria-labelledby="productSpecificationsHeader">
							<div class="accordion-body">
								<ul>
									<?php if (have_rows('product_specifications')):
										while (have_rows('product_specifications')):
											the_row(); ?>
											<li>
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/ice.svg"
													class="w-100"><?php the_sub_field('list'); ?>
											</li>
										<?php endwhile;
									endif; ?>
								</ul>
							</div>
						</div>
					</div>

					<div class="accordion-item">
						<div class="accordion-header" id="shippingDeliveryHeader">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#shippingDelivery" aria-expanded="false"
								aria-controls="shippingDelivery">
								Shipping & Delivery
							</button>
						</div>
						<div id="shippingDelivery" class="accordion-collapse collapse"
							aria-labelledby="shippingDeliveryHeader">
							<div class="accordion-body">
								<div class="details">
									<?php the_field('shipping_&_delivery'); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="accordion-item">
						<div class="accordion-header" id="cautionHeader">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
								data-bs-target="#caution" aria-expanded="false" aria-controls="caution">
								Caution
							</button>
						</div>
						<div id="caution" class="accordion-collapse collapse" aria-labelledby="cautionHeader">
							<div class="accordion-body">
								<div class="details">
									<?php the_field('caution'); ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<section class="what-included-box l-_hpx">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="main d-flex">
					<div class="custom">
						<h2 class="header_text">what’s included in the box?</h2>
						<div class="d-flex">
							<?php if (have_rows('included_box')):
								while (have_rows('included_box')):
									the_row(); ?>
									<div class="c_card">
										<h4><?php the_sub_field('header_text'); ?></h4>
										<?php the_sub_field('content'); ?>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</div>
					<div class="image">
						<img src="<?php the_field('included_box_image'); ?>" class="w-100"
							alt="what’s included in the box?">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Details -->
	<!-- Product Reviews -->
	<section class="d-none">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="review">
					<?php comments_template(); ?>

				</div>
			</div>
		</div>
	</section>
	<!-- Product Reviews -->
</div>

<?php do_action('woocommerce_after_single_product'); ?>