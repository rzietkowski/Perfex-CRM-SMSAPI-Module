<?php defined('BASEPATH') or exit('No direct script access allowed');

function is_smsapi_save_messages()
{
    $CI = &get_instance();
    return class_exists(Sms_smsapi::class) && $CI->sms_smsapi->get_option("smsapi", "save_messagess");
}

function get_smsapi_latest_status_name($ms_id)
{
    $CI =& get_instance();
    $CI->db->select('status_name');
    $CI->db->from(db_prefix() . SMSAPI_MODULE_NAME . '_report');
    $CI->db->where('MsgId', $ms_id);
    $CI->db->order_by('id', 'DESC');
    $CI->db->limit(1);
    $query = $CI->db->get();
    if ($query->num_rows() > 0) {
        return $query->row()->status_name;
    }
    return null;
}