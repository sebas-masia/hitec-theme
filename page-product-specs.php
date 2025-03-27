<?php
/**
 * Template Name: Product Specifications
 * Description: A custom template for displaying product specifications
 */

get_header();

// Get product ID from URL parameter
$product_slug = get_query_var('producto');
if (!$product_slug) {
    wp_redirect(home_url('/'));
    exit;
}

// Get product data based on slug
$product_data = get_product_data_by_slug($product_slug);
if (!$product_data) {
    wp_redirect(home_url('/'));
    exit;
}

// Helper function to get product data
function get_product_data_by_slug($slug) {
    // This is a sample product data array - you should replace this with your actual data source
    $products_data = array(
        'nomad-1' => array(
            'name' => 'Nomad Orange',
            'description' => 'The revolutionary Nomad Orange shoe for ultimate comfort.',
            'images' => array(
                'main' => get_template_directory_uri() . '/assets/images/shoe1.png',
                'thumbnails' => array() // No thumbnails needed
            ),
            'features' => array(
                'Tecnología DRI-TEC impermeable',
                'Suela de doble densidad',
                'Diseño ergonómico'
            ),
            'specs' => array(
                'materials' => array(
                    'Upper' => 'Mesh sintético de alta calidad',
                    'Suela' => 'Goma de doble densidad'
                ),
                'characteristics' => array(
                    'Impermeable',
                    'Transpirable',
                    'Ligero'
                ),
                'usage' => array(
                    'Ideal para caminatas',
                    'Uso diario',
                    'Actividades al aire libre'
                )
            )
        ),
        'nomad-2' => array(
            'name' => 'Nomad Earth',
            'description' => 'The versatile Nomad Earth shoe for urban adventures.',
            'images' => array(
                'main' => get_template_directory_uri() . '/assets/images/shoe2.png',
                'thumbnails' => array() // No thumbnails needed
            ),
            'features' => array(
                'Tecnología DRI-TEC impermeable',
                'Suela de doble densidad',
                'Diseño urbano moderno'
            ),
            'specs' => array(
                'materials' => array(
                    'Upper' => 'Mesh sintético premium',
                    'Suela' => 'Goma de doble densidad'
                ),
                'characteristics' => array(
                    'Impermeable',
                    'Transpirable',
                    'Estilo urbano'
                ),
                'usage' => array(
                    'Uso diario',
                    'Actividades urbanas',
                    'Casual wear'
                )
            )
        ),
        'nomad-3' => array(
            'name' => 'Nomad Sand',
            'description' => 'The elegant Nomad Sand shoe for everyday comfort.',
            'images' => array(
                'main' => get_template_directory_uri() . '/assets/images/shoe3.png',
                'thumbnails' => array() // No thumbnails needed
            ),
            'features' => array(
                'Tecnología DRI-TEC impermeable',
                'Suela de doble densidad',
                'Diseño minimalista'
            ),
            'specs' => array(
                'materials' => array(
                    'Upper' => 'Mesh sintético ligero',
                    'Suela' => 'Goma de doble densidad'
                ),
                'characteristics' => array(
                    'Impermeable',
                    'Transpirable',
                    'Elegante'
                ),
                'usage' => array(
                    'Uso diario',
                    'Ocasiones casuales',
                    'Comfort wear'
                )
            )
        ),
        'nomad-4' => array(
            'name' => 'Nomad Night',
            'description' => 'The sleek Nomad Night shoe for urban style.',
            'images' => array(
                'main' => get_template_directory_uri() . '/assets/images/shoe4.png',
                'thumbnails' => array() // No thumbnails needed
            ),
            'features' => array(
                'Tecnología DRI-TEC impermeable',
                'Suela de doble densidad',
                'Diseño contemporáneo'
            ),
            'specs' => array(
                'materials' => array(
                    'Upper' => 'Mesh sintético premium',
                    'Suela' => 'Goma de doble densidad'
                ),
                'characteristics' => array(
                    'Impermeable',
                    'Transpirable',
                    'Moderno'
                ),
                'usage' => array(
                    'Uso diario',
                    'Estilo urbano',
                    'Casual wear'
                )
            )
        )
    );
    
    return isset($products_data[$slug]) ? $products_data[$slug] : null;
}
?>

<div class="hitec-product-specs">
    <!-- Product Details Section -->
    <section class="hitec-product-details">
        <div class="hitec-container">
            <div class="hitec-product-layout">
                <!-- Product Images -->
                <div class="hitec-product-gallery">
                    <div class="hitec-main-image">
                        <img src="<?php echo esc_url($product_data['images']['main']); ?>" alt="<?php echo esc_attr($product_data['name']); ?>" />
                    </div>
                </div>

                <!-- Product Info -->
                <div class="hitec-product-info">
                    <h1><?php echo esc_html($product_data['name']); ?></h1>
                    
                    <div class="hitec-product-description">
                        <p><?php echo esc_html($product_data['description']); ?></p>
                    </div>

                    <div class="hitec-product-features">
                        <h3>Características Principales</h3>
                        <ul>
                            <?php foreach ($product_data['features'] as $feature) : ?>
                                <li><i class="fas fa-check"></i> <?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Technical Specifications -->
            <div class="hitec-technical-specs">
                <h2>Especificaciones Técnicas</h2>
                <div class="hitec-specs-grid">
                    <div class="hitec-spec-item">
                        <h4>Materiales</h4>
                        <p>
                            <?php foreach ($product_data['specs']['materials'] as $material => $description) : ?>
                                <?php echo esc_html($material); ?>: <?php echo esc_html($description); ?><br>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="hitec-spec-item">
                        <h4>Características</h4>
                        <p>
                            <?php foreach ($product_data['specs']['characteristics'] as $characteristic) : ?>
                                • <?php echo esc_html($characteristic); ?><br>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="hitec-spec-item">
                        <h4>Uso Recomendado</h4>
                        <p>
                            <?php foreach ($product_data['specs']['usage'] as $usage) : ?>
                                • <?php echo esc_html($usage); ?><br>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?> 