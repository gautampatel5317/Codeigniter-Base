<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Country_model extends CI_Model{
    
    public function get_country(){
        $this->db->where('tbl_country.isDeleted', 0);
        $this->db->order_by('tbl_country.id', 'DESC');
        $query = $this->db->get('tbl_country');
        return $query->result();
    }

    function addNewCountry($countryInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_country', $countryInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getCountryInfo($countryId)
    {
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $countryId);
        $query = $this->db->get('tbl_country');
        return $query->row();
    }

    function editCountry($countryInfo, $countryId)
    {
        $this->db->where('id', $countryId);
        $this->db->update('tbl_country', $countryInfo);
        return TRUE;
    }

    function deleteCountry($countryId, $countryInfo)
    {
        $this->db->where('id', $countryId);
        $this->db->update('tbl_country', $countryInfo);
        return $this->db->affected_rows();
    }
}

  