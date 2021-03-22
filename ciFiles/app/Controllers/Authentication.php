<?php

namespace App\Controllers;
use App\Controllers\PageLoader;
use App\Models\AuthModel;

class Authentication extends BaseController
{
    public function login(){

        $session = session();
        $logged_in = $session->get("logged_in");
        if(isset($logged_in)){
			return redirect()->route('/');
        }

        $entered_email = $this->request->getPost("email");
        $entered_password = $this->request->getPost("password");

        $pageLoader = new PageLoader();
        $authModel = new AuthModel();

        if ($entered_email==""||$entered_password=="") {
            $pageLoader->login("Please enter both email and password");
        } else {
            $userData = $authModel->where("email",$entered_email)->where("role","admin")->where("status","active")->first();
            if ($userData) {
                if (password_verify($entered_password,$userData["password"])) {
                    $sessionData = array(
                        "first_name" => $userData["first_name"],
                        "last_name" => $userData["last_name"],
                        "email" => $userData["email"],
                        "role" => $userData["role"],
                        "logged_in" => TRUE,
                    );
                    $session->set($sessionData);
                    return redirect()->route('/');
                } else {
                    $pageLoader->login("Password is incorrect");
                }
            } else {
                $pageLoader->login("email is incorrect");
            }
        }
        
    }

    public function subscriber_login(){
        $expected_api_key = "5f4dbf2e5629d8cc19e7d51874266678";
        $recieved_api_key = $this->request->getPost("api_key");
        if ($recieved_api_key==$expected_api_key) {
            $entered_email = $this->request->getPost("email");
            $entered_password = $this->request->getPost("password");
            $authModel = new AuthModel();
            $subData = $authModel->where("role","subscriber")->where("status","active")->where("email",$entered_email)->first();
            if ($subData) {
                $password_correct = password_verify($entered_password,$subData["password"]);
                if ($password_correct) {
                    return json_encode(array(
                        "result" => "success",
                        "sub_data" => json_encode($subData)
                    ));
                } else {
                    return json_encode(array(
                        "result" => "failure",
                        "reason" => "Password is incorrect"
                    ));
                }
            } else {
                return json_encode(array(
                    "result" => "failure",
                    "reason" => "Email is incorrect"
                ));
            }
        } else {
            return json_encode(array(
                "result" => "failure",
                "reason" => "API Key is incorrect"
            ));
        }   
    }


    public function update_subscriber_profile(){
        $expected_api_key = "5f4dbf2e5629d8cc19e7d51874266678";
        $recieved_api_key = $this->request->getPost("api_key");
        if ($recieved_api_key==$expected_api_key) {
            
        }else {
            return json_encode(array(
                "result" => "failure",
                "reason" => "API Key is incorrect"
            ));
        }
    }


    public function subscriber_register(){
        $expected_api_key = "5f4dbf2e5629d8cc19e7d51874266678";
        $recieved_api_key = $this->request->getPost("api_key");
        if ($recieved_api_key==$expected_api_key) {
            $entered_first_name = $this->request->getPost("first_name");
            $entered_last_name = $this->request->getPost("last_name");
            $entered_email = $this->request->getPost("email");
            $entered_password = $this->request->getPost("password");
            $authModel = new AuthModel();
            $subscriberExists = $authModel->where("email",$entered_email)->first();
            if ($subscriberExists) {
                return json_encode(array(
                    "result" => "failure",
                    "reason" => "A subsrciber with this email address already exists"
                ));
            } else {
                $dataToInsert = array(
                    "first_name" => $entered_first_name,
                    "last_name" => $entered_last_name,
                    "email" => $entered_email,
                    "password" => password_hash($entered_password,PASSWORD_DEFAULT),
                    "role" => "subscriber",
                    "status" => "active"
                );
                $created = $authModel->insert($dataToInsert);
                if ($created) {
                    return json_encode(array(
                        "result" => "success",
                        "reason" => "Account Created Successfully"
                    ));
                } else {
                    return json_encode(array(
                        "result" => "failure",
                        "reason" => "Account Could Not be Created"
                    ));
                }
            }
        }else {
            return json_encode(array(
                "result" => "failure",
                "reason" => "API Key is incorrect"
            ));
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(site_url()); 
    }
}