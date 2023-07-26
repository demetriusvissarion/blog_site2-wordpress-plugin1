<?php

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * @package Demetrius1Plugin
 */

class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();
	public $subpages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

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
				'callback' => array($this->callbacks, 'adminDashboard'),
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
				'callback' => array($this->callbacks, 'customPostTypes'),
			),

			// 2. Taxonomies
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_taxonomies',
				'callback' => array($this->callbacks, 'taxonomies'),
			),

			// 3. Widgets
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_widgets',
				'callback' => array($this->callbacks, 'widgets'),

			)
		);
	}
}
