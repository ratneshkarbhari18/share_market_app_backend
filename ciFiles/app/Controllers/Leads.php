<?php

namespace App\Controllers;
use App\Models\LeadModel;
use App\Models\QuestionModel;
use App\Controllers\PageLoader;

class Leads extends BaseController
{

    public function create_lead(){
        $api_key = $this->request->getPost("api_key");
        if($api_key!="5f4dbf2e5629d8cc19e7d51874266678"){
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "API Key is incorrect"
                )
            );
        }
        $dataToInsert = array(
            "name" => $this->request->getPost("name"),
            "gender" => $this->request->getPost("gender"),
            "contact_number" => $this->request->getPost("contact_number"),
            "birth_date" => $this->request->getPost("birth_date"),
            "birth_month" => $this->request->getPost("birth_month"),
            "birth_year" => $this->request->getPost("birth_year"),
            "birth_hour" => $this->request->getPost("birth_hour"),
            "birth_minute" => $this->request->getPost("birth_minute"),
            "birth_second" => $this->request->getPost("birth_second"),
            "birth_place" => $this->request->getPost("birth_place"),
            "service" => $this->request->getPost("service")
        );

        $leadsModel = new LeadModel();

        $leadExists = $leadsModel->where("contact_number",$this->request->getPost("contact_number"))->where("service",$this->request->getPost("service"))->first();

        if($leadExists){

            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "Lead Already exists"
                )
            );

        }else {

            $done = $leadsModel->insert($dataToInsert);
            
            if($done){
                return json_encode(
                    array(
                        "result" => "success",
                        "reason" => "Intertest Recieved"
                    )
                );
            }else {
                return json_encode(
                    array(
                        "result" => "failure",
                        "reason" => "Failed"
                    )
                );
            }

        }

        

        

    }

    public function save_question(){
        $api_key = $this->request->getPost("api_key");
        if($api_key!="5f4dbf2e5629d8cc19e7d51874266678"){
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "API Key is incorrect"
                )
            );
        }
        
        $dataToInsert = array(
            "first_name" => $this->request->getPost("first_name"),
            "last_name" => $this->request->getPost("last_name"),
            "contact_number" => $this->request->getPost("contact_number"),
            "question" => $this->request->getPost("question"),
        );

        $questionModel = new QuestionModel();

        $questionExists = $questionModel->where("contact_number",$this->request->getPost("contact_number"))->where("question",$this->request->getPost("question"))->first();

        if ($questionExists) {
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "Question already exists for your Contact number"
                )
            );
        } else {
            $questionModel->insert($dataToInsert);
            return json_encode(
                array(
                    "result" => "success",
                    "reason" => "Question added"
                )
            );
        }
        

    }

}