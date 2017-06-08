<?php
class ControllerExtensionModuleThmsoftlatestbycategory  extends Controller {
	
	public function index($setting) {
	

		static $module = 0;
		$this->load->language( 'extension/module/thmsoftlatest_by_category' );

		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_tax'] = $this->language->get('text_tax');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['text_quickview'] = $this->language->get('text_quickview');
		$data['text_wishlist'] = $this->language->get('text_wishlist');
		$data['text_compare'] = $this->language->get('text_compare');
		$data['thmsoftcrocus_sale_label']=$this->config->get('thmsoftcrocus_sale_label');
		$data['thmsoftcrocus_sale_labeltitle']=$this->config->get('thmsoftcrocus_sale_labeltitle');
		$data['thmsoftcrocus_quickview_button']=$this->config->get('thmsoftcrocus_quickview_button');

		$this->load->model('catalog/product');
		$this->load->model('extension/module/thmsoftlatest_by_category');

		
		$this->load->model('tool/image');

		//category wise Products
		$data['categorywise_products1'] = array();
		$data['categorywise_products2'] = array();
		$data['categorywise_products3'] = array();
		$data['categorywise_products4'] = array();
		$data['categorywise_products5'] = array();
	
		if (empty($setting['limit'])) {
			$setting['limit'] = 4;
		}

		$data1 = array($setting['category_name1'],'limit'=> $setting['limit'],'start'=>'0');
		$results1 = $this->model_extension_module_thmsoftlatest_by_category->getthmsoftlatestCategoryProducts($data1);


		foreach ($results1 as $result) {
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
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
			

			$data['categorywise_products1'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}

		$data2 = array($setting['category_name2'],'limit'=> $setting['limit'],'start'=>'0');
		$results2 = $this->model_extension_module_thmsoftlatest_by_category->getthmsoftlatestCategoryProducts($data2);


		foreach ($results2 as $result) {
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
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
			

			$data['categorywise_products2'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}


		$data3 = array($setting['category_name3'],'limit'=> $setting['limit'],'start'=>'0');
		$results3 = $this->model_extension_module_thmsoftlatest_by_category->getthmsoftlatestCategoryProducts($data3);


		foreach ($results3 as $result) {
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
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
			

			$data['categorywise_products3'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}


		$data4 = array($setting['category_name4'],'limit'=> $setting['limit'],'start'=>'0');
		$results4 = $this->model_extension_module_thmsoftlatest_by_category->getthmsoftlatestCategoryProducts($data4);


		foreach ($results4 as $result) {
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
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
			

			$data['categorywise_products4'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'price'   	 => $price,
				'special' 	 => $special,
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}

		// $data5 = array($setting['category_name5'],'limit'=> $setting['limit'],'start'=>'0');
		// $results5 = $this->model_extension_module_thmsoftlatest_by_category->getthmsoftlatestCategoryProducts($data5);


		// foreach ($results5 as $result) {
		// 	if ($result['image']) {
		// 		$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
		// 	} else {
		// 		$image = false;
		// 	}
						
		// 	if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
		// 		$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
		// 	} else {
		// 		$price = false;
		// 	}

		// 	if ((float)$result['special']) {
		// 		$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
		// 	} else {
		// 		$special = false;
		// 	}
			
		// 	if ($this->config->get('config_review_status')) {
		// 		$rating = $result['rating'];
		// 	} else {
		// 		$rating = false;
		// 	}
			

		// 	$data['categorywise_products5'][] = array(
		// 		'product_id' => $result['product_id'],
		// 		'thumb'   	 => $image,
		// 		'name'    	 => $result['name'],
		// 		'price'   	 => $price,
		// 		'special' 	 => $special,
		// 		'rating'     => $rating,
		// 		'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
		// 		'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
		// 	);
		// }




		//get name of category
		$this->load->model('catalog/category');
		$category_result1 = $this->model_catalog_category->getCategory($setting['category_name1']);	
		$category_result2 = $this->model_catalog_category->getCategory($setting['category_name2']);	
		$category_result3 = $this->model_catalog_category->getCategory($setting['category_name3']);		
		$category_result4 = $this->model_catalog_category->getCategory($setting['category_name4']);		
		//$category_result5 = $this->model_catalog_category->getCategory($setting['category_name5']);		
		$data['category_name1'] = NULL;
		if(isset($category_result1['name']))
		$data['category_name1'] = $category_result1['name'];
		$data['category_name2'] = NULL;
		if(isset($category_result2['name']))
		$data['category_name2'] = $category_result2['name'];
		$data['category_name3'] = NULL;
		if(isset($category_result3['name']))
		$data['category_name3'] = $category_result3['name'];
		$data['category_name4'] = NULL;
		if(isset($category_result4['name']))
		$data['category_name4'] = $category_result4['name'];
		// $data['category_name5'] = NULL;
		// if(isset($category_result5['name']))
		// $data['category_name5'] = $category_result5['name'];

		$data['heading_title'] = $this->language->get('heading_title');
		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');
		$data['no_product_found'] = $this->language->get('no_product_found');

		$data['module'] = $module++;

		
		return $this->load->view('extension/module/thmsoftlatest_by_category', $data);
		

		/*$this->render();*/
	}
}
?>