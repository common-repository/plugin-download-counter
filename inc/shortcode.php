<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap pdc">
<h2><?php _e('Plugin Download Counter Shortcode','mkplugincounter');?></h2>
<p><?php _e('Example Plugin: <strong>akismet</strong>','mkplugincounter');?></p>
<hr>
<p><?php _e('<code>[plugin_download_counter plugin_slug="akismet" type="downloads"]</code>  <strong>: -- Will show total plugin downloads</strong>','mkplugincounter');?><h4><?php _e('<strong>Output: Total Downloads:</strong> ','mkplugincounter'); ?><span style="color:#F00"><?php echo do_shortcode('[plugin_download_counter plugin_slug="akismet" type="downloads"]');?></span></h4></p>
<hr>
<p><?php _e('<code>[plugin_download_counter plugin_slug="akismet" type="ratings"]</code>  <strong>: -- Will show average ratings of plugin</strong>','mkplugincounter');?><h4><?php _e('<strong>Output: Average Ratings:</strong> ','mkplugincounter'); ?><span style="color:#F00"><?php echo do_shortcode('[plugin_download_counter plugin_slug="akismet" type="ratings"]');?></span></h4></p>
<hr>
<span style="color:#F00"><?php _e('Note: plugin_slug="akismet", here you can add your plugin slug which is present in wordpress.org plugins repository.','mkplugincounter');?></span>
</div>