<?php
class ControllerExtensionModuleThmsoftblogHomepage extends Controller {
    private $error = array(); // This is used to set the errors, if any.
 
    public function index() {
        // Loading the language file of blog homepage
        $this->load->language('extension/module/thmsoftblog_homepage'); 
     
        // Set the title of the page to the heading title in the Language file i.e., 
        $this->document->setTitle(strip_tags($this->language->get('heading_title')));
     
        // Load the Setting Model  (All of the OpenCart Module & General Settings are saved using this Model )
        $this->load->model('setting/setting');
     
        // Start If: Validates and check if data is coming by save (POST) method
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
        	$this->load->model('setting/setting');
			$this->model_setting_setting->editSetting('thmsoftblog_homepage', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
		}
     
        // Assign the language data for parsing it to view  
        $data['heading_title'] = $this->language->get('heading_title');
     
        $data['text_edit']    = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
	    $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');
        $data['text_content_top'] = $this->language->get('text_content_top');
        $data['text_content_bottom'] = $this->language->get('text_content_bottom');      
        $data['text_column_left'] = $this->language->get('text_column_left');
        $data['text_column_right'] = $this->language->get('text_column_right');
		$data['text_default_category'] = $this->language->get('text_default_category');
		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_postcount'] = $this->language->get('entry_postcount');
		$data['entry_homepagestatus'] = $this->language->get('entry_homepagestatus');
		$data['entry_descriptionlimit'] = $this->language->get('entry_descriptionlimit');
		$data['entry_ignorepost'] = $this->language->get('entry_ignorepost');
		$data['entry_ignorecategory'] = $this->language->get('entry_ignorecategory');
		$data['entry_hideimage'] = $this->language->get('entry_hideimage');
		$data['entry_hidetitle'] = $this->language->get('entry_hidetitle');
		$data['entry_hidedescription'] = $this->language->get('entry_hidedescription');
		$data['entry_hidedate'] = $this->language->get('entry_hidedate');
		$data['entry_resizeimage'] = $this->language->get('entry_resizeimage');
		$data['entry_imageblog'] = $this->language->get('entry_imageblog');
		$data['entry_resizeimagewidth'] = $this->language->get('entry_resizeimagewidth');
		$data['entry_resizeimageheight'] = $this->language->get('entry_resizeimageheight');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_add_module'] = $this->language->get('button_add_module');
        $data['button_remove'] = $this->language->get('button_remove');

	// This Block returns the warning if any
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

	if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}
	      if (isset($this->error['image_category'])) {
			$data['error_image_blog'] = $this->error['image_category'];
		} else {
			$data['error_image_blog'] = '';
		}
	// Making of Breadcrumbs to be displayed on site
        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], true),
            'separator' => false
        );
        $data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);        
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/thmsoftblog_homepage', 'token=' . $this->session->data['token'], true),
            'separator' => ' :: '
        );        

        $data['action'] = $this->url->link('extension/module/thmsoftblog_homepage', 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);// URL to be redirected when cancel button is pressed

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
	}
	$data['token'] = $this->session->data['token'];

	$this->load->model('localisation/language');
	$data['languages'] = $this->model_localisation_language->getLanguages();

        // POST ALL valaues from module
        if (isset($this->request->post['thmsoftblog_homepage_status'])) {
            $data['thmsoftblog_homepage_status'] = $this->request->post['thmsoftblog_homepage_status'];
        } else {
            $thmsoftblog_homepage_status =  $this->config->get('thmsoftblog_homepage_status');
            $data['thmsoftblog_homepage_status'] = !empty($thmsoftblog_homepage_status) ? $thmsoftblog_homepage_status : '0';
        }

	if (isset($this->request->post['thmsoftblog_homepage_postcount'])) {
			$data['thmsoftblog_homepage_postcount'] = $this->request->post['thmsoftblog_homepage_postcount'];
	} else {
			$thmsoftblog_homepage_postcount= $this->config->get('thmsoftblog_homepage_postcount');
			$data['thmsoftblog_homepage_postcount'] = !empty($thmsoftblog_homepage_postcount) ? $thmsoftblog_homepage_postcount : '5';
	}
	
	
	if (isset($this->request->post['thmsoftblog_homepage_descriptionlimit'])) {
			$data['thmsoftblog_homepage_descriptionlimit'] = $this->request->post['thmsoftblog_homepage_descriptionlimit'];
	} else {
			$thmsoftblog_homepage_descriptionlimit= $this->config->get('thmsoftblog_homepage_descriptionlimit');
			$data['thmsoftblog_homepage_descriptionlimit'] = !empty($thmsoftblog_homepage_descriptionlimit) ? $thmsoftblog_homepage_descriptionlimit : '100';
	}
	if (isset($this->request->post['thmsoftblog_homepage_ignorepost'])) {
			$data['thmsoftblog_homepage_ignorepost'] = $this->request->post['thmsoftblog_homepage_ignorepost'];
	} else {
			$thmsoftblog_homepage_ignorepost= $this->config->get('thmsoftblog_homepage_ignorepost');
			$data['thmsoftblog_homepage_ignorepost'] = !empty($thmsoftblog_homepage_ignorepost) ? $thmsoftblog_homepage_ignorepost : '0';
	}
	$this->load->model('thmsoftblog/article');
	$data['parentcategory'] = $this->model_thmsoftblog_article->getBlogcategoryall(0);
	if (isset($this->request->post['thmsoftblog_homepage_article_category'])) {
			$data['thmsoftblog_homepage_article_category'] = $this->request->post['thmsoftblog_homepage_article_category'];
		} elseif ($this->config->get('thmsoftblog_homepage_article_category')) {
			$data['thmsoftblog_homepage_article_category'] = $this->config->get('thmsoftblog_homepage_article_category');
		} else {
			$data['thmsoftblog_homepage_article_category'] = array();
		}

	
	if (isset($this->request->post['thmsoftblog_homepage_hideimage'])) {
			$data['thmsoftblog_homepage_hideimage'] = $this->request->post['thmsoftblog_homepage_hideimage'];
	} else {
			$thmsoftblog_homepage_hideimage= $this->config->get('thmsoftblog_homepage_hideimage');
			$data['thmsoftblog_homepage_hideimage'] = !empty($thmsoftblog_homepage_hideimage) ? $thmsoftblog_homepage_hideimage : '0';
	}

	if (isset($this->request->post['thmsoftblog_homepage_hidetitle'])) {
			$data['thmsoftblog_homepage_hidetitle'] = $this->request->post['thmsoftblog_homepage_hidetitle'];
	} else {
			$thmsoftblog_homepage_hidetitle = $this->config->get('thmsoftblog_homepage_hidetitle');
			$data['thmsoftblog_homepage_hidetitle'] = !empty($thmsoftblog_homepage_hidetitle) ? $thmsoftblog_homepage_hidetitle : '0';
	}
	if (isset($this->request->post['thmsoftblog_homepage_hidedescription'])) {
			$data['thmsoftblog_homepage_hidedescription'] = $this->request->post['thmsoftblog_homepage_hidedescription'];
	} else {
			$thmsoftblog_homepage_hidedescription= $this->config->get('thmsoftblog_homepage_hidedescription');
			$data['thmsoftblog_homepage_hidedescription'] = !empty($thmsoftblog_homepage_hidedescription) ? $thmsoftblog_homepage_hidedescription : '0';
	}
	if (isset($this->request->post['thmsoftblog_homepage_hidedate'])) {
			$data['thmsoftblog_homepage_hidedate'] = $this->request->post['thmsoftblog_homepage_hidedate'];
	} else {
			$thmsoftblog_homepage_hidedate= $this->config->get('thmsoftblog_homepage_hidedate');
			$data['thmsoftblog_homepage_hidedate'] = !empty($thmsoftblog_homepage_hidedate) ? $thmsoftblog_homepage_hidedate : '0';
	}
	if (isset($this->request->post['thmsoftblog_homepage_resizeimage'])) {
			$data['thmsoftblog_homepage_resizeimage'] = $this->request->post['thmsoftblog_homepage_resizeimage'];
	} else {
			$thmsoftblog_homepage_resizeimage= $this->config->get('thmsoftblog_homepage_resizeimage');
			$data['thmsoftblog_homepage_resizeimage'] = !empty($thmsoftblog_homepage_resizeimage) ? $thmsoftblog_homepage_resizeimage : '0';
	}

	if (isset($this->request->post['thmsoftblog_homepage_resizeimagewidth'])) {
			$data['thmsoftblog_homepage_resizeimagewidth'] = $this->request->post['thmsoftblog_homepage_resizeimagewidth'];
	} else {
			$thmsoftblog_homepage_resizeimagewidth= $this->config->get('thmsoftblog_homepage_resizeimagewidth');
			$data['thmsoftblog_homepage_resizeimagewidth'] = !empty($thmsoftblog_homepage_resizeimagewidth) ? $thmsoftblog_homepage_resizeimagewidth : '200';
	}

	if (isset($this->request->post['thmsoftblog_homepage_resizeimageheight'])) {
			$data['thmsoftblog_homepage_resizeimageheight'] = $this->request->post['thmsoftblog_homepage_resizeimageheight'];
	} else {
			$thmsoftblog_homepage_resizeimageheight= $this->config->get('thmsoftblog_homepage_resizeimageheight');
			$data['thmsoftblog_homepage_resizeimageheight'] = !empty($thmsoftblog_homepage_resizeimageheight) ? $thmsoftblog_homepage_resizeimageheight : '200';
	}


	    $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        $this->response->setOutput($this->load->view('extension/module/thmsoftblog_homepage', $data));

    }

    /* Function that validates the data when Save Button is pressed */
    protected function validate() {
        // Block to check the user permission to manipulate the module
        if (!$this->user->hasPermission('modify', 'extension/module/thmsoftblog_homepage')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
	if (!$this->request->post['thmsoftblog_homepage_resizeimagewidth'] || !$this->request->post['thmsoftblog_homepage_resizeimageheight']) {
			$this->error['image_category'] = $this->language->get('error_image_blog');
	}
	// Block returns true if no error is found, else false if any error detected
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
} 
 
