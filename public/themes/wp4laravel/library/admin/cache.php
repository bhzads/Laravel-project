<?php

add_action('admin_bar_menu', function ($wp_admin_bar) {
    $args = array(
        'id' => 'release-cache',
        'title' => 'Release cache',
        'href' => '#',
        'meta' => array(
            'class' => 'custom-button-class'
        )
    );
    $wp_admin_bar->add_node($args);
}, 50);

add_action('admin_head', function () {
    ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('#wp-admin-bar-release-cache').on('click', function(e) {
                e.preventDefault();
                
                jQuery.get('/api/cache', function(data) {
                    alert(data);
                });
            });
        });
    </script>
<?php

});
