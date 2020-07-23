<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : EmailTemplates (EmailTemplatesController)
 * EmailTemplates Class to control all email related operations.
 */
class Emailtemplates extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Emailtemplates_model'); 
        $this->isLoggedIn();
    }
    
    /**
     * This function used to load the first screen of the email
     */
    public function index()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $data['data'] = $this->Emailtemplates_model->get_emailtemplates();
            $this->global['pageTitle'] = 'CodeInsect : Email Templates Listing'; 
            $this->loadViews("emailtemplates/list", $this->global, $data, NULL);
        }
    }
    public function create()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        { 
            $data['type'] = $this->Emailtemplates_model->getTemplateType();
            $data['placeholder'] = $this->Emailtemplates_model->getTemplatePlaceholder();
            $this->global['pageTitle'] = 'CodeInsect : Add New Email Templates';
            $this->loadViews("emailtemplates/add", $this->global, $data, NULL);
        }
    }
    function store()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('type','Email Template Type','trim|required|numeric');
            $this->form_validation->set_rules('placeholder','Placeholder','trim|required|numeric');
            $this->form_validation->set_rules('subject','Subject','trim|required|max_length[128]');
            $this->form_validation->set_rules('body','Body','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->store();
            }
            else
            {   
                $emailInfo = array();            
                $emailInfo = array('type_id'=>$this->input->post('type'), 
                                  'title'=>$this->input->post('title'), 
                                  'subject'=>$this->input->post('subject'), 
                                  'body'=> $this->input->post('body'),
                                  'status'=>$this->input->post('status'), 
                                  'createdBy'=>$this->vendorId, 
                                  'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('Emailtemplates_model');
                $result = $this->Emailtemplates_model->addNewEmailTemplate($emailInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Email Template created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Email Template creation failed');
                }
                
                redirect('emailtemplates');
            }
        }
    }
    function edit($emailId = NULL)
    {
        if(!empty($emailId)){
        $data['type'] = $this->Emailtemplates_model->getTemplateType();
        $data['placeholder'] = $this->Emailtemplates_model->getTemplatePlaceholder();
        $data['emailInfo'] = $this->Emailtemplates_model->getEmailTemplatesInfo($emailId);
        $this->global['pageTitle'] = 'CodeInsect : Edit Email Template';
        $this->loadViews("emailtemplates/edit", $this->global, $data, NULL);
        }
    }
    function editEmailTemplate()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $emailId = $this->input->post('emailId');
            
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('type','Email Template Type','trim|required|numeric');
            $this->form_validation->set_rules('placeholder','Placeholder','trim|required|numeric');
            $this->form_validation->set_rules('subject','Subject','trim|required|max_length[128]');
            $this->form_validation->set_rules('body','Body','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit($emailId);
            }
            else
            {
                $emailInfo = array();
                
                $emailInfo = array('type_id'=>$this->input->post('type'), 
                'title'=>$this->input->post('title'), 
                'subject'=>$this->input->post('subject'), 
                'body'=> $this->input->post('body'),
                'status'=>$this->input->post('status'),'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s'));
                $result = $this->Emailtemplates_model->editEmailTemplate($emailInfo, $emailId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Email Template updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Email Template updation failed');
                }
                
                redirect('emailtemplates');
            }
        }
    }
    function deleteEmailtemplate()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $emailId = $this->input->post('emailId');
            $emailInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            $result = $this->Emailtemplates_model->deleteEmailtemplate($emailId, $emailInfo);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
}

?>