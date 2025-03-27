<?php
/**
 * Template Name: Hi-Tec Landing Page
 * Description: A custom template for the Hi-Tec landing page
 */

get_header();
?>

<div class="hitec-landing">
    <!-- Custom Header -->
    <header class="hitec-custom-header">
        <div class="hitec-header-container">
            <div class="hitec-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hitec-logo.png" alt="Hi-Tec Logo">
                </a>
            </div>
            
            <nav class="hitec-main-nav">
                <ul>
                    <li><a href="/hombres">Hombres</a></li>
                    <li><a href="/mujeres">Mujeres</a></li>
                    <li><a href="/ninos">Niños</a></li>
                    <li><a href="/nuestra-tecnologia">Nuestra Tecnología</a></li>
                    <li><a href="/nosotros">Nosotros</a></li>
                </ul>
            </nav>
            
            <div class="hitec-header-icons">
                <a href="/mi-cuenta" class="hitec-icon account"><i class="fas fa-user"></i></a>
                <button class="hitec-icon search"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hitec-hero">
        <div class="hitec-hero-content">
            <h1>TE ACOMPAÑAMOS<br />EN CADA PASO</h1>
            <p class="hitec-hashtag">#AHORACAMINARESMEJOR</p>
            <a href="/shop" class="hitec-shop-now">SHOP NOW</a>
        </div>
    </section>

    <!-- Product Carousel Section -->
    <section class="hitec-carousel">
        <div class="hitec-carousel-container">
            <div class="hitec-carousel-track">
                <div class="hitec-carousel-slide">
                    <div class="hitec-carousel-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/nomad-orange.jpg" alt="Nomad Orange" />
                        <div class="hitec-carousel-text">
                            <h3>NUEVO LANZAMIENTO</h3>
                            <h2>NOMAD, UNA ERA DE REVOLUCIÓN</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" class="hitec-ver-mas">VER MÁS</a>
                        </div>
                    </div>
                </div>
                <div class="hitec-carousel-slide">
                    <div class="hitec-carousel-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/nomad-blue.jpg" alt="Nomad Blue" />
                        <div class="hitec-carousel-text">
                            <h3>NUEVO LANZAMIENTO</h3>
                            <h2>NOMAD, UNA ERA DE REVOLUCIÓN</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" class="hitec-ver-mas">VER MÁS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hitec-carousel-nav">
                <button class="hitec-carousel-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="hitec-carousel-next"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="hitec-carousel-dots"></div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="hitec-products">
        <div class="hitec-container">
            <div class="hitec-featured-header-container">
                <div class="hitec-featured-product">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-shoe.png" alt="Zapato destacado Hi-Tec" />
                </div>
                <div class="hitec-section-header">
                    <h2>NUESTROS</h2>
                    <h3>PRODUCTOS ESTRELLA</h3>
                </div>
                
            </div>
            
            <div class="hitec-product-grid">
                <?php
                $products = array(
                    array(
                        'image' => get_template_directory_uri() . '/assets/images/shoe1.png',
                        'title' => 'Zapato nomad ejemplo',
                        'description' => 'Descubre más',
                        'link' => '/producto/nomad-1/'
                    ),
                    array(
                        'image' => get_template_directory_uri() . '/assets/images/shoe2.png',
                        'title' => 'Zapato nomad ejemplo',
                        'description' => 'Descubre más',
                        'link' => '/producto/nomad-2/'
                    ),
                    array(
                        'image' => get_template_directory_uri() . '/assets/images/shoe3.png',
                        'title' => 'Zapato nomad ejemplo',
                        'description' => 'Descubre más',
                        'link' => '/producto/nomad-3/'
                    ),
                    array(
                        'image' => get_template_directory_uri() . '/assets/images/shoe4.png',
                        'title' => 'Zapato nomad ejemplo',
                        'description' => 'Descubre más',
                        'link' => '/producto/nomad-4/'
                    ),
                );
                
                foreach ($products as $product) :
                ?>
                <div class="hitec-product-item">
                    <a href="<?php echo esc_url($product['link']); ?>" class="hitec-product-link">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" />
                        <h4><?php echo $product['title']; ?></h4>
                        <p><?php echo $product['description']; ?></p>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="hitec-all-products">
                <a href="/productos" class="hitec-button">TODOS NUESTROS PRODUCTOS</a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="hitec-benefits">
        <div class="hitec-container">
            <div class="hitec-section-header">
                <h3>BENEFICIOS</h3>
                <p>SOLO PARA TI</p>
            </div>
            
            <div class="hitec-benefits-grid">
                <div class="hitec-benefit-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dri-tec.png" alt="DRI-TEC Technology" />
                    <h4>MANTÉNGASE SECO</h4>
                    <p>Una membrana impermeable y transpirable mantiene los pies secos.</p>
                </div>
                
                <div class="hitec-benefit-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/xlr8.png" alt="XLR8 Technology" />
                    <h4>AMORTIGUACIÓN EXCEPCIONAL</h4>
                    <p>La entresuela de doble densidad garantiza una amortiguación y comodidad duraderas.</p>
                </div>
                
                <div class="hitec-benefit-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/geo-foam.png" alt="GEO FOAM Technology" />
                    <h4>PROPÚLSATE</h4>
                    <p>La entresuela de doble densidad GEO optimiza su carrera con soporte, estabilidad y comodidad superior.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Lifestyle Images Section -->
    <section class="hitec-lifestyle">
        <h2>¡MIRA TODO LO QUE OFRECEMOS!</h2>
        <a href="/productos" class="hitec-button">TODOS NUESTROS PRODUCTOS AQUÍ</a>
        <div class="hitec-lifestyle-grid">
            <div class="hitec-lifestyle-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lifestyle1.jpg" alt="Hi-Tec Lifestyle" />
            </div>
            <div class="hitec-lifestyle-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lifestyle2.jpg" alt="Hi-Tec Lifestyle" />
            </div>
            <div class="hitec-lifestyle-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lifestyle3.jpg" alt="Hi-Tec Lifestyle" />
            </div>
            <div class="hitec-lifestyle-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lifestyle4.jpg" alt="Hi-Tec Lifestyle" />
            </div>
        </div>
    </section>

    <!-- Store Info Section -->
    <section class="hitec-store-info">
        <div class="hitec-container">
            <div class="hitec-info-grid">
                <div class="hitec-info-item">
                    <h4>Tienda Hi-Tec</h4>
                    <ul>
                        <li><a href="/hombres">Hombres</a></li>
                        <li><a href="/mujeres">Mujeres</a></li>
                        <li><a href="/ninos">Niños</a></li>
                        <li><a href="/tecnologia">Nuestra tecnología</a></li>
                        <li><a href="/nosotros">Sobre Nosotros</a></li>
                    </ul>
                </div>
                
                <div class="hitec-info-item">
                    <h4>Atención al Cliente</h4>
                    <ul>
                        <li><a href="/contacto">Contáctenos</a></li>
                    </ul>
                </div>
                
                <div class="hitec-info-item">
                    <h4>Social Media</h4>
                    <div class="hitec-social">
                        <a href="#" class="hitec-social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hitec-social-icon twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hitec-social-icon instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

