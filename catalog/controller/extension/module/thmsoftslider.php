<?php

class ControllerExtensionModuleThmsoftslider extends Controller {
	public function index($setting) {

		$this->load->model('tool/image');
		//$this->document->addStyle('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/revslider.css');
		//$this->document->addScript('catalog/view/theme/'.$this->config->get('config_template').'/js/revslider.js');
		$data = array();
		if (isset($setting['thmsoftslider_image'])) {
			$slider = array();
			foreach ($setting['thmsoftslider_image'] as $slide) {
		
 			$slider[] = array('title'=>isset($slide['thmsoftslider_image_title'][$this->config->get('config_language_id')]['title']) ? html_entity_decode($slide['thmsoftslider_image_title'][$this->config->get('config_language_id')]['title']) : "",'link'=>$slide['link'],'image'=>$this->model_tool_image->resize($slide['image'],$setting['width'],$setting['height']),'description'=>isset($slide['thmsoftslider_image_description'][$this->config->get('config_language_id')]['description']) ? html_entity_decode($slide['thmsoftslider_image_description'][$this->config->get('config_language_id')]['description']) : ""); 

			}
		}
		$data['thmsoftslider_width']=$setting['width'];
		$data['thmsoftslider_height']=$setting['height'];
		$data['slider'] = $slider;

			
		return $this->load->view('extension/module/thmsoftslider', $data);
			
		}
}
	