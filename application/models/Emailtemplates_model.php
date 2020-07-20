<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Emailtemplates_model extends CI_Model{

    function emailListingCount($searchText = '')
    {
        $this->db->select('tbl_email_templates.*');
        $this->db->from('tbl_email_templates');
        if(!empty($searchText)) {
            $likeCriteria = "(tbl_email_templates.title  LIKE '%".$searchText."%'
                            OR  tbl_email_templates.subject  LIKE '%".$searchText."%'
                            OR  tbl_email_templates.body  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('tbl_email_templates.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    public function get_emailtemplates($searchText = '', $page, $segment){
        $this->db->select('tbl_email_templates.*');
        $this->db->from('tbl_email_templates');
        if(!empty($searchText)) {
            $likeCriteria = "(tbl_email_templates.title  LIKE '%".$searchText."%'
                            OR  tbl_email_templates.subject  LIKE '%".$searchText."%'
                            OR  tbl_email_templates.body  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('tbl_email_templates.isDeleted', 0);
        $this->db->order_by('tbl_email_templates.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function getTemplateType()
    {
        $this->db->select('tbl_email_template_types.*');
        $this->db->from('tbl_email_template_types');
        $query = $this->db->get();
        return $query->result();
    }
    function getTemplatePlaceholder()
    {
        $this->db->select('tbl_email_template_placeholders.*');
        $this->db->from('tbl_email_template_placeholders');
        $query = $this->db->get();
        return $query->result();
    }
    function addNewEmailTemplate($emailInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_email_templates', $emailInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function getEmailTemplatesInfo($emailId)
    {
        $this->db->select('tbl_email_templates.*');
        $this->db->from('tbl_email_templates');
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $emailId);
        $query = $this->db->get();
        
        return $query->row();
    }
    function editEmailTemplate($emailInfo, $emailId)
    {
        $this->db->where('id', $emailId);
        $this->db->update('tbl_email_templates', $emailInfo);
        
        return TRUE;
    }
    function deleteEmailtemplate($emailId, $emailInfo)
    {
        $this->db->where('id', $emailId);
        $this->db->update('tbl_email_templates', $emailInfo);
        
        return $this->db->affected_rows();
    }
}

  