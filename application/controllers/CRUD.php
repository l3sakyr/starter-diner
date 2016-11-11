<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crud extends Application
{
	public function index() {		
		$this->data['pagebody'] = 'mtce';//added//
	
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
		$this->data['items'] = $this->menu->all();//added//
        $this->data['content'] = $result;
	    $this->render();
	}
	public function edit($id=null) {
		//session
		$key = $this->session->userdata('key');
		$record = $this->session->userdata('record');
		
		//db
		if(empty($key)){
			$record = $this->menu->get($id);
			$key = $id;
			$this->session->set_userdata('key',$id);
			$this->session->set_userdata('record',$record);
		}
		
		$this->data['content'] = "Looking at " . $key . ':' . $record->name;
		$this->render();
	}
}