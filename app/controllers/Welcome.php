<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Welcome extends Controller {
	public function index() {
		$this->call->view('welcome_page');
	}
	public function profile($fname, $lname) {
		$data['lanme'] = $lname;
		$data['fname'] = $fname;
		$this->call->view('profile', $data);
	}
}
?>