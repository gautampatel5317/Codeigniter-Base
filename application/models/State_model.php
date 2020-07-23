<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class State_model extends CI_Model{

    public function get_state(){
        $this->db->select('tbl_state.*,tbl_country.name as country_name');
        $this->db->join('tbl_country', 'tbl_country.id = tbl_state.country_id','left');
        $this->db->where('tbl_state.isDeleted', 0);
        $this->db->order_by('tbl_state.id', 'DESC');
        $query = $this->db->get('tbl_state');
        return $query->result();
    }

    public function addNewState($stateInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_state', $stateInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function getCountryInfo()
    {
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_country');
        return $query->result();
    }

    public function getStateInfo($stateId)
    {
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $stateId);
        $query = $this->db->get('tbl_state');
        return $query->row();
    }

    public function editState($stateInfo, $stateId)
    {
        $this->db->where('id', $stateId);
        $this->db->update('tbl_state', $stateInfo);
        return TRUE;
    }

    public function deleteState($stateId, $stateInfo)
    {
        $this->db->where('id', $stateId);
        $this->db->update('tbl_state', $stateInfo);
        return $this->db->affected_rows();
    }
}

  