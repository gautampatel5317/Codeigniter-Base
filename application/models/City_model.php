<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class City_model extends CI_Model{

    public function get_city(){
        $this->db->select('tbl_city.*,tbl_country.name as country_name,tbl_state.name as state_name');
        $this->db->join('tbl_country', 'tbl_country.id = tbl_city.country_id','left');
        $this->db->join('tbl_state', 'tbl_state.id = tbl_city.state_id','left');
        $this->db->where('tbl_city.isDeleted', 0);
        $this->db->order_by('tbl_city.id', 'DESC');
        $query = $this->db->get('tbl_city');
        return $query->result();
    }

    public function addNewCity($cityInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_city', $cityInfo);
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

    public function getState($country_id,$state_id){
        $this->db->where('country_id', $country_id);
        $this->db->where('isDeleted', 0);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('tbl_state');
        $html = ' <option value="0">Select State</option>';
        foreach($query->result() as $row)
        {
            $selected = ($state_id != '' && $row->id == $state_id ?'selected' : '' );
            $html .= '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
        }
        $data['success'] = true;
        $data['html'] = $html;
        return json_encode($data);
    }

    public function getCityInfo($cityId)
    {
        $this->db->where('isDeleted', 0);
        $this->db->where('id', $cityId);
        $query = $this->db->get('tbl_city');
        return $query->row();
    }

    public function editCity($cityInfo, $cityId)
    {
        $this->db->where('id', $cityId);
        $this->db->update('tbl_city', $cityInfo);
        return TRUE;
    }

    public function deleteCity($cityId, $stateInfo)
    {
        $this->db->where('id', $cityId);
        $this->db->update('tbl_city', $stateInfo);
        return $this->db->affected_rows();
    }
}

  