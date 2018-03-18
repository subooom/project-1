<?php

class View
{
	protected $viewsDir = __DIR__ . '/../../views/';

	public function load($viewName, $ext = '.php')
	{
		require($this->path($viewName . $ext));
	}

	public function with($data)
	{
		$_GET['id'] = $data;

		return $this;
	}
	public function parse($data)
	{
		$_POST = $data;

		return $this;
	}

	protected function path($viewName)
	{
		return $this->viewsDir . $viewName;
	}
}
