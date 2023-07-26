<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
 * @package Demetrius1Plugin
 */

class Admin extends BaseController
{
	public $settings;

	public $pages = array();
	public $subpages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->setPages();
		$this->setSubpages();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubpages($this->subpages)->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Demetrius1 Plugin',
				'menu_title' => 'Demetrius1',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_plugin',
				'callback' => function () {
					return require_once("$this->plugin_path/templates/admin.php");
				},
				'icon_url' => 'dashicons-store',
				'position' => 110,
			)
		);
	}

	public function setSubpages()
	{
		// Subpages:
		$this->subpages = array(
			// 1. Custom Post Types
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'Custom Post Types',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_cpt',
				'callback' => function () {
					echo '<h1>Custom Post Types Manager</h1>';
				},
			),

			// 2. Taxonomies
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_taxonomies',
				'callback' => function () {
					echo '<h1>Taxonomies Manager</h1>';
				},
			),

			// 3. Widgets
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_widgets',
				'callback' => function () {
					echo '<h1>Widgets Manager</h1>';
				},
			)
		);
	}
}
