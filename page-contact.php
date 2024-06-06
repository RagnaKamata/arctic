<?php /*Template Name: Contact Us */
get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/index.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/contact-us.css">
<section class="index-contact l-_hpx tab-top">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="detail d-flex flex-column ">
                        <div class="contact-header">
                            <h2 class="header_text">Reach Out Today for Expert Guidance and Assistance!</h2>
                            <p>Connect with us to learn more about our products, cryotherapy, or any
                                inquiries you may have. We're here to assist you!</p>
                            <div class="contact-details">
                                <p class="d-flex  align-items-center m-0"> <svg xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="26" viewBox="0 0 25 26" fill="none">
                                        <g clip-path="url(#clip0_176_264)">
                                            <path
                                                d="M24.7797 5.20166L17.1978 12.7348L24.7797 20.268C24.9168 19.9815 25 19.6648 25 19.3266V6.14302C25 5.80479 24.9168 5.48813 24.7797 5.20166Z"
                                                fill="#50B0D2" />
                                            <path
                                                d="M22.8027 3.9458H2.19722C1.85898 3.9458 1.54233 4.02896 1.25586 4.16602L10.9464 13.8078C11.8033 14.6646 13.1966 14.6646 14.0535 13.8078L23.744 4.16602C23.4576 4.02896 23.1409 3.9458 22.8027 3.9458Z"
                                                fill="#50B0D2" />
                                            <path
                                                d="M0.220215 5.20166C0.0831543 5.48813 0 5.80479 0 6.14302V19.3266C0 19.6648 0.0831543 19.9815 0.220215 20.268L7.8022 12.7348L0.220215 5.20166Z"
                                                fill="#50B0D2" />
                                            <path
                                                d="M16.1621 13.7705L15.0892 14.8434C13.6615 16.2711 11.3384 16.2711 9.91069 14.8434L8.83784 13.7705L1.25586 21.3037C1.54233 21.4407 1.85898 21.5239 2.19722 21.5239H22.8027C23.1409 21.5239 23.4576 21.4407 23.744 21.3037L16.1621 13.7705Z"
                                                fill="#50B0D2" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_176_264">
                                                <rect width="25" height="25" fill="white"
                                                    transform="translate(0 0.234863)" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                    <a href="mailto:arcticrecoveryph@gmail.com">arcticrecoveryph@gmail.com</a>
                                </p>
                            </div>
                        </div>

                        <div class="user_review">
                            <p class="d-flex align-items-center"> <img
                                    src="<?php echo $asset_path; ?>/assets/images/index/star.png" alt=""> <span
                                    class="m-0">5.0</span> </p>
                            <p>“Siyempre nung una hindi ako sanay sa ganun kalamig na temperature pero eventually nung
                                nag pass na yung first few seconds niya nakaadapt yung katawan. After, sobrang sarap sa
                                pakiramdam na may natapos ka na ganun and kung itrtry ko siya ulit kasi parang maganda
                                siya for recovery lalo na after nag workout or intense na game sa sport na linlaro mo.”
                            </p>
                            <div class="d-flex  align-items-center">
                                <img src="<?php echo $asset_path; ?>/assets/images/index/ellipse.svg"
                                    alt="Peter Navarro">
                                <p class="fw-bold h-4 m-0">Peter Navarro</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="contact-form">
                        <div class="details">
                            <h3>We value your input and are here to address any questions or concerns you may have</h3>
                            <p>Our dedicated team will promptly assist you with expert guidance and personalized
                                solutions tailored to your needs. </p>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="a9c3804" title="Main Homepage Contact Form"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>