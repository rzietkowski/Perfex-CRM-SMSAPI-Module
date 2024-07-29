<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI = &get_instance();
$CI->db->query('DROP TABLE `'.db_prefix().SMSAPI_MODULE_NAME.'_sms`');
$CI->db->query('DROP TABLE `'.db_prefix().SMSAPI_MODULE_NAME.'_report`');