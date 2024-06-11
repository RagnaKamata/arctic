<?php /*Template Name: Contact Us */
get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/contact-template.css">

<section class="ctf l-_hpx">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="detail d-flex flex-column ">
                        <div class="contact-header">
                            <h1 class="header_text">Lorem ipsum dolor sit amet</h1>
                            <p>Lorem ipsum dolor sit amet consectetur. Ultrices arcu ac quis egestas vehicula eu
                                maecenas. Lectus orci sit varius nam mauris semper. Euismod scelerisque sit fermentum at
                                donec.</p>
                        </div>

                        <div class="user_review">
                            <p class="d-flex align-items-center"> <img
                                    src="<?php echo $asset_path; ?>/assets/images/index/star.png" alt=""> <span
                                    class="m-0">5.0</span> </p>
                            <p>“Ang lamig. Matagal ko gusto siyang itry kasi nga I’m also an athlete. I play football.
                                Yung katawan ko bugbog na din sa training and madami rin na nagsasabi na madami siyang
                                benefits kaya ginawa ko siya. 
                            </p>
                            <p>I will definitely try it again and do it again with Artic na rin.”</p>
                            <div class="d-flex  align-items-center">
                                <img src="<?php echo $asset_path; ?>/assets/images/index/ellipse.svg"
                                    alt="Peter Navarro">
                                <p class="fw-bold h-4 m-0">Kevin Alcantara</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="contact-form">
                        <div class="details">
                            <h4>Lorem ipsum dolor sit amet consectetur. Ultrices arcu ac quis egestas vehicula eu </h4>
                            <p>Lorem ipsum dolor sit amet consectetur. Ultrices arcu ac quis egestas vehicula eu
                                maecenas. Lectus orci sit varius nam mauris semper. Euismod scelerisque sit fermentum at
                                donec.</p>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="a9c3804" title="Main Homepage Contact Form"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>