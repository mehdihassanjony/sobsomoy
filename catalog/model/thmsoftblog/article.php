<?php
class ModelThmsoftblogArticle extends Model {

	 public function getTotalArticles($data = array()){
		$sql = "SELECT COUNT(mb.blog_id) as total FROM " . DB_PREFIX . "thmsoftblog mb
					   LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
                                           LEFT JOIN " . DB_PREFIX . "thmsoftblog_to_store mb2s ON (mb.blog_id = mb2s.blog_id) 
                                           WHERE mbd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND mb2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND mb.status = '1'";
		

		
		$sql = $this->db->query($sql);

		 return $sql->row['total'];
	}


	public function getArticles($data = array()){
		$sql = "SELECT * FROM " . DB_PREFIX . "thmsoftblog mb
					   LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
                                           LEFT JOIN " . DB_PREFIX . "thmsoftblog_to_store mb2s ON (mb.blog_id = mb2s.blog_id) 
                                           WHERE mbd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND mb2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND mb.status = '1'";
		
	       $sql .= " ORDER BY mb.display_order ASC, mb.publish_date DESC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$sql = $this->db->query($sql);

		return $sql->rows;
	}

	public function getArticleview($current_article_id){
	
	      $sql = "SELECT * FROM " . DB_PREFIX . "thmsoftblog mb
			LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
		      WHERE mb.blog_id = '" . (int)$current_article_id . "' AND mbd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
	      $sql = $this->db->query($sql);
	      		return $sql->rows;
	}

	public function addComment($thmblogarticle_id, $data) {		
		$this->event->trigger('pre.comment.add', $data);

		$this->db->query("INSERT INTO " . DB_PREFIX . "thmsoftblog_comment SET user = '" . $this->db->escape($data['name']) . "', blog_id = '" . (int)$thmblogarticle_id. "',  comment = '" . $this->db->escape($data['text']) . "', rating = '" . (int)$data['rating'] . "', created_at = NOW()");

		$comment_id = $this->db->getLastId();

		//$this->event->trigger('post.comment.add', $comment_id);
	}
	
	public function getCommentsByArticleId($thmblogarticle_id, $start = 0, $limit = 20) {

		if ($start < 0) {
			$start = 0;
		}

		if ($limit < 1) {
			$limit = 20;
		}

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "thmsoftblog_comment mbc LEFT JOIN " . DB_PREFIX . "thmsoftblog mb ON (mbc.blog_id = mb.blog_id) LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
					   WHERE mb.blog_id = '" . (int)$thmblogarticle_id . "' AND mbc.status = '1' 
					   AND mbd.language_id = '" . (int)$this->config->get('config_language_id') . "' 
					   ORDER BY mbc.created_at DESC LIMIT " . (int)$start . "," . (int)$limit);

		return $query->rows;
	}

	public function getTotalCommentsByArticleId($thmblogarticle_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "thmsoftblog_comment mbc LEFT JOIN " . DB_PREFIX . "thmsoftblog mb ON (mbc.blog_id = mb.blog_id) LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
					   WHERE mb.blog_id = '" . (int)$thmblogarticle_id . "' AND mbc.status = '1' 
					   AND mbd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row['total'];
	}
      
	public function getTotalArticlesByTag($data = array()){
		$sql = "SELECT COUNT(mb.blog_id) as total FROM " . DB_PREFIX . "thmsoftblog mb
					   LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
                                           LEFT JOIN " . DB_PREFIX . "thmsoftblog_to_store mb2s ON (mb.blog_id = mb2s.blog_id) 
                                           WHERE mbd.tags LIKE '%" . $this->db->escape($data['filter_tag']) . "%' AND mbd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND mb2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND mb.status = '1'";

		$sql .= " ORDER BY mb.display_order ASC, mb.publish_date DESC";

		
		$sql = $this->db->query($sql);

		 return $sql->row['total'];
	}

	public function getArticlesByTag($data = array()){
		$sql = "SELECT * FROM " . DB_PREFIX . "thmsoftblog mb
					   LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
                                           LEFT JOIN " . DB_PREFIX . "thmsoftblog_to_store mb2s ON (mb.blog_id = mb2s.blog_id) 
                                           WHERE mbd.tags LIKE '%" . $this->db->escape($data['filter_tag']) . "%' AND mbd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND mb2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND mb.status = '1'";

		$sql .= " ORDER BY mb.display_order ASC, mb.publish_date DESC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		$sql = $this->db->query($sql);

		return $sql->rows;
	}
 
