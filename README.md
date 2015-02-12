Wishbone Wordpress Theme
==============================

**Contributors:** Paul Williamson  
**Developer Link:** [Here](http://www.wishynet.co.uk)    
**Donate Link:** [Here](http://wishbone.wishynet.co.uk/donate)    
**License:** GNU General Public License  
**Requires at least:** 4.1  
**Tested up to:** 4.1  
**Stable tag:** 4.1  
**Tags:** black, white, light, dark, two-columns, left-sidebar, right-sidebar, responsive-layout, custom-background, custom-header, custom-menu, editor-style, featured-images, sticky-post, flexible-header, full-width-template, post-formats, theme-options, translation-ready, threaded-comments, accessibility-ready

**Description:** Wishbone is a multi purpose WordPress theme containing everything needed to build a great WordPress website. Wishbone fully supports all WordPress theme features without being cluttered with gimmicky extras. 

##Description

Wishbone is a responsive theme for WordPress created using the fantastic Skellington boilerplate. Wishbone enables you to create classic blog style websites focusing on readable content and enhanced media handling. 

Wishbone contains many responsive elements including a mobile slide in menu and a 16 column grid that supports screen sizes for devices from mobile phones right up to large desktops. Some basic HTML element formatting is included as part of the Skellington boilerplate and in-turn the Wishbone theme, support for many WordPress elements are also included and editable. 

####Features:

* A mobile-first, Responsive design
* Enhanced gallery support
* Post format support
* Customizer support
* Google font integration

####Coming Soon:

While Wishbone is designed to handle any plugin with minimal intrusion, special focus for supporting select plugins is on the way. Plugins to be supported include:

* bbPress 
* WooCommerce
* BuddyPress
* Jetpack

There are also a number of plugins designed with Wishbone in mind that will be available very soon. Stay Tuned!

##Installation

This process assumes you have already installed WordPress to your web server or host. 
To install and activate the Wishbone theme:

1. Unzip the 'wishbone' downloaded file to a location on your computer
2. Upload the 'wishbone' directory to the `/wp-content/themes/` directory in your WordPress build
3. In the WordPress Dashboard, Activate the theme through the 'Appearance' menu
4. Use the 'Customize' sub-menu to make any changes to the visual appearance of the Wishbone theme
5. Start blogging!

##Configuration

####Showcase
Wishbone provides a Showcase that can display a banner image and/or statement at a single location on your site (usually a home page). To make use of this feature, paste the following code either directly in your home page code or by using the WordPress code editor. 

    <div id="showcase">
		
	<div class="container">
		
	
	    <?php get_template_part( 'showcase' ); ?>
		
			
	</div><!-- container -->
	
    </div><!-- end of showcase -->

Finally, configure the Showcase in the theme Customizer section of the Dashboard. 

##Frequently Asked Questions

**I have a problem with Wishbone, where should I go to get help?**

If you have a problem with Wishbone, please direct any queries to the Wishbone Support Forum on wordpress.org. 

**Can I modify Wishbone code for my own use?**

Wishbone Core is released as open source software under the GPL, so yes. If any code is used, the author would great appreciate some acknowledgement of their contribution to the code. 

**How can I contact or find out more about the author of Wishbone?**

The author of Wishbone is Paul Williamson and can be contacted by visiting his site [Wishynet](www.wishynet.co.uk).

##Screenshots

![Wishbone Default Layout](http://wishbone.wishynet.co.uk/wp-content/themes/wishbone/screenshot.png "Wishbone Default Layout")

![Wishbone Logo](http://wishbone.wishynet.co.uk/wp-content/themes/wishbone/screenshot-logo.png "Wishbone Logo")

##Changelog

#### 1.03
- update 'header.php' file to remove remaining redundant meta data

- update ‘customizer.php’ file to add further localization for labels and
description fields

- update various files to include safer 'home_url' links

- remove 'wishbone.masonry.js' file

- update readme documentation files

- update 'customizer.php' file to include additional theme colour elements

- remove background-color values from 'project.css' file that clash with colour defaults in the 'customizer.php' file

- update pagination and post links to use new WordPress 4.1 functions

- add theme support for 'title-tags' 

#### 1.02
**Updated header.php as follows:**

- set ‘wishbone_logo_setting default to ‘false’

- remove ‘robots’ meta tag

- remove ‘generator’ meta tag

- remove styles link from the head section

- remove favicon links

**Updated style.css as follows:**

- remove the ‘editor-style’ tag

**Updated functions.php as follows:**

- remove ‘wishbone_dash_login_logo’ function
- add code to enqueue the style.css file in the ‘wishbone_enqueue_frontend_styles’ function
- add code to use wp_head to correctly load favicons

**Updated footer.php as follows:**

- update WordPress reference so its spelt correctly

- add additional translation code to all some text to be translated

**Updated searchform.php as follows:**

- add additional translation code to all some text to be translated

**Updated comments.php as follows:**

- add additional translation code to all some text to be translated 

**Additional Updates:**

- add additional localisation for theme files, focusing on ‘read more’
or ‘continue reading’ links

- update documentation to add Showcase implementation/usage

- remove Customizer functionality that duplicates core WordPress
functionality

- make all ‘title’ values in the Customizer translatable

- re-enable all core WordPress Customizer functionality

#### 1.01
* Updated screenshot files

#### 1.0
* Initial Release

##Upgrade Notice

#### 1.0
* Initial Release
