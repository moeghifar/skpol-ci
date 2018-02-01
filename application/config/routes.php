<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] 	= 'home';
$route['404_override'] 			= 'Error404';
$route['translate_uri_dashes'] 	= FALSE;

// custom url routing
$route['logout'] 				= 'home/logout';
