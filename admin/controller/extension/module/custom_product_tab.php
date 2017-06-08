<?php
class ControllerExtensionModuleCustomProductTab extends Controller {
    private $error = array(); // This is used to set the errors, if any.
    
    public function uninstall()
    {
        //uninstall deletes productcustomtable from database
        $this->load->model('extension/module/custom_product_tab');
        $this->model_extension_module_custom_product_tab->uninstallProductcustomtabs();
    }

    public function index() {
         // Loading the language file of custom_product_tab
        $this->load->language('extension/module/custom_product_tab'); 
     
        // Set the title of the page to the heading title in the Language file i.e., Hello World
        $this->document->setTitle(strip_tags($this->language->get('heading_title')));     
       
        $this->load->model('extension/module/custom_product_tab');
        $this->model_extension_module_custom_product_tab->createtableCustomTabs();
     
        $this->getList();
    }

    protected function getList() {
        //echo "heelo"; exit();
       $this->load->model('catalog/product');
       $data['button_cancel'] = $this->language->get('button_cancel');

        // URL to be redirected when cancel button is pressed
        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

        $this->load->language('extension/module/custom_product_tab');       

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'pd.name';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            $order = 'ASC';
        }

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $url = '';
        
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
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );        

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/custom_product_tab', 'token=' . $this->session->data['token'] . $url, true)
        );        
      

        $data['products'] = array();

        $filter_data = array(
            'sort'            => $sort,
            'order'           => $order,
            'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit'           => $this->config->get('config_limit_admin')
        );

        $this->load->model('tool/image');

        $product_total = $this->model_catalog_product->getTotalProducts($filter_data);

        $results = $this->model_catalog_product->getProducts($filter_data);

        foreach ($results as $result) {
            if (is_file(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 40, 40);
            } else {
                $image = $this->model_tool_image->resize('no_image.png', 40, 40);
            }

            $data['products'][] = array(
                'product_id' => $result['product_id'],
                'image'      => $image,
                'name'       => $result['name'],
                'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                'edit'       => $this->url->link('extension/module/custom_product_tab/edit', 'token=' . $this->session->data['token'] . '&product_id=' . $result['product_id'] . $url, true)
            );
        }
        
        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_list'] = $this->language->get('text_list');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_no_results'] = $this->language->get('text_no_results');
        $data['text_confirm'] = $this->language->get('text_confirm');

        $data['column_image'] = $this->language->get('column_image');
        $data['column_name'] = $this->language->get('column_name');      
        $data['column_action'] = $this->language->get('column_action');
        $data['entry_name'] = $this->language->get('entry_name');     
        $data['button_edit'] = $this->language->get('button_edit');

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

        $data['sort_name'] = $this->url->link('extension/module/custom_product_tab', 'token=' . $this->session->data['token'] . '&sort=pd.name' . $url, true);
      

        $pagination = new Pagination();
        $pagination->total = $product_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_limit_admin');
        $pagination->url = $this->url->link('extension/module/custom_product_tab', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($product_total - $this->config->get('config_limit_admin'))) ? $product_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $product_total, ceil($product_total / $this->config->get('config_limit_admin')));

            

        $data['sort'] = $sort;
        $data['order'] = $order;

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/custom_tab_product_list', $data));

    }

    public function edit() {
     
        $this->language->load('extension/module/custom_product_tab');

        $this->document->setTitle(strip_tags($this->language->get('heading_title')));

        // function on save button clicked
        $this->load->model('extension/module/custom_product_tab');
        //echo !$this->validate();
          if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
           // echo "in validate";exit();
          
            // Parse all the coming data to Setting Model to save it in database.
            $this->model_extension_module_custom_product_tab->addproductcustomtabs($this->request->post);
            //echo "<pre>";print_r($this->request->post);exit();
            // To display the success text on data save
            $this->session->data['success'] = $this->language->get('text_success');
     
            // Redirect to the Module Listing           
            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
           
        }       

        $this->getForm();
    }

    protected function getForm() {
        $data['heading_title'] = $this->language->get('heading_title');      
        $this->load->model('catalog/product');
        $product_info=array();
        $data['productid']=$this->request->get['product_id'];
        if (isset($this->request->get['product_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
            $data['product_name'] = $product_info['name'];
            $data['text_form'] = $this->language->get('text_form')." ".$data['product_name'];
       }
       else
       {
             $data['product_name']=$this->request->post['productname'];
            $data['text_form'] = $this->language->get('text_form')." ". $data['product_name'];
       }
     
        
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_meta_title'] = $this->language->get('entry_meta_title');
        $data['entry_description'] = $this->language->get('entry_description');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['button_custom_product_tab_add'] = $this->language->get('button_custom_product_tab_add');   
        $data['button_remove'] = $this->language->get('button_remove');
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        

        $url = '';
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

        if (isset($this->error['error_customtabtitle'])) {
            $data['error_customtab_title'] = $this->error['error_customtabtitle'];
        } else {
            $data['error_customtab_title'] = array();
        }

         if (isset($this->error['error_customtabdesc'])) {
            $data['error_customtab_description'] = $this->error['error_customtabdesc'];
        } else {
            $data['error_customtab_description'] = array();
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );
       
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/custom_product_tab', 'token=' . $this->session->data['token'] . $url, true)
        );        
       
        $data['action'] = $this->url->link('extension/module/custom_product_tab/edit', 'token=' . $this->session->data['token']. '&product_id=' . $this->request->get['product_id'] . $url, true); // URL to be directed when the save button is pressed
     

        $data['cancel'] = $this->url->link('extension/module/custom_product_tab', 'token=' . $this->session->data['token'], true); // URL to be redirected when cancel button is pressed


        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        $this->load->model('design/layout');

        $data['layouts'] = $this->model_design_layout->getLayouts();

        //get custom tabs data

        $data['custom_product_tabs'] = array();
      
       if (isset($this->request->post['custom_product_tab'])) {
            $custom_product_tab = $this->request->post['custom_product_tab'];
        } elseif (!empty($product_info)) {
            $this->load->model('extension/module/custom_product_tab');
            $custom_product_tab = $this->model_extension_module_custom_product_tab->getCustomTabDescriptions($this->request->get['product_id']);
        } else {
            $custom_product_tab= array();
        }

       // echo "<pre>";print_r($custom_product_tab);exit();
        $data['custom_product_tabs'] = array();
        foreach ($custom_product_tab as $product_customtabs) {
            $data['custom_product_tabs'][] = array(

                'customtab_title'       => $product_customtabs['customtab_title'],
                'customtab_status'      => $product_customtabs['customtab_status'],
                'customtab_description' => $product_customtabs['customtab_description']

            );
        }
     

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/custom_tab_product_form', $data));
    }

       
    /* Function that validates the data when Save Button is pressed */
    protected function validate() {
 
        // Block to check the user permission to manipulate the module
        if (!$this->user->hasPermission('modify', 'extension/module/custom_product_tab')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        $datacustomtab_validate=$this->request->post;
       // validate if customtabs are added or not
        if(isset($datacustomtab_validate['custom_product_tab']))
        {
            $row_no=0;
        foreach ($datacustomtab_validate['custom_product_tab'] as $validate_customtab) {
           // validate description
            foreach ($validate_customtab['customtab_description'] as $key => $value) {

                $description[$key]=array('description'=>$value['description']);               
                if(strlen($value['description']) < 1)
                {
                   // $this->error['name'] = $this->language->get('error_name');                
                    $this->error['error_customtabdesc'][$row_no][$key] = $this->language->get('error_description');  
                }
             }
             // validate title
              foreach ($validate_customtab['customtab_title'] as $key => $value) {               
                $title[$key]=array('title'=>$value['title']);
                if(strlen($value['title']) < 1)
                {
                    //$this->error['name'] = $this->language->get('error_name');
                     $this->error['error_customtabtitle'][$row_no][$key] = $this->language->get('error_title');                    
                  
                }               
               
             }
            $row_no++;

        }
     }     
    // Block returns true if no error is found, else false if any error detected
      return !($this->error);
    }

}