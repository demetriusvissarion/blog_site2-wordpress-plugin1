<?php

/**
 * @package  Demetrius1Plugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

/**
 *
 */
class Admin extends BaseController
{
	public $settings;

	public $callbacks;
	public $callbacks_mngr;

	public $pages = array();

	public $subpages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();
		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
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
				'position' => 110
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
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_cpt',
				'callback' => array($this->callbacks, 'adminCpt')
			),

			// 2. Taxonomies
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_taxonomies',
				'callback' => array($this->callbacks, 'adminTaxonomy')
			),

			// 3. Widgets
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_widgets',
				'callback' => array($this->callbacks, 'adminWidget')
			)
		);
	}

	public function setSettings()
	{
		$args = array(array(
			'option_group' => 'demetrius1_plugin_settings',
			'option_name' => 'demetrius1_plugin',
			'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
		));

		// foreach ($this->managers as $key => $value) {
		// 	$args[] = array(
		// 		'option_group' => 'demetrius1_plugin_settings',
		// 		'option_name' => $key,
		// 		'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
		// 	);
		// }

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'demetrius1_admin_index',
				'title' => 'Settings Manager',
				'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
				'page' => 'demetrius1_plugin'
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = array();

		foreach ($this->managers as $key => $value) {
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array($this->callbacks_mngr, 'checkboxField'),
				'page' => 'demetrius1_plugin',
				'section' => 'demetrius1_admin_index',
				'args' => array(
					'option_name' => 'demetrius1_plugin',
					'label_for' => $key,
					'class' => 'ui-toggle'
				)
			);
		}

		$this->settings->setFields($args);
	}
}
