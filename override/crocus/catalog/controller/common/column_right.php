<?php
class crocus_ControllerCommonColumnRight extends ControllerCommonColumnRight {
public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/common/column_right.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    }  
       
     if (isset($this->request->get['route'])) {
	  $data['page_route'] = $this->request->get['route'];	 
	} else {
	  $data['page_route'] = 'common/home';
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