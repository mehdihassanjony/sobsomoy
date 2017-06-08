<?php
class ControllerExtensionModuleThmsoftTestimonialModule extends Controller {
	private $error = array();

	public function index() {

		//create tables if not exist
		$this->load->model('catalog/testimonial');
		$this->model_catalog_testimonial->createTables();

		$this->load->language('extension/module/thmsoft_testimonial_module');

		$this->document->setTitle(strip_tags($this->language->get('heading_title')));

		$this->load->model('extension/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('thmsoft_testimonial_module', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->cache->delete('product');

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'].'&type=module', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_heading_title'] = $this->language->get('entry_heading_title');
		$data['entry_testimonial_limit'] = $this->language->get('entry_testimonial_limit');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['entry_testimonial_text_limit'] = $this->language->get('entry_testimonial_text_limit');
		$data['entry_enable_slider'] = $this->language->get('entry_enable_slider');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');


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
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'].'&type=module', true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/thmsoft_testimonial_module', 'token=' . $this->session->data['token'], true)
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/module/thmsoft_testimonial_module', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
			);
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/thmsoft_testimonial_module', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/thmsoft_testimonial_module', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'].'&type=module', true);

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


		if (isset($this->request->post['testimonial_heading_title'])) {
			$data['testimonial_heading_title'] = $this->request->post['testimonial_heading_title'];
		} elseif (!empty($module_info)) {
			$data['testimonial_heading_title'] = $module_info['testimonial_heading_title'];
		} else {
			$data['testimonial_heading_title'] = 'Testimonials';
		}


		if (isset($this->request->post['testimonial_slider'])) {
			$data['testimonial_slider'] = $this->request->post['testimonial_slider'];
		} elseif (!empty($module_info)) {
			$data['testimonial_slider'] = $module_info['testimonial_slider'];
		} else {
			$data['testimonial_slider'] = 0;
		}


		if (isset($this->request->post['testimonial_limit'])) {
			$data['testimonial_limit'] = $this->request->post['testimonial_limit'];
		} elseif (!empty($module_info)) {
			$data['testimonial_limit'] = $module_info['testimonial_limit'];
		} else {
			$data['testimonial_limit'] = 3;
		}

		if (isset($this->request->post['testimonial_text_limit'])) {
			$data['testimonial_text_limit'] = $this->request->post['testimonial_text_limit'];
		} elseif (!empty($module_info)) {
			$data['testimonial_text_limit'] = $module_info['testimonial_text_limit'];
		} else {
			$data['testimonial_text_limit'] = 200;
		}


		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/thmsoft_testimonial_module', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/thmsoft_testimonial_module')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		return !$this->error;
	}
}