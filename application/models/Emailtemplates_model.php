<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Emailtemplates_model extends CI_Model{

    public function get_emailtemplates(){
        $this->db->where('tbl_email_templates.isDeleted', 0);
        $this->db->order_by('tbl_email_templates.id', 'DESC');
        $query = $this->db->get('tbl_email_templates');
        return $query->result();
    }
    public function getTemplateType()
    {
        $query = $this->db->get('tbl_email_template_types');
        return $query->result();
    }
    public function getTemplatePlaceholder()
    {
        $query = $this->db->get('tbl_email_template_placeholders');
        return $query->result();
    }
    public function addNewEmailTemplate($emailInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_email_templates', $emailInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    public function getEmailTemplatesInfo($emailId)
    {
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $emailId);
        $query = $this->db->get('tbl_email_templates');
        return $query->row();
    }
    public function editEmailTemplate($emailInfo, $emailId)
    {
        $this->db->where('id', $emailId);
        $this->db->update('tbl_email_templates', $emailInfo);
        return TRUE;
    }
    public function deleteEmailtemplate($emailId, $emailInfo)
    {
        $this->db->where('id', $emailId);
        $this->db->update('tbl_email_templates', $emailInfo);
        return $this->db->affected_rows();
    }
}

  