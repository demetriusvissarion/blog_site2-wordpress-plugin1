<?php

/**
 * @package Demetrius1Plugin
 */

namespace Inc\Base;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();

		if (get_option('demetrius1_plugin')) {
			return;
		}

		$default = array();

		update_option('demetrius1_plugin', $default);
	}
}
