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

elgg_require_js('embedly_cards/bookmarks');
