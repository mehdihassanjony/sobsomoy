<?php
class ModelCatalogTestimonialsettings extends Model {
	public function editSetting($data) {

	 if(!array_key_exists("testimonial_store",$data)){ $data['testimonial_store']='NOSTORE';}
	 else { 
	 $data['testimonial_store']=implode(',',$data['testimonial_store']);
	 }
		foreach ($data as $key => $value) {
			if($key!='testimonial_description'){ 
				$this->db->query("UPDATE " . DB_PREFIX . "testimonialsettings SET `value` = '" . $this->db->escape($value) . "'  WHERE `key` = '" . $this->db->escape($key) . "' ");
				}
			}

		$this->db->query("DELETE FROM " . DB_PREFIX . "testimonial_description WHERE 1");
		foreach ($data['testimonial_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "testimonial_description SET language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}	
			
	}

	public function getSetting(){
		$setting_data = array();
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonialsettings");
		foreach ($query->rows as $result) {
				$setting_data[$result['key']] = $result['value'];
    	}

		$setting_data['testimonial_description']=array();
		$t_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonial_description WHERE 1");
		foreach ($t_query->rows as $t_result) {
			$setting_data['testimonial_description'][$t_result['language_id']] = array(
				'title'             => $t_result['title'],
				'description'       => $t_result['description']
			);
		}

		return $setting_data;
	}



}