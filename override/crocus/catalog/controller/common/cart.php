<?php
class crocus_ControllerCommonCart extends ControllerCommonCart {

public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/common/cart.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    }
     
        
        // add new controller variables
        $this->load->language( 'common/cart' );
        $data['cart_heading'] = $this->language->get( 'cart_heading' );       
        $data['text_count'] = sprintf($this->language->get('text_count'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0));
        
        $arr=explode(' ', $data['text_items']);
        $data['text_total']=end($arr);

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