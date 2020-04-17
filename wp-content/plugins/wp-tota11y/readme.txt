=== Plugin Name ===
Contributors: mpol
Tags: tota11y, totally, development, accessibility, a11y, ally, validation, debugging, debug, kahn academy
Requires at least: 3.7
Tested up to: 5.3
Stable tag: 1.1.1
License: GPLv2 or later


WP Tota11y is an accessibility visualization toolkit.

== Description ==

WP Tota11y helps visualize how your site performs with assistive technologies. Check out the [Tota11y webpage](http://khan.github.io/tota11y/?ref=hn).
The process of testing for accessibility (a11y) is often tedious and confusing. In many cases, developers must have some prior accessibility knowledge in order to make sense of the results.
Instead, tota11y aims to reduce this barrier of entry by helping visualize accessibility violations (and successes), while educating on best practices.

= How it works =

WP Tota11y is a single JavaScript file that inserts a small button in the bottom corner of your document.
The toolbar consists of several plugins that each provide their own functionality.
Many of these plugins "annotate" elements on the page. Sometimes to show their existence, other times to point out when something's wrong.

= Compatibility =

This plugin is compatible with [ClassicPress](https://www.classicpress.net).


== Installation ==

Installation

* Install the plugin through the 'Plugins / New Plugin' menu in WordPress.
* Alternatively, Upload the plugin folder to the `/wp-content/plugins/` directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* That is really all. You should see a small button in the bottom left of each page.
* Click that button and enjoy.


== Frequently Asked Questions ==

= When should I use this plugin? =

You should only use it when developing your site. It is not intended to be used on a live site with visitors.

= I don't see the button after activating. =

It is likely that you have JavaScript errors in your website.
You can open the inspector of your browser, and check your messages in the console tab.

Email any other questions to marcel at zenoweb dot nl.

== Screenshots ==

1. Admin View with Tota11y enabled, after clicking on the Headings option.

== Changelog ==

= 1.1.1 =
* 2016-10-25
* Version 0.1.6.

= 1.1.0 =
* 2016-02-14
* Version 0.1.3.

= 1.0.3 =
* 2015-10-04
* Use plugins_url() for enqueue.
* Only support WordPress 3.7+, since they really are supported.

= 1.0.2 =
* 2015-08-09
* Version 0.0.10.

= 1.0.1 =
* 2015-06-29
* Only load when user has capability manage_options.

= 1.0 =
* 2015-06-17
* First Version with Git 2015-06-10 (0.0.1).
