<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$indoor_groups = $this->getdata_m->get_indoor_groups($_GET["apikey"]);
		foreach($indoor_groups as $key => $indoor_group){
			$aqms = @$this->getdata_m->get_aqms($indoor_group["id_stasiun"])[0];
			if(isset($aqms)){
				$waktu_s = explode(" ",$aqms["waktu"]);
				$lastdate = explode("-",$waktu_s[0]);
				$lasttime = explode(":",$waktu_s[1]);
				$data["last_update"] = date("d F Y H:i:s",mktime($lasttime[0],$lasttime[1],0,$lastdate[1],$lastdate[2],$lastdate[0]));
				$data['aqms'][$indoor_group["id_stasiun"]] = $aqms;
				$data['info'][$indoor_group["id_stasiun"]] = $this->getdata_m->get_stasiun_info($indoor_group["id_stasiun"])[0];
				$data['params'][$indoor_group["id_stasiun"]] = $indoor_group["params"];
				$params = explode(",",explode("|",$indoor_group["params"])[0]);
				foreach($params as $param){
					$label = strtoupper($param);
					if($param == "pm25") $label = "PM2.5";
					$aqms_ispu[$param] = $this->to_ispu($param,$aqms[$param]);
					$data["charts"][$indoor_group["id_stasiun"]][] = ["label" => $label, "y" => @$aqms_ispu[$param]*1 ];				
				}
				$weather_params = explode(",",@explode("|",$indoor_group["params"])[1]);
				foreach($weather_params as $param){
					if($param == "wd") $info = ["label" => "ARAH ANGIN","unit" => "°"];
					if($param == "ws") $info = ["label" => "KEC. ANGIN","unit" => "Km/jam"];
					if($param == "humidity") $info = ["label" => "KELEMBABAN","unit" => "%"];
					if($param == "temperature") $info = ["label" => "SUHU","unit" => "Celcius"];
					if($param == "pressure") $info = ["label" => "TEKANAN","unit" => "MBar"];
					if($param == "rain_intensity") $info = ["label" => "CURAH HUJAN","unit" => "mm/jam"];
					$data["weathers"][$indoor_group["id_stasiun"]][] = ["info" => @$info, "value" => @$aqms[$param]*1 ];
				}
			}
		}
		
		$this->load->view('stasiun/Home_v', $data);
	}
	
	public function to_ispu($param,$ug){
		global $db;
		$ug = $ug * 1;
		if($ug > 0){
			$result = $db->query("SELECT * FROM categories WHERE param='$param' AND '".$ug."' BETWEEN ambien_a AND ambien_b");
			if($db->affected_rows > 0){
				$category = $result->fetch_object();
				return round((($category->ispu_b - $category->ispu_a)/($category->ambien_b - $category->ambien_a) * ($ug - $category->ambien_a)) + $category->ispu_a,0);
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

}
