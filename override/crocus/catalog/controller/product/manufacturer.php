<?php
class crocus_ControllerProductManufacturer extends ControllerProductManufacturer {

public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/product/manufacturer_info.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    } 
       
        // add new controller variables
        $this->load->language( 'product/manufacturer' );
        $data['text_quickview'] = $this->language->get('text_quickview');        
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['text_item_compare'] = $this->language->get('text_item_compare'); 
        $data['thmsoftcrocus_sale_labeltitle']=$this->config->get('thmsoftcrocus_sale_labeltitle');
        $data['thmsoftcrocus_sale_label'] = $this->config->get('thmsoftcrocus_sale_label');
        $data['thmsoftcrocus_quickview_button'] = $this->config->get('thmsoftcrocus_quickview_button'); 
        
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
