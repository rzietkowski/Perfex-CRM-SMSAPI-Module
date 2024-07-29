<?php
defined("BASEPATH") or exit("No direct script access allowed");

/*
Module Name: SMSAPI
Description: Send SMS by SMSAPI
Author: ISCODE
Author URI: https://iscode.pl
Version: 1.0.0
Requires at least: 2.9.0
*/

define('SMSAPI_MODULE_NAME', "smsapi");

/**
 * Loads the SMSAPI module helper file and assigns it to the CodeIgniter instance.
 * @param object $CI The CodeIgniter instance.
 * @return void
 */
$CI = &get_instance();
$CI->load->helper(SMSAPI_MODULE_NAME. '/'. SMSAPI_MODULE_NAME);

/*
 * Register activation
 */
register_activation_hook(SMSAPI_MODULE_NAME, function() {
	$CI = &get_instance();
    require __DIR__ . '/install.php';
});

/**
 * Register uninstall module hook
*/
/* register_uninstall_hook(SMSAPI_MODULE_NAME, function(){
	$CI = &get_instance();
    require __DIR__ . '/uninstall.php';
}); */

/**
* Register language files, must be registered if the module is using languages
*/
register_language_files(SMSAPI_MODULE_NAME, [SMSAPI_MODULE_NAME]);

/**
 * Module permissions
 */
hooks()->add_action('admin_init', function() {
    $capabilities = [];

    $capabilities['capabilities'] = [
        'view'   => _l('permission_view') . '(' . _l('permission_global') . ')',
        'delete' => _l('permission_delete'),
    ];

    register_staff_capabilities(SMSAPI_MODULE_NAME, $capabilities, _l(SMSAPI_MODULE_NAME.'_log2'));
});

/**
 * Adds the SMS SMSAPI module to the list of SMS gateways.
 *
 * @param array $gateways The array of SMS gateways.
 * @return array The updated array of SMS gateways.
 */
hooks()->add_filter('sms_gateways', function($gateways) {
    if( isset($gateways) && is_array($gateways) && SMSAPI_MODULE_NAME )
        array_push($gateways, SMSAPI_MODULE_NAME.DIRECTORY_SEPARATOR.'Sms_'.SMSAPI_MODULE_NAME);

    return $gateways;
});

 /**
 * Add additional settings for this module in the module list area
 * @param  array $actions current actions
 * @return array
 */
hooks()->add_filter('module_'.SMSAPI_MODULE_NAME.'_action_links', function($actions) {
    $CI = &get_instance();

    $support = [
        'styled' => '1',
        'with_logo' => '1',
        'col' => 'col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2',
        'subject' => 'Perfex CRM Module::'.$CI->app_modules->get_headers(__FILE__)['module_name'],
        'email' => get_staff()->email ?? '',
        'name' => get_staff_full_name() ?? '',
    ];
    
    $support = array_filter($support, function($value) {
        return !empty($value);
    });

    $actions[] = '<a href="'.admin_url('settings?group=sms').'">' . _l('settings') . '</a>';
    $actions[] = '<a href="https://panel.iscode.pl/forms/ticket?'.http_build_query($support).'" target="_blank" data-toggle="tooltip" title="Contact with the developer"><i class="fa-envelope fa-solid"></i></a>';
    $actions[] = '<a href="https://github.com/rzietkowski/Perfex-CRM-SMSAPI-Module/issues" target="_blank">' . _l('support') . '</a>';
    return $actions;
});

/**
 * Init SMSAPI menu items in setup in admin_init hook
 * @return null
 */
hooks()->add_action('admin_init', function() {
    if (staff_can('view',  SMSAPI_MODULE_NAME) && is_smsapi_save_messages() ) {
        $CI = &get_instance();
        $CI->app_menu->add_sidebar_children_item('utilities', [
            'slug'     => SMSAPI_MODULE_NAME.'-log',
            'name'     => _l('smsapi_log'),
            'href'     => admin_url(SMSAPI_MODULE_NAME),
            'position' => 30,
        ]);
    }
});