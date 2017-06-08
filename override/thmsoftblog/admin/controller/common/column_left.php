<?php
class thmsoftblog_ControllerCommonColumnLeft extends ControllerCommonColumnLeft {

    /* overridden method, this newly introduced function is always called
       before the final rendering
    */
    public function preRender( $template_buffer, $template_name, &$data ) {

        if ($template_name != 'common/column_left.tpl') {
            return parent::preRender( $template_buffer, $template_name, $data );
        }

        // modify template file
        if($this->config->get('thmsoftblog_status')==1) {    
        $this->load->language('thmsoftblog/blog');
        $data['text_blog'] = $this->language->get('text_blog');
        $data['text_blog_category'] = $this->language->get('text_blog_category');
        $data['text_blog_post'] = $this->language->get('text_blog_post');
        $data['text_blog_comment'] = $this->language->get('text_blog_comment');       
       
        $thmsoftblog = array();

         if ($this->user->hasPermission('access', 'thmsoftblog/category')) {
            $thmsoftblog[] = array(
              'name'     => $this->language->get('text_blog_category'),
              'href'     => $this->url->link('thmsoftblog/category', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }          
          if ($this->user->hasPermission('access', 'thmsoftblog/article')) {
            $thmsoftblog[] = array(
              'name'     => $this->language->get('text_blog_post'),
              'href'     => $this->url->link('thmsoftblog/article', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }
          if ($this->user->hasPermission('access', 'thmsoftblog/comment')) {
            $thmsoftblog[] = array(
              'name'     => $this->language->get('text_blog_comment'),
              'href'     => $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }
          
               
          if ($thmsoftblog) {
                $data['menus'][] = array(
                    'id'       => 'blog',
                    'icon'     => 'fa fa-rss', 
                    'name'     => $this->language->get('text_blog'),
                    'href'     => '',
                    'children' => $thmsoftblog
                );
            }
          
        }    
        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
}
?> 
