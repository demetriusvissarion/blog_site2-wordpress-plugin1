<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
 * @package Demetrius1Plugin
 */

class Admin extends BaseController
{
	public $setting;

	public function __construct()
	{
		$this->setting = new SettingsApi();
	}

	public function register()
	{
		// add_action('admin_menu', array($this, 'add_admin_pages'));
		$pages = [[
			'page_title' => 'Demetrius1 Plugin',
			'menu_title' => 'Demetrius1',
			'capability' => 'manage_options',
			'menu_slug' => 'demetrius1_plugin',
			'callback' => function () {
				echo '<h1>Demetrius1 Plugin</h1>';
			},
			'icon_url' => 'dashicons-store',
			'position' => 110,
		]];

		$this->setting->addPages($pages)->register();
	}

	// public function add_admin_pages()
	// {
	// 	add_menu_page('Demetrius1 Plugin', 'Demetrius1', 'manage_options', 'demetrius1_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
	// }

	// public function admin_index()
	// {
	// 	require_once $this->plugin_path . 'templates/admin.php';
	// }
}
