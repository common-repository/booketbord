=== Plugin Name ===
Contributors: we-serve-you aps
Tags: booketbord, book et bord, table-manager, bordagenten, nemtakeaway
Requires at least: 3.0.1
Tested up to: 6.6
Stable tag: 6.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
Plugin to help you make a lightbox links when using BookEtBord.dk booking system
 
== Description ==
 
This plugins is only for existing BookEtBord customers. This plugin sole purpose is to provide an easy way to link to the bookingphase of the booking system for each customer.
It will result in a lightbox that shows the booking steps.
IT ONLY SUPPORTS DANISH LANGUAGE AT THIS MOMENT

== Installation ==

Download and install the plugin and activate it.
It will make an admin menu link - click on it.
Put in your booketbord ID and it will generate a link for you to insert in your menu. It will also tell you how to make the nessesary changes to make the lightbox work (You will need to put a class on the menu-item)
This section describes how to install the plugin and get it working.
 
== Frequently Asked Questions ==
 
= How do i get a booketbord ID =
 
You will need to sign up for our services on [BookEtBord.dk](https://www.booketbord.dk/ "Bordbooking system")
 
= Do you have a free option =
 
No. Our prices starts at DKK 99,-
 
== Screenshots ==
 
1. Back-end
2. Front-end Desktop
3. Front-end Mobile
 
== Changelog ==
= 1.6.1 =
* Fixed typo

= 1.6 =
* Tested for WP 6.2

= 1.5 =
* Tested for WP 5.3

= 1.4.2 =
* Refactored some js code, to make it easier to open and close lightbox

= 1.4.1 =
* Fixed minor js error

= 1.4.0 =
* Forced body to have overflow hidden when lightbox is active to prevent scroll on page when scrolling on a iframe body that has overflow hidden.

= 1.3.0 =
* Introduced a helper function to be able to open lightbox using function. For elements that needs lightbox after pageload.

= 1.2.0 =
* Introduced LD+JSON data extraction from BookEtBord servers. This way you can tell google that you are a food establishment and have a booking system.

= 1.1.5 =
* Bugfix, bug introduced in 1.1.3

= 1.1.4 =
* Bugfix, undefined error

= 1.1.3 =
* Changed onclick event binding on 'a href' inside an element where (grand) parent element has book_et_bord_btn class

= 1.1.2 =
* Changed mobile-check js so that tablets/ipads are treated like mobile phone devices.

= 1.1.1 =
* Changed lightbox z-index to 999999, to make sure lightbox is always on top of everything else.
* Changed the close button, so cursor is a pointer on hover

= 1.1 =
* Changed the whole lightbox, so it supports a close button in top right corner.

= 1.0 =
* First version


Dette plugin hjælper dig blot med at få et link til bookingfasen, så dine gæster kan komme ind og bestille bord online. Vær opmærksom på at at dette plugin KRÆVER at du i forvejen er kunde hos [BookEtBord](https://www.BookEtBord.dk "Reservations system til restauranter")