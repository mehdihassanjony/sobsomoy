<?php
class ControllerExtensionModuleCategoryPageSlider extends Controller {
	private $error = array();

	public function index() {

		$this->load->language('extension/module/category_page_slider');
		$this->document->setTitle(strip_tags($this->language->get('heading_title')));

		$this->load->model('extension/module');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('category_page_slider', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}			

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_title'] = $this->language->get('entry_title');		
		$data['entry_link'] = $this->language->get('entry_link');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['button_category_page_slider_add'] = $this->language->get('button_category_page_slider_add');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_remove'] = $this->language->get('button_remove');


		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/category_page_slider', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/category_page_slider', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}		

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/category_page_slider', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/category_page_slider', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
		

		if (isset($this->request->post['status'])) {
		$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
		$data['status'] = $module_info['status'];
		} else {
		$data['status'] = '';
		}

		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();


		$this->load->model('tool/image');
		if (isset($this->request->post['category_page_slider_image'])) {
			$category_page_slider_images = $this->request->post['category_page_slider_image'];
		} elseif (isset($this->request->get['module_id'])) {
			$this->load->model('extension/module/category_page_slider');
			$category_page_slider_images = $this->model_extension_module_category_page_slider->getInfo($this->request->get['module_id']);
		} else {
			$category_page_slider_images = array();
		}

		$data['category_page_slider_images'] = array();

		foreach ($category_page_slider_images as $category_page_slider_image) {
			if (is_file(DIR_IMAGE . $category_page_slider_image['image'])) {
				$image = $category_page_slider_image['image'];
				$thumb = $category_page_slider_image['image'];
			} else {
				$image = '';
				$thumb = 'no_image.png';
			}

			$data['category_page_slider_images'][] = array(

				'category_page_slider_image_title'       => $category_page_slider_image['category_page_slider_image_title'],
				'link'                          => $category_page_slider_image['link'],
				'image'                         => $image,
				'thumb'                         => $this->model_tool_image->resize($thumb, 100, 100),
				'category_page_slider_image_description' => $category_page_slider_image['category_page_slider_image_description']

			);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/category_page_slider', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/category_page_slider')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		return !$this->error;
	}
}