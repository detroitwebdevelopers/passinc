=== Dynamic Links ===
Contributors: greencp
Donate link: http://www.greencomputingportal.de
Tags: images, relative urls, dynamic image links
Requires at least: 3.2
Tested up to: 3.8.1
Stable tag: trunk

Makes links to files in upload directory of wordpress in posts (e.g. images) "dynamic". Allows use of relative image URLs in Posts and makes domain changes easier.

== Description ==

When inserting an image into a posts Wordpress uses absolute urls (i.e. including domain name) for the src and href attributes of the image and associated link. This leads to problems if you change your domain (e.g. when moving from test to production environment) or if you change the base path of your upload directory. Also usage of relative URLs (i.e. absolute path to file without domain part) can reduce file size, but may not be used in feeds.

Dynamic Links replaces all links to files in the upload directory with a placeholder which is replaced again with the base path to the upload dir when the content is viewed. This way image links are dynamically adapted to changes in domain name or upload base path. 

As additional option relative links can be used when content is display on your site to reduce page size (Though there are better options to do this. It's just included because it's possible). Images and links in feeds will always get the full path.

== Changelog ==  

= 0.2 =
* added multisite support (thanks to *tufto* for the code)
* tested with WordPress 3.8.1

= 0.1 =
* Initial release

== Installation ==

Download, install, activate.

For now you have to update every post manually for the placeholders to be used. A function to do this automatically on all posts (and to revert it) is planned for the next release.

== License ==

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.