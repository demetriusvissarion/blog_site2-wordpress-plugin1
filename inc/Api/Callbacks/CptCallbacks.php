<?php

/**
 * @package  Demetrius1Plugin
 */

namespace Inc\Api\Callbacks;

class CptCallbacks
{

	public function cptSectionManager()
	{
		echo 'Create as many Custom Post Types as you want.';
	}

	public function cptSanitize($input)
	{
		$output = get_option('demetrius1_plugin_cpt');

		foreach ($output as $key => $value) {
			if ($input['post_type'] === $key) {
				$output[$key] = $input;
			} else {
				$output[$input['post_type']] = $input;
			}
		}

		return $output;
	}

	public function textField($args)
	{
		// $value = '';   // DDV
		$name = $args['label_for'];
		$option_name = $args['option_name'];
		$input = get_option($option_name);
		// if (!empty($input)) {   // DDV
		// 	$value = $input[$name];
		// }

		echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="" placeholder="' . $args['placeholder'] . '">';
	}

	public function checkboxField($args)
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option($option_name);
		// $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class=""><label for="' . $name . '"><div></div></label></div>';
	}
}
