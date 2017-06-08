<?php
class ControllerExtensionModuleThmsoftcrocus extends Controller {
    private $error = array(); // This is used to set the errors, if any.
 
    public function index() {
        // Loading the language file of thmsoftcrocus
        $this->load->language('extension/module/thmsoftcrocus'); 
     
        // Set the title of the page to the heading title in the Language file i.e., Hello World
        $this->document->setTitle(strip_tags($this->language->get('heading_title')));
     
        // Load the Setting Model  (All of the OpenCart Module & General Settings are saved using this Model )
        $this->load->model('setting/setting');
     
        // Start If: Validates and check if data is coming by save (POST) method
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

            // Parse all the coming data to Setting Model to save it in database.
            //print_r($this->request->post);exit;
            $this->model_setting_setting->editSetting('thmsoftcrocus', $this->request->post);
     
            // To display the success text on data save
            $this->session->data['success'] = $this->language->get('text_success');
     
            // Redirect to the Module Listing           
            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
        }
     
        // Assign the language data for parsing it to view
        $data['heading_title'] = $this->language->get('heading_title');
     
        $data['text_edit']    = $this->language->get('text_edit');
        $data['text_yes']    = $this->language->get('text_yes');
        $data['text_no']    = $this->language->get('text_no');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_content_top'] = $this->language->get('text_content_top');
        $data['text_content_bottom'] = $this->language->get('text_content_bottom');      
        $data['text_column_left'] = $this->language->get('text_column_left');
        $data['text_column_right'] = $this->language->get('text_column_right');
     
        $data['entry_code'] = $this->language->get('entry_code');
        $data['entry_layout'] = $this->language->get('entry_layout');
        $data['entry_position'] = $this->language->get('entry_position');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
     
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_add_module'] = $this->language->get('button_add_module');
        $data['button_remove'] = $this->language->get('button_remove');
        $data['entry_image'] = $this->language->get('entry_image'); 
        $data['entry_image1'] = $this->language->get('entry_image1'); 
        $data['entry_image2'] = $this->language->get('entry_image2'); 
        
        // This Block returns the warning if any
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
     
        // This Block returns the error code if any
        if (isset($this->error['code'])) {
            $data['error_code'] = $this->error['code'];
        } else {
            $data['error_code'] = '';
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
            'href' => $this->url->link('extension/module/thmsoftcrocus', 'token=' . $this->session->data['token'], true)
        );           
                
        $data['action'] = $this->url->link('extension/module/thmsoftcrocus', 'token=' . $this->session->data['token'], true);

