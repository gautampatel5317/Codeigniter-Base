<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Country (CountryController)
 * Country Class to control all email related operations.
 */
class Country extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model'); 
        $this->isLoggedIn();
    }
    
    /**
     * This function used to load the first screen of the email
     */
    public function index()
    {   
        $data['data'] = $this->Country_model->get_country();
        $this->global['pageTitle'] = 'CodeInsect : Country Listing'; 
        $this->loadViews("country/list", $this->global, $data, NULL);
    }
    public function createCountry()
    {
        $this->global['pageTitle'] = 'CodeInsect : Add New Country';
        $this->loadViews("country/add", $this->global, NULL, NULL);
    }
    public function storeCountry()
    {  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('code','Code','trim|required');
        $this->form_validation->set_rules('phone_code','Phone Code','trim|required');
        
        if($this->form_validation->run() == FALSE){
            $this->storeCountry();
        }else{   
            $countryInfo = array();            
            $countryInfo = array('name'=>$this->input->post('name'), 
                                'code'=>$this->input->post('code'), 
                                'phone_code'=>$this->input->post('phone_code'), 
                                'status'=>$this->input->post('status'), 
                                'createdBy'=>$this->vendorId, 
                                'createdDtm'=>date('Y-m-d H:i:s'));
            
            $this->load->model('Country_model');
            $result = $this->Country_model->addNewCountry($countryInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New Country created successfully');
            }else{
                $this->session->set_flashdata('error', 'Country creation failed');
            }
            redirect('country');
        }
        
    }
    public function editCountry($countryId = NULL)
    {
        if(!empty($countryId)){
            $data['countryInfo'] = $this->Country_model->getCountryInfo($countryId);
            $this->global['pageTitle'] = 'CodeInsect : Edit Country';
            $this->loadViews("country/edit", $this->global, $data, NULL);
        }
    }
    public function updateCountry()
    {
        $this->load->library('form_validation');
        $countryId = $this->input->post('countryId');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('code','Code','trim|required');
        $this->form_validation->set_rules('phone_code','Phone Code','trim|required');
        if($this->form_validation->run() == FALSE){
            $this->editCountry($countryId);
        }else{
            $countryInfo = array();
            $countryInfo = array('name'=>$this->input->post('name'), 
            'code'=>$this->input->post('code'), 
            'phone_code'=>$this->input->post('phone_code'), 
            'status'=>$this->input->post('status'),'updatedBy'=>$this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->Country_model->editCountry($countryInfo, $countryId);
            if($result == true){
                $this->session->set_flashdata('success', 'Country updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Country updation failed');
            }
            redirect('country');
        }
    }
    public function deleteCountry()
    {
        $countryId = $this->input->post('countryId');
        $countryInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
        $result = $this->Country_model->deleteCountry($countryId, $countryInfo);
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
}

?>