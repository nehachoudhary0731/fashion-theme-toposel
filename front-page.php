<?php
/**
 * Template Name: Front Page
 * @package fashion-theme
 */

get_header(); ?>

<main class="mobile-main">

    <!-- HERO SECTION -->
    <?php 
    $hero_image = get_field('hero_image');
    $hero_heading = get_field('hero_heading');
    $hero_subheading = get_field('hero_subheading');
    $hero_button_text = get_field('hero_button_text');
    $hero_button_link = get_field('hero_button_link');
    ?>

    <section class="hero">
        <div class="hero-content">
            <?php if ($hero_heading): ?>
                <h1 class="hero-title"><?php echo esc_html($hero_heading); ?></h1>
            <?php else: ?>
                <h1 class="hero-title">FIND CLOTHES THAT MATCHES YOUR STYLE</h1>
            <?php endif; ?>
            
            <?php if ($hero_subheading): ?>
                <p class="hero-description"><?php echo esc_html($hero_subheading); ?></p>
            <?php else: ?>
                <p class="hero-description">Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.</p>
            <?php endif; ?>
            
            <?php if ($hero_button_text && $hero_button_link): ?>
                <div class="btn-wrapper">
                    <a href="<?php echo esc_url($hero_button_link); ?>" class="hero-btn">
                        <?php echo esc_html($hero_button_text); ?>
                    </a>
                </div>
            <?php else: ?>
                <div class="btn-wrapper">
                    <a href="#" class="hero-btn">Shop Now</a>
                </div>
            <?php endif; ?>

            <!-- STATS SECTION -->
            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-number">200+</span>
                    <span class="stat-label">International<br>Brands</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2,000+</span>
                    <span class="stat-label">High-Quality<br>Products</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">30,000+</span>
                    <span class="stat-label">Happy<br>Customers</span>
                </div>
            </div>
        </div>

        <?php if ($hero_image): ?>
            <div class="hero-image">
                <img src="<?php echo esc_url($hero_image['url']); ?>" 
                     alt="<?php echo esc_attr($hero_image['alt'] ?: 'Hero Image'); ?>">
            </div>
        <?php else: ?>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&auto=format" alt="Hero Image">
            </div>
        <?php endif; ?>
    </section>

    <!-- ===== BRANDS SECTION - SIRF IMAGES ===== -->
    <section class="brands-section">
        <div class="brands-scroll">
            <?php 
            // Loop through 5 brand logo fields
            for ($i = 1; $i <= 5; $i++) {
                $logo = get_field('brand_logo_' . $i);
                
                if ($logo) {
                    ?>
                    <div class="brand-logo">
                        <img src="<?php echo esc_url($logo['url']); ?>" 
                             alt="<?php echo esc_attr($logo['alt'] ?: 'Brand Logo'); ?>">
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </section>

    <!-- NEW ARRIVALS -->
<section class="new-arrivals">
    <h2 class="section-title">NEW ARRIVALS</h2>

    <div class="products-scroll">
        <?php
        if (class_exists('WooCommerce')) {

            $selected_category = get_field('new_arrivals_category');

            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 10,
                'post_status'    => 'publish',
            );

            if ($selected_category) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'term_id',
                        'terms'    => $selected_category,
                    ),
                );
            }

            $products = new WP_Query($args);

            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();

                    $product = wc_get_product(get_the_ID());
                    if (!$product) continue;

                    $regular_price = $product->get_regular_price();
                    $rating        = $product->get_average_rating();
                    $rating_count  = $product->get_rating_count();
        ?>

                    <div class="product-card">

                        <!-- Product Image -->
                        <div class="product-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo $product->get_image(); ?>
                            </a>
                        </div>

                        <div class="product-details">

                            <!-- Product Title -->
                            <h3 class="product-name">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <!-- Rating -->
                            <?php if ($rating_count > 0) : ?>
                                <div class="product-rating">
                                    <?php echo wc_get_rating_html($rating); ?>
                                    <span class="rating-value">
                                        <?php echo number_format($rating, 1); ?>/5
                                    </span>
                                </div>
                            <?php endif; ?>

                            <!-- Price -->
                            <?php if (!empty($regular_price)) : ?>
                                <div class="product-price">
                                    <?php echo wc_price($regular_price); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

        <?php
                endwhile;
                wp_reset_postdata();
            endif;
        }
        ?>
    </div>

    <div class="view-all-wrapper">
        <span class="view-all-btn">View All</span>
    </div>
</section>

</main>

<?php get_footer(); ?>