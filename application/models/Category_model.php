<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function read($condition = null)
	{
		if ($condition != null) {
			foreach ($condition as $key => $value) {
				$this->db->where($key,$value);
			}
		}

		$dataset=$this->db->get('design_category');

		return($dataset);
	}

}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */ ?>