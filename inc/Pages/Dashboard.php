<?php

/**
 * @package  Demetrius1Plugin
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
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

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'demetrius1_plugin_settings',
				'option_name' => 'demetrius1_plugin',
				'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
			)
		);

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
