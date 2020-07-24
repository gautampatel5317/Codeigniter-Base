<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : City (CityController)
 * City Class to control all city related operations.
 */
class City extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('City_model'); 
        $this->isLoggedIn();
    }
    public function index()
    {
        $data['data'] = $this->City_model->get_city();
        $this->global['pageTitle'] = 'CodeInsect : City Listing'; 
        $this->loadViews("city/list", $this->global, $data, NULL);
    }
    public function createCity()
    {
        $data['country'] = $this->City_model->getCountryInfo();     
        $this->global['pageTitle'] = 'CodeInsect : Add New City';
        $this->loadViews("city/add", $this->global, $data, NULL);
    }
    function getState()
    {
        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        if(!empty($country_id))
        {
            echo $this->City_model->getState($country_id,$state_id);
        }
    }

    public function storeCity()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('country_id','Country','trim|required');
        $this->form_validation->set_rules('state_id','State','trim|required');
        if($this->form_validation->run() == FALSE){
            $this->createCity();
        }else{   
            $cityInfo = array();            
            $cityInfo = array('name'=>$this->input->post('name'), 
                                'country_id'=>$this->input->post('country_id'), 
                                'state_id'=>$this->input->post('state_id'), 
                                'status'=>$this->input->post('status'), 
                                'createdBy'=>$this->vendorId, 
                                'createdDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->City_model->addNewCity($cityInfo);
            if($result > 0){
                $this->session->set_flashdata('success', 'New City created successfully');
            }else{
                $this->session->set_flashdata('error', 'City creation failed');
            }
            redirect('city');
        }
    }
    public function editCity($cityId = NULL)
    {
        if(!empty($cityId)){
            $data['country'] = $this->City_model->getCountryInfo(); 
            $data['cityInfo'] = $this->City_model->getCityInfo($cityId);
            $this->global['pageTitle'] = 'CodeInsect : Edit City';
            $this->loadViews("city/edit", $this->global, $data, NULL);
        }
    }
    public function updateCity()
    {
        $this->load->library('form_validation');
        $cityId = $this->input->post('cityId');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('country_id','Country','trim|required');
        $this->form_validation->set_rules('state_id','State','trim|required');
        if($this->form_validation->run() == FALSE){
            $this->editCity($cityId);
        }else{
            $cityInfo = array();
            $cityInfo = array('name'=>$this->input->post('name'), 
                            'country_id'=>$this->input->post('country_id'), 
                            'state_id'=>$this->input->post('state_id'),
                            'status'=>$this->input->post('status'),
                            'updatedBy'=>$this->vendorId, 
                            'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->City_model->editCity($cityInfo, $cityId);
            if($result == true){
                $this->session->set_flashdata('success', 'City updated successfully');
            }else{
                $this->session->set_flashdata('error', 'City updation failed');
            }
            redirect('city');
        }
    }
    public function deleteCity()
    {
        $cityId = $this->input->post('cityId');
        $cityInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
        $result = $this->City_model->deleteCity($cityId, $cityInfo);
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }
}
?>
