<!DOCTYPE html>
<html lang="es" <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo('name'); ?> - <?php echo get_bloginfo('description'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Encabezado principal -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <!-- Mostrar el logo cargado desde el Personalizador -->
                <?php if (get_theme_mod('custom_logo')) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('custom_logo')); ?>" alt="Logo">
                <?php endif; ?>
            </div>
            <nav>
                <!-- Enlaces de redes sociales editables desde el Personalizador -->
                <a href="<?php echo esc_url(get_theme_mod('facebook_link', '#')); ?>" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
                <a href="<?php echo esc_url(get_theme_mod('twitter_link', '#')); ?>" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo esc_url(get_theme_mod('instagram_link', '#')); ?>" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            </nav>

        </div>
    </header>
</body>
</html>
