<?php
class ControllerThmsofttestimonialThmsofttestimonial extends Controller {
	private $error = array();

	public function index() {

		$this->load->language('thmsofttestimonial/thmsofttestimonial');
		$this->load->model('thmsofttestimonial/thmsofttestimonial');
		$isTestimonialStore = $this->model_thmsofttestimonial_thmsofttestimonial->isTestimonialStore();

		if($isTestimonialStore){ 
		    $data['heading_title'] = $this->language->get('heading_title');
	        $this->document->setTitle($data['heading_title']);
			$data['breadcrumbs'] = array();
	        $data['breadcrumbs'][] = array(
	            'text' => $this->language->get('text_home'),
	            'href' => $this->url->link('common/home')
	        );
	        $data['breadcrumbs'][] = array(
	            'text' => $data['heading_title'],
	            'href' => $this->url->link('thmsofttestimonial/thmsofttestimonial')
	        );
	        $data['text_write'] =  $this->language->get('text_write');
	        $data['text_note'] = $this->language->get('text_note');
	        $data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));
	        $data['text_loading'] = $this->language->get('text_loading');
	        $data['entry_name'] = $this->language->get('entry_name');
	        $data['entry_bio'] = $this->language->get('entry_bio');
	        $data['entry_review'] = $this->language->get('entry_review');
	        $data['entry_rating'] = $this->language->get('entry_rating');
	        $data['entry_photo'] = $this->language->get('entry_photo');
	        $data['entry_upload'] = $this->language->get('entry_upload');
	        $data['entry_good'] = $this->language->get('entry_good');
	        $data['entry_bad'] = $this->language->get('entry_bad');
	        $data['button_continue'] = $this->language->get('button_continue');
	        $data['entry_email'] = $this->language->get('entry_email');




			$data['email'] = $this->customer->getEmail();
			$data['name'] = $this->customer->getFirstName()." ".$this->customer->getLastName();
			

	        $testimonial_settings = $this->model_thmsofttestimonial_thmsofttestimonial->getTestimonialSettings();
	        foreach ($testimonial_settings as $key => $value) {
	        	$data[$key]=$value;
	        }

	        // Captcha 2.3
			if ($this->config->get($this->config->get('config_captcha') . '_status') && $testimonial_settings['captcha_status']) {
				$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
			} else {
				$data['captcha'] = '';
			}
	        $data['column_left'] = $this->load->controller('common/column_left');
	        $data['column_right'] = $this->load->controller('common/column_right');
	        $data['content_top'] = $this->load->controller('common/content_top');
	        $data['content_bottom'] = $this->load->controller('common/content_bottom');
	        $data['footer'] = $this->load->controller('common/footer');
	        $data['header'] = $this->load->controller('common/header');

