<?php
class ControllerCatalogTestimonialsettings extends Controller {
	private $error = array();

	public function index() {
		//create tables if not exist
		$this->load->model('catalog/testimonial');
		$this->model_catalog_testimonial->createTables();
		$this->load->language('catalog/testimonialsettings');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('catalog/testimonialsettings');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_catalog_testimonialsettings->editSetting($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('catalog/testimonialsettings', 'token=' . $this->session->data['token'], 'SSL'));
			}

		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
		'text' => $this->language->get('text_home'),
		'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);
		$data['breadcrumbs'][] = array(
		'text' => $this->language->get('heading_title'),
		'href' => $this->url->link('catalog/testimonialsettings', 'token=' . $this->session->data['token'], 'SSL')
		);
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['help_testimonial'] = $this->language->get('help_testimonial');
		$data['entry_testimonial'] = $this->language->get('entry_testimonial');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['entry_display_date_added'] = $this->language->get('entry_display_date_added');
		$data['entry_display_rating'] = $this->language->get('entry_display_rating');
		$data['entry_display_author_bio'] = $this->language->get('entry_display_author_bio');
		$data['entry_display_image'] = $this->language->get('entry_display_image');
		$data['entry_items_limit'] = $this->language->get('entry_items_limit');
		$data['help_items_limit'] = $this->language->get('help_items_limit');
		$data['help_enable_rating'] = $this->language->get('help_enable_rating');
		$data['entry_enable_rating'] = $this->language->get('entry_enable_rating');

		$data['help_enable_bio'] = $this->language->get('help_enable_bio');
		$data['entry_enable_bio'] = $this->language->get('entry_enable_bio');

		$data['help_enable_image'] = $this->language->get('help_enable_image');
		$data['entry_enable_image'] = $this->language->get('entry_enable_image');

		$data['entry_testimonial_guest'] = $this->language->get('entry_testimonial_guest');
		$data['help_testimonial_guest'] = $this->language->get('help_testimonial_guest');
		$data['help_enable_rating_required'] = $this->language->get('help_enable_rating_required');
		$data['entry_enable_rating_required'] = $this->language->get('entry_enable_rating_required');
		
		$data['help_enable_bio_required'] = $this->language->get('help_enable_bio_required');
		$data['entry_enable_bio_required'] = $this->language->get('entry_enable_bio_required');

		$data['help_enable_image_required'] = $this->language->get('help_enable_image_required');
		$data['entry_enable_image_required'] = $this->language->get('entry_enable_image_required');
		$data['help_captcha'] = $this->language->get('help_captcha');
		$data['entry_enable_captcha'] = $this->language->get('entry_enable_captcha');
		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_stores'] = $this->language->get('tab_stores');
		$data['entry_stores'] = $this->language->get('entry_stores');
		$data['text_default'] = $this->language->get('text_default');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['text_display_settings'] = $this->language->get('text_display_settings');
		$data['text_form_settings'] = $this->language->get('text_form_settings');

		$data['text_emailalert_settings'] = $this->language->get('text_emailalert_settings');
		$data['help_enable_emailalert_owner'] = $this->language->get('help_enable_emailalert_owner');
		$data['entry_enable_emailalert_owner'] = $this->language->get('entry_enable_emailalert_owner');

