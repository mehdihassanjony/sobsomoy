<?php
class crocus_ControllerCommonHeader extends ControllerCommonHeader {

public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/common/header.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    }
       
        // add new controller variables
            $data['thmsoft_theme']=$this->config->get('theme_default_directory');
            $data['thmsoftcrocus_home_option']=$this->config->get('thmsoftcrocus_home_option');
            $data['thmsoftcrocus_menubar_cb']=$this->config->get('thmsoftcrocus_menubar_cb');   
            $data['thmsoftcrocus_menubar_cbtitle']=$this->config->get('thmsoftcrocus_menubar_cbtitle');
            $data['thmsoftcrocus_menubar_cbcontent']=html_entity_decode($this->config->get('thmsoftcrocus_menubar_cbcontent'));
            $data['thmsoftcrocus_footer_fb']=$this->config->get('thmsoftcrocus_footer_fb');
            $data['thmsoftcrocus_footer_fbcontent']=html_entity_decode($this->config->get('thmsoftcrocus_footer_fbcontent'));            
                    
            $this->load->language( 'common/header' );
            $data['text_menu'] = $this->language->get( 'text_menu' );
            $data['text_all_categories'] = $this->language->get( 'text_all_categories' );
            $data['text_welcome'] = $this->language->get( 'text_welcome' );
            $data['text_home'] = $this->language->get('text_home');
            $data['text_menu'] = $this->language->get('text_menu');
            $data['text_register'] = $this->language->get('text_register');
            $data['text_or'] = $this->language->get('text_or');
            $data['register'] = $this->url->link('account/register', '', true);
            $data['text_blog'] = $this->language->get( 'text_blog' );
            $data['blog_href']=$this->url->link('thmsoftblog/article');
            $data['text_information'] = $this->language->get('text_information'); 
            $data['compare_href']=$this->url->link('product/compare');   
            $data['thmsoftblog_status'] = $this->config->get('thmsoftblog_status');   

            $data['facebookurl'] = $this->config->get('thmsoftcrocus_fb');
            $data['twitterurl'] = $this->config->get('thmsoftcrocus_twitter');
            $data['gplusurl'] = $this->config->get('thmsoftcrocus_gglplus');
            $data['rssurl'] = $this->config->get('thmsoftcrocus_rss');
            $data['pintresturl'] = $this->config->get('thmsoftcrocus_pinterest');
            $data['linkedinurl'] = $this->config->get('thmsoftcrocus_linkedin');
            $data['youtubeurl'] = $this->config->get('thmsoftcrocus_youtube');   
             $data['newslettersubscription_status'] = $this->config->get('newslettersubscription_status');
            /*Main color section */
            $data['thmsoftcrocus_fonttransform']=$this->config->get('thmsoftcrocus_fonttransform');
            $data['thmsoftcrocus_sale_labelcolor']=$this->config->get('thmsoftcrocus_sale_labelcolor');

            $data['thmsoftcrocus_body_bg_ed']=$this->config->get('thmsoftcrocus_body_bg_ed');
            $data['thmsoftcrocus_body_bg']=$this->config->get('thmsoftcrocus_body_bg');

            $data['thmsoftcrocus_fontcolor_ed']=$this->config->get('thmsoftcrocus_fontcolor_ed');            
            $data['thmsoftcrocus_fontcolor']=$this->config->get('thmsoftcrocus_fontcolor');

            $data['thmsoftcrocus_linkcolor_ed']=$this->config->get('thmsoftcrocus_linkcolor_ed');
            $data['thmsoftcrocus_linkcolor']=$this->config->get('thmsoftcrocus_linkcolor');

            $data['thmsoftcrocus_linkhovercolor_ed']=$this->config->get('thmsoftcrocus_linkhovercolor_ed');
            $data['thmsoftcrocus_linkhovercolor']=$this->config->get('thmsoftcrocus_linkhovercolor');

            $data['thmsoftcrocus_headerbg_ed']=$this->config->get('thmsoftcrocus_headerbg_ed');
            $data['thmsoftcrocus_headerbg']=$this->config->get('thmsoftcrocus_headerbg');

            $data['thmsoftcrocus_headerlinkcolor_ed']=$this->config->get('thmsoftcrocus_headerlinkcolor_ed');
            $data['thmsoftcrocus_headerlinkcolor']=$this->config->get('thmsoftcrocus_headerlinkcolor');

            $data['thmsoftcrocus_headerlinkhovercolor_ed']=$this->config->get('thmsoftcrocus_headerlinkhovercolor_ed');
            $data['thmsoftcrocus_headerlinkhovercolor']=$this->config->get('thmsoftcrocus_headerlinkhovercolor');            
            
            $data['thmsoftcrocus_headerclcolor_ed']=$this->config->get('thmsoftcrocus_headerclcolor_ed');
            $data['thmsoftcrocus_headerclcolor']=$this->config->get('thmsoftcrocus_headerclcolor');

            $data['thmsoftcrocus_mmbgcolor_ed']=$this->config->get('thmsoftcrocus_mmbgcolor_ed');
            $data['thmsoftcrocus_mmbgcolor']=$this->config->get('thmsoftcrocus_mmbgcolor');

            $data['thmsoftcrocus_mmlinkscolor_ed']=$this->config->get('thmsoftcrocus_mmlinkscolor_ed');
            $data['thmsoftcrocus_mmlinkscolor']=$this->config->get('thmsoftcrocus_mmlinkscolor');

            $data['thmsoftcrocus_mmlinkshovercolor_ed']=$this->config->get('thmsoftcrocus_mmlinkshovercolor_ed');
            $data['thmsoftcrocus_mmlinkshovercolor']=$this->config->get('thmsoftcrocus_mmlinkshovercolor');

            $data['thmsoftcrocus_mmslinkscolor_ed']=$this->config->get('thmsoftcrocus_mmslinkscolor_ed');
            $data['thmsoftcrocus_mmslinkscolor']=$this->config->get('thmsoftcrocus_mmslinkscolor');

            $data['thmsoftcrocus_mmslinkshovercolor_ed']=$this->config->get('thmsoftcrocus_mmslinkshovercolor_ed');
            $data['thmsoftcrocus_mmslinkshovercolor']=$this->config->get('thmsoftcrocus_mmslinkshovercolor');

            $data['thmsoftcrocus_buttoncolor_ed']=$this->config->get('thmsoftcrocus_buttoncolor_ed');
            $data['thmsoftcrocus_buttoncolor']=$this->config->get('thmsoftcrocus_buttoncolor');

            $data['thmsoftcrocus_buttonhovercolor_ed']=$this->config->get('thmsoftcrocus_buttonhovercolor_ed');
            $data['thmsoftcrocus_buttonhovercolor']=$this->config->get('thmsoftcrocus_buttonhovercolor');

            $data['thmsoftcrocus_pricecolor_ed']=$this->config->get('thmsoftcrocus_pricecolor_ed');
            $data['thmsoftcrocus_pricecolor']=$this->config->get('thmsoftcrocus_pricecolor');

            $data['thmsoftcrocus_oldpricecolor_ed']=$this->config->get('thmsoftcrocus_oldpricecolor_ed');
            $data['thmsoftcrocus_oldpricecolor']=$this->config->get('thmsoftcrocus_oldpricecolor');

            $data['thmsoftcrocus_newpricecolor_ed']=$this->config->get('thmsoftcrocus_newpricecolor_ed');
            $data['thmsoftcrocus_newpricecolor']=$this->config->get('thmsoftcrocus_newpricecolor');

            $data['thmsoftcrocus_footerbg_ed']=$this->config->get('thmsoftcrocus_footerbg_ed');
            $data['thmsoftcrocus_footerbg']=$this->config->get('thmsoftcrocus_footerbg');

            $data['thmsoftcrocus_footerlinkcolor_ed']=$this->config->get('thmsoftcrocus_footerlinkcolor_ed');
            $data['thmsoftcrocus_footerlinkcolor']=$this->config->get('thmsoftcrocus_footerlinkcolor');

            $data['thmsoftcrocus_footerlinkhovercolor_ed']=$this->config->get('thmsoftcrocus_footerlinkhovercolor_ed');
            $data['thmsoftcrocus_footerlinkhovercolor']=$this->config->get('thmsoftcrocus_footerlinkhovercolor');

            $data['thmsoftcrocus_powerbycolor_ed']=$this->config->get('thmsoftcrocus_powerbycolor_ed');
            $data['thmsoftcrocus_powerbycolor']=$this->config->get('thmsoftcrocus_powerbycolor');

            $data['thmsoftcrocus_fonttransform']=$this->config->get('thmsoftcrocus_fonttransform');
            $data['thmsoftcrocus_fonttransform']=$this->config->get('thmsoftcrocus_fonttransform');

            /*Main color section */     
            $data['newslettersubscription'] = $this->load->controller('extension/module/newslettersubscription');
            
            $this->load->model('setting/setting');
            $data['cbim_data']=$this->model_setting_setting->getSetting('custom_menu_content');
            $this->load->model('tool/image');
            $data['cat_id']=0;


            if(isset($this->request->get['path'])) {
              $path = $this->request->get['path'];
              $cats = explode('_', $path);
             $data['cat_id'] = $cats[0];
            } 
          

          
         $data['text_welcome'] = sprintf($this->language->get('text_welcome'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));
         $data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));
         
        if (isset($this->request->get['category_id'])) {
        $data['category_id'] = $this->request->get['category_id'];
        } else {
        $data['category_id'] = 0;
        }

       $this->load->model('catalog/category');
       $this->load->model('catalog/product');

        // for only Top Categories
        $data['categories1'] = array();
        $categories_1 = $this->model_catalog_category->getCategories(0);
          

          foreach ($categories_1 as $category_1) {
            if($category_1['top']){
             $level_2_data = array();
             
             $categories_2 = $this->model_catalog_category->getCategories($category_1['category_id']);
             
             foreach ($categories_2 as $category_2) {
                $level_3_data = array();
                
                $categories_3 = $this->model_catalog_category->getCategories($category_2['category_id']);
                
                foreach ($categories_3 as $category_3) {
                   $level_3_data[] = array(
                      'name' => $category_3['name'],
                                           'column'   => $category_3['column'] ? $category_3['column'] : 1,
                      'href' => $this->url->link('product/category', 'path=' . $category_1['category_id'] . '_' . $category_2['category_id'] . '_' . $category_3['category_id']),
                      'category_id'=> $category_3['category_id']
                   );
                }
                
                $level_2_data[] = array(
                   'name'     => $category_2['name'],
                   'children' => $level_3_data,
                   'href'     => $this->url->link('product/category', 'path=' . $category_1['category_id'] . '_' . $category_2['category_id']),
                   'category_id'=> $category_2['category_id']   
                );               
             }
             
             $data['categories1'][] = array(
                'name'     => $category_1['name'],
                'children' => $level_2_data,
                'column'   => $category_1['column'] ? $category_1['column'] : 1,
                'href'     => $this->url->link('product/category', 'path=' . $category_1['category_id']),
                'category_id'=> $category_1['category_id']
             );
          } 
        }



     // For manufacture page specific css
      if (isset($this->request->get['route'])) {
        if (isset($this->request->get['manufacturer_id'])) {
            $brand_class=$this->request->get['route'];
            $data['brand_class'] = str_replace('/', '-', $this->request->get['route']);//exit;
        } else { $brand_class=''; $data['brand_class']='';  }
      } 

      // for information links on header
        $this->load->model('catalog/information');

        $data['informations'] = array();

        foreach ($this->model_catalog_information->getInformations() as $result) {
          if ($result['bottom']) {
            $data['informations'][] = array(
              'title' => $result['title'],
              'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
            );
          }
        }


        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
    
    protected function endsWith( $haystack, $needle ) {
    if (strlen( $haystack ) < strlen( $needle )) {
      return false;
    }
    return (substr( $haystack, strlen($haystack)-strlen($needle), strlen($needle) ) == $needle);
   }
}