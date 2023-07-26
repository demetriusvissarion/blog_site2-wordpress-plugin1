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

	public function __construct()
	{
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'Demetrius1 Plugin',
				'menu_title' => 'Demetrius1',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_plugin',
				'callback' => function () {
					echo '<h1>Demetrius1 Plugin</h1>';
				},
				'icon_url' => 'dashicons-store',
				'position' => 110,
			)
		);

		$this->subpages = array(
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_cpt',
				'callback' => function () {
					echo '<h1>Custom Post Types Manager</h1>';
				},
			),

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

	public function register()
	{
		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubpages($this->subpages)->register();
	}
}
