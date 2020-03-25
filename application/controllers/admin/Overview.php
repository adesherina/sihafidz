<?php

class Overview extends CI_Controller {
    public function _construct()
    {
		parent::_construct();
		$this->load->model("Santri_model");
		if($this->Santri_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("admin/overview");
	}
}
?>