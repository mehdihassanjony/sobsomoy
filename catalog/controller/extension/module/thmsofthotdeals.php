<?php
class ControllerExtensionModuleThmsofthotdeals extends Controller {
	public function index($setting) {

		$this->load->language('extension/module/thmsofthotdeals');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_tax'] = $this->language->get('text_tax');

		$data['button_cart'] = $this->language->get('button_cart');
		$data['text_quickview'] = $this->language->get('text_quickview');
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['text_compare'] = $this->language->get('text_compare');
        $data['text_hot'] = $this->language->get('text_hot');
        $data['no_product_found'] = $this->language->get('no_product_found');
	$data['text_shop'] = $this->language->get('text_shop');
		$data['thmsoftcrocus_quickview_button']=$this->config->get('thmsoftcrocus_quickview_button');


		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0
		);

	
		
		$setting['limit'] = 1;
		
		$this->load->model('extension/module/thmsofthotdeals');
		
		if(isset($setting['product_name'])){
		$dt_productid = array('filter_product_id' => $setting['product_name'],'limit'=> $setting['limit'],'start'=>'0');		
		$result = $this->model_extension_module_thmsofthotdeals->getProduct($dt_productid['filter_product_id']);
			if($result){
		    	if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
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
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'date_end'    => $result['date_end']
				);
			}
			else { 
				$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				$data['no_product'] = array(
					'thumb'       => $image,
					'name'        => $this->language->get('no_product_found'),
					'date_end'    => ''
				);
			}		

		}
		else
		{
			$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				$data['no_product'] = array(
					'thumb'       => $image,
					'name'        => $this->language->get('no_product_found'),
					'date_end'    => ''
				);
		}

			

			
				return $this->load->view('extension/module/thmsofthotdeals', $data);
		
	}
}
