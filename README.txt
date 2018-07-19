=== Plugin Name ===
Contributors: pcfreak30
Donate link: https://www.paypal.me/pcfreak30
Tags: optimize, transient, transients
Requires at least: 3.7
Tested up to: 4.9.4
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

### 0.1.8 ###

* Bug: Delete transient function uses option_name not meta_key for sitemeta table

### 0.1.7 ###

* Bug: Simplify queries in dedicated_transients_delete_expired_options_transients to handle transients without a timeout

### 0.1.6 ###

* Bug: Only setup MU tables if we are running network wide
* Enhancement: Purge options transients on activation
* Feature: Add ability to purge transients from the admin bar for both the current site and network wide if on multisite, else just the current site. Use filter `dedicated_transients_purge_capability` to change the default capability from `administrator`

### 0.1.5 ###

* Bug: Fix requires used in dedicated_transients_wp_filesystem

### 0.1.4.1 ###

* Bug: Fix wrong language

### 0.1.4 ###

* Bug: Fix use of $this in dedicated_transients_object_cache_error

### 0.1.3 ###

* Bug: Use WP_Filesystem_Direct and dont use global version to prevent edge cases
* Bug: Use is_file and try to require the constants instead of using wp_filesystem to prevent edge cases
* Bug: Ensure deactivate_plugins function is loaded

### 0.1.2 ###

* Bug: Need to use get_blog_prefix method in MU plugin file

### 0.1.1 ###

* Bug: Create transients table for all blogs on activation if multisite
* Enhancement: Create transients table for any new blog added on multisite
* Enhancement: Ensure transients table is deleted if blog is deleted on multisite

### 0.1.0 ###

* Initial version