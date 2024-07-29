<?php

defined('BASEPATH') || exit('No direct script access allowed');

if (!$CI->db->table_exists(db_prefix().SMSAPI_MODULE_NAME.'_sms')) {
    $CI->db->query('CREATE TABLE `'.db_prefix().SMSAPI_MODULE_NAME.'_sms` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `hash` VARCHAR(32) NOT NULL,
        `testsms` TINYINT(1) NOT NULL DEFAULT 0,
        `sms_to` VARCHAR(20) DEFAULT NULL,
        `sms_from` VARCHAR(100) DEFAULT NULL,
        `sms_message` VARCHAR(255) DEFAULT NULL,
        `error` INT DEFAULT NULL,
        `error_message` VARCHAR(255) DEFAULT NULL,
        `error_invalid_numbers` VARCHAR(255) DEFAULT NULL,
        `ms_id` VARCHAR(255) DEFAULT NULL,
        `ms_points` DECIMAL(10, 2) DEFAULT NULL,
        `ms_number` VARCHAR(20) DEFAULT NULL,
        `ms_date_sent` TIMESTAMP DEFAULT NULL,
        `ms_submitted_number` VARCHAR(20) DEFAULT NULL,
        `ms_status` VARCHAR(50) DEFAULT NULL,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `hash` (`hash`),
        UNIQUE KEY `ms_id` (`ms_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET='.$CI->db->char_set.';');
}
if (!$CI->db->table_exists(db_prefix().SMSAPI_MODULE_NAME.'_report')) {
    $CI->db->query('CREATE TABLE `'.db_prefix().SMSAPI_MODULE_NAME.'_report` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `MsgId` VARCHAR(255) NOT NULL,
        `status` INT DEFAULT NULL,
        `status_name` VARCHAR(50) DEFAULT NULL,
        `idx` VARCHAR(255) DEFAULT NULL,
        `sent_at` TIMESTAMP DEFAULT NULL,
        `donedate` TIMESTAMP DEFAULT NULL,
        `username` VARCHAR(20) DEFAULT NULL,
        `points` DECIMAL(10, 2) DEFAULT NULL,
        `from` VARCHAR(100) DEFAULT NULL,
        `to` VARCHAR(20) DEFAULT NULL,
        `mcc` VARCHAR(10) DEFAULT NULL,
        `mnc` VARCHAR(10) DEFAULT NULL,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `unique_msgid_status` (`MsgId`, `status`, `status_name`)
    ) ENGINE=InnoDB DEFAULT CHARSET='.$CI->db->char_set.';');
}