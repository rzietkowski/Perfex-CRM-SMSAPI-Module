<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['smsapi/reports/(:any)'] = 'report/index/$1';