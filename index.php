<?php get_header();?>

<!-- Sección de bienvenida o agradecimiento -->
<section class="hero-slider">
    <div class="swiper slider">
        <div class="swiper-wrapper">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <?php if (get_theme_mod("slider_image_$i")) : ?>
                    <div class="swiper-slide slide d-flex align-items-center justify-content-center text-center text-white" style="background-image: url('<?php echo esc_url(get_theme_mod("slider_image_$i")); ?>');">
                        <div class="container">
                            <div class="contenedor-centro">
                                <h1><?php echo esc_html(get_theme_mod("slider_title_$i")); ?></h1>
                                <p class="lead"><?php echo esc_html(get_theme_mod("slider_text_$i")); ?></p>
                                <?php if (get_theme_mod("slider_button_text_$i") && get_theme_mod("slider_button_url_$i")) : ?>
                                    <a href="<?php echo esc_url(get_theme_mod("slider_button_url_$i")); ?>" class="btn btn-outline-light mt-3"><?php echo esc_html(get_theme_mod("slider_button_text_$i")); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <!-- Paginación y navegación Swiper -->
        <div class="swiper-pagination"></div>
    </div>
</section>

    <!-- Sección de introducción -->
    <section class="intro text-center py-5">
        <div class="container">
            <h2 class="text-uppercase text-muted"><?php echo esc_html(get_theme_mod('intro_title', 'Introducción')); ?></h2>
            <h3 class="my-4"><?php echo esc_html(get_theme_mod('intro_subtitle', 'Texto titular de un bloque destacado')); ?></h3>
            <p class="mb-4"><?php echo esc_html(get_theme_mod('intro_text', 'Lorem ipsum dolor sit amet...')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('intro_button_url', '#')); ?>" class="btn btn-primary">
                <?php echo esc_html(get_theme_mod('intro_button_text', 'Ver más')); ?>
            </a>
        </div>
    </section>


    <!-- Sección de categorías -->
    <section class="categories py-5 bg-light">
    <div class="container">
        <div class="row">
        <?php 
        $args = array(
            'post_type'=>'post',
            'posts_per_page' => '3',
        );
        $query = new WP_Query($args);
        ?>
        <?php if($query->have_posts()) : ?>
            <?php while($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center post-destacado">
                        <div class="card-body">
                            <?php the_post_thumbnail(); ?>
                            <div class="card-content">
                            <h4 class="text-uppercase">
                                <?php the_category(', '); ?>
                            </h4>
                            <h3 class="my-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer( );?>