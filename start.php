<?php

/**
 * Icons
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */

elgg_register_event_handler('init', 'system', 'ui_icons_init');

/**
 * Initialize the plugin
 * @return void
 */
function ui_icons_init() {

	elgg_extend_view('elements/icons.css', 'elements/avatar.css');
	elgg_register_simplecache_view('elements/avatar.sizes.css.php');
	elgg_extend_view('elements/icons.css', 'elements/avatar.sizes.css');

	elgg_set_config('icon_sizes', ui_icons_get_sizes());

	elgg_register_plugin_hook_handler('entity:icon:url', 'all', 'ui_icons_default_icon', 900);
}

/**
 * Returns icon size config
 * @return array
 */
function ui_icons_get_sizes() {

	$sizes = elgg_get_config('icon_sizes');

	// make large icons square
	$sizes['large'] = [
		'w' => 200,
		'h' => 200,
		'square' => true,
		'upscale' => true,
	];

	$sizes['extra_large'] = [
		'w' => '325',
		'h' => '325',
		'square' => false,
		'upscale' => true,
	];

	return $sizes;
}

/**
 * Replace default icons with SVG
 *
 * @param string $hook   "entity:icon:url"
 * @param string $type   "all"
 * @param string $return URL
 * @param array  $params Hook params
 * @return string
 */
function ui_icons_default_icon($hook, $type, $return, $params) {

	$entity = elgg_extract('entity', $params);
	
	if ($entity instanceof ElggUser) {
		$default = elgg_get_simplecache_url('icon/user/default.svg');
		$core_path = elgg_get_simplecache_url('icons/user/');
	} else if ($entity instanceof ElggGroup) {
		$default = elgg_get_simplecache_url('icon/group/default.svg');
		$core_path = elgg_get_simplecache_url('groups/default');
	} else {
		$default = elgg_get_simplecache_url('icon/default.svg');
		$core_path = elgg_get_simplecache_url('icons/default/');
	}

	if (!$return || !is_string($return)) {
		return $default;
	}
	
	if (0 === strpos($return, $core_path)) {
		return $default;
	}

}
