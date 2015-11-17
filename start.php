<?php

/**
 * Icons
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */
require_once __DIR__ . '/autoloader.php';

elgg_register_event_handler('init', 'system', 'ui_icons_init');

/**
 * Initialize the plugin
 * @return void
 */
function ui_icons_init() {

	elgg_register_plugin_hook_handler('entity:icon:sizes', 'all', 'ui_icons_set_sizes');

	elgg_extend_view('elements/icons.css', 'elements/avatar.css');
	elgg_register_simplecache_view('elements/avatar.sizes.css.php');
	elgg_extend_view('elements/icons.css', 'elements/avatar.sizes.css');
}

/**
 * Return configured icon sizes for a given entity type
 *
 * @param \ElggEntity $entity  Entity
 * @param string      $type    Media type
 * @return bool
 */
function ui_icons_get_sizes(\ElggEntity $entity, $type = 'icon') {
	$hook_type = implode(':', array_filter([$entity->getType(), $entity->getSubtype()]));
	$hook_params = [
		'type' => $type,
		'entity' => $entity,
	];
	return elgg_trigger_plugin_hook("entity:$type:sizes", $hook_type, $hook_params, []);
}

/**
 * Adds global icon sizes to entity icon size config
 *
 * @param string $hook   "entity:icon:sizes"
 * @param string $type   "object", "user", "group"
 * @param array  $return Icon sizes
 * @param array  $params Hook params
 * @return array
 */
function ui_icons_set_sizes($hook, $type, $return, $params) {

	$return = (array) $return;
	$sizes = elgg_get_config('icon_sizes');

	$return = array_merge($sizes, $return);

	// make large icons square
	$return['large']['square'] = true;

	return $return;
}
