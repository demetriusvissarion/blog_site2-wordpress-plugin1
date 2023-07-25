<?php

/**
 * @package Demetrius1Plugin
 */
/*
Plugin Name: Demetrius1 Plugin
Plugin URI: http://www.demetriusvissarion.com
Description: This is my first attempt at writing a custom Plugin
Version: 1.0.0
Author: Demetrius Vissarion
Author URI: https://github.com/demetriusvissarion
Licence: MIT
Text Domain: demetrius1-plugin
*/

/*
Copyright (c) 2023 Demetrius Vissarion

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

defined('ABSPATH') or die("Hey, what are  you doing here? You silly human!");

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if (!class_exists('Demetrius1Plugin')) {
	class Demetrius1Plugin
	{
		public $plugin;

		function __construct()
		{
			$this->plugin = plugin_basename(__FILE__);
		}

		function register()
		{
			add_action('admin_enqueue_scripts', array($this, 'enqueue')); // this uses the backend, for frontend replace "admin" with "wp"

			add_action('admin_menu', array($this, 'add_admin_pages'));

			add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
		}

		public function settings_link($links)
		{
			$settings_link = '<a href="admin.php?page=demetrius1_plugin">Settings</a>';
			array_push($links, $settings_link);
			return $links;
		}

		public function add_admin_pages()
		{
			add_menu_page('Demetrius1 Plugin', 'Demetrius1', 'manage_options', 'demetrius1_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
		}

		public function admin_index()
		{
			require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
		}

		protected function create_post_type()
		{
			add_action('init', array($this, 'custom_post_type'));
		}

		function custom_post_type()
		{
			register_post_type('book', ['public' => true, 'label' => 'Books']);
		}

		function enqueue()
		{
			// enqueue all our scripts
			wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
			wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
		}

		function activate()
		{
			Activate::activate();
		}
	}

	$demetrius1Plugin = new Demetrius1Plugin();
	$demetrius1Plugin->register();

	// activation
	register_activation_hook(__FILE__, array($demetrius1Plugin, 'activate'));

	// deactivation
	register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
}
