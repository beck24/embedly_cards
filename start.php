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
}