<?php

function gleamsoft_demo_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/gleamsoft/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Gleamsoft</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=gleamsoft_demo_create'); ?>">Nuevo registro</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "gleamsoft";

        $rows = $wpdb->get_results("SELECT id,name from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Id</th>
                <th class="manage-column ss-list-width">Nombre</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=gleamsoft_demo_update&id=' . $row->id); ?>">Actualizar</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}