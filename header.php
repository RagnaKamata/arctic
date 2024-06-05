<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php wp_title(); ?> </title>
    <?php global $asset_path;
    $asset_path = get_stylesheet_directory_uri();
    global $redirect_url;
    $redirect_url = get_home_url(); ?>
    <?php include ('stylesheet-manager.php'); ?> <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="sticky_header" style="background:#20201F; ">
        <p class="m-0 fw-bold text-uppercase text-white d-flex justify-content-center align-items-center p-2 gap-3" style="height:50px;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/cargo-truck.svg"
                alt="Cargo Truck">Free delivery within metro manila</p>
    </div>
    <header class="sticky_nav bg-white sticky-top">
        <div class="container-fluid">
            <div class="wrapper">
                <nav class="navbar navbar-expand-xl"> <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> </button> <a class="navbar-brand" href="#"> <img
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/Arctic-Logo.png"
                            class="d-block w-100" alt="Arctic Logo"> </a>
                    <div class="header_list">
                        <div class="icons_button">
                            <div class="row">
                                <ul class="m-0">
                                    <li> <a href="" target="_blank"> <img
                                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/search.svg"
                                                alt=""> </a> </li>
                                    <li> <a href="" target="_blank"> <img
                                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/grocery-store.svg"
                                                alt=""> </a> </li>
                                    <li> <a href="" target="_blank"> <img
                                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/general/avatar.svg"
                                                alt=""> </a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php wp_nav_menu(array('Primary Menu' => 'arctic_main_menu', 'menu_class' => 'd-flex links-nav navbar-nav', 'container' => false)); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>