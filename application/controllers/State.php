<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : State (StateController)
 * State Class to control all email related operations.
 */
class State extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('State_model'); 
        $this->isLoggedIn();
    }
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : State Listing'; 
        $this->loadViews("state/list", $this->global, NULL, NULL);
    }
    public function getState()
    {   
        $datas = $this->State_model->get_state();
        $count = $this->State_model->get_state_total();
        $data = array();
        foreach($datas as $rows)
        {
            $data[]= array(
                $rows->name,
                $rows->country_name,
                ($rows->status == '1')?'<span class="badge progress-bar-success">Active</span>':'<span class="badge progress-bar-danger">InActive</span>',
                $rows->createdDtm,
                "<a class='btn btn-sm btn-info' href='state/editState/$rows->id' title='Edit'><i class='fa fa-pencil'></i></a>
                <a class='btn btn-sm btn-danger deleteState' href='#' data-stateid='$rows->id' title='Delete'><i class='fa fa-trash'></i></a>",
            );     
        }
        $results = array(
            "draw" => $this->input->get('draw'),
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $data 
        );
        echo json_encode($results);
    }
    public function createState()
    {
        $data['country'] = $this->State_model->getCountryInfo();     
        $this->global['pageTitle'] = 'CodeInsect : Add New State';
        $this->loadViews("state/add", $this->global, $data, NULL);
    }
    public function storeState()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('country_id','Country','trim|required');
        if($this->form_validation->run() == FALSE){
            $this->storeState();
        }else{   
            $stateInfo = array();            
            $stateInfo = array('name'=>$this->input->post('name'), 
                                'country_id'=>$this->input->post('country_id'), 
                                'status'=>$this->input->post('status'), 
                                'createdBy'=>$this->vendorId, 
                                'createdDtm'=>date('Y-m-d H:i:s'));
            
            $this->load->model('State_model');
            $result = $this->State_model->addNewState($stateInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New State created successfully');
            }else{
                $this->session->set_flashdata('error', 'State creation failed');
            }
            redirect('state');
        }
    }
    public function editState($stateId = NULL)
    {
        if(!empty($stateId)){
            $data['country'] = $this->State_model->getCountryInfo(); 
            $data['stateInfo'] = $this->State_model->getStateInfo($stateId);
            $this->global['pageTitle'] = 'CodeInsect : Edit State';
            $this->loadViews("state/edit", $this->global, $data, NULL);
        }
    }
    public function updateState()
    {
        $this->load->library('form_validation');
        $stateId = $this->input->post('stateId');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('country_id','Country','trim|required');
        if($this->form_validation->run() == FALSE){
            $this->editState($stateId);
        }else{
            $stateInfo = array();
            $stateInfo = array('name'=>$this->input->post('name'), 
            'country_id'=>$this->input->post('country_id'), 
            'status'=>$this->input->post('status'),'updatedBy'=>$this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->State_model->editState($stateInfo, $stateId);
            if($result == true){
                $this->session->set_flashdata('success', 'State updated successfully');
            }else{
                $this->session->set_flashdata('error', 'State updation failed');
            }
            redirect('state');
        }
    }
    public function deleteState()
    {
        $stateId = $this->input->post('stateId');
        $stateInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
        $result = $this->State_model->deleteState($stateId, $stateInfo);
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
}

?>