<?php

/**
 * @package Demetrius1Plugin
 */

class Demetrius1PluginActivate
{
	public static function activate()
	{
		flush_rewrite_rules();
	}
}
