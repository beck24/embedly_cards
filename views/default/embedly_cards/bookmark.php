<?php

namespace MBeckett\EmbedlyCards;

$full = elgg_extract('full_view', $vars, FALSE);

if (!$full) {
	return;
}

$bookmark_display = elgg_get_plugin_setting('bookmark_display', PLUGIN_ID);

if ($bookmark_display != 'yes') {
	return;
}

$allow_internal = elgg_get_plugin_setting('internal_urls', PLUGIN_ID, 0);
if (strpos($vars['entity']->address, elgg_get_site_url()) === 0 && !$allow_internal) {
	return;
}

elgg_require_js('embedly_cards/bookmarks');
