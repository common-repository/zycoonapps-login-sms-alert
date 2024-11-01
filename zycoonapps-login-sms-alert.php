<?php
/*
Plugin Name: ZycoonApps Login SMS Alert
Plugin URI: https://www.zycoonapps.com/wordpress-apps/zycoonapps-login-sms-alert.html
Description: Want an alert on successful Admin Login? ZycoonApps Login SMS Alert can alert you via SMS of the login incident including the IP address.
Version: 1.0.1
Author: ZycoonApps
Author URI: https://www.zycoonapps.com/
License: GPLv2 or later
Text Domain: zycoonapps-login-sms-alert
*/

defined('ABSPATH') or die();

add_action( 'admin_menu', 'zapps_loginsms_options_page' );
function zapps_loginsms_options_page() {
	add_options_page(
		'Login SMS Alert',
		'Login SMS Alert',
		'manage_options',
		'zapps-login-sms-alert',
		'zapps_loginsms_options_page_content',
		20
	);
}

function zapps_loginsms_options_page_content(){
	echo '<div class="wrap">
	<h1>Login SMS Alert</h1>
	<h3>NOTE: You will need to whitelist your server IP in your VOIP.MS account. Visit <a href="https://voip.ms/">https://voip.ms/</a> for pricing and subscription.</h3>
	<h4>We do not provide the service directly and you need the account with the <a href="https://voip.ms/">https://voip.ms/</a> service provider in order to be able to configure this plugin for sending SMS alert.</h4>
	<h4>If any of the below fields are empty, no call to the SMS gateway will be sent.</h4>
	<h4>Plugin sends notification via SMS only for successful login for administrator role.</h4>
	<hr>
	<form method="post" action="options.php">';
		settings_fields( 'zapps_loginsms_settings' );
		do_settings_sections( 'zapps-loginsmsalert' );
		submit_button();
	echo '</form></div>';
}

add_action( 'admin_init',  'zapps_loginsms_register_setting' );
function zapps_loginsms_register_setting(){
    
     
	register_setting(
		'zapps_loginsms_settings',
		'zapps_loginsms_enable',
		'sanitize_text_field'
	);
	add_settings_section(
		'zapps_loginsms_settings_section_id',
		'SMS Alert Settings',
		'',
		'zapps-loginsmsalert'
	);
	add_settings_field('zapps_loginsms_enable', 'Enable', 'zapps_loginsms_text_field_html_enable', 'zapps-loginsmsalert','zapps_loginsms_settings_section_id');
     
    
	register_setting(
		'zapps_loginsms_settings',
		'zapps_loginsms_phone',
		'sanitize_text_field'
	);
	add_settings_section(
		'zapps_loginsms_settings_section_id',
		'SMS Alert Settings',
		'',
		'zapps-loginsmsalert'
	);
	add_settings_field(
		'zapps_loginsms_phone',
		'Your Cellphone Number',
		'zapps_loginsms_text_field_html_phone',
		'zapps-loginsmsalert',
		'zapps_loginsms_settings_section_id',
		array( 
			'label_for' => 'zapps_loginsms_phone',
			'class' => 'zapps-loginsmsalert-class',
		)
	);
	
	
	register_setting(
		'zapps_loginsms_settings',
		'zapps_loginsms_username',
		'sanitize_text_field'
	);
	register_setting(
		'zapps_loginsms_settings',
		'zapps_loginsms_password',
		'sanitize_text_field'
	);
	register_setting(
		'zapps_loginsms_settings',
		'zapps_loginsms_did',
		'sanitize_text_field'
	);
	add_settings_section(
		'zapps_loginsms_settings_section_id_gateway',
		'SMS Gateway Settings ( VOIP.MS )',
		'',
		'zapps-loginsmsalert'
	);
	add_settings_field(
		'zapps_loginsms_username',
		'API Username',
		'zapps_loginsms_text_field_html_username',
		'zapps-loginsmsalert',
		'zapps_loginsms_settings_section_id_gateway',
		array( 
			'label_for' => 'zapps_loginsms_username',
			'class' => 'zapps-loginsmsalert-class',
		)
	);
	add_settings_field(
		'zapps_loginsms_password',
		'API Password',
		'zapps_loginsms_text_field_html_password',
		'zapps-loginsmsalert',
		'zapps_loginsms_settings_section_id_gateway',
		array( 
			'label_for' => 'zapps_loginsms_password',
			'class' => 'zapps-loginsmsalert-class',
		)
	);
	add_settings_field(
		'zapps_loginsms_did',
		'DID Number',
		'zapps_loginsms_text_field_html_did',
		'zapps-loginsmsalert',
		'zapps_loginsms_settings_section_id_gateway',
		array( 
			'label_for' => 'zapps_loginsms_did',
			'class' => 'zapps-loginsmsalert-class',
		)
	);
	
}

