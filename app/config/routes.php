<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$theme_config = APPPATH."../themes/config.json";
$theme = "regular";
if(file_exists($theme_config)){	
	$config = file_get_contents($theme_config);
	$config = json_decode($config);

	if(is_object($config) && isset($config->theme)){
		if(file_exists(APPPATH."../themes/".$config->theme)){
			$theme = $config->theme;
		}
	}
}

if (!defined('CUSTOM_PAGE')) {
    define("CUSTOM_PAGE", "general_custom_page");
}

$route['default_controller']                    = $theme;
$route['404_override']                          = 'custom_page/page_404';
$route['translate_uri_dashes']                  = FALSE;
$route['set_language']                          = 'blocks/set_language';
$route['pricing']                               = 'payment/pricing';
$route['thank_you']                             = 'payment/thank_you';
$route['payment_unsuccessfully']                = 'payment/payment_unsuccessfully';
$route['payment/([a-z0-9]{32})']                = 'payment/index';
// Settings page
$route['setting/ajax_general_settings']         = 'setting/ajax_general_settings';
$route['setting/(:any)']                        = 'setting/index/$1';


$route['dripfeed/search']                       = 'dripfeed/search';
$route['dripfeed/(:any)']                       = 'dripfeed/index/$1';
$route['dripfeed/order/(:any)']                 = 'order/log_details/$1';


$route['subscriptions/search']                  = 'subscriptions/search';
$route['subscriptions/(:any)']                  = 'subscriptions/index/$1';
$route['subscriptions/order/(:any)']            = 'order/log_details/$1';

$route['file_manager/block_file_manager_multi'] = 'file_manager/block_file_manager/multi';
$route['tickets/(:num)'] = 'tickets/view/$1';

// payment cron
$route['coinpayments/cron']             = 'add_funds/coinpayments/cron';
$route['coinbase/cron']                 = 'add_funds/coinbase/cron';
$route['payop/cron']                    = 'add_funds/payop/cron';
$route['midtrans/cron']                 = 'add_funds/midtrans/cron';

$route['paymongo/cron']                 = 'add_funds/paymongo/cron';


// API provider cron
$route['cron/order']                    = 'api_provider/cron/order';
$route['cron/status']                   = 'api_provider/cron/status';
$route['cron/status_subscriptions']     = 'api_provider/cron/status_subscriptions';

// client area
$route['faq']               = 'client/faq';
$route['terms']             = 'client/terms';
$route['cookie-policy']     = 'client/cookie_policy';

$route['unitpay_ipn'] 	    = 'add_funds/unitpay/unitpay_ipn/';
$route['cashmaal_ipn'] 		= 'add_funds/cashmaal/cashmaal_ipn/';
$route['ehot_ipn'] 			= 'add_funds/ehot/ipn/';
$route['gbprimepay_ipn']    = 'add_funds/gbprimepay/gbprimepay_ipn/';
$route['mercadopago_ipn']   = 'add_funds/mercadopago/ipn';
$route['payhere_ipn']       = 'add_funds/payhere/ipn/';
$route['mercadopago_ipn']   = 'add_funds/mercadopago/ipn/';
$route['payzah_ipn']        = 'add_funds/payzah/ipn/';

//$route['cron/pix']     					= 'add_funds/pix/list_pix';