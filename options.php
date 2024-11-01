<div class="wrap">

<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">
<div class="postbox">
<div class="inside">

<h2>WP Keyboard Style Key Symbol</h2>

<strong><p>WP Keyboard Style Key Symbol Shortcode &rArr; <code>[keybt]YOUR TEXT[/keybt]</code></p></strong>

<form method="post" action="options.php">
<?php settings_fields('wpkeysybl_option_pnl'); ?>

<p>Keys Line Color</p>
<input type="text" name="wpkeysymbl_line_color" class="my-color-field" data-default-color="#eeeeee" value="<?php echo get_option('wpkeysymbl_line_color'); ?>" />
<p>Box Color</p>
<input type="text" name="wpkeysymbl_box_color" data-default-color="#cccccc" class="my-color-field" value="<?php echo get_option('wpkeysymbl_box_color'); ?>" />
<p><th scope="row">Border Color</p>
<input type="text" name="wpkeysymbl_border_color" data-default-color="#444444" class="my-color-field" value="<?php echo get_option('wpkeysymbl_border_color'); ?>" />
<p><th scope="row">Text Color</p>
<input type="text" name="wpkeysymbl_text_color" data-default-color="#000000" class="my-color-field" value="<?php echo get_option('wpkeysymbl_text_color'); ?>" />

<p class="submit">
<?php submit_button();?>
</p>

</form>

</div>
</div>
</div>
</div>
</div>
