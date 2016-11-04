<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends Application
{
	public function index() {		
	$result = '';
        $this->data['userrole'] = $this->session->userdata('userrole');
        if ($this->data['userrole'] == NULL) {
            $this->data['userrole'] = '?';
        }
        else if($this->data['userrole'] == 'admin') {
        	$result = 'Admin entered';
        }
        else if($this->data['userrole'] == 'user') {
        	$result = 'Admin only no user';
        }
        $this->data['content'] = $result;
	    $this->render();
	}
}