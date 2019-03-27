<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

	public function index(){
		$this->render_page('home');
	}

	public function berita(){
		$this->render_page('berita');
	}

	public function tentang(){
		$this->render_page('tentang');
	}
}
