<?php
class ModelExtensionModulecategorypageslider extends Model {
	public function getInfo($module_id) {
		$category_page_slider_image_data = array();

		$category_page_slider_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "' ");
        $info = $category_page_slider_image_query->rows;
        //$category_page_slider = unserialize($info[0]['setting']);
          $category_page_slider = json_decode($info[0]['setting'], true);
		foreach ($category_page_slider['category_page_slider_image'] as $category_page_slider_image) {

			foreach ($category_page_slider_image['category_page_slider_image_description'] as $key => $value) {
				$description[$key]=array('description'=>$value['description']);
				}
			foreach ($category_page_slider_image['category_page_slider_image_title'] as $key => $value) {
			$title[$key]=array('title'=>$value['title']);
			}	

			$category_page_slider_image_data[] = array(
				'category_page_slider_image_title'       => $title,
				'link'                          => $category_page_slider_image['link'],
				'image'                         => $category_page_slider_image['image'],
				'category_page_slider_image_description' => $description				
			);
		}

		return $category_page_slider_image_data;
	}
}?>