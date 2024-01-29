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
$route['default_controller'] = 'Authenticate/login';
$route['login'] = 'Authenticate/login';
$route['signup'] = 'Authenticate/signup';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Authenticate/signupData'] = 'Authenticate/signupData';
$route['Authenticate/loginData'] = 'Authenticate/loginData';
$route['Authenticate/isEmailAlreadyExist'] = 'Authenticate/isEmailAlreadyExist';
$route['facebook'] = 'Authenticate/facebook';


// message routes
$route['Message'] = 'Message';
$route['Message/allUser'] = 'Message/allUser';
$route['Message/ownerDetails'] = 'Message/ownerDetails';
$route['Message/getIndividual'] = 'Message/getIndividual';
$route['Message/setNoMessage'] = 'Message/setNoMessage';
$route['Message/updateBio'] = 'Message/updateBio';
$route['Message/blockUser'] = 'Message/blockUser';
$route['Message/unBlockUser'] = 'Message/unBlockUser';
$route['Message/getBlockUserData'] = 'Message/getBlockUserData';
$route['Message/deleteSelfMessage'] = 'Message/deleteSelfMessage';
$route['message/isUserAlreadyExist'] = 'Message/isUserAlreadyExist';
$route['message/deleteMessage'] = 'Message/deleteMessage';
$route['message/IsMsgSeenByUser'] = 'Message/IsMsgSeenByUser';




$route['tkclogout'] = 'Message/logout';
$route['sent'] = 'Message/sendMessage';
$route['getmessage'] = 'Message/getMessage';

// Profile routes 

$route['profile/setprofile'] ='Profile/setprofile';
$route['profile/setchattype'] ='Profile/setchattype';
$route['profile/setchate'] ='Profile/setchate';
$route['profile/getSignindetails'] ='Profile/getSignindetails';



// track Message 
$route['Message/GetUnseenMessage'] = 'Message/GetUnseenMessage';
$route['Message/updateUnSeenMsg'] ='Message/updateUnSeenMsg';
 

