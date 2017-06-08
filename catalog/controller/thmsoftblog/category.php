<?php  
class ControllerThmsoftblogCategory extends Controller {

	public function index() {

		$this->language->load('thmsoftblog/category');
		$this->load->model('tool/image');

		$this->document->addStyle('catalog/view/theme/'.$this->config->get('theme_default_directory').'/stylesheet/thmsoftblog.css');
		if (isset($this->request->get['thmblogcategory_id'])) {
			  $current_category_id = (int)$this->request->get['thmblogcategory_id'];
		} else {
			  $current_category_id = 0;
		}

		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_blog_title'),
			'href' => $this->url->link('thmsoftblog/article')
		);
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_no_pq_found'] = $this->language->get('text_no_pq_found');
		$data['publish_at_title'] = $this->language->get('publish_at_title');
		$data['publish_in_title'] = $this->language->get('publish_in_title');
		$data['publish_on_title'] = $this->language->get('publish_on_title');
		$data['text_read_more'] = $this->language->get('text_read_more');
		$data['text_tags'] = $this->language->get('text_tags');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$limit = 20;

		$filter_data = array(
				'filter_category_id' => $current_category_id,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);

		$this->load->model('thmsoftblog/category');
		$blogcategory_total = $this->model_thmsoftblog_category->getTotalBlogcategories($filter_data);	
		$category_meta = $this->model_thmsoftblog_category->getCategoryByName($filter_data);
		
		$data['articles'] = array();

		$results = $this->model_thmsoftblog_category->getArticles($filter_data);
		$data['breadcrumbs'][] = array(
			'text' => $category_meta[0]['name'],
			'href' => $this->url->link('thmsoftblog/category', 'thmblogcategory_id=' . $this->request->get['thmblogcategory_id'])
		);
		$data['heading_title_category'] = $category_meta[0]['name'];

		
		$data['tag_status'] = $this->config->get('thmsoftblog_allow_tag');
		$data['categoryname_status'] = $this->config->get('thmsoftblog_allow_categoryname');
		$this->document->setTitle($category_meta[0]['meta_title']);
		$this->document->setDescription($category_meta[0]['meta_description']);
		$this->document->setKeywords($category_meta[0]['meta_keyword']);

		foreach ($results as $result) {
			$categoryName = $this->model_thmsoftblog_category->getcategoryNamebyArticle($result['blog_id']);
			$articletags  = array();
			if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], 780, 412);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', 780, 412);
				}

				if($result['tags']) {
					$thmtags = explode( ",",$result['tags']);
					foreach( $thmtags as $tag ){
					$articletags[trim($tag)] = $this->url->link( 'thmsoftblog/search','thmtag='.trim($tag) );
					}
				} else {
					$articletags = array();
				}

				

			$data['articles'][] = array(
				'name' => $result['name'],
				'thumb' => $image,
				'tags' => $result['tags'],
				'categoryname'=>$categoryName,
				'publish_date' => $result['publish_date'],
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 600) . '..',
				'href'     => $this->url->link('thmsoftblog/article/view', 'thmblogarticle_id=' . $result['blog_id']),
				'articletags'=>$articletags
			);
		}
		
		$pagination = new Pagination();
		$pagination->total = $blogcategory_total;
		$pagination->page = $page;
		$pagination->limit = $limit;
		$pagination->url = $this->url->link('thmsoftblog/category','thmblogcategory_id=' . $this->request->get['thmblogcategory_id']. '&page={page}');
		
		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($blogcategory_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($blogcategory_total - $limit)) ? $blogcategory_total : ((($page - 1) * $limit) + $limit), $blogcategory_total, ceil($blogcategory_total / $limit));

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('thmsoftblog/category', $data));
		

	}
}
?> 
