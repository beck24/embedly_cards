<?php

namespace MBeckett\EmbedlyCards;

// pass some default settings to embedly cards as markup data
$chrome = elgg_get_plugin_setting('card_chrome', PLUGIN_ID);
$theme = elgg_get_plugin_setting('card_theme', PLUGIN_ID);
$controls = elgg_get_plugin_setting('card_controls', PLUGIN_ID);
$align = elgg_get_plugin_setting('card_align', PLUGIN_ID);
$width = elgg_get_plugin_setting('card_width', PLUGIN_ID);

$attributes = array(
	'class' => 'hidden embedly-defaults',
	'data-chrome' => is_null($chrome) ? 1 : $chrome,
	'data-theme' => is_null($theme) ? 'light' : $theme,
	'data-controls' => is_null($controls) ? 1 : $controls,
	'data-align' => is_null($align) ? 'center' : $align,
	'data-width' => is_null($width) ? '600' : $width
);

echo '<div ' . elgg_format_attributes($attributes) . '></div>';