        // URL to be redirected when cancel button is pressed
        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);      

        // This block checks, if the hello world text field is set it parses it to view otherwise get the default 
        // hello world text field from the database and parse it
        
        $config_data = array(
        
        'thmsoftcrocus_address',
        'thmsoftcrocus_phone',
        'thmsoftcrocus_email',
        'thmsoftcrocus_fb',
        'thmsoftcrocus_twitter',
        'thmsoftcrocus_gglplus',
        'thmsoftcrocus_rss',
        'thmsoftcrocus_pinterest',
        'thmsoftcrocus_linkedin',
        'thmsoftcrocus_youtube',
        'thmsoftcrocus_powerby',
        'thmsoftcrocus_home_option',
        'thmsoftcrocus_quickview_button',
        'thmsoftcrocus_scroll_totop',
        'thmsoftcrocus_sale_label',
        'thmsoftcrocus_sale_labeltitle',
        'thmsoftcrocus_sale_labelcolor',
        'thmsoftcrocus_menubar_cb',
        'thmsoftcrocus_menubar_cbtitle',
        'thmsoftcrocus_menubar_cbcontent',
        'thmsoftcrocus_vmenubar_cb',
        'thmsoftcrocus_vmenubar_cbtitle',
        'thmsoftcrocus_vmenubar_cbcontent',
        'thmsoftcrocus_product_ct',
        'thmsoftcrocus_product_cttitle',
        'thmsoftcrocus_product_ctcontent',
        'thmsoftcrocus_product_ct2',
        'thmsoftcrocus_product_ct2title',
        'thmsoftcrocus_product_ct2content',
        'thmsoftcrocus_newsletter',
        'thmsoftcrocus_newslettercontent',
        'thmsoftcrocus_footer_cb',
        'thmsoftcrocus_footer_cbcontent',
        'thmsoftcrocus_body_bg',
        'thmsoftcrocus_body_bg_ed',
        'thmsoftcrocus_fontcolor',
        'thmsoftcrocus_fontcolor_ed',
        'thmsoftcrocus_linkcolor',
        'thmsoftcrocus_linkcolor_ed',
        'thmsoftcrocus_linkhovercolor',
        'thmsoftcrocus_linkhovercolor_ed',
        'thmsoftcrocus_headerbg',
        'thmsoftcrocus_headerbg_ed',
        'thmsoftcrocus_headerlinkcolor',
        'thmsoftcrocus_headerlinkcolor_ed',
        'thmsoftcrocus_headerlinkhovercolor',
        'thmsoftcrocus_headerlinkhovercolor_ed',
        'thmsoftcrocus_headerclcolor',
        'thmsoftcrocus_headerclcolor_ed',
        'thmsoftcrocus_mmbgcolor',
        'thmsoftcrocus_mmbgcolor_ed',
        'thmsoftcrocus_mmlinkscolor',
        'thmsoftcrocus_mmlinkscolor_ed',
        'thmsoftcrocus_mmlinkshovercolor',
        'thmsoftcrocus_mmlinkshovercolor_ed',
        'thmsoftcrocus_mmslinkscolor',
        'thmsoftcrocus_mmslinkscolor_ed',
        'thmsoftcrocus_mmslinkshovercolor',
        'thmsoftcrocus_mmslinkshovercolor_ed',
        'thmsoftcrocus_buttoncolor',
        'thmsoftcrocus_buttoncolor_ed',
        'thmsoftcrocus_buttonhovercolor',
        'thmsoftcrocus_buttonhovercolor_ed',
        'thmsoftcrocus_pricecolor',
        'thmsoftcrocus_pricecolor_ed',
        'thmsoftcrocus_oldpricecolor',
        'thmsoftcrocus_oldpricecolor_ed',
        'thmsoftcrocus_newpricecolor',
        'thmsoftcrocus_newpricecolor_ed',
        'thmsoftcrocus_footerbg',
        'thmsoftcrocus_footerbg_ed',
        'thmsoftcrocus_footerlinkcolor',
        'thmsoftcrocus_footerlinkcolor_ed',
        'thmsoftcrocus_footerlinkhovercolor',
        'thmsoftcrocus_footerlinkhovercolor_ed',
        'thmsoftcrocus_powerbycolor',
        'thmsoftcrocus_powerbycolor_ed',
        'thmsoftcrocus_fonttransform',
        'thmsoftcrocus_productpage_cb',
        'thmsoftcrocus_productpage_cbcontent',
        'thmsoftcrocus_productpage_related_cb',
        'thmsoftcrocus_productpage_related_cbcontent',       
        'thmsoftcrocus_headercb_ed',
        'thmsoftcrocus_headercb_content',
        'thmsoftcrocus_footer_fb',
        'thmsoftcrocus_footer_fbcontent',
        'thmsoftcrocus_animation_effect'
        );

        foreach ($config_data as $conf) {
            if (isset($this->request->post[$conf])) {
                $data[$conf] = $this->request->post[$conf];
                
            } else {
                $data[$conf] = $this->config->get($conf);

            }
        } 

        

        if (isset($this->request->post['thmsoftcrocus_product_image'])) {
            $data['thmsoftcrocus_product_image'] = $this->request->post['thmsoftcrocus_product_image'];
        } else {
            $data['thmsoftcrocus_product_image'] = $this->config->get('thmsoftcrocus_product_image'); 
        } 

        if (isset($this->request->post['thmsoftcrocus_product_image1'])) {
            $data['thmsoftcrocus_product_image1'] = $this->request->post['thmsoftcrocus_product_image1'];
        } else {
            $data['thmsoftcrocus_product_image1'] = $this->config->get('thmsoftcrocus_product_image1'); 
        } 

        if (isset($this->request->post['thmsoftcrocus_product_image2'])) {
            $data['thmsoftcrocus_product_image2'] = $this->request->post['thmsoftcrocus_product_image2'];
        } else {
            $data['thmsoftcrocus_product_image2'] = $this->config->get('thmsoftcrocus_product_image2'); 
        } 
 
        $this->load->model('tool/image');

        if (isset($this->request->post['thmsoftcrocus_product_image']) && is_file(DIR_IMAGE . $this->request->post['thmsoftcrocus_product_image'])) {
            $data['thumb'] = $this->model_tool_image->resize($this->request->post['thmsoftcrocus_product_image'], 100, 100);
        } elseif ( $this->config->get( 'thmsoftcrocus_product_image')!=''  && is_file(DIR_IMAGE . $this->config->get('thmsoftcrocus_product_image')) ) {
            $data['thumb'] = $this->model_tool_image->resize($this->config->get('thmsoftcrocus_product_image'), 100, 100);
        } else {
            $data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        if (isset($this->request->post['thmsoftcrocus_product_image1']) && is_file(DIR_IMAGE . $this->request->post['thmsoftcrocus_product_image1'])) {
            $data['thumb1'] = $this->model_tool_image->resize($this->request->post['thmsoftcrocus_product_image1'], 100, 100);
        } elseif ( $this->config->get( 'thmsoftcrocus_product_image1')!=''  && is_file(DIR_IMAGE . $this->config->get('thmsoftcrocus_product_image1')) ) {
            $data['thumb1'] = $this->model_tool_image->resize($this->config->get('thmsoftcrocus_product_image1'), 100, 100);
        } else {
            $data['thumb1'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        if (isset($this->request->post['thmsoftcrocus_product_image2']) && is_file(DIR_IMAGE . $this->request->post['thmsoftcrocus_product_image2'])) {
            $data['thumb2'] = $this->model_tool_image->resize($this->request->post['thmsoftcrocus_product_image2'], 100, 100);
        } elseif ( $this->config->get( 'thmsoftcrocus_product_image2')!=''  && is_file(DIR_IMAGE . $this->config->get('thmsoftcrocus_product_image2')) ) {
            $data['thumb2'] = $this->model_tool_image->resize($this->config->get('thmsoftcrocus_product_image2'), 100, 100);
        } else {
            $data['thumb2'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }



        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);        


   
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/thmsoftcrocus', $data));

    }

    /* Function that validates the data when Save Button is pressed */
    protected function validate() {
 
        // Block to check the user permission to manipulate the module
        if (!$this->user->hasPermission('modify', 'extension/module/thmsoftcrocus')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
 
        /* End Block*/
 
        // Block returns true if no error is found, else false if any error detected
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}