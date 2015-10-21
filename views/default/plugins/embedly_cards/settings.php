<?php

namespace MBeckett\EmbedlyCards;

echo '<div class="pvs">';
echo elgg_view('input/select', array(
	'name' => 'params[bookmark_display]',
	'value' => $vars['entity']->bookmark_display ? $vars['entity']->bookmark_display : 'no',
	'options_values' => array(
		'yes' => elgg_echo('option:yes'),
		'no' => elgg_echo('option:no')
	)
));

echo ' <label>' . elgg_echo('embedly_cards:setting:bookmark_display') . '</label>';
echo '</div>';


echo '<div class="pvs">';
echo elgg_view('input/select', array(
	'name' => 'params[card_chrome]',
	'value' => is_null($vars['entity']->card_chrome) ? 1 : $vars['entity']->card_chrome,
	'options_values' => array(
		'1' => elgg_echo('option:yes'),
		'0' => elgg_echo('option:no')
	)
));

echo ' <label>' . elgg_echo('embedly_cards:setting:card_chrome') . '</label>';
echo '</div>';

echo '<div class="pvs">';
echo elgg_view('input/select', array(
	'name' => 'params[card_theme]',
	'value' => is_null($vars['entity']->card_theme) ? 'light' : $vars['entity']->card_theme,
	'options_values' => array(
		'light' => elgg_echo('embedly_cards:option:light'),
		'dark' => elgg_echo('embedly_cards:option:dark')
	)
));

echo ' <label>' . elgg_echo('embedly_cards:setting:card_theme') . '</label>';
echo '</div>';

echo '<div class="pvs">';
echo elgg_view('input/select', array(
	'name' => 'params[card_controls]',
	'value' => is_null($vars['entity']->card_controls) ? 1 : $vars['entity']->card_controls,
	'options_values' => array(
		'1' => elgg_echo('option:yes'),
		'0' => elgg_echo('option:no')
	)
));

echo ' <label>' . elgg_echo('embedly_cards:setting:card_controls') . '</label>';
echo '</div>';