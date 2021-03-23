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
            "horoscopes" => json_encode($horoScopes)
        );
        $horoscopeModel = new DailyHoroscopeModel();
        $created = $horoscopeModel->insert($horoScopeData);
        if($created){
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