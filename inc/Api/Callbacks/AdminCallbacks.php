<?php

/**
 * @package Demetrius1Plugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once("$this->plugin_path/templates/admin.php");
	}

	public function customPostTypes()
	{
		return require_once("$this->plugin_path/templates/customPostTypes.php");
	}

	public function taxonomies()
	{
		return require_once("$this->plugin_path/templates/taxonomies.php");
	}

	public function widgets()
	{
		return require_once("$this->plugin_path/templates/widgets.php");
	}
}
