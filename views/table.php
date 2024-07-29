<?php

defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = [
    'id',
    'ms_id',
    'testsms',
    'error',
    'ms_status',
    'sms_to',
    'sms_from',
    'sms_message',
    'ms_points',
    'created_at',
];

$sIndexColumn = 'id';
$sTable       = db_prefix().SMSAPI_MODULE_NAME.'_sms';

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join = [], $where = [], $additionalSelect = ['id'], $sGroupBy = '', $searchAs = []);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    $ms_id = $aRow['ms_id'];

    $actions = '';
    $actions .= '<div class="tw-inline-flex">';
    $actions .= '<a href="#'.SMSAPI_MODULE_NAME.'_'.$aRow['id'].'" onclick="init_smsapi_item('.$aRow['id'].'); return false;" class="btn btn-default btn-icon btn-sm" data-toggle="tooltip" title="' . _l('view') . '"><i class="fa-eye fa-solid"></i></a>';

    if (staff_can('delete', SMSAPI_MODULE_NAME)) {
        $actions .= ' <a href="#" onclick="smsapi_item_delete('.$aRow['id'].'); return false;" class="btn btn-danger btn-icon btn-sm _delete" data-toggle="tooltip" title="' . _l('delete') . '"><i class="fa fa-trash-alt"></i></a>';
    }
    $actions .= '</div>';

    $testsms = '<i class="fa fa-check '.($aRow['testsms'] == 1 ? 'text-success':'tw-text-black/25').'"></i>';
    $error = (isset($aRow['error']) && !is_null($aRow['error']) ? '<i class="fa fa-exclamation-circle text-danger" data-toggle="tooltip" data-title="'._l('smsapi_errorcode_'.$aRow['error']).'"></i>' : '<i class="fa fa-exclamation-circle tw-text-black/25"></i>');

    if( is_null($aRow['ms_status']) ){
        $status = '';
    }else{
        $status = get_smsapi_latest_status_name($ms_id) ?? $aRow['ms_status'];
        $status = '<span class="tw-text-nowrap" data-toggle="tooltip" data-title="'._l("smsapi_status_{$status}").'"><i class="fa-regular fa-circle-question mright5"></i>'._l("smsapi_status_{$status}_label"). '</span>';
    }

    $message = $aRow['sms_message'];
    $message = '<div class="tw-truncate width200" data-toggle="tooltip" data-title="'.$message.'">'.$message.'</div>';

    $points = $aRow['ms_points'];

    $row[]              = $aRow['id'];
    $row[]              = $actions;
    $row[]              = $ms_id;
    $row[]              = $testsms;
    $row[]              = $error;
    $row[]              = $status;
    $row[]              = $aRow['sms_to'];
    $row[]              = $aRow['sms_from'];
    $row[]              = $message;
    $row[]              = $points;
    $row[]              = _d($aRow['created_at']);
    $row['DT_RowClass'] = 'has-row-options';
    $output['aaData'][] = $row;
}