<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Processbuilder_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }

public function add_activity($data)
    {
        if (!empty($data)) {
            $insert = [
                "activity" => $data['activity'],
        
            ];
            $activity[] = $data['activity'];
            $repeated = $this->check_report($activity);
            if ($repeated == false) {
                $this->db->insert(db_prefix() . 'labour_activity_list', $insert);
                if ($this->db->affected_rows() > 0) {
                    $data['id'] = $this->db->insert_id();
                    $data['alert'] = 'New Activity Created' ;
                    return $data;
                } else {
                    return false;
                }
            }
            $data['alert'] = 'Activity Already Exists';
            return $data;
        }
        return false;
    }
    public function update_activity($data, $id)
    {

        if (!empty($data)) {
            $update = array(
                "activity" => $data['activity'],
            );
            $activity[] = $data['activity'];
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update(db_prefix() . 'labour_activity_list', $update);
            if ($this->db->affected_rows() > 0) {
                $data['id'] = $this->db->insert_id();
                $data['alert'] = 'Activity updated';
                return $data;
            } else {
                return false;
            }
        
        return array('success' => false, 'alert' => 'Failed to update Activity.');
        }
    }

    public function check_report($activity)
    {
        $this->db->select('activity', $activity);
        $this->db->where_in('activity', $activity);
        $result = $this->db->get(db_prefix() . 'labour_activity_list')->result_array();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_activity($id) {
        $this->db->where('id', $id);
        $result = $this->db->delete(db_prefix() . 'labour_activity_list');
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}