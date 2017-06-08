<?php
class newslettersubscription_ControllerCommonColumnLeft extends ControllerCommonColumnLeft {

    /* overridden method, this newly introduced function is always called
       before the final rendering
    */
    public function preRender( $template_buffer, $template_name, &$data ) {

        if ($template_name != 'common/column_left.tpl') {
            return parent::preRender( $template_buffer, $template_name, $data );
        }
        
        // modify template file
        if($this->config->get('newslettersubscription_status')==1) {    
          $this->load->language('sale/newslettersubscription');
          $data['text_newsletter_subscription'] = $this->language->get('text_newsletter_subscription');
          $data['text_newsletter_subscription_list'] = $this->language->get('text_newsletter_subscription_list');
          $data['text_newsletter_subscription_mail'] = $this->language->get('text_newsletter_subscription_mail');
          $newslettersubscription = array();
      
          if ($this->user->hasPermission('access', 'sale/newslettersubscription')) {
            $newslettersubscription[] = array(
              'name'     => $this->language->get('text_newsletter_subscription_list'),
              'href'     => $this->url->link('sale/newslettersubscription', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }          
          if ($this->user->hasPermission('access', 'sale/newslettersubscription')) {
            $newslettersubscription[] = array(
              'name'     => $this->language->get('text_newsletter_subscription_mail'),
              'href'     => $this->url->link('sale/newslettersubscriptionmail', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }
         if ($newslettersubscription) {            
            $sale['name']=  $this->language->get('text_newsletter_subscription');
            $sale['href']=  "";
            $sale['children']=  $newslettersubscription;  
            //$data['menus'][]['children']=$sale;
            array_push($data['menus'][4]['children'], $sale);          
          }       

          
        }    
        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
}
?> 
