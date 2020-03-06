<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['ajax/data/(:any)']					= 'home/get_aqm_data_ajax/$1';
// $route['report/idstasiun/ajax/(:any)']	= 'home/report_data_ajax/$1';
$route['report/idstasiun/(:any)']	= 'home/report_data/$1';
$route['idstasiun/(:any)']			= 'home/id_stasiun/$1';

$route['default_controller'] 		= 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
