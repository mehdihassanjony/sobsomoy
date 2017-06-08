<?php
class ModelExtensionModuleThmsoftslider extends Model {
	public function getInfo($module_id) {
		$thmsoftslider_image_data = array();

		$thmsoftslider_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "' ");
        $info = $thmsoftslider_image_query->rows;
        $thmsoftslider = json_decode($info[0]['setting'],true);
		foreach ($thmsoftslider['thmsoftslider_image'] as $thmsoftslider_image) {

			foreach ($thmsoftslider_image['thmsoftslider_image_description'] as $key => $value) {
				$description[$key]=array('description'=>$value['description']);
				}
			foreach ($thmsoftslider_image['thmsoftslider_image_title'] as $key => $value) {
			$title[$key]=array('title'=>$value['title']);
			}	

			$thmsoftslider_image_data[] = array(
				'thmsoftslider_image_title'       => $title,
				'link'                          => $thmsoftslider_image['link'],
				'image'                         => $thmsoftslider_image['image'],
				'thmsoftslider_image_description' => $description				
			);
		}

		return $thmsoftslider_image_data;
	}
}?>