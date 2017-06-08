<?php
class ModelExtensionModuleCustomProductTab extends Model {

	public function createtableCustomTabs() {
		
				$checkcustomTable = "SHOW TABLES LIKE '".DB_PREFIX."thmsoft_productcustomtab' ";
				$queryCustom=$this->db->query($checkcustomTable);
				if($queryCustom->num_rows==0){
				    $createCustomTable = "
					CREATE TABLE " . DB_PREFIX . "thmsoft_productcustomtab (
				   `cust_id` int(11) NOT NULL AUTO_INCREMENT,
					`product_id` int(11) NOT NULL ,
					`value` text NOT NULL,
					PRIMARY KEY (`cust_id`)) default CHARSET=utf8";
					$this->db->query($createCustomTable);
				}
				
		}
		public function getCustomTabDescriptions($product_id) {

			
			$customtab_description_data = array();
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "thmsoft_productcustomtab mpct WHERE mpct.product_id = '" . (int)$product_id . "'");
			

			$info = $query->rows;
			//print_r($info);exit();
			if(isset($info[0]['value']))
			{
       		$customtab = json_decode($info[0]['value'],true);
		
		  foreach ($customtab['custom_product_tab'] as $product_customtab) {
			//echo "<pre>";print_r($product_customtab);exit();
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
		return $customtab_description_data;
		}
		
		public function addproductcustomtabs($data)
		{
			$this->db->query("DELETE from " . DB_PREFIX . "thmsoft_productcustomtab where  product_id = '" . (int)$data['product_id'] . "'");
			if(isset($data['custom_product_tab']))			
			{
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "thmsoft_productcustomtab SET product_id = '" . (int)$data['product_id'] . "', `value` = '" . $this->db->escape(json_encode($data)) . "' ");
			}
		}
		public function uninstallProductcustomtabs($data)
		{
			
				$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "thmsoft_productcustomtab`");
		
		}
}
?>