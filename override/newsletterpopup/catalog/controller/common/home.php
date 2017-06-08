<?php
class newsletterpopup_ControllerCommonHome extends ControllerCommonHome {

protected function endsWith( $haystack, $needle ) {
    if (strlen( $haystack ) < strlen( $needle )) {
      return false;
    }
    return (substr( $haystack, strlen($haystack)-strlen($needle), strlen($needle) ) == $needle);
}
public function preRender( $template_buffer, $template_name, &$data ) {
    
        if (!$this->endsWith( $template_name, '/template/common/home.tpl' )) {
          return parent::preRender( $template_buffer, $template_name, $data );
        }
           
           
        $data['newsletterpopup'] = $this->load->controller('extension/module/newsletterpopup');
        if($data['newsletterpopup']){ 
        
        $template_buffer = str_replace('<?php echo $content_bottom; ?>','<?php echo $content_bottom; ?><?php echo $newsletterpopup; ?>',$template_buffer);
        }

            // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
}