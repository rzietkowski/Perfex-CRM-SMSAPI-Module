<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Smsapi constructor.
 */
class Smsapi extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        if( !is_smsapi_save_messages() ){
            show_404();
        }

        $this->load->model(SMSAPI_MODULE_NAME.'/smsapi_model');
    }

    /**
     * Index method for the Smsapi controller.
     *
     * @param string $id (optional) The ID parameter.
     * @return void
     */
    public function index( $id = '' )
    {
        if (staff_cant('view', SMSAPI_MODULE_NAME)) {
            access_denied(SMSAPI_MODULE_NAME);
        }
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(SMSAPI_MODULE_NAME, 'table'));
        }
        $this->app_scripts->add('circle-progress-js','assets/plugins/jquery-circle-progress/circle-progress.min.js');
        $data['title'] = _l('smsapi_log');
        $data['item_id'] = $id;

        $this->load->view('manage', $data);
    }

    /**
     * Retrieves item data via AJAX request.
     *
     * @param int $id The ID of the item to retrieve data for.
     * @return void
     */
    public function get_item_data_ajax($id)
    {
        if (staff_cant('view', SMSAPI_MODULE_NAME) && !$this->input->is_ajax_request() ) {
            access_denied(SMSAPI_MODULE_NAME);
        }

        $sms = $this->smsapi_model->get('sms','id',$id);

        $reports = $sms ? $this->smsapi_model->get('report','MsgId',$sms->ms_id, true) : null;

        $data = [];
        $data['sms'] = $sms;
        $data['reports'] = $reports;

        $this->load->view('preview_template', $data);
    }

    /**
     * Deletes an SMS record.
     *
     * @param int $id The ID of the SMS record to delete.
     * @return void
     */
    public function delete($id): void
    {
        $message = '';
        if (staff_cant('delete', SMSAPI_MODULE_NAME) || !$this->input->is_ajax_request()) {
            $delete = false;
            $message = '- '._l(SMSAPI_MODULE_NAME.'_no_permissions');
        } else {
            $delete = $this->smsapi_model->delete('sms', $id);
        }

        if ($this->input->is_ajax_request()) {
            header("Content-type: application/json; charset=utf-8");
            echo json_encode([
                'success' => $delete,
                'message' => $delete ? _l('deleted') : _l('problem_deleting', $message),
                'id'      => $id
            ]);
            exit;
        }

        if ($delete) {
            set_alert('success', _l('deleted'));
        } else {
            set_alert('danger', _l('problem_deleting'));
        }
        redirect(admin_url(SMSAPI_MODULE_NAME));
    }
}
