<?php

if (!function_exists('arctic')):

   function arctic()
   {

      add_theme_support('post-thumbnails');

      add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

      register_nav_menus(
         array(

            'primary' => __('Primary Menu', 'arctic_main_menu')

         ));

      add_theme_support('woocommerce');

      add_theme_support('wc-product-gallery-zoom');

      add_theme_support('wc-product-gallery-lightbox');

      add_theme_support('wc-product-gallery-slider');

   }

endif;

add_action('after_setup_theme', 'arctic');

function get_excerpt($limit, $source = null)
{

   $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();

   $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);

   $excerpt = strip_shortcodes($excerpt);

   $excerpt = strip_tags($excerpt);

   $excerpt = substr($excerpt, 0, $limit);

   $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

   $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));

   return $excerpt;

}
add_filter('woocommerce_dropdown_variation_attribute_options_args', 'my_wc_filter_dropdown_args', 10);
function my_wc_filter_dropdown_args($args)
{
   $args['show_option_none'] = '';
   return $args;
}


/*=== Add Plus and Minus Button for Quantity Input ===  */
add_action('woocommerce_after_quantity_input_field', 'custom_display_quantity_plus');

function custom_display_quantity_plus()
{
   echo '<button type="button" class="plus"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
  <path d="M0.146484 0.857178H38.1465C39.8033 0.857178 41.1465 2.20032 41.1465 3.85718V38.8572C41.1465 40.514 39.8033 41.8572 38.1465 41.8572H0.146484V0.857178Z" fill="#50B0D2"/>
  <path d="M28.1465 22.8572H22.1465V28.8572H20.1465V22.8572H14.1465V20.8572H20.1465V14.8572H22.1465V20.8572H28.1465V22.8572Z" fill="white"/>
</svg></button>';
}

add_action('woocommerce_before_quantity_input_field', 'custom_display_quantity_minus');

function custom_display_quantity_minus()
{
   echo '<button type="button" class="minus"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
  <path d="M0.146484 3.85718C0.146484 2.20032 1.48963 0.857178 3.14648 0.857178H41.1465V41.8572H3.14648C1.48963 41.8572 0.146484 40.514 0.146484 38.8572V3.85718Z" fill="#50B0D2"/>
  <path d="M28.1465 22.8572H14.1465V20.8572H28.1465V22.8572Z" fill="white"/>
</svg></button>';
}

// -------------
// 2. Trigger update quantity script

add_action('wp_footer', 'custom_add_cart_quantity_plus_minus');

function custom_add_cart_quantity_plus_minus()
{

   if (!is_product() && !is_cart())
      return;

   wc_enqueue_js("   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   ");
}


/*=== Add Plus and Minus Button for Quantity Input ===  */

