<?php

/**
 * @package  Demetrius1Plugin
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
 *
 */
class ChatController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if (!$this->activated('chat_manager')) return;

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages($this->subpages)->register();
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'demetrius1_plugin',
				'page_title' => 'Chat Manager',
				'menu_title' => 'Chat Manager',
				'capability' => 'manage_options',
				'menu_slug' => 'demetrius1_widget',
				'callback' => array($this->callbacks, 'adminWidget')
			)
		);
	}
}
