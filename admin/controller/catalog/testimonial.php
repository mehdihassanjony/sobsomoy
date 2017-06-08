<?php
class ControllerCatalogTestimonial extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/testimonial');

		$this->document->setTitle($this->language->get('heading_title'));

		//create tables if not exist
		$this->load->model('catalog/testimonial');
		$this->model_catalog_testimonial->createTables();

		

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/testimonial');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/testimonial');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_testimonial->addTestimonial($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . urlencode(html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_author'])) {
				$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/testimonial');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/testimonial');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_testimonial->editTestimonial($this->request->get['testimonial_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_author'])) {
				$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/testimonial');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/testimonial');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $testimonial_id) {
				$this->model_catalog_testimonial->deleteTestimonial($testimonial_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . urlencode(html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_author'])) {
				$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {


		if (isset($this->request->get['filter_author'])) {
			$filter_author = $this->request->get['filter_author'];
		} else {
			$filter_author = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = null;
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'r.date_added';
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('catalog/testimonial/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('catalog/testimonial/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['testimonials'] = array();

		$filter_data = array(
			'filter_author'     => $filter_author,
			'filter_status'     => $filter_status,
			'filter_date_added' => $filter_date_added,
			'sort'              => $sort,
			'order'             => $order,
			'start'             => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'             => $this->config->get('config_limit_admin')
		);

		$testimonial_total = $this->model_catalog_testimonial->getTotalTestimonials($filter_data);

		$results = $this->model_catalog_testimonial->getTestimonials($filter_data);

		$this->load->model('tool/upload');
		$this->load->model('tool/image');

		foreach ($results as $result) {
		
		if(isset($result['image_code']) && $result['image_code']!=''){
			$upload_info = $this->model_tool_upload->getUploadByCode($result['image_code']);
			$image = $this->model_catalog_testimonial->resize($upload_info['filename'], 40,40);
		}else{
	     	if (isset($result['image']) && $result['image']!='' && is_file(DIR_IMAGE . $result['image'])) {
			$image = $this->model_tool_image->resize($result['image'], 40, 40);
			}else {
			$image = $this->model_tool_image->resize('no_image.png', 40, 40);
			}
		}

			$data['testimonials'][] = array(
				'testimonial_id'  => $result['testimonial_id'],
				'author'     => $result['author'],
				'rating'     => $result['rating'],
				'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
				'image'      =>  $image,
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'edit'       => $this->url->link('catalog/testimonial/edit', 'token=' . $this->session->data['token'] . '&testimonial_id=' . $result['testimonial_id'], 'SSL')
			);
		}


		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['column_product'] = $this->language->get('column_product');
		$data['column_author'] = $this->language->get('column_author');
		$data['column_rating'] = $this->language->get('column_rating');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_action'] = $this->language->get('column_action');
		$data['column_image'] = $this->language->get('column_image');

		$data['entry_product'] = $this->language->get('entry_product');
		$data['entry_author'] = $this->language->get('entry_author');
		$data['entry_rating'] = $this->language->get('entry_rating');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_date_added'] = $this->language->get('entry_date_added');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_author'] = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . '&sort=t.author' . $url, 'SSL');
		$data['sort_rating'] = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . '&sort=t.rating' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . '&sort=t.status' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . '&sort=t.date_added' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_product'])) {
			$url .= '&filter_product=' . urlencode(html_entity_decode($this->request->get['filter_product'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $testimonial_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($testimonial_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($testimonial_total - $this->config->get('config_limit_admin'))) ? $testimonial_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $testimonial_total, ceil($testimonial_total / $this->config->get('config_limit_admin')));

		$data['filter_author'] = $filter_author;
		$data['filter_status'] = $filter_status;
		$data['filter_date_added'] = $filter_date_added;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/testimonial_list.tpl', $data));
	}

	protected function getForm() {

		$this->load->model('catalog/testimonialsettings');
		$testimonial_settings = $this->model_catalog_testimonialsettings->getSetting();
       	foreach ($testimonial_settings as $key => $value) {
        	$data[$key]=$value;
        }
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['testimonial_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

	
		$data['entry_author'] = $this->language->get('entry_author');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_bio'] = $this->language->get('entry_bio');
		$data['entry_rating'] = $this->language->get('entry_rating');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_text'] = $this->language->get('entry_text');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['text_rating_disabled_note'] = $this->language->get('text_rating_disabled_note');
		

		

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}


		if (isset($this->error['author'])) {
			$data['error_author'] = $this->error['author'];
		} else {
			$data['error_author'] = '';
		}


		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}

		if (isset($this->error['text'])) {
			$data['error_text'] = $this->error['text'];
		} else {
			$data['error_text'] = '';
		}

		
		if (isset($this->error['rating'])) {
			$data['error_rating'] = $this->error['rating'];
		} else {
			$data['error_rating'] = '';
		}

		if (isset($this->error['bio'])) {
			$data['error_bio'] = $this->error['bio'];
		} else {
			$data['error_bio'] = '';
		}
		

		$url = '';

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['testimonial_id'])) {
			$data['action'] = $this->url->link('catalog/testimonial/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('catalog/testimonial/edit', 'token=' . $this->session->data['token'] . '&testimonial_id=' . $this->request->get['testimonial_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['testimonial_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$testimonial_info = $this->model_catalog_testimonial->getTestimonial($this->request->get['testimonial_id']);
		}


		$data['token'] = $this->session->data['token'];


		if (isset($this->request->post['author'])) {
			$data['author'] = $this->request->post['author'];
		} elseif (!empty($testimonial_info)) {
			$data['author'] = $testimonial_info['author'];
		} else {
			$data['author'] = '';
		}


		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} elseif (!empty($testimonial_info)) {
			$data['email'] = $testimonial_info['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->request->post['text'])) {
			$data['text'] = $this->request->post['text'];
		} elseif (!empty($testimonial_info)) {
			$data['text'] = $testimonial_info['text'];
		} else {
			$data['text'] = '';
		}

		
		if (isset($this->request->post['rating'])) {
			$data['rating'] = $this->request->post['rating'];
		} elseif (!empty($testimonial_info)) {
			$data['rating'] = $testimonial_info['rating'];
		} else {
			$data['rating'] = '';
		}

		if (isset($this->request->post['bio'])) {
			$data['bio'] = $this->request->post['bio'];
		} elseif (!empty($testimonial_info)) {
			$data['bio'] = $testimonial_info['bio'];
		} else {
			$data['bio'] = '';
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($testimonial_info)) {
			$data['date_added'] = $testimonial_info['date_added'];
		} else {
			$data['date_added'] = date('Y-m-d');
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($testimonial_info)) {
			$data['status'] = $testimonial_info['status'];
		} else {
			$data['status'] = '';
		}

		
		$this->load->model('tool/upload');
		$this->load->model('tool/image');
		if(isset($testimonial_info['image_code']) && $testimonial_info['image_code']!=''){

			$upload_info = $this->model_tool_upload->getUploadByCode($testimonial_info['image_code']);

			$data['thumb'] = $this->model_catalog_testimonial->resize($upload_info['filename'], 100,100);
			$data['image'] ='';
		}else {

			if (isset($testimonial_info['image']) && $testimonial_info['image']!='') {
				 $data['image'] = $testimonial_info['image'];
			}else {
				$data['image'] = '';
			}

			$this->load->model('tool/image');
			if (!empty($testimonial_info) && is_file(DIR_IMAGE . $testimonial_info['image'])) {
				$data['thumb'] = $this->model_tool_image->resize($testimonial_info['image'], 100, 100);
			} else {
				$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
			}

		}
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/testimonial_form.tpl', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/testimonial')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}


		if ((utf8_strlen($this->request->post['author']) < 3) || (utf8_strlen($this->request->post['author']) > 64)) {
			$this->error['author'] = $this->language->get('error_author');
		}

		if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
			$this->error['email'] = $this->language->get('error_email');
		}

		if (utf8_strlen($this->request->post['text']) < 1) {
			$this->error['text'] = $this->language->get('error_text');
		}

		//testimonial module settings 
		$this->load->model('catalog/testimonialsettings');
		$testimonial_settings = $this->model_catalog_testimonialsettings->getSetting();

		if($testimonial_settings['rating_required_status'] && $testimonial_settings['rating_option_status']){
			if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
			$this->error['rating'] = $this->language->get('error_rating');
			}
		}

		if($testimonial_settings['bio_required_status'] && $testimonial_settings['bio_option_status']){
			if (empty($this->request->post['bio'])) {
			$this->error['bio'] = $this->language->get('error_bio');
			}
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/testimonial')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}