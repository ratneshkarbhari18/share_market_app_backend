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
        date_default_timezone_set("Asia/Kolkata");
        $noticeData = array(
            "name" => $this->request->getPost("name"),
            "market_price" => $this->request->getPost("current_price"),
            "buy_price" => $this->request->getPost("buy_price"),
            "stop_loss" => $this->request->getPost("stop_loss"),
            "date" => date("d-m-Y h:i:sa")
        );
        $notifModel = new NotifModel();
        $created = $notifModel->insert($noticeData);
        if($created){
            $curl = curl_init();
            $body = 'Market Price: '.$noticeData["market_price"].' Buy Price: '.$noticeData["buy_price"].' Stop Loss: '.$noticeData["stop_loss"];
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "notification": {
                    "title": "'.$noticeData["name"].'",
                    "body": "'.$body.'"
                },
                "priority": "high",
                "data": {
                    "clickaction": "FLUTTER_NOTIFICATION_CLICK",
                    "id": "1",
                    "status": "done"
                },
                "to": "/topics/all"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: key=AAAAXqzflPQ:APA91bEs16tt8HyUxcCcXFPPPXoKfrZvFQFpj1SbU8bn5HNm05dL3Ieb9TIHulwo-n8lYCK5mcKX6FxbY67L62JrJSMRuMTdgI3UhtO5XoxYaCbSObnqoAE5WH9gV9Br4VJXTFxNaYQE'
            ),
            ));

            $response = curl_exec($curl);

        }
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