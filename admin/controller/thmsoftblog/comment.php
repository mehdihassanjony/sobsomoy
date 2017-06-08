<?php
class ControllerThmsoftblogComment extends Controller {

	private $error = array();

	public function index() { 
		$this->load->language('thmsoftblog/comment');
		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('thmsoftblog/comment');

		$this->getList();

	}
	public function edit() {

		$this->load->language('thmsoftblog/comment');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('thmsoftblog/comment');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) { 
			$this->model_thmsoftblog_comment->editComment($this->request->get['comment_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getForm();
	}
	public function delete() {
		$this->load->language('thmsoftblog/comment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('thmsoftblog/comment');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $comment_id) {
				$this->model_thmsoftblog_comment->deleteComment($comment_id);
			}

			$this->session->data['delete_success'] = $this->language->get('text_delete_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getList();
	}
	protected function getList() {

		if (isset($this->request->get['filter_article'])) {
			$filter_article = $this->request->get['filter_article'];
		} else {
			$filter_article = null;
		}

		if (isset($this->request->get['filter_author'])) {
			$filter_author = $this->request->get['filter_author'];
		} else {
			$filter_author = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else { $sort = 'mbc.created_at';}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else { $order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';
    
		if (isset($this->request->get['filter_article'])) {
			$url .= '&filter_article=' . urlencode(html_entity_decode($this->request->get['filter_article'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . $url, true)
		);
		$data['add'] = $this->url->link('thmsoftblog/comment/add', 'token=' . $this->session->data['token'] . $url, true);
		$data['delete'] = $this->url->link('thmsoftblog/comment/delete', 'token=' . $this->session->data['token'] . $url, true);
		
		$data['articlecomments'] = array();
		$filter_data = array(
			'filter_article'    => $filter_article,
			'filter_author'     => $filter_author,
			'filter_status'     => $filter_status,
			'filter_date_added' => $filter_date_added,
			'sort'              => $sort,
			'order'             => $order,
			'start'             => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'             => $this->config->get('config_limit_admin')
		);

		$comment_total = $this->model_thmsoftblog_comment->getTotalComments($filter_data);


		$results = $this->model_thmsoftblog_comment->getArticleComments($filter_data);

		$this->load->language('thmsoftblog/comment');

		foreach ($results as $result) {
			$data['articlecomments'][] = array(
				'comment_id'  => $result['comment_id'],
				'blog_id'  => $result['blog_id'],
				'name'  => $result['name'],
				'comment'     => $result['comment'],
				'user'     => $result['user'],
				'created_at' => date($this->language->get('date_format_short'), strtotime($result['created_at'])),
				'rating'     => $result['rating'],
				'status'     => ($result['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
				'edit'       => $this->url->link('thmsoftblog/comment/edit', 'token=' . $this->session->data['token'] . '&comment_id=' . $result['comment_id'] . $url, true)
				
			);
		}
	  
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['column_articlename'] = $this->language->get('column_articlename');
		$data['column_user'] = $this->language->get('column_user');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_rating'] = $this->language->get('column_rating');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_action'] = $this->language->get('column_action');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_answer'] = $this->language->get('button_answer');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
		$data['text_delete_success'] = $this->language->get('text_delete_success');
		$data['entry_article'] = $this->language->get('entry_article');
		$data['entry_author'] = $this->language->get('entry_author');
		$data['entry_rating'] = $this->language->get('entry_rating');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_date_added'] = $this->language->get('entry_date_added');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$data['sort_articlename'] = $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . '&sort=md.name' . $url, true);
		$data['sort_user'] = $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . '&sort=mbc.user' . $url, true);
		$data['sort_status'] = $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . '&sort=mbc.status' . $url, true);
		$data['sort_createdat'] = $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . '&sort=mbc.created_at' . $url, true);

		$url = '';

		
		if (isset($this->request->get['filter_article'])) {
			$url .= '&filter_article=' . urlencode(html_entity_decode($this->request->get['filter_article'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}


		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $comment_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($comment_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($comment_total - $this->config->get('config_limit_admin'))) ? $comment_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $comment_total, ceil($comment_total / $this->config->get('config_limit_admin')));

		$data['filter_article'] = $filter_article;
		$data['filter_author'] = $filter_author;
		$data['filter_status'] = $filter_status;
		$data['filter_date_added'] = $filter_date_added;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('thmsoftblog/comment', $data));

	}
	
	protected function getForm() {

		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_form'] = !isset($this->request->get['commnet_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_default_category'] = $this->language->get('text_default_category');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_rating'] = $this->language->get('column_rating');
		$data['entry_author'] = $this->language->get('entry_author');
		$data['entry_blog'] = $this->language->get('entry_blog');
		$data['entry_article'] = $this->language->get('entry_article');
		$data['entry_comment'] = $this->language->get('entry_comment');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_rating'] = $this->language->get('entry_rating');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_links'] = $this->language->get('tab_links');
		$data['help_blog'] = $this->language->get('help_blog');

		if (isset($this->error['warning'])) { $data['error_warning'] = $this->error['warning'];
		} else { $data['error_warning'] = '';}

		if (isset($this->error['blog'])) {
			$data['error_blog'] = $this->error['blog'];
		} else {
			$data['error_blog'] = '';
		}

		if (isset($this->error['user'])) {
			$data['error_user'] = $this->error['user'];
		} else {
			$data['error_user'] = '';
		}

		if (isset($this->error['comment'])) {
			$data['error_comment'] = $this->error['comment'];
		} else {
			$data['error_comment'] = '';
		}
		if (isset($this->error['rating'])) {
			$data['error_rating'] = $this->error['rating'];
		} else {
			$data['error_rating'] = '';
		}
		

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . $url, true)
		);
		
		if (!isset($this->request->get['comment_id'])) {
			$data['action'] = $this->url->link('thmsoftblog/comment/add', 'token=' . $this->session->data['token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('thmsoftblog/comment/edit', 'token=' . $this->session->data['token'] . '&comment_id=' . $this->request->get['comment_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'] . $url, true);

		$this->load->model('thmsoftblog/comment');

		if (isset($this->request->get['comment_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$comment_info = $this->model_thmsoftblog_comment->getBlogcomment($this->request->get['comment_id']);
		}
		 
		$data['token'] = $this->session->data['token'];
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		if (isset($this->request->post['comment'])) {
			$data['comment'] = $this->request->post['comment'];
		} elseif (!empty($comment_info)) {
			$data['comment'] = $comment_info['comment'];
		} else {
			$data['comment'] = '';
		}
		
		/*$data['parentcategory'] = $this->model_thmsoftblog_comment->getBlogall(0);

		if (isset($this->request->post['blog_id'])) {
			$data['blog_id'] = $this->request->post['blog_id'];
		} elseif (isset($comment_info)) {
			$data['blog_id'] = $comment_info['blog_id'];
		} else {
			$data['blog_id'] = '';
		}*/
		if (isset($this->request->post['blog_id'])) {
			$data['blog_id'] = $this->request->post['blog_id'];
		} elseif (!empty($comment_info)) {
			$data['blog_id'] = $comment_info['blog_id'];
		} else {
			$data['blog_id'] = '';
		}

		if (isset($this->request->post['blog'])) {
			$data['blog'] = $this->request->post['blog'];
		} elseif (!empty($comment_info)) {
			$data['blog'] = $comment_info['blog'];
		} else {
			$data['blog'] = '';
		}

		if (isset($this->request->post['user'])) {
			$data['user'] = $this->request->post['user'];
		} elseif (!empty($comment_info)) {
			$data['user'] = $comment_info['user'];
		} else {
			$data['user'] = '';
		}
		if (isset($this->request->post['rating'])) {
			$data['rating'] = $this->request->post['rating'];
		} elseif (!empty($comment_info)) {
			$data['rating'] = $comment_info['rating'];
		} else {
			$data['rating'] = '';
		}
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($comment_info)) {
			$data['status'] = $comment_info['status'];
		} else {
			$data['status'] = true;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('thmsoftblog/comment_form', $data));
	}

	public function add() { 
		$this->language->load('thmsoftblog/comment');
		
		$this->load->model('thmsoftblog/comment');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) { 
			$this->model_thmsoftblog_comment->addComment($this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->response->redirect($this->url->link('thmsoftblog/comment', 'token=' . $this->session->data['token'], true));
		}

		$this->getForm();
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'thmsoftblog/comment')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!$this->request->post['blog']) {
			$this->error['blog'] = $this->language->get('error_blog');
		}
		if ((utf8_strlen($this->request->post['user']) < 3) || (utf8_strlen($this->request->post['user']) > 64)) {
			$this->error['user'] = $this->language->get('error_user');
		}
		if (utf8_strlen($this->request->post['comment']) < 1) {
			$this->error['comment'] = $this->language->get('error_comment');
		}
		if (!isset($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
			$this->error['rating'] = $this->language->get('error_rating');
		}
	return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'thmsoftblog/comment')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function autocomplete() {
			$json = array();
			
			if (isset($this->request->get['article_name'])) {
				
				if (isset($this->request->get['article_name'])) {
					$article_name = $this->request->get['article_name'];
				} else {
					$article_name = '';
				}
				
				$this->load->model('thmsoftblog/article');
				$data = array('filter_article' => $article_name);
				$results = $this->model_thmsoftblog_article->getArticles($data);
				
				foreach ($results as $result) {
										
					$json[] = array(
						'blog_id' 	=> $result['blog_id'],
						'name'       		=> strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))	
					);	
				}						
			}
	
			$this->response->setOutput(json_encode($json));
		}
	
}
 
