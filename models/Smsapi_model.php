<?php defined('BASEPATH') or exit('No direct script access allowed');

class Smsapi_model extends App_Model
{
    private const TABLE = [
        'sms' => SMSAPI_MODULE_NAME.'_sms',
        'report' => SMSAPI_MODULE_NAME.'_report'
    ];
    public function __construct()
    {
        parent::__construct();

        if( !is_smsapi_save_messages() ){
            access_denied(SMSAPI_MODULE_NAME);
        }
    }

    public function get($table, $column, $value, $many = false)
    {
        $this->db->where($column, $value);
        $query = $this->db->get(db_prefix().self::TABLE[$table]);
    
        return $many ? $query->result() : $query->row();
    }

    public function add($table, $data)
    {
        switch ($table) {
            case 'sms':
                // $data['hash'] = app_generate_hash();

                if( isset($data['sms_to']) && !empty($data['sms_to']) ){
                    $data['sms_to'] = str_replace([' ', ',', ';'], ',', $data['sms_to']);
                }
                break;
            case 'report':
                $this->db->where('MsgId', $data['MsgId']);
                $this->db->where('status', $data['status']);
                $this->db->where('status_name', $data['status_name']);
                $existing = $this->db->get(db_prefix().self::TABLE[$table])->row();

                if ($existing) {
                    return $existing->id;
                }

                break;
        }

        if( isset($data['error_invalid_numbers']) && !empty($data['error_invalid_numbers']) ){
            $data['error_invalid_numbers'] = json_encode($data['error_invalid_numbers']);
        }

        $timestamp_columns = ['ms_date_sent', 'sent_at', 'donedate'];
        // Convert Unix timestamp to format `Y-m-d H:i:s`
        array_walk($timestamp_columns, function($column) use (&$data) {
            if (isset($data[$column]) && is_numeric($data[$column])) {
                $data[$column] = date('Y-m-d H:i:s', $data[$column]);
            }
        });

        $this->db->insert(db_prefix().self::TABLE[$table], $data);

        if ( $id = $this->db->insert_id() ){
            return $id;
        }

        return false;
    }

    public function update($table, $data, $id)
    {
        if ($this->db->update(db_prefix().self::TABLE[$table], $data, ['id' => $id])){
            return $id;
        }

        return false;
    }

    public function delete($table, $id)
    {
        if( $table == 'sms' ){
            $get_sms = $this->get($table, 'id', $id);
            $this->db->delete(db_prefix().self::TABLE['report'], ['MsgId'=>$get_sms->ms_id]);
        }

        if ($this->db->delete(db_prefix().self::TABLE[$table], ['id'=>$id]))
        {
            return true;
        }
        return false;
    }
}