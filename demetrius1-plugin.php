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

// 2. Precaution, same as above (checks for one constant variable)
defined('ABSPATH') or die("Hey, what are  you doing here? You silly human!");
// Wordpress might reject the plugin if it doesn't have at least one of the 3 protections above

class Demetrius1Plugin
{
	public static function register()
	{
		add_action('admin_enqueue_scripts', array('Demetrius1Plugin', 'enqueue')); // this uses the backend, for frontend replace "admin" with "wp"
	}

	protected function create_post_type()
	{
		add_action('init', array($this, 'custom_post_type'));
	}

	function activate()
	{
		// generate a CPT (Custom Post Type)
		$this->custom_post_type();
		// flush rewrite rules
		flush_rewrite_rules();
	}

	function deactivate()
	{
		// flush rewrite rules
		flush_rewrite_rules();
	}

	function custom_post_type()
	{
		register_post_type('book', ['public' => true, 'label' => 'Books']);
	}

	static function enqueue()
	{
		// enqueue all our scripts
		wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
		wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
	}
}

if (class_exists('Demetrius1Plugin')) {
	// $demetrius1Plugin = new Demetrius1Plugin();
	// $demetrius1Plugin->register();
	Demetrius1Plugin::register();
}

// activation
// register_activation_hook(__FILE__, array($demetrius1Plugin, 'activate'));

// deactivation
// register_deactivation_hook(__FILE__, array($demetrius1Plugin, 'deactivate'));
