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
        $data['data'] = $this->State_model->get_state();
        $this->global['pageTitle'] = 'CodeInsect : State Listing'; 
        $this->loadViews("state/list", $this->global, $data, NULL);
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