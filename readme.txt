=== WPWC classic Coming Soon ===
Contributors: makspostal
Tags: woocommerce, coming soon
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.2
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The plugin adds a custom WooCommerce Coming Soon page for classic themes.

== Description ==

The plugin adds a custom WooCommerce Coming Soon page for classic themes.
The plugin uses the new [WooCommerce Coming Soon mode introduced in WooCommerce 9.1](https://woocommerce.com/document/configuring-woocommerce-settings/coming-soon-mode/).

You can create 2 types of templates in your theme's folder:
* `store-coming-soon.php` - for **Coming soon** mode only
* `site-coming-soon.php` - for **Coming soon** and **Apply to store pages only** mode

Or copy the ready-made template(s) from the subfolder `templates` of this plugin and place it into yours site theme folder.

**IMPORTANT**: for WooCommerce version 9.5.1 and higher you have to use filter `wpwc_classic_coming_soon_store_only_content_id` for `Coming soon -> Apply to store pages only` mode.

For example, add this PHP code snippet in `functions.php` of your theme:

`
 add_filter( 'wpwc_classic_coming_soon_store_only_content_id', function () {
 	return 72663;
 } );
`

where `72663` is page ID which content will be used for `Coming soon -> Apply to store pages only` mode.

= Requirements =

For the plugin **WPWC classic Coming Soon** to work, you must have installed and activated plugin **WooCommerce** of version 9.1 and higher.

== Installation ==

= Using The WordPress Dashboard (Recommended) =

1. Go to `Plugins` → `Add New`.
2. In a search field type **WPWC classic Coming Soon** and hit enter.
3. Click `Install Now` next to **WPWC classic Coming Soon** by WPWC.
4. Click `Activate the plugin` when the installation is complete.

= Uploading in WordPress Dashboard =

1. Go to `Plugins` → `Add New`.
2. Click on the `Upload Plugin` button next to the **Add Plugins** page title.
3. Click on the `Choose File` button.
4. Locate **wpwc-classic-coming-soon.zip** on your computer.
5. Click the `Install Now` button.
6. Click `Activate the plugin` when the installation is complete.

= Using FTP (Not Recommended) =

1. Download **wpwc-classic-coming-soon.zip**.
2. Extract the **wpwc-classic-coming-soon** folder to your computer.
3. Upload the **wpwc-classic-coming-soon** folder to **/wp-content/plugins/** directory of your website.
4. Go to `Plugins` → `Installed Plugins`.
5. Click `Activate` under **WPWC classic Coming Soon** plugin title.

== Screenshots ==

1. WooCommerce Coming Soon page.
2. Frontend page for Coming soon mode only.
2. Frontend page for Coming soon and Apply to store pages only mode.