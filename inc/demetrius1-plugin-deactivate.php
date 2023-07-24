<?php

/**
 * @package Demetrius1Plugin
 */

class Demetrius1PluginDeactivate
{
	public static function deactivate()
	{
		flush_rewrite_rules();
	}
}
