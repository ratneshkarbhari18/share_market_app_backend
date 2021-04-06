<?php

namespace App\Controllers;
use App\Models\NotificationModel;
use App\Controllers\PageLoader;

class Notifications extends BaseController
{

    public function add_new(){
        $session = session();
        $role = $session->get("role");
        if($role!="admin"){
			return redirect()->route('/');
        }
        $dataToInsert = array(
            "title" => $this->request->getPost("title"),
            "details" => $this->request->getPost("details")
        );
        $notifModel = new NotificationModel();
        $created = $notifModel->insert($dataToInsert);
        if ($created) {
            $curl = curl_init();
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
                    "title": "'.$dataToInsert["title"].'",
                    "body": "'.$dataToInsert["details"].'"
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
                'Authorization: key=AAAAfoZlGsg:APA91bHHlG3fOZ6HnY3STcYVfCkEGAfp08VZQ6hJRCUdq4bgQYOzYPBI6eULhzRX013K5rXRBs4V-OOKsO_Vb6orCEnU2lelp3mJDXn6S4yR-9a2pqWmFTzFETenRs21cdFI0r_0tsJ6'
            ),
            ));

            $response = curl_exec($curl);

            var_dump($response);

            return redirect()->route('manage-notifications');

        }
    }


    public function delete(){
        $id = $this->request->getPost("id");
        $notifModel = new NotificationModel();
        $deleted = $notifModel->delete($id);
        if ($deleted) {
            return redirect()->route('manage-notifications');
        }
    }

    public function fetchApi(){
        $api_key = $this->request->getPost("api_key");
        if($api_key!="5f4dbf2e5629d8cc19e7d51874266678"){
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "API Key is incorrect"
                )
            );
        }
        $notifModel = new NotificationModel();
        $allNotifs = array_reverse($notifModel->orderBy('id','desc')->findAll(5,0));
        return json_encode(
            array(
                "result" => "success",
                "data" => json_encode($allNotifs)
            )
        );
    }


}