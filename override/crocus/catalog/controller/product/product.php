<?php
class crocus_ControllerProductProduct extends ControllerProductProduct {

public function index() {
      $this->document->addScript('catalog/view/theme/'.$this->config->get('theme_default_directory').'/js/cloud-zoom.js');
    // call parent method
    return parent::index();
}
public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/product/product.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    } 
       
        // add new controller variables
        $this->load->language( 'product/product' );
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['text_item_compare'] = $this->language->get('text_item_compare'); 
        $data['text_compare'] = $this->language->get('text_compare'); 
        $data['text_product'] = $this->language->get('text_product'); 
        $data['thmsoftcrocus_sale_labeltitle']=$this->config->get('thmsoftcrocus_sale_labeltitle');
        $data['thmsoftcrocus_sale_label'] = $this->config->get('thmsoftcrocus_sale_label');
        $data['thmsoftcrocus_quickview_button'] = $this->config->get('thmsoftcrocus_quickview_button');        
        
        $this->load->model('tool/image');
        $data['thmsoftcrocus_product_image'] = $this->model_tool_image->resize($this->config->get('thmsoftcrocus_product_image'), 283,383);
        $data['thmsoftcrocus_product_image1'] = $this->model_tool_image->resize($this->config->get('thmsoftcrocus_product_image1'), 140,46);
        $data['thmsoftcrocus_product_image2'] = $this->model_tool_image->resize($this->config->get('thmsoftcrocus_product_image2'), 140,48);
        
        if (isset($this->request->get['product_id'])) {
            $product_id = (int)$this->request->get['product_id'];
        } else {
            $product_id = 0;
        }    
        $data['related_list']= $this->url->link('product/product/info', 'product_id=' . $product_id);
        //product custom tabs
        $data['custom_product_tabs'] = array();

        $this->load->model('extension/module/custom_product_tab');
        $custom_product_tab = $this->model_extension_module_custom_product_tab->getCustomTabDescriptions($this->request->get['product_id']);
        $data['custom_product_tabs'] = array();
        foreach ($custom_product_tab as $product_customtabs) {
                $data['custom_product_tabs'][] = array(
                'customtab_title' => $product_customtabs['customtab_title'],
                'customtab_status' => $product_customtabs['customtab_status'],
                'customtab_description' => $product_customtabs['customtab_description']
                );
        }
        $data['config_language_id']=$this->config->get('config_language_id');
        $data['thmsoftcrocus_productpage_related_cb']=$this->config->get('thmsoftcrocus_productpage_related_cb');
        $data['thmsoftcrocus_productpage_related_cbcontent']=$this->config->get('thmsoftcrocus_productpage_related_cbcontent');
         
      // $this->info($product_id);

        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
}
//get related products on new page
public function info()
    {
        $this->load->language('product/product');
        $this->load->model('catalog/product');

        $this->load->model('tool/image');
        $heading_title_best=$this->language->get('text_related')." ".$this->language->get('text_product');

                if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'p.sort_order';
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

        if (isset($this->request->get['limit'])) {
            $limit = (int)$this->request->get['limit'];
        } else {
            $limit = $this->config->get('config_product_limit');
        }

        $this->document->setTitle($heading_title_best);

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

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

        if (isset($this->request->get['limit'])) {
            $url .= '&limit=' . $this->request->get['limit'];
        }

        $data['breadcrumbs'][] = array(
            'text' => $heading_title_best,
            'href' => $this->url->link('product/product/info', $url)
        );
        
        $data['heading_title'] =$heading_title_best;

        $data['text_empty'] = $this->language->get('text_empty');
        $data['text_quantity'] = $this->language->get('text_quantity');
        $data['text_manufacturer'] = $this->language->get('text_manufacturer');
        $data['text_model'] = $this->language->get('text_model');
        $data['text_price'] = $this->language->get('text_price');
        $data['text_tax'] = $this->language->get('text_tax');
        $data['text_points'] = $this->language->get('text_points');
        $data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
        $data['text_sort'] = $this->language->get('text_sort');
        $data['text_limit'] = $this->language->get('text_limit');
        $data['text_quickview'] = $this->language->get('text_quickview'); 
        $data['text_quickview'] = $this->language->get('text_quickview');
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['button_cart'] = $this->language->get('button_cart');
        $data['button_wishlist'] = $this->language->get('button_wishlist');
        $data['button_compare'] = $this->language->get('button_compare');
        $data['button_list'] = $this->language->get('button_list');
        $data['button_grid'] = $this->language->get('button_grid');
        $data['button_continue'] = $this->language->get('button_continue');

        $data['compare'] = $this->url->link('product/compare');
        $data['thmsoftcrocus_sale_labeltitle']=$this->config->get('thmsoftcrocus_sale_labeltitle');
        $data['thmsoftcrocus_sale_label'] = $this->config->get('thmsoftcrocus_sale_label');
        $data['thmsoftcrocus_quickview_button'] = $this->config->get('thmsoftcrocus_quickview_button'); 

        $data['products'] = array();

            $results = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);

            foreach ($results as $result) {
               if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], $this->config->get($this->config->get('config_theme') . '_image_related_width'), $this->config->get($this->config->get('config_theme') . '_image_related_height'));
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $this->config->get($this->config->get('config_theme') . '_image_related_width'), $this->config->get($this->config->get('config_theme') . '_image_related_height'));
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if ((float)$result['special']) {
                    $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $special = false;
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('config_review_status')) {
                    $rating = (int)$result['rating'];
                } else {
                    $rating = false;
                }
                
                $data['products'][] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get($this->config->get('config_theme') . '_product_description_length')) . '..',
                    'price'       => $price,
                    'special'     => $special,
                    'tax'         => $tax,
                    'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
                    'rating'      => $rating,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );
            }




        $data['continue'] = $this->url->link('common/home');
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
            
        $this->response->setOutput($this->load->view('product/thmsoftrelated_list', $data));
        
    }

protected function endsWith( $haystack, $needle ) {
        if (strlen( $haystack ) < strlen( $needle )) {
            return false;
        }
        return (substr( $haystack, strlen($haystack)-strlen($needle), strlen($needle) ) == $needle);
}
} 