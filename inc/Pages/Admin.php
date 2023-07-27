<?php

/**
 * @package Demetrius1Plugin
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

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

		$this->setSettings();
		$this->setSections();
		$this->setFields();

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

	public function setSettings()
	{
		$args = array(

			// Custom Post Type (CTP) Manager
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'cpt_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Custom Taxonomy Manager
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'taxonomy_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Widget to Upload and Display media in sidebars
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'media_widget',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Post and Pages Galery integration
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'galery_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Testimonial section: Comment in the front-end, Admins can approve comments, select which comments to display
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'testimonial_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Custom template sections
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'templates_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Ajax based Login/Register system
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'login_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Membership protected area
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'membership_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),

			// Chat system
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'chat_manager',
				'callback' => array($this->callbacks, 'demetrius1OptionsGroup'),
			),
		);

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'demetrius1_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'demetrius1AdminSection'),
				'page' => 'demetrius1_plugin',
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array($this->callbacks, 'demetrius1TextExample'),
				'page' => 'demetrius1_plugin',
				'section' => 'demetrius1_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class',
				),
			),

			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array($this->callbacks, 'demetrius1FirstName'),
				'page' => 'demetrius1_plugin',
				'section' => 'demetrius1_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class',
				),
			)
		);

		$this->settings->setFields($args);
	}
}
