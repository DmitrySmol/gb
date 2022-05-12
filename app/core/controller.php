<?php

class Controller
{
    protected $output;
	protected $data = [];

	public function __construct()
	{
		if ( isset($_SESSION['user']) ) {
			$this->data['user'] = $_SESSION['user'];
		}
	}

	public function model($model)
	{
		require_once '../app/model/' . $model . '.php';
		return new $model();
	}

	public function view($subview, $data = [])
	{
		$data['subview'] = '../app/view/' . $subview . '.php';
		extract($data);
		require_once '../app/view/layout.php';
	}

    public function render($view, $data = [])
    {
        extract($data);
        ob_start();
        require_once '../app/view/' . $view . '.php';
        $this->output = ob_get_contents();
        ob_end_clean();
        return $this->output;
    }

	public function show404()
	{
		$this->view('404');
		exit();
	}
}