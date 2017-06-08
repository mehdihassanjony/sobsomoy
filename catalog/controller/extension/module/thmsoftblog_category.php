<?php  
class ControllerExtensionModuleThmsoftblogCategory extends Controller {

	public function index() {

		$this->language->load('extension/module/thmsoftblog_category');

		$data['heading_title'] = $this->language->get('heading_title');

		$this->load->model('thmsoftblog/category');
		$data['categoryList'] = array();
		$categoryList = $this->model_thmsoftblog_category->categoryParentChildTree(); 

		foreach ($categoryList as $category) {
			$data['categoryList'][] = array(
					'category_id' => $category['category_id'],
					'name'     => $category['name'],
					'href'     => $this->url->link('thmsoftblog/category', 'thmblogcategory_id=' . $category['category_id'])
			);
		}

		return $this->load->view('extension/module/thmsoftblog_category', $data);
		

	}
}
?> 
