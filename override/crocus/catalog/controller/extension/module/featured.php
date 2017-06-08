<?php
class crocus_ControllerExtensionModuleFeatured extends ControllerExtensionModuleFeatured {

public function preRender( $template_buffer, $template_name, &$data ) {
	    if (!$this->endsWith( $template_name, '/template/extension/module/featured.tpl' )) {
	      return parent::preRender( $template_buffer, $template_name, $data );
	    }  

        // add new controller variables
        
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
