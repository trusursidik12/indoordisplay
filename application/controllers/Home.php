<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// public function index()
	// {
	// 	$indoor_groups = $this->getdata_m->get_indoor_groups($_GET["group_id"]);
	// 	foreach($indoor_groups as $key => $indoor_group){
	// 		$views[$key]["id_stasiun"] = $indoor_group["id_stasiun"];
	// 		$views[$key]["caption"] = $indoor_group["caption"];
	// 	}
		
	// 	foreach($views as $key => $view){
	// 		$data["aqms"][$key] = $this->getdata_m->getdata($view["id_stasiun"]);
	// 		$data["caption"][$key] = $view["caption"];
	// 	}
	// 	$this->load->view('indoor/indoor', $data);
	// }

	public function id_stasiun($id_stasiun = NULL){
		$data['idstasiun'] 		= $this->getdata_m->get_aqm_stasiun($id_stasiun);
		$data['aqmalldata'] 	= $this->getdata_m->get_aqm_data();

		if(empty($data['idstasiun'])){
			show_404();
		}

		$this->load->view('stasiun/idstasiun', $data);
	}

	public function report_data($id_stasiun = NULL){
		$data['idstasiun'] 		= $this->getdata_m->get_aqm_stasiun($id_stasiun);
		$data['aqmalldata'] 	= $this->getdata_m->get_aqm_data();

		if(empty($data['idstasiun'])){
			show_404();
		}

		$this->load->view('stasiun/report', $data);
	}

	// public function report_data_ajax($id_stasiun = NULL){
	// 	$data['idstasiun'] 		= $this->getdata_m->get_aqm_stasiun($id_stasiun);
	// 	$data['aqmalldata'] 	= $this->getdata_m->get_aqm_data();

	// 	if(empty($data['idstasiun'])){
	// 		show_404();
	// 	}

	// 	$this->load->view('indoor/idstasiun/report_ajax', $data);
	// }

	// function get_aqm_data_ajax(){
	// 	$list = $this->getdata_m->get_datatables();
 //        $data = array();
 //        $no = @$_POST['start'];
 //        foreach ($list as $aqmdata) {
 //            $no++;
 //            $row = array();
 //            $row[] = $no.".";
 //            $row[] = $aqmdata->id_stasiun;
 //            $row[] = $aqmdata->waktu;
 //            $row[] = $aqmdata->pm10;
 //            $row[] = $aqmdata->pm25;

 //            $data[] = $row;
 //        }
 //        $output = array(
 //                    "draw" => @$_POST['draw'],
 //                    "recordsTotal" => $this->getdata_m->count_all(),
 //                    "recordsFiltered" => $this->getdata_m->count_filtered(),
 //                    "data" => $data,
 //                );
 //        // output to json format
 //        echo json_encode($output);
	// }
}
