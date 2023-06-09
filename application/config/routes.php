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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['insert-timeindata']['post'] = 'employeedtr/insertTimeInData';
$route['insert-timeoutdata']['post'] = 'employeedtr/insertTimeOutData';
$route['get-empdtr']['post'] = 'employeedtr/getEmployeeDtr';
$route['insert-newuserdata']['post'] = 'activeuseraccount/insertUserAccount';
$route['insert-newfacedata']['post'] = 'activeuseraccount/insertNewFaceData';
$route['get-activeaccounts']['post'] = 'activeuseraccount/getActiveUserAccounts';
$route['get-accountdata']['post'] = 'activeuseraccount/getAccountData';
$route['edit-userdata']['post'] = 'activeuseraccount/editUserAccount';
$route['archive-user']['post'] = 'activeuseraccount/archiveUserAccount';
$route['revive-user']['post'] = 'archiveuseraccount/reviveUserAccount';
$route['get-archiveaccounts']['post'] = 'archiveuseraccount/getArchiveUserAccounts';
$route['delete-user']['post'] = 'archiveuseraccount/deleteUserAccount';
$route['get-accountdata-images']['post'] = 'activeuseraccount/getAccountDataRecoImages';
$route['delete-recogphoto']['post'] = 'activeuseraccount/deleteRecoImage';


// $route['image-upload'] = 'ImageUpload';
// $route['image-upload/post']['get'] = "ImageUpload/create";
// $route['image-upload/post']['post'] = "ImageUpload/store";
// $route['image-upload'] = 'activeuseraccount';
//  $route['image-upload/post']['get'] = "activeuseraccount/create";
//  $route['image-upload/post']['post'] = "activeuseraccount/storeDp";