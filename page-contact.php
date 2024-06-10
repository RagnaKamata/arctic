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

                            <div class="owl-carousel owl-theme">
                                <?php
                                $reviews = [
                                    [
                                        "name" => "Kevin Alcantara",
                                        "quote" => "<p>“Ang lamig. Matagal ko gusto siyang itry kasi nga I’m also an athlete. I play football. Yung katawan ko bugbog na din sa training and madami rin na nagsasabi na madami siyang benefits kaya ginawa ko siya.</p>
                                <p>I will definitely try it again and do it again with Artic na rin.”</p>"
                                    ],
                                    ["name" => "Zhemin Sanico", "quote" => "<p>“Sa umpisa parang first time ulit. Tintry ko imanage yung cold. . . Overall, fulfilling. Mas okay siya two to three times a week para masanay yung katawan. Masarap naman! ”</p>"],
                                    ["name" => "Jethric See", "quote" => "<p>“At first I was frightened because I’ve never tried it. It was a new experience. I would do it again.”</p>"],
                                    ["name" => "Peter Navarro", "quote" => "<p>“Siyempre nung una hindi ako sanay sa ganun kalamig na temperature pero eventually nung nag pass na yung first few seconds niya nakaadapt yung katawan. After, sobrang sarap sa pakiramdam na may natapos ka na ganun and kung itrtry ko siya ulit kasi parang maganda siya for recovery lalo na after nag workout or intense na game sa sport na linlaro mo.”</p>"],
                                    [
                                        "name" => "Jamell Buan",
                                        "quote" => "<p>“First medyo may gulat factor yung tubig pero once na-submerge na yung half and yung shoulders medyo okay na medyo nagpapakalma na yung water for me.</p>
                                <p>Looking forward to do this again especially na meron kaming training and maganda siya for recovery for us.”</p>"
                                    ]
                                ];
                                foreach ($reviews as $review) {
                                    ?>
                                    <div class="user_review">
                                        <p class="d-flex align-items-center"> <img
                                                src="<?php echo $asset_path; ?>/assets/images/index/star.png" alt=""> <span
                                                class="m-0">5.0</span> </p>
                                        <p><?php echo $review['quote']; ?></p>
                                        <div class="d-flex  align-items-center">
                                            <img src="<?php echo $asset_path; ?>/assets/images/index/ellipse.svg"
                                                alt="Peter Navarro">
                                            <p class="fw-bold h-4 m-0"><?php echo $review['name']; ?></p>
                                            <div class="btns">
                                                <div class="customNextBtn"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="32" height="33" viewBox="0 0 32 33" fill="none">
                                                        <path d="M19 9.76587L12 16.7659L19 23.7659"
                                                            stroke="url(#paint0_linear_2267_1824)" stroke-opacity="0.7"
                                                            stroke-width="2.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <circle cx="16" cy="16.7659" r="14.75"
                                                            stroke="url(#paint1_linear_2267_1824)" stroke-opacity="0.7"
                                                            stroke-width="2.5" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_2267_1824" x1="10.8864"
                                                                y1="16.7659" x2="20.5312" y2="16.7659"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#A700FF" />
                                                                <stop offset="1" stop-color="#0FC1FF" />
                                                            </linearGradient>
                                                            <linearGradient id="paint1_linear_2267_1824" x1="-5.09091"
                                                                y1="16.7659" x2="39" y2="16.7659"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#A700FF" />
                                                                <stop offset="1" stop-color="#0FC1FF" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg></div>
                                                <div class="customPreviousBtn"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="32" height="33" viewBox="0 0 32 33" fill="none">
                                                        <path d="M13 9.76587L20 16.7659L13 23.7659"
                                                            stroke="url(#paint0_linear_2267_1828)" stroke-width="2.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <circle cx="16" cy="16" r="14.75"
                                                            transform="matrix(-1 0 0 1 32 0.765869)"
                                                            stroke="url(#paint1_linear_2267_1828)" stroke-width="2.5" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_2267_1828" x1="21.1136"
                                                                y1="16.7659" x2="11.4688" y2="16.7659"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#A700FF" />
                                                                <stop offset="1" stop-color="#0FC1FF" />
                                                            </linearGradient>
                                                            <linearGradient id="paint1_linear_2267_1828" x1="-5.09091"
                                                                y1="16" x2="39" y2="16" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#A700FF" />
                                                                <stop offset="1" stop-color="#0FC1FF" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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

<script>

    $(document).ready(function () {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            items: 1,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });

        // Custom Button
        $('.customNextBtn').click(function () {
            owl.trigger('next.owl.carousel');
        });
        $('.customPreviousBtn').click(function () {
            owl.trigger('prev.owl.carousel');
        });

    });
</script>