function zapps_loginsms_text_field_html_enable() {
    $checked = ' ';
	$options = get_option('zapps_loginsms_enable');
	if(isset($options['zapps_loginsms_enable']) && $options['zapps_loginsms_enable']) { $checked = ' checked="checked" '; }
	echo "<input ".$checked." id='zapps_loginsms_enable' name='zapps_loginsms_enable' type='checkbox' />";
}
function zapps_loginsms_text_field_html_phone(){
	$text = get_option( 'zapps_loginsms_phone' );
	printf('<input type="text" id="zapps_loginsms_phone" name="zapps_loginsms_phone" value="%s" />',esc_attr( $text ));
	echo "<p>Enter your phone number where you want to receive SMS</p>";
}
function zapps_loginsms_text_field_html_username(){
	$text = get_option( 'zapps_loginsms_username' );
	printf('<input type="text" id="zapps_loginsms_username" name="zapps_loginsms_username" value="%s" />',esc_attr( $text ));
	echo "<p>Enter your VOIP.MS account Email Address</p>";
}
function zapps_loginsms_text_field_html_password(){
	$text = get_option( 'zapps_loginsms_password' );
	printf('<input type="password" id="zapps_loginsms_password" name="zapps_loginsms_password" value="%s" />',esc_attr( $text ));
	echo "<p>Enter your API password (This is different from Account Password)</p>";
}
function zapps_loginsms_text_field_html_did(){
	$text = get_option( 'zapps_loginsms_did' );
	printf('<input type="text" id="zapps_loginsms_did" name="zapps_loginsms_did" value="%s" />',esc_attr( $text ));
	echo "<p>Enter your 10 digit DID number registered in VOIP.MS account</p>";
}


function zapps_loginsms_get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function zapps_sms_notification($user_login) {
    $user = get_user_by('login', $user_login );
    if ( in_array( 'administrator', (array) $user->roles ) )
    {
        // Only request API Call if ENABLED by user from Plugin Settings.
        $options = get_option('zapps_loginsms_enable');
	    if(isset($options['zapps_loginsms_enable']) && $options['zapps_loginsms_enable']) {
            $username = $user->data->user_login;
            $zapps_loginsms_phone = get_option( 'zapps_loginsms_phone' );
            $zapps_loginsms_username = get_option( 'zapps_loginsms_username' );
            $zapps_loginsms_password = get_option( 'zapps_loginsms_password' );
            $zapps_loginsms_did = get_option( 'zapps_loginsms_did' );
            
            // Only request API Call if API credentials and destination phone number info is provided by user in Plugin Settings.
            if($zapps_loginsms_phone && $zapps_loginsms_username && $zapps_loginsms_password && $zapps_loginsms_did)
            {
                $postfields = array(
                    'api_username'=>$zapps_loginsms_username,
                    'api_password'=>$zapps_loginsms_password,
                    'method'=>'sendSMS',
                    'did'=>$zapps_loginsms_did,
                    'dst'=>$zapps_loginsms_phone,
                    'message'=>'Login SMS Alert: An admin user ('.$username.') logged-in from IP: '.zapps_loginsms_get_client_ip()
                );
                // Call to 3rd Party API service / account needed to successfully send SMS alert.
                $response = wp_remote_post( 'https://voip.ms/api/v1/rest.php', array(
                    'method'      => 'GET',
                    'timeout'     => 45,
                    'redirection' => 5,
                    'httpversion' => '1.0',
                    'blocking'    => true,
                    'headers'     => array(),
                    'body'        => $postfields,
                    'cookies'     => array()
                    )
                );
            }
	    }
    }
}
add_action('wp_login', 'zapps_sms_notification');

?>