<?php
class ModelCatalogTestimonial extends Model {
	
	public function getTestimonialSettings(){
		$setting_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonialsettings");
		foreach ($query->rows as $result) {
				$setting_data[$result['key']] = $result['value'];
    	}

    	$setting_data['testimonial_title']='';
    	$setting_data['testimonial_description']='';
    	$t_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonial_description WHERE language_id = '" . (int)$this->config->get('config_language_id') . "'");
		foreach ($t_query->rows as $t_result) {
			$setting_data['testimonial_title'] = $t_result['title'];
			$setting_data['testimonial_description'] =  html_entity_decode($t_result['description'], ENT_QUOTES, 'UTF-8');
		}

		return $setting_data;
	}


	public function addTestimonial($data) {
		
		$this->event->trigger('pre.admin.testimonial.add', $data);

		$data['image_code']='';
		
		$setting_data=$this->getTestimonialSettings();
		if(!isset($data['rating'])){
			$data['rating']=0;
		}
		if(!$setting_data['image_option_status']) $data['image'] = '';
		if(!$setting_data['bio_option_status']) $data['bio'] = '';

		if($data['date_added']){
			
		$this->db->query("INSERT INTO " . DB_PREFIX . "testimonial SET author = '" . $this->db->escape($data['author']) . "',email = '" . $this->db->escape($data['email']) . "', text = '" . $this->db->escape(strip_tags($data['text'])) . "',bio = '" . $this->db->escape($data['bio']) . "' ,rating = '" . (int)$data['rating'] . "', status = '" . (int)$data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "'");
		}

		$testimonial_id = $this->db->getLastId();

		if (isset($data['image']) && $data['image']!='') {
			$this->db->query("UPDATE " . DB_PREFIX . "testimonial SET image = '" . $this->db->escape($data['image']) . "', image_code = '' WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		}elseif(isset($data['no_image']) && $data['no_image']=='no_image.png'){
			$this->db->query("UPDATE " . DB_PREFIX . "testimonial SET image = '" . $this->db->escape($data['no_image']) . "', image_code = '' WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		}

		

		
		$this->event->trigger('post.admin.testimonial.add', $testimonial_id);

		return $testimonial_id;
	}

	public function editTestimonial($testimonial_id, $data) {

 		$this->event->trigger('pre.admin.testimonial.edit', $data);

 		$setting_data=$this->getTestimonialSettings();
 		if(!$setting_data['bio_option_status']) $data['bio'] = '';

		$this->db->query("UPDATE " . DB_PREFIX . "testimonial SET author = '" . $this->db->escape($data['author']) . "',email = '" . $this->db->escape($data['email']) . "', text = '" . $this->db->escape(strip_tags($data['text'])) . "',bio = '" . $this->db->escape($data['bio']) . "', rating = '" . (int)$data['rating'] . "', status = '" . (int)$data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', date_modified = NOW() WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		
		if (isset($data['image']) && $data['image']!='') {
			$this->db->query("UPDATE " . DB_PREFIX . "testimonial SET image = '" . $this->db->escape($data['image']) . "', image_code = '' WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		}elseif(isset($data['no_image']) && $data['no_image']=='no_image.png'){
			$this->db->query("UPDATE " . DB_PREFIX . "testimonial SET image = '" . $this->db->escape($data['no_image']) . "', image_code = '' WHERE testimonial_id = '" . (int)$testimonial_id . "'");
		}

		$this->event->trigger('post.admin.testimonial.edit', $testimonial_id);
	}

	public function deleteTestimonial($testimonial_id) {
		$this->event->trigger('pre.admin.testimonial.delete', $testimonial_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "testimonial WHERE testimonial_id = '" . (int)$testimonial_id . "'");

		$this->event->trigger('post.admin.testimonial.delete', $testimonial_id);
	}

	public function getTestimonial($testimonial_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "testimonial t WHERE t.testimonial_id = '" . (int)$testimonial_id . "'");

		return $query->row;
	}

	public function getTestimonials($data = array()) {
		$sql = "SELECT t.testimonial_id, t.author, t.rating, t.status, t.date_added,t.image,t.image_code FROM " . DB_PREFIX . "testimonial t WHERE 1";


		if (!empty($data['filter_author'])) {
			$sql .= " AND t.author LIKE '" . $this->db->escape($data['filter_author']) . "%'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND t.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(t.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$sort_data = array(
			't.author',
			't.rating',
			't.status',
			't.date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY t.date_added";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		$sql .= ", testimonial_id DESC";
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getTotalTestimonials($data = array()) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testimonial t WHERE 1";

		if (!empty($data['filter_author'])) {
			$sql .= " AND t.author LIKE '" . $this->db->escape($data['filter_author']) . "%'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND t.status = '" . (int)$data['filter_status'] . "'";
		}

		if (!empty($data['filter_date_added'])) {
			$sql .= " AND DATE(t.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getTotalTestimonialsAwaitingApproval() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testimonial WHERE status = '0'");

		return $query->row['total'];
	}

	public function createTables(){

		$exist_query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "testimonial'");
		$isTestimonialExist=$exist_query->num_rows;

		    $createTestimonialTable = "
			  CREATE TABLE IF NOT EXISTS `".DB_PREFIX."testimonial` (
			  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
			  `author` varchar(64) NOT NULL,
			  `email` varchar(96) NOT NULL,
			  `bio` varchar(100) NOT NULL,
			  `text` text NOT NULL,
			  `rating` int(1) NOT NULL,
			  `status` tinyint(1) NOT NULL DEFAULT '0',
			  `image` varchar(500) NOT NULL,
			  `image_code` text NOT NULL,
			  `date_added` date NOT NULL,
			  `date_modified` datetime NOT NULL,
			  PRIMARY KEY (`testimonial_id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;";
			$this->db->query($createTestimonialTable);
		
			$createTestimonialSettingsTable = "
			CREATE TABLE IF NOT EXISTS `".DB_PREFIX."testimonialsettings` (
			`testimonialsettings_id` int(11) NOT NULL AUTO_INCREMENT,
			`key` varchar(64) NOT NULL,
			`value` text NOT NULL,
			PRIMARY KEY (`testimonialsettings_id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;";
			$this->db->query($createTestimonialSettingsTable);

			//insert default values for  testimonialsettings
			$check_entries = "SELECT * FROM ".DB_PREFIX."testimonialsettings";
			$isexist_entries=$this->db->query($check_entries);

			if($isexist_entries->num_rows==0){ 
			
			$default_values="	
				INSERT INTO `".DB_PREFIX."testimonialsettings` (`testimonialsettings_id`, `key`, `value`) VALUES
				(1, 'testimonialsettings_status', '1'),
				(2, 'testimonial_guest', '1'),
				(3, 'display_date_added', '1'),
				(4, 'display_author_bio', '1'),
				(5, 'display_rating', '1'),
				(6, 'display_image', '1'),
				(7, 'items_limit', '5'),
				(8, 'rating_option_status', '1'),
				(9, 'rating_required_status', '0'),
				(10, 'bio_option_status', '1'),
				(11, 'bio_required_status', '0'),
				(12, 'image_option_status', '1'),
				(13, 'image_required_status', '0'),
				(14, 'captcha_status', '0'),
				(15, 'testimonial_store', '0'),
				(16, 'emailalertowner_option_status', '0'),
				(17, 'emailalertcustomer_option_status', '0');";

			$this->db->query($default_values);
			}

			$createTestimonialDescriptionTable = "
			  CREATE TABLE IF NOT EXISTS `".DB_PREFIX."testimonial_description` (
			  `language_id` int(11) NOT NULL,
			  `title` varchar(255) NOT NULL,
			  `description` text NOT NULL
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
			$this->db->query($createTestimonialDescriptionTable);

			//insert default values for testimonial_description
			if(!$isTestimonialExist){ 
			$default_desc_values="
			INSERT INTO `".DB_PREFIX."testimonial_description` (`language_id`, `title`, `description`) VALUES
			(1, 'Title', 'Description goes here..');";
			$this->db->query($default_desc_values);
			}
				
		}

public function resize($filename, $width, $height) {
			$filename = 'catalog/thmsofttestimonial/'.$filename;
		if (!is_file(DIR_IMAGE . $filename)) {
			return;
		}

		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		$old_image = $filename;
		$new_image = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;

		if (!is_file(DIR_IMAGE . $new_image) || (filectime(DIR_IMAGE . $old_image) > filectime(DIR_IMAGE . $new_image))) {
			$path = '';

			$directories = explode('/', dirname(str_replace('../', '', $new_image)));

			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;

				if (!is_dir(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}
			}

			list($width_orig, $height_orig) = getimagesize(DIR_IMAGE . $old_image);

			if ($width_orig != $width || $height_orig != $height) {
				$image = new Image(DIR_IMAGE . $old_image);
				$image->resize($width, $height);
				$image->save(DIR_IMAGE . $new_image);
			} else {
				copy(DIR_IMAGE . $old_image, DIR_IMAGE . $new_image);
			}
		}

		if ($this->request->server['HTTPS']) {
			return HTTPS_CATALOG . 'image/' . $new_image;
		} else {
			return HTTP_CATALOG . 'image/' . $new_image;
		}
	}


}