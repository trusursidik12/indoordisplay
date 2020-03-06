<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdata_m extends CI_model
{
	
	// public function getdata($id_stasiun = ""){
	// 	$this->db->where('id_stasiun', $id_stasiun);
	// 	$this->db->order_by('id', 'DESC');
	// 	$this->db->limit('1');
	// 	$query = $this->db->get('aqm_data');
	// 	return $query->result_array();
	// }

	// public function getalldata($id_stasiuns = [])
	// {
	// 	$this->db->select('DISTINCT(waktu), id_stasiun, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity');
	// 	if(count($id_stasiuns) > 0){
	// 		$this->db->where_in('id_stasiun', $id_stasiuns);
	// 	}
	// 	$this->db->group_by('waktu'); 
	// 	$this->db->order_by('waktu', 'DESC');
	// 	$query = $this->db->get('aqm_data');
	// 	return $query->result_array();
	// }

	public function get_indoor_groups($id_group){
		$this->db->where('id_group', $id_group);
		$query = $this->db->get('indoor_groups');
		return $query->result_array();
	}
//test
	public function get_aqm_stasiun($id_stasiun = FALSE)
	{
		if($id_stasiun === FALSE){
			$query = $this->db->get('aqm_stasiun');
			return $query->result_array();
		}
		$query = $this->db->get_where('aqm_stasiun', array('id_stasiun' => $id_stasiun));
		return $query->row_array();
	}

	public function get_aqm_data($id = FALSE)
	{
		if($id === FALSE){
			$this->db->select('DISTINCT(waktu), id_stasiun, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity');
			$this->db->group_by('waktu'); 
			$this->db->order_by('waktu', 'DESC');
			$query = $this->db->get('aqm_data');
			return $query->result_array();
		}
		$query = $this->db->get_where('aqm_data', array('id' => $id));
		return $query->row_array();
	}

	// // start datatables
 //    var $column_order = array(null, 'id_stasiun', 'pm10', 'pm25'); //set column field database for datatable orderable
 //    var $column_search = array('id_stasiun', 'pm10', 'pm25'); //set column field database for datatable searchable
 //    var $order = array('id' => 'desc'); // default order
 
 //    private function _get_datatables_query() {
 //        $this->db->select('aqm_data.*');
 //        $this->db->from('aqm_data');
 //        $i = 0;
 //        foreach ($this->column_search as $item) { // loop column
 //            if(@$_POST['search']['value']) { // if datatable send POST for search
 //                if($i===0) { // first loop
 //                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
 //                    $this->db->like($item, $_POST['search']['value']);
 //                } else {
 //                    $this->db->or_like($item, $_POST['search']['value']);
 //                }
 //                if(count($this->column_search) - 1 == $i) //last loop
 //                    $this->db->group_end(); //close bracket
 //            }
 //            $i++;
 //        }
         
 //        if(isset($_POST['order'])) { // here order processing
 //            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
 //        }  else if(isset($this->order)) {
 //            $order = $this->order;
 //            $this->db->order_by(key($order), $order[key($order)]);
 //        }
 //    }
 //    function get_datatables() {
 //        $this->_get_datatables_query();
 //        if(@$_POST['length'] != -1)
 //        $this->db->limit(@$_POST['length'], @$_POST['start']);
 //        $query = $this->db->get();
 //        return $query->result();
 //    }
 //    function count_filtered() {
 //        $this->_get_datatables_query();
 //        $query = $this->db->get();
 //        return $query->num_rows();
 //    }
 //    function count_all() {
 //        $this->db->from('aqm_data');
 //        return $this->db->count_all_results();
 //    }
 //    // end datatables
}