<?php
class ControllerExtensionModuleThmsoftblog extends Controller {

    private $error = array(); // This is used to set the errors, if any.
 
    public function index() {
        // Loading the language file of blog
        $this->load->language('extension/module/thmsoftblog'); 
     
        // Set the title of the page to the heading title in the Language file i.e., 
        $this->document->setTitle(strip_tags($this->language->get('heading_title')));
     
        // Load the Setting Model  (All of the OpenCart Module & General Settings are saved using this Model )
        $this->load->model('setting/setting');
     
        // Start If: Validates and check if data is coming by save (POST) method
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->load->model('setting/setting');
            $this->model_setting_setting->editSetting('thmsoftblog', $this->request->post);

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
	
    	$data['entry_title'] = $this->language->get('entry_title');
    	$data['entry_metatitle'] = $this->language->get('entry_metatitle');
    	$data['entry_metakeyword'] = $this->language->get('entry_metakeyword');
    	$data['entry_metadescription'] = $this->language->get('entry_metadescription');
    	$data['entry_status'] = $this->language->get('entry_status');
    	$data['entry_showcomment'] = $this->language->get('entry_showcomment');
    	$data['entry_allowguestcomment'] = $this->language->get('entry_allowguestcomment');
    	$data['entry_allowcomment'] = $this->language->get('entry_allowcomment');
    	$data['entry_allowtag'] = $this->language->get('entry_allowtag');
    	$data['entry_allowblogfeed'] = $this->language->get('entry_allowblogfeed');
        $data['entry_allowcategoryname'] = $this->language->get('entry_allowcategoryname');
    	$data['entry_loginrequire'] = $this->language->get('entry_loginrequire');
    	$data['entry_autoapprove'] = $this->language->get('entry_autoapprove');
        $data['entry_allowsociallinks'] = $this->language->get('entry_allowsociallinks');
        $data['entry_allowseolinks'] = $this->language->get('entry_allowseolinks');
        $data['help_allowseolinks'] = $this->language->get('help_allowseolinks');

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
            'href' => $this->url->link('extension/module/thmsoftblog', 'token=' . $this->session->data['token'], true),
            'separator' => ' :: '
        );             
         
        $data['action'] = $this->url->link('extension/module/thmsoftblog', 'token=' . $this->session->data['token'], true);

        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);// URL to be redirected when cancel button is pressed

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
	}
	$data['token'] = $this->session->data['token'];
	
	//create db for thmsoft blog if not exist
        $this->load->model('thmsoftblog/blog');
	$this->model_thmsoftblog_blog->createtableBlogTables();

	$this->load->model('localisation/language');
	$data['languages'] = $this->model_localisation_language->getLanguages();

	if (isset($this->request->post['thmsoftblog_description'])) {
            $data['thmsoftblog_description'] = $this->request->post['thmsoftblog_description'];

	} else {
            $data['thmsoftblog_description'] = $this->config->get('thmsoftblog_description');

        }

        // POST ALL valaues from module
        if (isset($this->request->post['thmsoftblog_status'])) {
           $data['thmsoftblog_status'] = $this->request->post['thmsoftblog_status'];
        } else {
            $thmsoftblog_status =  $this->config->get('thmsoftblog_status');
           $data['thmsoftblog_status'] = !empty($thmsoftblog_status) ? $thmsoftblog_status : '0';
        }
	if (isset($this->request->post['thmsoftblog_allow_guestcomment'])) {
			$data['thmsoftblog_allow_guestcomment'] = $this->request->post['thmsoftblog_allow_guestcomment'];
	} else {
			$data['thmsoftblog_allow_guestcomment'] = $this->config->get('thmsoftblog_allow_guestcomment');
	}
	if (isset($this->request->post['thmsoftblog_allow_comment'])) {
			$data['thmsoftblog_allow_comment'] = $this->request->post['thmsoftblog_allow_comment'];
	} else {
			$data['thmsoftblog_allow_comment'] = $this->config->get('thmsoftblog_allow_comment');
	}
	if (isset($this->request->post['thmsoftblog_allow_tag'])) {
			$data['thmsoftblog_allow_tag'] = $this->request->post['thmsoftblog_allow_tag'];
	} else {
			$data['thmsoftblog_allow_tag'] = $this->config->get('thmsoftblog_allow_tag');
	}
	if (isset($this->request->post['thmsoftblog_allow_rssfeed'])) {
			$data['thmsoftblog_allow_rssfeed'] = $this->request->post['thmsoftblog_allow_rssfeed'];
	} else {
			$data['thmsoftblog_allow_rssfeed'] = $this->config->get('thmsoftblog_allow_rssfeed');
	}
    if (isset($this->request->post['thmsoftblog_allow_categoryname'])) {
            $data['thmsoftblog_allow_categoryname'] = $this->request->post['thmsoftblog_allow_categoryname'];
    } else {
            $data['thmsoftblog_allow_categoryname'] = $this->config->get('thmsoftblog_allow_categoryname');
    }

    if (isset($this->request->post['thmsoftblog_allow_sociallinks'])) {
            $data['thmsoftblog_allow_sociallinks'] = $this->request->post['thmsoftblog_allow_sociallinks'];
    } else {
            $data['thmsoftblog_allow_sociallinks'] = $this->config->get('thmsoftblog_allow_sociallinks');
    }


    if (isset($this->request->post['thmsoftblog_allow_seolinks'])) {
            $data['thmsoftblog_allow_seolinks'] = $this->request->post['thmsoftblog_allow_seolinks'];
    } else {
            $data['thmsoftblog_allow_seolinks'] = $this->config->get('thmsoftblog_allow_seolinks');
    }
    
	$data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        $this->response->setOutput($this->load->view('extension/module/thmsoftblog', $data));

    }

    /* Function that validates the data when Save Button is pressed */
    protected function validate() {
        // Block to check the user permission to manipulate the module
        if (!$this->user->hasPermission('modify', 'extension/module/thmsoftblog')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
	// Block returns true if no error is found, else false if any error detected
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
} 
 
