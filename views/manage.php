<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="tw-mb-2">
                    <div class="_buttons">
                        <div class="display-block text-right">
                            <a href="#" class="btn btn-default btn-with-tooltip toggle-small-view hidden-xs" onclick="toggle_small_view('.table-<?php echo SMSAPI_MODULE_NAME;?>','#<?php echo SMSAPI_MODULE_NAME.'SMT';?>'); return false;" data-toggle="tooltip" title="" data-original-title="<?php echo _l(SMSAPI_MODULE_NAME.'_table_switch_view');?>"><i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" id="small-table">
                <div class="panel_s">
                    <div class="panel-body panel-table-full">
                    <?php echo form_hidden('item_id', $item_id); ?>
                    <?php render_datatable([
                        'ID #',
                        _l('actions'),
                        _l(SMSAPI_MODULE_NAME.'_ms_id'),
                        _l(SMSAPI_MODULE_NAME.'_testsms'),
                        _l(SMSAPI_MODULE_NAME.'_error'),
                        _l(SMSAPI_MODULE_NAME.'_ms_status'),
                        _l(SMSAPI_MODULE_NAME.'_sms_to'),
                        _l(SMSAPI_MODULE_NAME.'_sms_from'),
                        _l(SMSAPI_MODULE_NAME.'_sms_message'),
                        _l(SMSAPI_MODULE_NAME.'_ms_points'),
                        _l(SMSAPI_MODULE_NAME.'_created_at'),
                    ], SMSAPI_MODULE_NAME);
                    ?>
                    </div>
                </div>
            </div>

            <div class="col-md-7 small-table-right-col">
                <div id="<?php echo SMSAPI_MODULE_NAME.'SMT';?>" class="hide"></div>
            </div>

        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
    var hidden_columns = [];
    function init_smsapi_item(e) {
        load_small_table_item(e, "#<?php echo SMSAPI_MODULE_NAME.'SMT';?>", "item_id", "<?= SMSAPI_MODULE_NAME;?>/get_item_data_ajax", ".table-<?php echo SMSAPI_MODULE_NAME;?>");
    }
    $(function() {
        initDataTable('.table-<?php echo SMSAPI_MODULE_NAME;?>', window.location.href, 'undefined', 'undefined', {}, [0,'desc'] );
    });
    window.onload = function() {
        var hash = window.location.hash.substring(1);
        if ($.isNumeric(hash)) {
            var smsapi_item_id = parseInt(hash, 10);
            init_smsapi_item(smsapi_item_id);
        }
    }
    function reload_smsapi_table() {
        $.each([".table-<?php echo SMSAPI_MODULE_NAME;?>"], (function(e, t) {
            $.fn.DataTable.isDataTable(t) && $(t).DataTable().ajax.reload(null, !1)
        }
        ))
    }
    function smsapi_item_delete(e){

        a = "<?php echo admin_url(SMSAPI_MODULE_NAME.'/delete/'); ?>" + e;
        requestGetJSON(a).done((function(a) {
            if (a.success === true || a.success == "true") {
                if ($('#<?php echo SMSAPI_MODULE_NAME.'SMT';?>').is(":visible")){
                    toggle_small_view('.table-<?php echo SMSAPI_MODULE_NAME;?>', '#<?php echo SMSAPI_MODULE_NAME.'SMT';?>');
                    $('#<?php echo SMSAPI_MODULE_NAME.'SMT';?>').html('');
                }
                reload_smsapi_table();
                alert_float("success", a.message);
            } else {
                alert_float("danger", a.message);
            }
        }))
    }
</script>