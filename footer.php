
<!-- Sección de boletín -->
<section class="newsletter text-center py-5">
    <div class="container">
        <h4 class="text-uppercase">Newsletter</h4>
        <h5>Suscríbete a nuestro boletín</h5>
        <form id="newsletterForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="d-flex justify-content-center align-items-center">
            <input type="email" name="newsletter_email" class="form-control me-2" placeholder="Introduce tu e-mail" required>
            <input type="hidden" name="action" value="save_newsletter">
            <?php wp_nonce_field('newsletter_nonce', 'newsletter_nonce_field'); ?>
            <button type="submit" class="btn-submit">
                <span>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="">
                </span>
            </button>
        </form>
        
        <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input" id="legalNotice" required>
            <label class="form-check-label" for="legalNotice">He leído y acepto nuestro Aviso Legal.</label>
            <p id="checkboxError" class="text-danger" style="display: none;">Debes aceptar el aviso legal.</p>
        </div>

        <?php if (isset($_GET['newsletter_success'])) : ?>
            <p class="text-success">Gracias por suscribirte a nuestro boletín.</p>
        <?php endif; ?>
    </div>
</section>

<script>
    document.getElementById('newsletterForm').addEventListener('submit', function(event) {
        const checkbox = document.getElementById('legalNotice');
        const errorMessage = document.getElementById('checkboxError');

        if (!checkbox.checked) {
            event.preventDefault(); // Evita el envío del formulario
            errorMessage.style.display = 'block'; // Muestra el mensaje de error
        } else {
            errorMessage.style.display = 'none'; // Oculta el mensaje de error si está marcado
        }
    });
</script>





<!-- Sección de descarga de dossier -->
<section class="download text-center py-5" style="background-color: #7772F6;">
    <div class="container text-white">
        <img src="<?php echo get_template_directory_uri(); ?>/img/presentacion.svg" alt="">
        <?php if (get_theme_mod('dossier_pdf')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('dossier_pdf')); ?>" class="text-white h5" download>
                <?php echo esc_html(get_theme_mod('dossier_text', 'Descarga nuestro dossier comercial haciendo clic aquí')); ?>
            </a>
        <?php endif; ?>
    </div>
</section>



<?php wp_footer(  );?>

</body>



</html>