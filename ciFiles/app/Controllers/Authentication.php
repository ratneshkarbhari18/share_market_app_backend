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
            $userData = $authModel->where("email",$entered_email)->first();
            if ($userData) {
                if (password_verify($entered_password,$userData["password"])) {
                    $sessionData = array(
                        "first_name" => $userData["first_name"],
                        "last_name" => $userData["last_name"],
                        "email" => $userData["email"],
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
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(site_url()); 
    }
}