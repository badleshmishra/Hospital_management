<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

	public function read($condition = null)
	{
		if ($condition != null) {
			foreach ($condition as $key => $value) {
				$this->db->where($key,$value);
			}
		}

		$dataset=$this->db->get('sa_city');

		return($dataset);
	}

}

/* End of file City_model.php */
/* Location: ./application/models/City_model.php */ ?>