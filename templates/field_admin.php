<div id="link-picker-<?php echo $field['id']; ?>-wrap">
    <p>
        <?php _e('Currently selected page:', ACFLP_TD); ?>

        <input type="hidden" name="<?php echo $field['name']; ?>[url]" id="link-picker-<?php echo $field['id']; ?>-url" value="<?php echo $field['value']['url']; ?>">
        <input type="hidden" name="<?php echo $field['name']; ?>[title]" id="link-picker-<?php echo $field['id']; ?>-title" value="<?php echo $field['value']['title']; ?>">
        <input type="hidden" name="<?php echo $field['name']; ?>[target]" id="link-picker-<?php echo $field['id']; ?>-target" value="<?php echo $field['value']['target']; ?>">
    </p>
    <div id="link-picker-<?php echo $field['id']; ?>-exists"<?php if (!$exists) { echo ' style="display:none;"'; } ?>>
        <?php _e('URL', ACFLP_TD); ?>: <em id="link-picker-<?php echo $field['id']; ?>-url-label"><a href="<?php echo $field['value']['url']; ?>" target="_blank"><?php echo $field['value']['url']; ?></a></em><br>
        <?php _e('Title', ACFLP_TD); ?>: <em id="link-picker-<?php echo $field['id']; ?>-title-label"><?php echo $field['value']['title']; ?></em><br>
        <?php _e('Open link in a new window/tab', ACFLP_TD); ?>: <em id="link-picker-<?php echo $field['id']; ?>-target-label"><?php if ($field['value']['target'] == '_blank') { _e('Yes', ACFLP_TD); } else { _e('No', ACFLP_TD); } ?></em>
    </div>
    <div id="link-picker-<?php echo $field['id']; ?>-none"<?php if ($exists) { echo ' style="display:none;"'; } ?>>
        <em><?php _e('No link selected yet', ACFLP_TD); ?></em>
    </div>

    <p>
        <a href="" class="link-btn acf-button grey" id="link-picker-<?php echo $field['id']; ?>"><?php if (!$exists) { _e('Insert Link', ACFLP_TD); }else{ _e('Edit Link', ACFLP_TD); } ?></a>
        <a href="" class="link-remove-btn acf-button grey" id="link-picker-<?php echo $field['id']; ?>-remove"<?php if (!$exists) { echo ' style="display:none;"'; } ?>><?php _e('Remove Link', ACFLP_TD); ?></a>
    </p>
</div>