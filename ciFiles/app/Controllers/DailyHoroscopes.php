<?php

namespace App\Controllers;
use App\Models\DailyHoroscopeModel;
use App\Controllers\PageLoader;

class DailyHoroscopes extends BaseController
{

    public function add(){
        $session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
        date_default_timezone_set("Asia/Kolkata");
        $horoScopes = array(
            "aries" => $this->request->getPost("aries"),
            "taurus" => $this->request->getPost("taurus"),
            "gemini" => $this->request->getPost("gemini"),
            "cancer" => $this->request->getPost("cancer"),
            "leo" => $this->request->getPost("leo"),
            "virgo" => $this->request->getPost("virgo"),
            "libra" => $this->request->getPost("libra"),
            "scorpio" => $this->request->getPost("scorpio"),
            "sagittarius" => $this->request->getPost("sagittarius"),
            "capricorn" => $this->request->getPost("capricorn"),
            "aquarius" => $this->request->getPost("aquarius"),
            "pisces" => $this->request->getPost("pisces")
        );
        $date = $this->request->getPost("date");
        $title = $this->request->getPost("title");
        $horoScopeData = array(
            "title" => $title,
            "date" => $date,
            "data" => json_encode($horoScopes)
        );
        $horoscopeModel = new DailyHoroscopeModel();
        $exists = $horoscopeModel->where("date",$date)->first();
        if(!$exists){
            $created = $horoscopeModel->insert($horoScopeData);
        }
        if($created){
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
                    "title": "Daily Horoscope",
                    "body": "'.$title.'"
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
            return redirect()->route('daily-horoscopes');
        }
    }


    
    public function delete(){
        $session = session();
		$logged_in = $session->get("logged_in");
		if(!$logged_in){
			$this->dashboard();
		}
        $notifId = $this->request->getPost("id");
        $dailyHoroscopeModel = new DailyHoroscopeModel();
        $deleted = $dailyHoroscopeModel->delete($notifId);
        return redirect()->route('daily-horoscopes');
    }

    public function daily_horoscope(){
        $api_key = $this->request->getPost("api_key");
        if($api_key!="5f4dbf2e5629d8cc19e7d51874266678"){
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "API Key is incorrect"
                )
            );
        }
        $dailyHoroscopeModel = new DailyHoroscopeModel();
        $date = $this->request->getPost("date");
        $horoscope = $dailyHoroscopeModel->where("date",$date)->first();
        return json_encode(
            array(
                "result" => "success",
                "data" => json_encode($horoscope)
            )
        );
    }

}