<?php
class ControllerExtensionModuleThmsoftTestimonialModule extends Controller {
	public function index($setting) {
		static $module = 0;

		$this->load->model('thmsofttestimonial/thmsofttestimonial');
		$this->load->model('tool/upload');
		$this->load->model('tool/image');

		$istestimonialexist = $this->model_thmsofttestimonial_thmsofttestimonial->isTestimonialExist();
		//exit();
		if($istestimonialexist){ 
		$this->load->language('extension/module/thmsoft_testimonial_module');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_show_all'] = $this->language->get('text_show_all');
		$this->load->model('tool/image');
		$data['testimonials'] = array();
		$data['testimonial_url'] = $this->url->link('thmsofttestimonial/thmsofttestimonial');
		if (!$setting['testimonial_limit']) {
			$setting['testimonial_limit'] = 3;
		}
		if (!$setting['testimonial_text_limit']) {
			$setting['testimonial_text_limit'] = 200;
		}
		$this->load->model('thmsofttestimonial/thmsofttestimonial');
		$testimonial_settings = $this->model_thmsofttestimonial_thmsofttestimonial->getTestimonialSettings();
       	foreach ($testimonial_settings as $key => $value) {
        	$data[$key]=$value;
        }
        $data['testimonial_heading_title'] = $setting['testimonial_heading_title'];
        $data['testimonial_slider'] = $setting['testimonial_slider'];
        $data["testimonial_text_limit_of_module$module"] = $setting['testimonial_text_limit'];
        $data["testimonial_text_limit"] = $setting['testimonial_text_limit'];
       
        if($data['testimonial_slider']){
			$this->document->addStyle('catalog/view/theme/'.$this->config->get('theme_default_directory').'/stylesheet/owl.carousel.css');
			$this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');
	        }
		$results = $this->model_thmsofttestimonial_thmsofttestimonial->getTestinomials(0,$setting['testimonial_limit']);
		if ($results) {
			foreach ($results as $result) {

				if($result['image_code']!=''){ 
					$upload_info = $this->model_tool_upload->getUploadByCode($result['image_code']);
					$image = $this->model_thmsofttestimonial_thmsofttestimonial->resize($upload_info['filename'], 70,70);
					}else{
					//print_r($result);exit();
					if($result['image']!='')
					{
					$image = $this->model_tool_image->resize($result['image'], 70, 70);
					}else{
					$image= $this->model_tool_image->resize('no_image.png', 70, 70);
					} 
				}

				$data['testimonials'][] = array(
					'testimonial_id'  => $result['testimonial_id'],
					'author'        => $result['author'],
					'bio'           => $result['bio'],
					'text'       => substr($result['text'],0, $setting['testimonial_text_limit']). '..',
					'rating'     => (int)$result['rating'],
					'image'      => $image,
					'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))

				);
			}

			$data['module'] = $module++;
			return $this->load->view('extension/module/thmsoft_testimonial_module', $data);
			
		}

	  }//istestimonialexist

	}
}