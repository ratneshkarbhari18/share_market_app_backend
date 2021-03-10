<?php

namespace App\Controllers;
use App\Models\NotifModel;

class PageLoader extends BaseController
{

	private function page_loader($viewName,$data){
		echo view("templates/header",$data);
		echo view("pages/".$viewName,$data);
		echo view("templates/footer",$data);
	}

	public function dashboard(){
		$session = session();

		$logged_in = $session->get("logged_in");

		if(!isset($logged_in)){
			return redirect()->route('login');
		}

		$data = array("title"=>"Dashboard");
		
		$this->page_loader("dashboard",$data);
	}

	public function add_new_notif($success="",$error=""){
		$session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
		$data = array(
			"title" => "Add New Notification",
			"success" => $success,
			"error" => $error,
		);
		$this->page_loader("add_new_notif",$data);
	}

	public function login($error=""){
		$data = array(
			"title" => "Login",
			"error" => $error
		);
		$this->page_loader("login",$data);
	}

	public function notifications($success="",$error="")	{
		$session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
		$notificationModel = new NotifModel();
		$notifications = array_reverse($notificationModel->orderBy('id', 'desc')->findAll(10,0));
		$data = array(
			"title" => "Notifications",
			"notifications" => $notifications,
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("manage_notifications",$data);
	}

}
