<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsletter_email']) && isset($_POST['accept_terms'])) {
    $email = sanitize_email($_POST['newsletter_email']);
    $accept_terms = $_POST['accept_terms'] === 'on';

    if (!is_email($email)) {
        wp_redirect(add_query_arg('newsletter_error', 'invalid_email', wp_get_referer()));
        exit;
    }

    if (!$accept_terms) {
        wp_redirect(add_query_arg('newsletter_error', 'terms_not_accepted', wp_get_referer()));
        exit;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter_subscribers';

    $wpdb->insert($table_name, array(
        'email' => $email,
        'date' => current_time('mysql')
    ));

    wp_redirect(add_query_arg('newsletter_success', 'true', wp_get_referer()));
    exit;
}
