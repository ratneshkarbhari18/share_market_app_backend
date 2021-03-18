<?php

namespace App\Controllers;
use App\Models\NotifModel;
use App\Models\AuthModel;

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

	public function notifications($success="",$error=""){
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

	public function manage_subscribers($success="",$error=""){
		$session = session();
		$role = $session->get("role");
		if($role!="admin"){
			return redirect()->route("/");
		}
		$authModel = new AuthModel();
		$subscribers = array_reverse($authModel->where("role","subscriber")->orderBy('id', 'desc')->findAll());
		$data = array(
			"title" => "Subscribers",
			"subscribers" => $subscribers,
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("manage_subscribers",$data);
	}

	public function add_new_subscriber($success="",$error=""){
		$session = session();
		$role = $session->get("role");
		if($role!="admin"){
			return redirect()->route("/");
		}
		$data  = array(
			"title" => "Add New Subscriber",
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("add_new_subscriber",$data);
	}

}
