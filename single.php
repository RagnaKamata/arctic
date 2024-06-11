<?php /*Template Name: Blogs */
get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/main-blog.css">
<section class="index-blog l-_hpx">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="header_content text-center">
                <h2 class="header_text">Recent Blogs</h2>
                <p class="black-text">Lorem ipsum dolor sit amet consectetur. Ultrices arcu ac quis egestas vehicula eu
                    maecenas. Lectus orci sit varius nam mauris semper. Euismod scelerisque sit fermentum at donec.</p>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-6 col-12">
                    <div class=" blog_card d-flex align-items-end text-white position-relative">
                        <div class="image"> <img src="<?php echo $asset_path; ?>/assets/images/blogs/recent-blog1.jpg"
                                class="w-100 h-100" alt=""> </div>
                        <div class="content position-relative z-2">
                            <p class="date">April 26,2024</p>
                            <p class="h-tag fw-bold h-4">Forem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</p>
                            <p class="details">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                libero et velit interdum, ac aliquet odio mattis.</p>
                            <div class="cta">

                                <a href="http://" target="_blank" class="fw-bold h-4">Read More <svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                        fill="none">
                                        <g clip-path="url(#clip0_813_390)">
                                            <path
                                                d="M24.7136 11.8087C24.7133 11.8084 24.713 11.8081 24.7127 11.8078L19.61 6.72968C19.2277 6.34926 18.6094 6.35068 18.2289 6.733C17.8484 7.11528 17.8499 7.73359 18.2321 8.11406L21.6581 11.5234H0.976562C0.437207 11.5234 0 11.9606 0 12.5C0 13.0394 0.437207 13.4766 0.976562 13.4766H21.6581L18.2322 16.8859C17.8499 17.2664 17.8484 17.8847 18.2289 18.267C18.6094 18.6494 19.2278 18.6507 19.61 18.2703L24.7127 13.1922C24.713 13.1919 24.7133 13.1915 24.7136 13.1913C25.0961 12.8095 25.0949 12.1892 24.7136 11.8087Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_813_390">
                                                <rect width="25" height="25" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 col-12">
                    <div class=" blog_card d-flex align-items-end text-white position-relative">
                        <div class="image">
                            <img src="<?php echo $asset_path; ?>/assets/images/recent-blog2.jpg" class="w-100 h-100"
                                alt="">
                        </div>
                        <div class="content position-relative z-2">
                            <p class="date">April 26,2024</p>
                            <p class="h-tag fw-bold h-4">Forem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</p>
                            <p class="details">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                libero et velit interdum, ac aliquet odio mattis.</p>
                            <div class="cta">

                                <a href="http://" target="_blank" class="fw-bold h-4">Read More <svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                        fill="none">
                                        <g clip-path="url(#clip0_813_390)">
                                            <path
                                                d="M24.7136 11.8087C24.7133 11.8084 24.713 11.8081 24.7127 11.8078L19.61 6.72968C19.2277 6.34926 18.6094 6.35068 18.2289 6.733C17.8484 7.11528 17.8499 7.73359 18.2321 8.11406L21.6581 11.5234H0.976562C0.437207 11.5234 0 11.9606 0 12.5C0 13.0394 0.437207 13.4766 0.976562 13.4766H21.6581L18.2322 16.8859C17.8499 17.2664 17.8484 17.8847 18.2289 18.267C18.6094 18.6494 19.2278 18.6507 19.61 18.2703L24.7127 13.1922C24.713 13.1919 24.7133 13.1915 24.7136 13.1913C25.0961 12.8095 25.0949 12.1892 24.7136 11.8087Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_813_390">
                                                <rect width="25" height="25" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>