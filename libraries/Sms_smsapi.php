<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Sms_smsapi extends App_sms
{
    const api_url_servis = [
        'pl'    => 'https://api.smsapi.pl/',
        'com'   => 'https://api.smsapi.com/',
        'se'    => 'https://api.smsapi.se/',
        'bg'    => 'https://api.smsapi.bg/',
    ];
    private $apikey;
	private $from;
	private $servis;
	private $fast;
	private $testsms;
	private $save_messagess;
    private $normalize;

    public function __construct()
    {
        parent::__construct();
        
        $this->apikey = $this->get_option("smsapi", "apikey");
        $this->from = $this->get_option("smsapi", "from");
        $this->servis = $this->get_option("smsapi", "servis");
        $this->fast = $this->get_option("smsapi", "fast");
        $this->testsms = $this->get_option("smsapi", "testsms");
        $this->save_messagess = $this->get_option("smsapi", "save_messagess");
        $this->normalize = $this->get_option("smsapi", "normalize");

        $save_messagess_page = $this->save_messagess ? '<div><a class="btn btn-sm btn-warning" href="'.admin_url(SMSAPI_MODULE_NAME).'"><i class="fa-list-alt fa-regular tw-mr-1"></i>'._l('smsapi_log2').'</a></div>' : '';

        $this->add_gateway("smsapi", [
            "name" => "SMSAPI",
            "options" => [
                [
                    "name" => "apikey",
                    "label" => _l("smsapi_apikey_label"),
                    "info" => _l('smsapi_apikey_info')
                ],    
                [
                    "name" => "from",
                    "label" => "smsapi_from_label",
                    "info" => "<p>"._l("smsapi_from_info")."</p><hr class=\"hr-15\" />"
                ],
                [
                    'name'          => 'servis',
                    'field_type'    => 'radio',
                    'default_value' => 'pl',
                    'label'         => _l("smsapi_servis_label"),
                    "info" => "<hr class=\"hr-15\" />",
                    'options'       => array_map(function($key) {
                        $label_key = "smsapi_servis_option_{$key}";
                        $label_default = "(.{$key})";
                        return [
                            'label' => _l($label_key, $label_default),
                            'value' => $key,
                        ];
                    }, array_keys(self::api_url_servis)),
                ],
                [
                    'name'          => 'fast',
                    'field_type'    => 'radio',
                    'default_value' => '0',
                    'label'         => _l("smsapi_fast_label"),
                    "info" => "<p>"._l('smsapi_fast_info')."</p><hr class=\"hr-15\" />",
                    'options'       => [
                        ['label' => _l('settings_yes'), 'value' => 1],
                        ['label' => _l('settings_no'), 'value' => 0],
                    ],
                ],
                [
                    'name'          => 'normalize',
                    'field_type'    => 'radio',
                    'default_value' => '0',
                    'label'         => _l("smsapi_normalize_label"),
                    "info" => "<p>"._l('smsapi_normalize_info')."</p><hr class=\"hr-15\" />",
                    'options'       => [
                        ['label' => _l('settings_yes'), 'value' => 1],
                        ['label' => _l('settings_no'), 'value' => 0],
                    ],
                ],
                [
                    'name'          => 'save_messagess',
                    'field_type'    => 'radio',
                    'default_value' => '0',
                    'label'         => _l("smsapi_save_messagess_label"),
                    "info" => "<p>"._l("smsapi_save_messagess_info",$save_messagess_page)."</p><hr class=\"hr-15\" />",
                    'options'       => [
                        ['label' => _l('settings_yes'), 'value' => 1],
                        ['label' => _l('settings_no'), 'value' => 0],
                    ],
                ],
                [
                    'name'          => 'testsms',
                    'field_type'    => 'radio',
                    'default_value' => '0',
                    'label'         => _l("smsapi_testsms_label"),
                    "info" => "<p>"._l("smsapi_testsms_info")."</p><hr class=\"hr-15\" />",
                    'options'       => [
                        ['label' => _l('settings_yes'), 'value' => 1],
                        ['label' => _l('settings_no'), 'value' => 0],
                    ],
                ],
            ],
        ]);
    }

    public function send($number, $message)
    {
        try {
            $sendData = [
                'to' => $number,
                'message' => $message,
                'format' => 'json',
                'encoding' => 'utf-8',
            ];

            if( $this->from )
                $sendData['from'] = $this->from;

            if( $this->testsms )
                $sendData['test'] = '1';

            if( $this->fast )
                $sendData['fast'] = '1';

            if( $this->normalize )
                $sendData['normalize'] = '1';

            $sendData['partner_id'] = 'XFK6';
            
            if( $this->save_messagess ){
                $sms_hash = app_generate_hash();
                $sendData['notify_url'] = site_url("smsapi/reports/{$sms_hash}");
            }

            $response = $this->client->request(
                'POST',
                self::api_url_servis[$this->servis].'sms.do',
                [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '.$this->apikey,
                    ],
                    'form_params' => $sendData,
                    'allow_redirects' => true,
                    'http_errors' => false
                ]
            );

            $send = json_decode($response->getBody()->getContents(), true);
            
            $statusCode = $response->getStatusCode();

            if( isset($send["error"]) ){
                $send['error_message'] = _l("smsapi_errorcode_{$send["error"]}");
            }

            if( isset($send['count']) && $send['count'] > 0 && isset($send['list']) ){
                foreach( $send['list'] as &$item ){
                    $item['status_message'] = _l("smsapi_status_{$item['status']}");
                }
            }

            $api_log = json_encode( $send, JSON_UNESCAPED_UNICODE );

            if( $this->save_messagess ){
                $CI = &get_instance();
                $CI->load->model(SMSAPI_MODULE_NAME.'/smsapi_model');
                $addData = [];
            }

            if ($statusCode == 200 ) {
                if( !isset($send["error"]) && isset($send['count']) && $send['count'] > 0 ){
                    if( $this->save_messagess ){
                        foreach( $send['list'] as $item ){
                            $CI->smsapi_model->add('sms', [
                                'hash' => $sms_hash,
                                'testsms' => $this->testsms,
                                'sms_to' => $number,
                                'sms_from' => $this->from ?? null,
                                'sms_message' => $message,
                                'ms_id' => $item['id'],
                                'ms_points' => $item['points'],
                                'ms_number' => $item['number'],
                                'ms_date_sent' => $item['date_sent'],
                                'ms_submitted_number' => $item['submitted_number'],
                                'ms_status' => $item['status'],
                            ]);
                        }
                    }
                    $this->logSuccess($number, "{$message}, API_LOG:{$api_log}, StatusCode:{$statusCode}");
                    return true;
                }else{
                    if( $this->save_messagess ){
                        $CI->smsapi_model->add('sms', [
                            'hash' => $sms_hash,
                            'testsms' => $this->testsms,
                            'sms_to' => $number,
                            'sms_from' => $this->from ?? null,
                            'sms_message' => $message,
                            'error' => $send["error"] ?? null,
                            'error_message' => $send['message'] ?? null,
                            'error_invalid_numbers' => $send['invalid_numbers'] ?? null
                        ]);
                    }
                    $this->set_error("Message:{$message}, To:{$number}, API_LOG:{$api_log}, StatusCode:{$statusCode}");
                    return false;
                }
                
            } else {
                $this->set_error("Message:{$message}, To:{$number}, API_LOG:{$api_log}, StatusCode:{$statusCode}");
                return false;
            }


        } catch (Exception $e) {
            $this->set_error($e->getMessage());
            return false;
        }
    }
    
}