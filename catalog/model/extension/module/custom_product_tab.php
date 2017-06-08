<?php
class ModelExtensionModuleCustomProductTab extends Model {

	
		public function getCustomTabDescriptions($product_id) {
			

			
			$customtab_description_data = array();
			$result = $this->db->query("SELECT * FROM `" . DB_PREFIX . "extension` WHERE `code` = 'custom_product_tab'");
			$checkcustomTable = "SHOW TABLES LIKE '".DB_PREFIX."thmsoft_productcustomtab' ";
			$queryCustom=$this->db->query($checkcustomTable);
			if($queryCustom->num_rows!=0) {

			 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "thmsoft_productcustomtab mpct WHERE mpct.product_id = '" . (int)$product_id . "'");

			$info = $query->rows;
			if(isset($info[0]['value']))
			{
		       		$customtab = json_decode($info[0]['value'],true);
				
				  foreach ($customtab['custom_product_tab'] as $product_customtab) {
					foreach ($product_customtab['customtab_description'] as $key => $value) {
						$description[$key]=array('description'=>$value['description']);
						}
					foreach ($product_customtab['customtab_title'] as $key => $value) {
					$title[$key]=array('title'=>$value['title']);
					}	
					
				
					$customtab_description_data[] = array(
						'customtab_title'       => $title,
						'customtab_status'      => $product_customtab['customtab_status'],
						'customtab_description' => $description				
					);
				}
					
			}

		} 
		else {
			   
			}
			return $customtab_description_data;
		}	
		
}
?>