<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Hello;
	
	class HelloController extends Controller
	{
		public function index() {
			$this->title = 'Orbita Atletic Club';
			
			$hello = new Hello; 
			
			return $this->render('hello/index');
		}
	}
