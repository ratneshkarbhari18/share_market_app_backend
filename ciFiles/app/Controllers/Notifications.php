<?php

namespace App\Controllers;
use App\Models\NotifModel;
use App\Controllers\PageLoader;

class Notifications extends BaseController
{

    public function add(){
        $noticeData = array(
            "name" => $this->request->getPost("name"),
            "market_price" => $this->request->getPost("current_price"),
            "buy_price" => $this->request->getPost("buy_price"),
            "stop_loss" => $this->request->getPost("stop_loss")
        );
        $notifModel = new NotifModel();
        $created = $notifModel->insert($noticeData);
        return redirect()->route('notifications-mgt');
    }

}