<?php

namespace MBeckett\EmbedlyCards;

// pass some default settings to embedly cards as markup data
$chrome = elgg_get_plugin_setting('card_chrome', PLUGIN_ID);
$theme = elgg_get_plugin_setting('card_theme', PLUGIN_ID);

$attributes = array(
	'class' => 'hidden embedly-defaults',
	'data-chrome' => is_null($chrome) ? 1 : $chrome,
	'data-theme' => is_null($theme) ? 'light' : $theme,
);

echo '<div ' . elgg_format_attributes($attributes) . '></div>';