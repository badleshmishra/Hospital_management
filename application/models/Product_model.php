<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function read($condition = null)
	{
		if ($condition != null) {
			foreach ($condition as $key => $value) {
				$this->db->where($key,$value);
			}
		}

		$dataset=$this->db->get('design');

		return($dataset);
	}

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */ ?>