	public function getArticlesByFeed($data = array()){
		$sql = "SELECT * FROM " . DB_PREFIX . "thmsoftblog mb
					   LEFT JOIN " . DB_PREFIX . "thmsoftblog_description mbd ON (mb.blog_id = mbd.blog_id) 
                                           LEFT JOIN " . DB_PREFIX . "thmsoftblog_to_store mb2s ON (mb.blog_id = mb2s.blog_id) 
                                           WHERE mbd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND mb2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND mb.status = '1'";
		
	       $sql .= " ORDER BY mb.display_order ASC, mb.publish_date DESC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$sql = $this->db->query($sql);

		return $sql->rows;
	}

	public function getcategoryNamebyArticle($thmblogarticle_id){ 
	   $sql="SELECT mbd.name as categoryname,mbc.category_id as categoryid FROM " . DB_PREFIX . "thmsoftblog_to_category mbc  
					 LEFT JOIN " . DB_PREFIX . "thmsoftblogcategory_description mbd ON (mbc.category_id = mbd.category_id) 
					   WHERE mbc.blog_id = '" . (int)$thmblogarticle_id . "' GROUP BY mbc.category_id";
	     $query = $this->db->query($sql); 
	     $result='';
	      
	      if($query->rows){
		  foreach ($query->rows as $row) {
			  $categoryid=$row['categoryid'];
			  $link=$this->url->link('thmsoftblog/category', 'thmblogcategory_id=' . $categoryid);
		        $result .= '<a href="'.$link.'">'.$row['categoryname'].'</a>,';
		  }
			return substr($result, 0, -1);
	      }
	  
					   
	}


		public function getRelatedProduct($blog_id){
		$product_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "thmsoftblog_related_product pr LEFT JOIN " . DB_PREFIX . "product p ON (pr.related_product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pr.blog_id = '" . (int)$blog_id . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		foreach ($query->rows as $result) {
		$product_data[$result['related_product_id']] = $this->getProduct($result['related_product_id']);
		}
		return $product_data;
    }



        public function getProduct($product_id) {
		$query = $this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id AND r2.status = '1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return array(
				'product_id'       => $query->row['product_id'],
				'name'             => $query->row['name'],
				'description'      => $query->row['description'],
				'meta_title'       => $query->row['meta_title'],
				'meta_description' => $query->row['meta_description'],
				'meta_keyword'     => $query->row['meta_keyword'],
				'tag'              => $query->row['tag'],
				'model'            => $query->row['model'],
				'sku'              => $query->row['sku'],
				'upc'              => $query->row['upc'],
				'ean'              => $query->row['ean'],
				'jan'              => $query->row['jan'],
				'isbn'             => $query->row['isbn'],
				'mpn'              => $query->row['mpn'],
				'location'         => $query->row['location'],
				'quantity'         => $query->row['quantity'],
				'stock_status'     => $query->row['stock_status'],
				'image'            => $query->row['image'],
				'manufacturer_id'  => $query->row['manufacturer_id'],
				'manufacturer'     => $query->row['manufacturer'],
				'price'            => ($query->row['discount'] ? $query->row['discount'] : $query->row['price']),
				'special'          => $query->row['special'],
				'reward'           => $query->row['reward'],
				'points'           => $query->row['points'],
				'tax_class_id'     => $query->row['tax_class_id'],
				'date_available'   => $query->row['date_available'],
				'weight'           => $query->row['weight'],
				'weight_class_id'  => $query->row['weight_class_id'],
				'length'           => $query->row['length'],
				'width'            => $query->row['width'],
				'height'           => $query->row['height'],
				'length_class_id'  => $query->row['length_class_id'],
				'subtract'         => $query->row['subtract'],
				'rating'           => round($query->row['rating']),
				'reviews'          => $query->row['reviews'] ? $query->row['reviews'] : 0,
				'minimum'          => $query->row['minimum'],
				'sort_order'       => $query->row['sort_order'],
				'status'           => $query->row['status'],
				'date_added'       => $query->row['date_added'],
				'date_modified'    => $query->row['date_modified'],
				'viewed'           => $query->row['viewed']
			);
		} else {
			return false;
		}
	}


	public function getRelatedArticle($blog_id) {
	$related_article_data = array();

	$checkBlogTable_ra = "SHOW TABLES LIKE '".DB_PREFIX."thmsoftblog_related_article' ";
	$queryBlog_ra=$this->db->query($checkBlogTable_ra);
	if($queryBlog_ra->num_rows!=0){	

	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "thmsoftblog_related_article  WHERE blog_id = '" . (int)$blog_id . "'");
	foreach ($query->rows as $result) {
		// echo "<pre>";
		// print_r($result);
	$related_article_data[$result['related_blog_id']] =  $this->getArticleview($result['related_blog_id'])[0];
	}
	//echo "<pre>";
//print_r($related_article_data);exit();
	}
	return $related_article_data;
	}
	
} 
