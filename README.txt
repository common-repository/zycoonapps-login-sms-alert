=== ZycoonApps Login SMS Alert ===
Author: ZycoonApps
Contributors: ZycoonApps
Support Website: https://www.zycoonapps.com/wordpress-apps/zycoonapps-login-sms-alert.html
Tags: : SMS Alert, SMS Notification, Admin Login Alert, SMS, Login SMS
Requires at least: 4.0.0
Tested up to: 6.0.1
Stable tag: 1.0.1
Requires PHP: 5.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Want an alert on successful Admin Login? ZycoonApps Login SMS Alert can alert you via SMS of the login incident including the IP address.

== Description ==
**ZycoonApps Login SMS Alert** allows you to receive an SMS alert when a user with ADMINISTRATOR role logins to either frontend or admin.
The SMS will contain the Username and IP address, thus allowing you to review any suspicious activity and take timely action.

For the plugin to be able to send SMS, it sends the data/information that you provide in "ZycoonApps Login SMS Alert" plugin options and also sends the SMS message to the 3rd party containing the username and IP address.

This plugin relies on 3rd party as a service provider named VOIP.MS [https://voip.ms/](https://voip.ms/)

Please review Terms of Service and Privacy Policy of the service provider before using this plugin.
[Terms of Service](https://voip.ms/terms-of-service)
[Privacy Policy](https://voip.ms/privacy-policy)

The 3rd party SMS gateway https://voip.ms/ also limit service to a max of 100 SMS per day. View [Usage Limits](https://wiki.voip.ms/article/SMS)

Currently Supported SMS Gateway:
VOIP.MS : Visit [VOIP.MS Website](https://voip.ms/) for more info on subscribing to service & pricing info.

NOTE: You will need to whitelist the IP address of the server (from where the request to the API is being sent) in your VOIP.MS account

We plan to add more SMS gateways based on user feedback, so do let us know if you want to see any particular SMS Gateway added to this plugin.

If you have any question or features request, please access the plugin's official support forum.

== Installation ==

#### From within WordPress

1. Visit 'Plugins > Add New'
2. Search for 'ZycoonApps Login SMS Alert'
3. Install and Activate 'ZycoonApps Login SMS Alert' for WordPress from your 'Plugins' menu from WordPress.
4. Visit the new 'Login SMS Alert' sub-menu under Settings to configue SMS alert.

#### Manually

1. Upload the zycoonapps-login-sms-alert/ folder to the /wp-content/plugins/ directory. 
2. Activate the plugin through the 'Plugins' menu in WordPress. 
3. Visit the new 'Login SMS Alert' sub-menu under Settings to configue SMS alert.


== Screenshots ==

1. Settings


== Frequently Asked Questions ==
= 1. Are the SMS free? =
No, this uses a SMS gateway that a user needs to signup and pay for usage of service.

= 2. How do i setup VOIP.MS API =
After you are logged into your account at the SMS Gateway Website [https://voip.ms/](https://voip.ms/) , you can ENABLE your API, create your API password and whitelist your website IP at: [https://voip.ms/m/api.php](https://voip.ms/m/api.php)

= 3. I only see VOIP.MS SMS gateway, is there any other option available? =
Not yet, but this is an Initial Release and we have planned to bring in more SMS gateway options. 


== Changelog ==

= 1.0.1 =
Compatibility fixes for PHP 8

= 1.0.0 =
Initial release.
