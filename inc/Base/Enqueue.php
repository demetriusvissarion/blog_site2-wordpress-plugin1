<?php

/**
 * @package Demetrius1Plugin
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
	public function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

	function enqueue()
	{
		// enqueue all our scripts
		// echo $this->plugin_url . 'assets/mystyle.css';
		// wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/mystyle.css');
		wp_enqueue_style('mypluginstyle', 'http://one.wordpress.test/public_html/wp-content/plugins/demetrius1-plugin/assets/mystyle.css');
		wp_enqueue_script('mypluginscript', 'http://one.wordpress.test/public_html/wp-content/plugins/demetrius1-plugin/assets/myscript.js');
	}
}
