=== Plugin Name ===
Contributors: pcfreak30
Donate link: https://www.paypal.me/pcfreak30
Tags: optimize, transient, transients
Requires at least: 3.7
Tested up to: 4.8.1
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

WordPress plugin to re-route transient storage to dedicated tables.

== Description ==

This plugin will re-route all transient activity to a dedicated table each for both single and multisite. You can not use this with object cache! This plugin is mainly useful if you can not make use of object cache for any reason to help your site performance.

If you need dedicated/professional assistance with this plugin or just want an expert to get your site to run the fastest it can be, you may hire me at [Codeable](https://codeable.io/developers/derrick-hammer/?ref=rvtGZ)

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/dedicated-transients` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Nothing else to do. Check PHPMyAdmin or similar if you are curious!

== Changelog ==

### 0.1.1 ###

*Bug: Create transients table for all blogs on activation if multisite
*Enhancement: Create transients table for any new blog added on multisite
*Enhancement: Ensure transients table is deleted if blog is deleted on multisite

### 0.1.0 ###

* Initial version