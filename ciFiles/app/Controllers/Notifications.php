<?php

namespace App\Controllers;
use App\Models\NotifModel;
use App\Controllers\PageLoader;

class Notifications extends BaseController
{

    public function add(){
        $session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
        $noticeData = array(
            "name" => $this->request->getPost("name"),
            "market_price" => $this->request->getPost("current_price"),
            "buy_price" => $this->request->getPost("buy_price"),
            "stop_loss" => $this->request->getPost("stop_loss"),
            "date" => date("d-m-Y")
        );
        $notifModel = new NotifModel();
        $created = $notifModel->insert($noticeData);
        return redirect()->route('notifications-mgt');
    }

    public function delete(){
        $session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
        $notifId = $this->request->getPost("id");
        $notifModel = new NotifModel();
        $deleted = $notifModel->delete($notifId);
        return redirect()->route('notifications-mgt');
    }

    public function jaldi_five(){
        $api_key = $this->request->getPost("api_key");
        if($api_key!="5f4dbf2e5629d8cc19e7d51874266678"){
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "API Key is incorrect"
                )
            );
        }
        $notifModel = new NotifModel();
        $notifications = $notifModel->orderBy("id","desc")->findAll();
        return json_encode(
            array(
                "result" => "success",
                "notifications" => $notifications
            )
        );
    }

}