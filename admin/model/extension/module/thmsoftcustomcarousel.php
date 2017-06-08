<?php
class ModelExtensionModuleThmsoftcustomcarousel extends Model {
	public function getInfo($module_id) {
		$thmsoftcustomcarousel_image_data = array();

		$thmsoftcustomcarousel_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "' ");
        $info = $thmsoftcustomcarousel_image_query->rows;
        $thmsoftcustomcarousel = json_decode($info[0]['setting'],true);
		foreach ($thmsoftcustomcarousel['thmsoftcustomcarousel_image'] as $thmsoftcustomcarousel_image) {

			foreach ($thmsoftcustomcarousel_image['thmsoftcustomcarousel_image_description'] as $key => $value) {
				$description[$key]=array('description'=>$value['description']);
				}
			foreach ($thmsoftcustomcarousel_image['thmsoftcustomcarousel_image_title'] as $key => $value) {
			$title[$key]=array('title'=>$value['title']);
			}	

			$thmsoftcustomcarousel_image_data[] = array(
				'thmsoftcustomcarousel_image_title'       => $title,
				'link'                          => $thmsoftcustomcarousel_image['link'],
				'image'                         => $thmsoftcustomcarousel_image['image'],
				'thmsoftcustomcarousel_image_description' => $description				
			);
		}

		return $thmsoftcustomcarousel_image_data;
	}
}?>