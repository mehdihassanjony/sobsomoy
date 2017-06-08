<?php
class ModelThmsofttestimonialThmsofttestimonial extends Model {
	
	public function isTestimonialExist(){
		$exist_query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "testimonial'");
		return $exist_query->num_rows;
	}

	public function isTestimonialStore(){
		if(!$this->isTestimonialExist()){ return 0; }
		$store_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "testimonialsettings t WHERE t.key = 'testimonial_store' and find_in_set('" . (int)$this->config->get('config_store_id') . "',value)");
		return $store_query->num_rows;
	}

	public function getTestinomials($start = 0, $limit = 20) {
	 
		if(!$this->isTestimonialStore()){ return array(); }

		if ($start < 0) {$start = 0;}
		if ($limit < 1) {$limit = 20;}
		$query = $this->db->query("SELECT t.testimonial_id, t.author,t.bio, t.rating, t.text,t.image_code,t.image, t.date_added FROM " . DB_PREFIX . "testimonial t where t.status = '1' ORDER BY t.date_added DESC,t.testimonial_id DESC LIMIT " . (int)$start . "," . (int)$limit);
		return $query->rows;
	}


	public function getTotalTestimonial(){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "testimonial t WHERE t.status = '1'");

        return $query->row['total'];
	}

	public function addTestimonial($data) {

		$this->event->trigger('pre.testimonial.add', $data);
		$setting_data=$this->getTestimonialSettings();
		if(!isset($data['rating'])){
			$data['rating']=0;
		}
		if(!$setting_data['image_option_status']) $data['image_code'] = '';
		if(!$setting_data['bio_option_status']) $data['bio'] = '';
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "testimonial SET author = '" . $this->db->escape($data['name']) . "', email = '" . $this->db->escape($data['email']) . "' , text = '" . $this->db->escape($data['text']) . "', rating = '" . (int)$data['rating'] . "',image_code = '".$this->db->escape($data['image_code'])."', bio='" . $this->db->escape($data['bio']) . "', date_added = NOW()");


		$this->load->language('thmsofttestimonial/thmsofttestimonial');
		if($setting_data['emailalertowner_option_status']) { 
		// Send to admin email if email alert is enabled config_owner

			$subject_owner = sprintf($this->language->get('text_new_testimonial'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));


			$message  = $this->language->get('text_dear') .' '. ucwords($this->config->get('config_owner')).','. "\n\n";
			$message .= $this->language->get('text_website').' "'. html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8') .'" ' .$this->language->get('text_received').  "\n\n";
			$message .= $this->language->get('text_name').' '.$data['name'] . "\n";
			$message .= $this->language->get('text_email').' '.$data['email'] . "\n";
			$message .= $this->language->get('text_testimonial').' '.$data['text'] . "\n\n";
			$message .= $this->language->get('text_waiting') . "\n\n";
			$message .=$this->language->get('text_regards')."\n";
			$message .=$this->language->get('text_administrator')."\n";
			$message .=$this->config->get('config_url');

			$mail = new Mail();
			$mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
			$mail->smtp_username = $this->config->get('config_mail_smtp_username');
			$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
			$mail->smtp_port = $this->config->get('config_mail_smtp_port');
			$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

			$mail->setTo($this->config->get('config_email'));
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
			$mail->setSubject($subject_owner);
			$mail->setText($message);
			$mail->send();


			// Send to additional alert emails
			$emails = explode(',', $this->config->get('config_alert_email'));

			foreach ($emails as $email) {
				if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$mail->setTo($email);
					$mail->send();
				}
			}


	
		}
		if($setting_data['emailalertcustomer_option_status']) { 

			$subject_customer = sprintf($this->language->get('text_thank_for_testimonial'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));

			$message  = $this->language->get('text_dear').' '.ucwords($data['name']).','."\n\n";
			//$message .=$this->language->get('text_you_have_written').' '.html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8') . "\n\n";
			//$message .= $this->language->get('text_testimonial') . ' ' . $data['text'] . "\n\n";
			//$message .= $this->language->get('text_waiting') . "\n";
			$message .=$this->language->get('text_thank_you_for_review')."\n\n";
			$message .=$this->language->get('text_regards')."\n";
			$message .=$this->language->get('text_administrator')."\n";
			$message .=$this->config->get('config_url');

			$mail = new Mail();
			$mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
			$mail->smtp_username = $this->config->get('config_mail_smtp_username');
			$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
			$mail->smtp_port = $this->config->get('config_mail_smtp_port');
			$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

			$mail->setTo($data['email']);
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
			$mail->setSubject($subject_customer);
			$mail->setText($message);
			$mail->send();
		}



		$testimonial_id = $this->db->getLastId();

//		$this->event->trigger('post.testimonial.add', $testimonial_id);
	}

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
			return $this->config->get('config_ssl') . 'image/' . $new_image;
		} else {
			return $this->config->get('config_url') . 'image/' . $new_image;
		}
	}

}