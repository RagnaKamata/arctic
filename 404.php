<?php /*Template Name: 404 */
get_header(); ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/redirection.css">

<section class="redirection l-_hpx">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="_content">
                <h1 class="header_text">404 error</h1>
                <p>Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac
                    aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos.</p>
                <a href="<?php echo $redirect_url; ?>/" class="cta_global bnc">Back to Homepage</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>