<?php

$entity = elgg_extract('entity', $vars);
?>

<div>
	<label><?= elgg_echo('ui_icons:corners') ?></label>
	<?php
	echo elgg_view('input/select', [
		'name' => 'params[corners]',
		'value' => $entity->corners,
		'options_values' => array(
			'square' => elgg_echo('ui_icons:corners:square'),
			'rounded' => elgg_echo('ui_icons:corners:rounded'),
			'circle' => elgg_echo('ui_icons:corners:circle'),
		),
	]);
	?>
</div>
