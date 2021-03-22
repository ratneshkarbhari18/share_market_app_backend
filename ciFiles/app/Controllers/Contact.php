<?php

namespace App\Controllers;
use App\Models\LeadModel;

class Contact extends BaseController
{
    public function save_contact_message()   {
        $expected_api_key = "5f4dbf2e5629d8cc19e7d51874266678";
        $recieved_api_key = $this->request->getPost("api_key");
        if ($recieved_api_key==$expected_api_key) {
            $first_name = $this->request->getPost("first_name");
            $last_name = $this->request->getPost("last_name");
            $contact_number = $this->request->getPost("contact_number");
            $message = $this->request->getPost("message");
            $leadsModel = new LeadModel();
            $created = $leadsModel->insert(
                array(
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "contact_number" => $contact_number,
                    "message" => $message,
                )
            );
            if ($created) {
                return json_encode(array(
                    "result" => "success",
                    "reason" => "Lead Created Successfully"
                ));
            }
        }else {
            return json_encode(array(
                "result" => "failure",
                "reason" => "API Key is incorrect"
            ));
        }
    }
}