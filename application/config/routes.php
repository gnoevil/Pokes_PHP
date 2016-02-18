<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['/'] = "users/index";
$route['users/register'] = "users/register";
$route['users/login'] = "users/login";
$route['users/add_user'] ="users/add_user";
$route['users/get_user'] = "users/get_user";

$route['pokes/get_poke_history'] = "pokes/get_poke_history";
$route['pokes'] = "pokes/index";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