	        $this->response->setOutput($this->load->view('thmsofttestimonial/thmsofttestimonial', $data));
	        

    } else { //isTestimonialstore
  
			$data['breadcrumbs'] = array();
	        $data['breadcrumbs'][] = array(
	            'text' => $this->language->get('text_home'),
	            'href' => $this->url->link('common/home')
	        );
			if (isset($this->request->get['route'])) {
				$url_data = $this->request->get;
				unset($url_data['_route_']);
				$route = $url_data['route'];
				unset($url_data['route']);
				$url = '';
				if ($url_data) {
				$url = '&' . urldecode(http_build_query($url_data, '', '&'));
				}
				$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link($route, $url, $this->request->server['HTTPS'])
				);
			}
			$this->document->setTitle($this->language->get('text_error'));
			$data['heading_title'] = $this->language->get('text_error');
			$data['text_error'] = $this->language->get('text_error');
			$data['button_continue'] = $this->language->get('button_continue');
			$data['continue'] = $this->url->link('common/home');
			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

				$this->response->setOutput($this->load->view('error/not_found', $data));
				
		   	}	
	}

	public function testimonial() {
		$this->load->language('thmsofttestimonial/thmsofttestimonial');
		
		$this->load->model('tool/upload');
		$this->load->model('tool/image');
		$this->load->model('thmsofttestimonial/thmsofttestimonial');

		$testimonial_settings = $this->model_thmsofttestimonial_thmsofttestimonial->getTestimonialSettings();
       	foreach ($testimonial_settings as $key => $value) {
        	$data[$key]=$value;
        }
       
		$data['text_no_reviews'] = $this->language->get('text_no_reviews');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['thmsofttestimonials'] = array();

		$review_total = $this->model_thmsofttestimonial_thmsofttestimonial->getTotalTestimonial();
		if($data['items_limit']) { $limit=$data['items_limit'];} else { $limit=10; }
		$results = $this->model_thmsofttestimonial_thmsofttestimonial->getTestinomials(($page - 1) * $limit, $limit);

		
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
			
			$data['thmsofttestimonials'][] = array(
				'author'     => $result['author'],
				'bio'        => $result['bio'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'image'      => $image,
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$pagination = new Pagination();
		$pagination->total = $review_total;
		$pagination->page = $page;
		$pagination->limit = $limit;
		$pagination->url = $this->url->link('thmsofttestimonial/thmsofttestimonial/testimonial', 'page={page}');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($review_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($review_total - $limit)) ? $review_total : ((($page - 1) * $limit) + $limit), $review_total, ceil($review_total / $limit));


			$this->response->setOutput($this->load->view('thmsofttestimonial/thmsofttestimonial_list', $data));
		
	}

	public function write() {

		$this->load->model('thmsofttestimonial/thmsofttestimonial');
		$testimonial_settings = $this->model_thmsofttestimonial_thmsofttestimonial->getTestimonialSettings();
       

		$this->load->language('thmsofttestimonial/thmsofttestimonial');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}

			//email
			if (!preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
				$json['error'] = $this->language->get('error_email');
			}

			if ((utf8_strlen($this->request->post['text']) < 5) || (utf8_strlen($this->request->post['text']) > 1000)) {
				$json['error'] = $this->language->get('error_text');
			}

			if($testimonial_settings['rating_option_status'] && $testimonial_settings['rating_required_status']){
				if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
				$json['error'] = $this->language->get('error_rating');
				}
			}

			if($testimonial_settings['bio_option_status'] && $testimonial_settings['bio_required_status']){
				if (empty($this->request->post['bio'])) {
				$json['error'] = $this->language->get('error_bio');
				}
			}


			if($testimonial_settings['image_option_status'] && $testimonial_settings['image_required_status']){
				if (empty($this->request->post['image_code'] ) ) {
				$json['error'] = $this->language->get('error_image');
				}
			}

	if($testimonial_settings['captcha_status']){ 		
			// Captcha
			if ($this->config->get($this->config->get('config_captcha') . '_status') && $testimonial_settings['captcha_status']) {
				$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error'] = $captcha;
				}
			}
	}
			if (!isset($json['error'])) {
				$this->load->model('thmsofttestimonial/thmsofttestimonial');
				$this->model_thmsofttestimonial_thmsofttestimonial->addTestimonial($this->request->post);
				$json['success'] = $this->language->get('text_success');
			}
		}//POST

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


		public function imageupload() {

		if( is_dir(DIR_IMAGE.'catalog/thmsofttestimonial/') === false ){ mkdir(DIR_IMAGE.'catalog/thmsofttestimonial/');}

		$this->load->language('tool/upload');

		$json = array();

		if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
			// Sanitize the filename
			$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8')));

			// Validate the filename length
			if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 64)) {
				$json['error'] = $this->language->get('error_filename');
			}

			// Allowed file extension types
			$allowed = array();
			// $extension_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_ext_allowed'));
			// $filetypes = explode("\n", $extension_allowed);
			$filetypes = array('png','jpe','jpeg','jpg','gif','bmp','ico','tiff','tif');

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Allowed file mime types
			$allowed = array();
			// $mime_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_mime_allowed'));
			// $filetypes = explode("\n", $mime_allowed);
			$filetypes = array('image/png','image/jpeg','image/gif','image/bmp','image/tiff','image/svg+xml','image/pjpeg');
			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array($this->request->files['file']['type'], $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Check to see if any PHP files are trying to be uploaded
			$content = file_get_contents($this->request->files['file']['tmp_name']);

			if (preg_match('/\<\?php/i', $content)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Return any upload error
			if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
				$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
			}
		} else {
			$json['error'] = $this->language->get('error_upload');
		}

		if (!$json) {
			//$file = $filename . '.' . md5(mt_rand());
			$file =  md5(mt_rand()). $filename;

			move_uploaded_file($this->request->files['file']['tmp_name'], DIR_IMAGE.'catalog/thmsofttestimonial/' . $file);

			// Hide the uploaded file name so people can not link to it directly.
			$this->load->model('tool/upload');
			$json['code'] = $this->model_tool_upload->addUpload($filename, $file);
			$json['success'] = $this->language->get('text_upload');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


}
