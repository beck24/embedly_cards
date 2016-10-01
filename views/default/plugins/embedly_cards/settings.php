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

echo '<div class="pvs">';
echo elgg_view('input/select', array(
	'name' => 'params[card_align]',
	'value' => is_null($vars['entity']->card_align) ? 'center' : $vars['entity']->card_align,
	'options_values' => array(
		'left' => elgg_echo('embedly_cards:option:left'),
		'center' => elgg_echo('embedly_cards:option:center'),
		'right' => elgg_echo('embedly_cards:option:right')
	)
));

echo ' <label>' . elgg_echo('embedly_cards:setting:card_align') . '</label>';
echo '</div>';

echo '<div class="pvs">';
echo '<label>' . elgg_echo('embedly_cards:setting:card_width') . '</label>';
echo elgg_view('input/text', array(
	'name' => 'params[card_width]',
	'value' => $vars['entity']->card_width,
	'placeholder' => 'eg. 100%, 300px'
));
echo '</div>';


$entity_views = get_entity_views();

echo '<label>' . elgg_echo('embedly_cards:render_video') . '</label>';
echo '<ul class="pbm">';
foreach ($entity_views as $subtype) {
	echo '<li><label>';
	echo elgg_view('input/checkbox', array(
		'name' => "params[video_{$subtype}]",
		'value' => 1,
		'checked' => (bool) $vars['entity']->{'video_'.$subtype}
	));
	
	echo $subtype; 
	echo '</label></li>';
}
echo '</ul>';


echo '<div class="pvs">';
echo elgg_view('input/select', array(
		'name' => 'params[internal_urls]',
		'value' => is_null($vars['entity']->internal_urls) ? 0 : $vars['entity']->internal_urls,
		'options_values' => array(
				0 => elgg_echo('option:no'),
				1 => elgg_echo('option:yes'),
		)
));
echo ' <label>' . elgg_echo('embedly_cards:internal_urls') . '</label>';
echo '</div>';


echo '<div class="pvs">';
echo '<label>' . elgg_echo('embedly_cards:render_video:custom') . '</label>';
echo elgg_view('input/plaintext', array(
	'name' => 'params[custom_video_views]',
	'value' => $vars['entity']->custom_video_views
));
echo elgg_view('output/longtext', array(
	'value' => elgg_echo('embedly_cards:render_video:custom:help'),
	'class' => 'elgg-text-help'
));
echo '</div>';