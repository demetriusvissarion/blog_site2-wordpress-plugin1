<?php

/**
 * @package  Demetrius1Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once("$this->plugin_path/templates/admin.php");
	}

	public function adminCpt()
	{
		return require_once("$this->plugin_path/templates/adminCpt.php");
	}

	public function adminTaxonomy()
	{
		return require_once("$this->plugin_path/templates/adminTaxonomy.php");
	}

	public function adminWidget()
	{
		return require_once("$this->plugin_path/templates/adminWidget.php");
	}

	// public function demetrius1OptionsGroup( $input )
	// {
	// 	return $input;
	// }

	// public function demetrius1AdminSection()
	// {
	// 	echo 'Check this beautiful section!';
	// }

	public function demetrius1TextExample()
	{
		$value = esc_attr(get_option('text_example'));
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function demetrius1FirstName()
	{
		$value = esc_attr(get_option('first_name'));
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}
