<?php
class thmsofttestimonial_ControllerCommonColumnLeft extends ControllerCommonColumnLeft {

    /* overridden method, this newly introduced function is always called
       before the final rendering
    */
    public function preRender( $template_buffer, $template_name, &$data ) {

        if ($template_name != 'common/column_left.tpl') {
            return parent::preRender( $template_buffer, $template_name, $data );
        }

        // modify template file
       $this->load->language('catalog/testimonial');
       $data['text_testimonial'] = $this->language->get('text_testimonial');
       $data['text_testimonialsettings'] = $this->language->get('text_testimonialsettings');
       $data['testimonial'] = $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'], true);
       $data['testimonialsettings'] = $this->url->link('catalog/testimonialsettings', 'token=' . $this->session->data['token'], true);
    

            // testimonial
      $testimonial = array();
      //$catalog = array();
      
      if ($this->user->hasPermission('access', 'catalog/testimonial')) {
        $testimonial[] = array(
          'name'     => $this->language->get('text_testimonial'),
          'href'     => $this->url->link('catalog/testimonial', 'token=' . $this->session->data['token'], true),
          'children' => array() 
        );
      }
      
      if ($this->user->hasPermission('access', 'catalog/testimonialsettings')) {
        $testimonial[] = array(
          'name'     => $this->language->get('text_testimonialsettings'),
          'href'     => $this->url->link('catalog/testimonialsettings', 'token=' . $this->session->data['token'], true),
          'children' => array()   
        );
      }
      
      if ($testimonial) {
        $data['menus'][1]['children'][] = array(
          'name'     => $this->language->get('text_testimonial'),
          'href'     => '',
          'children' => $testimonial
        );
      }
           
        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
}
?> 