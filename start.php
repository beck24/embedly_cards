<?php

namespace MBeckett\EmbedlyCards;

const PLUGIN_ID = 'embedly_cards';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

/**
 * Plugin Init
 */
function init() {
	elgg_extend_view('object/bookmarks', 'embedly_cards/bookmark');
	elgg_extend_view('page/elements/footer', 'embedly_cards/footer');
	
	elgg_register_plugin_hook_handler('view', 'all', __NAMESPACE__ . '\\views_parse');
}

/**
 * parse allowable views and set classes on links for video rendering
 * 
 * @staticvar type $allowable_views
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return type
 */
function views_parse($hook, $type, $return, $params) {
	static $allowable_views, $allow_internal;

	if (!is_array($allowable_views)) {
		$allowable_views = get_allowable_views();
	}
	
	if (!in_array($type, $allowable_views)) {
		return $return;
	}
	
	if (is_null($allow_internal)) {
		$allow_internal = elgg_get_plugin_setting('internal_urls', PLUGIN_ID, 0);
	}
	
	// we're potentially adding items
	elgg_require_js('embedly_cards/embedly_cards');
	
	// mark all links as embedly-video and let embedly sort it out
	libxml_use_internal_errors(true);
	$doc = new \DOMDocument();
	$doc->loadHTML($return);
	foreach ($doc->getElementsByTagName('a') as $tag) {
		$href = $tag->hasAttribute('href') ? $tag->getAttribute('href') : null;
		if (!$href || strpos($href, 'http') !== 0) {
			continue;
		}
		
		if (strpos($href, elgg_get_site_url()) === 0 && !$allow_internal) {
			continue;
		}
		
		$tag->setAttribute('class', ($tag->hasAttribute('class') ? $tag->getAttribute('class') . ' ' : '') . 'embedly-video');
	}
	libxml_clear_errors();
	
	return $doc->saveHTML();
}

/**
 * pluggable allowable views
 * 
 * @return type
 */
function get_allowable_views() {
	$views = array();
	
	$subtypes = get_entity_views();
	foreach ($subtypes as $subtype) {
		if (elgg_get_plugin_setting('video_'.$subtype, PLUGIN_ID)) {
			$views[] = 'object/' . $subtype;
		}
	}
	
	$custom_views = elgg_get_plugin_setting('custom_video_views', PLUGIN_ID);
	$c_views = explode("\n", $custom_views);
	$c_views = array_map('trim', $c_views);
	
	$views = array_merge($views, $c_views);
	
	// get any programmatic views from plugins
	$return = elgg_trigger_plugin_hook('embedly_cards', 'video_views', $views, $views);
	
	return array_filter($return);
}

/**
 * a static list of entity subtypes for views
 * @return string
 */
function get_entity_views() {
	$types = get_registered_entity_types('object');
	sort($types);
	return $types;
}