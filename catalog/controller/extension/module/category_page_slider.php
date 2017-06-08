<?php

class ControllerExtensionModuleCategoryPageSlider extends Controller {
	public function index($setting) {

		$this->load->model('tool/image');
		$this->document->addStyle('catalog/view/theme/'.$this->config->get('theme_default_directory').'/stylesheet/revslider.css');
		$this->document->addScript('catalog/view/theme/'.$this->config->get('theme_default_directory').'/js/revslider.js');
		$data = array();
		if (isset($setting['category_page_slider_image'])) {
			$slider = array();
			foreach ($setting['category_page_slider_image'] as $slide) {
			
 			$slider[] = array('title'=>isset($slide['category_page_slider_image_title'][$this->config->get('config_language_id')]['title']) ? html_entity_decode($slide['category_page_slider_image_title'][$this->config->get('config_language_id')]['title']) : "",'link'=>$slide['link'],'image'=>$this->model_tool_image->resize($slide['image'], 915, 390),'description'=>isset($slide['category_page_slider_image_description'][$this->config->get('config_language_id')]['description']) ? html_entity_decode($slide['category_page_slider_image_description'][$this->config->get('config_language_id')]['description']) : ""); 
			}
		}

		$data['slider'] = $slider;

		return $this->load->view('extension/module/category_page_slider', $data);
		
		}
}	