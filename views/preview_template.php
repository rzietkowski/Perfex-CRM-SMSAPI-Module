<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>


<div class="col-md-12 no-padding">
    <div class="panel_s">
        <div class="panel-body">
            <?php if( ! $sms ) {
                ?>
                <div class="alert alert-warning text-center tw-mb-0"><?php echo _l('smsapi_record_not_found');?></div>
                <?php
            }else {
                ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9 _buttons">
                        <label class="pull-right">                
                            <a href="#" onclick="smsapi_item_delete(<?php echo $sms->id;?>); return false;" data-toggle="tooltip" title="<?php echo _l('delete'); ?>" class="btn btn-sm btn-danger btn-with-tooltip" data-placement="bottom"><i class="fa-regular fa-trash-alt"></i></a>
                        </label>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div id="itemData">
                    
                    <?php
                    $html = '';
                    if( $sms ){
                        $html .= '<div class="table-responsive">';
                            $html .= '<table class="table dataTable '.SMSAPI_MODULE_NAME.' table-hover">';

                                $html .= '<thead>';
                                    $html .= '<tr role="row">';
                                        $html .= '<th>'._l(SMSAPI_MODULE_NAME.'_table_key').'</th>';
                                        $html .= '<th>'._l(SMSAPI_MODULE_NAME.'_table_value').'</th>';
                                    $html .= '</tr>';
                                $html .= '</thead>';

                                foreach( $sms as $k => $v ){
                                    $html .= '<tr>';

                                        $status = false;
                                        
                                        switch( $k ){
                                            case 'ms_status':
                                                $status = true;
                                                if( $reports )
                                                    $k = 'ms_statuses';
                                            break;
                                        }
        
                                        $html .= '<th class="tw-font-medium">'._l(SMSAPI_MODULE_NAME.'_'.$k).'</th>';

                                        $html .= '<th>';
                                            if( is_null($v) || empty($v) ){
                                                $v = '<span class="tw-text-black/25">- - - -</span>';
                                            }else{

                                                if( $status ){
                                                    if( !$reports ){
                                                        $v = $v .' - '._l('smsapi_status_'.$v);
                                                    }else{
                                                        $ul = '<ul style="list-style: decimal;">';
                                                        $ul .= '<li><span class="tw-font-medium">'._l('smsapi_status_'.$v.'_label').'</span><br><i class="fa fa-info-circle tw-text-black/15"></i> '._l('smsapi_status_'.$v).'</li>';
                                                        foreach ($reports as $report) {
                                                            $ul .= '<li><span class="tw-font-medium">'._l('smsapi_status_'.$report->status_name.'_label').'</span><br><i class="fa fa-info-circle tw-text-black/15"></i> '._l('smsapi_status_'.$report->status_name).'<br><i class="fa fa-clock tw-text-black/15"></i> '.$report->donedate.'</li>';
                                                        }
                                                        $ul .= '</ul>';
                                                        $v = $ul;
                                                    }
                                                }
                                                if( $k == 'error_invalid_numbers' ){
                                                    $data_array = json_decode($v, true);
                                                    if (is_array($data_array)) {
                                                        $html_table = '';
                                                        $html_table .= '<div class="table-responsive tw-border-0">';
                                                        $html_table .= '<table class="table" style="margin:0 !important;">';
                                                    
                                                        $html_table .= '<tr>';
                                                        foreach (array_keys($data_array[0]) as $column) {
                                                            $html_table .= '<th style="border-top:0;">' . htmlspecialchars($column) . '</th>';
                                                        }
                                                        $html_table .= '</tr>';
                                                    
                                                        foreach ($data_array as $row) {
                                                            $html_table .= '<tr>';
                                                            foreach ($row as $value) {
                                                                $html_table .= '<td>' . htmlspecialchars($value) . '</td>';
                                                            }
                                                            $html_table .= '</tr>';
                                                        }
                                                    
                                                        $html_table .= '</table>';
                                                        $html_table .= '</div>';

                                                        $v = $html_table;
                                                    }
                                            
                                                }
                                            }
                                            $html .= $v;
                                        $html .= '</th>';

                                    $html .= '<tr>';
                                }

                            $html .= '</table>';

                        $html .= '</div>';
                    }
                    
                    echo $html;

                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>