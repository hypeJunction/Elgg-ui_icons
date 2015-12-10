Icons for Elgg
==============
![Elgg 2.0](https://img.shields.io/badge/Elgg-2.0.x-orange.svg?style=flat-square)

## Features

* Standardized icons display and markup
* Forces `large` icon to be 200x200 square
* Adds `extra_large` icon with 325 with that is resizes similar to master
* Allows you to choose between `square`, `rounded`, `circle` corners
* Replaces default user, group and question mark icons with a scalable SVG image

## Usage

### Display an icon with defualt corner setting

```php
// 'rounded' and 'circle' corners will only be displayed with tiny, small and medium icon sizes
echo elgg_view_entity_icon($entity, 'small');
```

### Force corner setting

```php
echo elgg_view_entity_icon($entity, 'large', array(
	'corners' => 'circle',
));
```

### Replacing default icon

To replace the default icon, simply overwrite the svg view. Just place an svg icon with the same
name and in the same location in your plugin.