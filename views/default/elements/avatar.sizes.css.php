<?php

$sizes = ui_icons_get_sizes(new ElggObject, 'icon');
foreach ($sizes as $name => $opts) {
	echo ".elgg-avatar-$name {";
		if ($opts['w']) {
			echo "max-width: {$opts['w']}px;";
		}
		if ($opts['h']) {
			echo "max-height: {$opts['h']}px;";
		}
	echo "}";
}