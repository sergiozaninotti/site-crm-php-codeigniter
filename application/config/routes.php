<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'dashboard/index';

$route['customizar'] = 'dashboard/customizar';
$route['configuracoes'] = 'dashboard/configuracoes';

$route['proposta'] = 'simulacao/proposta';
