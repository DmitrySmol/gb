<?php

class Testimonial extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'testimonials';
	}

	public function getAll($order = 'created_at')
	{
	    $sort = " DESC";
	    if($order != 'created_at') {
            $sort = " ASC";
        }
		$sql = "SELECT * FROM " . $this->table . " ORDER BY " . $order . $sort;

		return $this->db->query($sql);
	}

	public function add($data)
	{
		$data = cleanData($data);

        $data['phone'] = '+(375) ' . $data['phone'];
		$data['published'] = 0;
		$now = date('Y-m-d H:i:s');
		$data['created_at'] = $now;
		$data['modified_at'] = $now;

		return $this->create($data);
	}
}