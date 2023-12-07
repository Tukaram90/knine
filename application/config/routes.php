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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 
// website url
$route['contact-us'] = 'home/contact_us';
$route['about-us'] = 'home/about_us';
$route['gallery'] = 'home/gallery'; 
$route['faq'] = 'home/faq'; 



$route['register-user'] = 'user/register_user';
$route['forgot-password'] = 'user/forgot_password'; 
//customer admin url
$route['user-dashboard'] = 'customer/webuser/user_dashboard'; 
$route['reports'] = 'customer/webuser/reports'; 
$route['user-profile'] = 'customer/webuser/profile'; 
$route['kennel-list'] = 'customer/kennel/kennel_list'; 
$route['add-kennel'] = 'customer/kennel/add_kennel'; 
$route['edit-dog/(:any)'] = 'customer/kennel/edit_dog/$1';
$route['delete-dog/(:any)'] = 'customer/kennel/delete_dog/$1';
$route['remove-dog-tem/(:any)'] = 'customer/kennel/delete_temparay_dog/$1';
$route['dog-tree-view/(:any)'] = 'customer/kennel/dog_tree_view/$1'; 
$route['expense-list'] = 'customer/kennel/expense_list';  
$route['add-expense/?(:any)?'] = 'customer/kennel/add_expense/$1';
$route['delete-expense/(:any)'] = 'customer/kennel/delete_expense/$1';
$route['vaccination-list'] = 'customer/vaccination/vaccination_list'; 
$route['add-vaccination/?(:any)?'] = 'customer/vaccination/add_vaccination/$1'; 
$route['edit-vaccination/(:any)'] = 'customer/vaccination/edit_vaccination/$1';
$route['delete-dose/(:any)'] = 'customer/vaccination/delete_dose/$1'; 
$route['vaccination-details/(:any)'] = 'customer/vaccination/vaccination_details/$1';
$route['getting-vaccinated-list/(:any)'] = 'customer/vaccination/getting_vaccinated_list/$1';
$route['advertise'] = 'customer/advertise';
$route['downloaded-banner'] = 'customer/advertise/downloaded_banner';
$route['event'] = 'customer/kennel/calendar';
$route['shows'] = 'customer/kennel/shows'; 
$route['award-list'] = 'customer/kennel/award_list'; 
$route['add-award'] = 'customer/kennel/add_award';
$route['delete-award/(:any)'] = 'customer/kennel/delete_award/$1';
$route['edit-award/?(:any)?'] = 'customer/kennel/edit_award/$1';

$route['shows-list'] = 'customer/shows';
$route['shows-add'] = 'customer/shows/add_show'; 
$route['delete-show/(:any)'] = 'customer/shows/delete_show/$1';
$route['edit-show/?(:any)?'] = 'customer/shows/edit_show/$1';
$route['handler-expense'] = 'customer/shows/handler_expense_list';
$route['save-handler-expense'] = 'customer/shows/save_handler_expense';
$route['delete-handler-expense/(:any)'] = 'customer/shows/delete_handler_expense/$1';
$route['edit-handler-expense/(:any)'] = 'customer/shows/edit_handler_expense/$1';
$route['handler-invoice/(:any)'] = 'customer/shows/handler_invoice/$1';
$route['create-pdf/(:any)'] = 'customer/shows/create_pdf/$1';
$route['dog-gallery/?(:any)?'] = 'customer/Dgallery/dog_gallery/$1'; 
$route['save-photo'] = 'customer/Dgallery/save_photo'; 
$route['pedigree'] = 'customer/kennel/tree_structure'; 
$route['literacy'] = 'customer/kennel/literacy_tree_structure';
$route['logout'] = 'customer/webuser/logout'; 

$route['landing-page'] = 'customer/webuser/landing_page';


// admin
$route['administrator'] = 'login';
$route['user-list'] = 'admin/user_list';





