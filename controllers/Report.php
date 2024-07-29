<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Report
 *
 * This class represents the controller for generating reports in the SMSAPI CRM module.
 * It extends the APP_Controller class.
 *
 * @package smsapi\controllers
 */
class Report extends APP_Controller
{
    public function __construct() {
        parent::__construct();
        $this->output->set_header('X-Robots-Tag: noindex, nofollow');
<<<<<<< HEAD
        
=======

>>>>>>> db670c9 (Temporary commit for force push)
        if( get_option("sms_smsapi_save_messagess") != '1' ){
            show_404();
        }
    }

    /**
     * Index method for the Report controller.
     *
     * This method is responsible for handling the index request and processing the SMS report.
     *
     * @param string $token The token used to identify the SMS.
     * @return void
     */
    function index($token){
        // XSS filter
        $fields = $this->input->get(NULL, TRUE);

        if( ! class_exists(Smsapi_model::class) ){
            $this->load->model('smsapi_model');
        }

        $sms_by_token = $this->smsapi_model->get('sms','hash',$token);

        if( is_null($sms_by_token) ){
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_status_header(404)
                ->set_output(json_encode(['status' => 'error', 'message' => 'Token not found.']));
            return;
        }

        if( $this->smsapi_model->add('report', $fields) ){
            $this->output
                ->set_status_header(200)
                ->set_output('OK');
            return;
        }
    }
}