		$data['help_enable_emailalert_customer'] = $this->language->get('help_enable_emailalert_customer');
		$data['entry_enable_emailalert_customer'] = $this->language->get('entry_enable_emailalert_customer');



		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
			} else {
			$data['success'] = '';
			}

		if (isset($this->error['warning'])) {
				$data['error_warning'] = $this->error['warning'];
			} else {
				$data['error_warning'] = '';
			}

		if (isset($this->error['items_limit'])) {
				$data['error_items_limit'] = $this->error['items_limit'];
			} else {
				$data['error_items_limit'] = '';
			}

		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		$testimonialsettings = $this->model_catalog_testimonialsettings->getSetting();
	
		if (isset($this->request->post['testimonialsettings_status'])) {
				$data['testimonialsettings_status'] = $this->request->post['testimonialsettings_status'];
			} else {
				$data['testimonialsettings_status'] = $testimonialsettings['testimonialsettings_status'];
			}

		if (isset($this->request->post['testimonial_guest'])) {
				$data['testimonial_guest'] = $this->request->post['testimonial_guest'];
			} else {
				$data['testimonial_guest'] = $testimonialsettings['testimonial_guest'];
			}

		if (isset($this->request->post['display_date_added'])) {
			$data['display_date_added'] = $this->request->post['display_date_added'];
		} else {
			$data['display_date_added'] = $testimonialsettings['display_date_added'];
		}


		if (isset($this->request->post['display_author_bio'])) {
			$data['display_author_bio'] = $this->request->post['display_author_bio'];
		} else {
			$data['display_author_bio'] = $testimonialsettings['display_author_bio'];
		}

		if (isset($this->request->post['display_rating'])) {
			$data['display_rating'] = $this->request->post['display_rating'];
		} else {
			$data['display_rating'] = $testimonialsettings['display_rating'];
		}
		
		if (isset($this->request->post['display_image'])) {
			$data['display_image'] = $this->request->post['display_image'];
		} else {
			$data['display_image'] = $testimonialsettings['display_image'];
		}


		if (isset($this->request->post['items_limit'])) {
			$data['items_limit'] = $this->request->post['items_limit'];
		} else {
			$data['items_limit'] = $testimonialsettings['items_limit'];
		}

		if (isset($this->request->post['rating_option_status'])) {
			$data['rating_option_status'] = $this->request->post['rating_option_status'];
		} else {
			$data['rating_option_status'] = $testimonialsettings['rating_option_status'];
		}

		if (isset($this->request->post['rating_required_status'])) {
			$data['rating_required_status'] = $this->request->post['rating_required_status'];
		} else {
			$data['rating_required_status'] = $testimonialsettings['rating_required_status'];
		}


		if (isset($this->request->post['bio_option_status'])) {
			$data['bio_option_status'] = $this->request->post['bio_option_status'];
		} else {
			$data['bio_option_status'] = $testimonialsettings['bio_option_status'];
		}

		if (isset($this->request->post['bio_required_status'])) {
			$data['bio_required_status'] = $this->request->post['bio_required_status'];
		} else {
			$data['bio_required_status'] = $testimonialsettings['bio_required_status'];
		}


		if (isset($this->request->post['image_option_status'])) {
			$data['image_option_status'] = $this->request->post['image_option_status'];
		} else {
			$data['image_option_status'] = $testimonialsettings['image_option_status'];
		}

		if (isset($this->request->post['image_required_status'])) {
			$data['image_required_status'] = $this->request->post['image_required_status'];
		} else {
			$data['image_required_status'] = $testimonialsettings['image_required_status'];
		}


		if (isset($this->request->post['captcha_status'])) {
			$data['captcha_status'] = $this->request->post['captcha_status'];
		} else {
			$data['captcha_status'] = $testimonialsettings['captcha_status'];
		}

		if (isset($this->request->post['testimonial_description'])) {
			$data['testimonial_description'] = $this->request->post['testimonial_description'];
		} elseif($testimonialsettings['testimonial_description']) {
			$data['testimonial_description'] = $testimonialsettings['testimonial_description'];
		} else {
			$data['testimonial_description']=array();
		}


		if (isset($this->request->post['emailalertowner_option_status'])) {
			$data['emailalertowner_option_status'] = $this->request->post['emailalertowner_option_status'];
		} else {
			$data['emailalertowner_option_status'] = $testimonialsettings['emailalertowner_option_status'];
		}

		if (isset($this->request->post['emailalertcustomer_option_status'])) {
			$data['emailalertcustomer_option_status'] = $this->request->post['emailalertcustomer_option_status'];
		} else {
			$data['emailalertcustomer_option_status'] = $testimonialsettings['emailalertcustomer_option_status'];
		}

		$this->load->model('setting/store');
		$data['stores'] = $this->model_setting_store->getStores();
		if($testimonialsettings['testimonial_store']!='NOSTORE') {
				$data['testimonial_store'] = explode(',', $testimonialsettings['testimonial_store']);
			} 
			else {
				$data['testimonial_store']=array();
			}

		$data['action'] = $this->url->link('catalog/testimonialsettings', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('catalog/testimonialsettings.tpl', $data));
	}



	 protected function validate() {
			if (!$this->user->hasPermission('modify', 'setting/setting')) {
					$this->error['warning'] = $this->language->get('error_permission');
				}
			if (!$this->request->post['items_limit']) {
					$this->error['items_limit'] = $this->language->get('error_items_limit');
				}

			return !$this->error;
	 }

}