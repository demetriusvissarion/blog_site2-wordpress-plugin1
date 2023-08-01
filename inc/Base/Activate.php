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

		$default = array();

		if (!get_option('demetrius1_plugin')) {
			update_option('demetrius1_plugin', $default);
		}

		if (!get_option('demetrius1_plugin_cpt')) {
			update_option('demetrius1_plugin_cpt', $default);
		}

		if (!get_option('demetrius1_plugin_tax')) {
			update_option('demetrius1_plugin_tax', $default);
		}
	}
}
