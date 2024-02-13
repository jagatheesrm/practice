<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Processbuilder extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Processbuilder_model');
    }
    

    public function index()
    {

        if (!has_permission('Processbuilder', '', 'view')) {
            access_denied('Processbuilder');
        }
        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data('processbuilder_table');
        }
        
        $data['bodyclass'] = 'top-tabs kan-ban-body';
        $data['title']     = _l('Processbuilder');
        $this->load->view('admin/processbuilder/manage',$data);
    }
    
    public function create_activity($id = ''){

        if (!has_permission('processbuilder', '', 'create')) {
            access_denied('processbuilder');
        }
        
        if ($this->input->post()) {
            $data = $this->input->post();

            if (!$this->input->post('id')) {
            
                $result = $this->Processbuilder_model->add_activity($data);
                if ($result['id']) {
                    set_alert('success', $result['alert']);
                }else{
                    set_alert('danger', $result['alert']);
                }

            }else {
                if (!has_permission('Processbuilder', '', 'edit')) {
                    access_denied('Processbuilder');
                }
                $id = $this->input->post('id');
                $result = $this->Processbuilder_model->update_activity($data, $id);
                if ($result) {
                    set_alert('success', $result['alert']);
                }else{
                    set_alert('danger', $result['alert']);
                }
            }
            
            redirect(admin_url('processbuilder/'));
            die;
        }
    }

    public function delete_activity($id) {
        if (!has_permission('processbuilder', '', 'delete')) {
            access_denied('processbuilder');
        }
        
        if (is_numeric($id)) {
            $result = $this->Processbuilder_model->delete_activity($id);
            if ($result) {
                set_alert('success', 'Processbuilder Deleted');
            } else {
                set_alert('danger', 'Cannot delete');
            }
        }
        redirect(admin_url('processbuilder/'));
    }
}