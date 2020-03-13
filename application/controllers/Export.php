<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function index()
	{
		$indoor_groups = $this->getdata_m->get_indoor_groups($_GET["group_id"]);
		foreach($indoor_groups as $key => $indoor_group){
			$id_stasiuns[] = $indoor_group["id_stasiun"];
		}
		$data['alldata'] = $this->getdata_m->getalldata($id_stasiuns);
		$this->load->view('stasiun/report_v', $data);
	}
}
