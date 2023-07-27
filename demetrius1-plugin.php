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

// If this file is called directly, abort
defined('ABSPATH') or die("Hey, what are  you doing here? You silly human!");

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_demetrius1_plugin()
{
	Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_demetrius1_plugin');

/**
 * The code that runs during plugin deactivation
 */
function deactivate_demetrius1_plugin()
{
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_demetrius1_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}
