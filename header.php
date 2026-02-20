<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">
    <!-- TOP BANNER -->
    <?php 
    $announcement_text = get_field('announcement_text', 'option');
    if ($announcement_text): 
    ?>
    <div class="top-banner">
        <p class="banner-text"><?php echo esc_html($announcement_text); ?> <span class="signup-link">Sign Up Now</span></p>
    </div>
    <?php else: ?>
    <div class="top-banner">
        <p class="banner-text">Sign up and get 20% off to your first order. <span class="signup-link">Sign Up Now</span></p>
    </div>
    <?php endif; ?>

    <!-- HEADER with 3 icons -->
    <header class="header">
        <div class="header-container">
            <!-- Hamburger Menu -->
            <button class="menu-btn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">SHOP.CO</a>
            </div>
            
            <!-- Right Icons - 3 icons -->
            <div class="header-icons">
                <button class="search-btn" aria-label="Search">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </button>
                <button class="cart-btn" aria-label="Cart">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M8 10H5L7 4H17L19 10H16M8 10L10 16H16L18 10M8 10H16M6 20C5.44772 20 5 19.5523 5 19C5 18.4477 5.44772 18 6 18C6.55228 18 7 18.4477 7 19C7 19.5523 6.55228 20 6 20ZM18 20C17.4477 20 17 19.5523 17 19C17 18.4477 17.4477 18 18 18C18.5523 18 19 18.4477 19 19C19 19.5523 18.5523 20 18 20Z" stroke="black" stroke-width="1.5"/>
                    </svg>
                </button>
                <button class="profile-btn" aria-label="Profile">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M20 21V19C20 16.7909 18.2091 15 16 15H8C5.79086 15 4 16.7909 4 19V21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>