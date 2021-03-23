<?php

namespace App\Controllers;
use App\Models\DailyHoroscopeModel;
use App\Models\AuthModel;
use App\Models\LeadModel;

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

	public function add_new_horoscope($success="",$error=""){
		$session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
		$data = array(
			"title" => "Add New Horoscope",
			"success" => $success,
			"error" => $error,
		);
		$this->page_loader("add_new_horoscope",$data);
	}

	public function login($error=""){
		$data = array(
			"title" => "Login",
			"error" => $error
		);
		$this->page_loader("login",$data);
	}

	public function daily_horoscopes($success="",$error=""){
		$session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			return redirect()->route("/");
		}
		$dailyHoroscopeModel = new DailyHoroscopeModel();
		$horoscopes = array_reverse($dailyHoroscopeModel->orderBy('id', 'desc')->findAll(10,0));
		$data = array(
			"title" => "Daily Horoscopes",
			"horoscopes" => $horoscopes,
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("manage_horoscopes",$data);
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

	public function contact_form_messages($success="",$error=""){
		$session = session();
		$role = $session->get("role");
		if($role!="admin"){
			return redirect()->route("/");
		}
		$leadModel = new LeadModel();
		$messages = array_reverse($leadModel->findAll());
		$data = array(
			"title" => "From Contact Form",
			"messages" => $messages,
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("manage_messages",$data);
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
