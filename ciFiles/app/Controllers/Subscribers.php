<?php
namespace App\Controllers;
use App\Models\AuthModel;
use App\Controllers\PageLoader;

class Subscribers extends BaseController
{

    public function create_new(){
        $session = session();
        $role = $session->get("role");
        if($role!="admin"){
			return redirect()->route('/');
        }
        $authModel = new AuthModel();
        $dataToInsert = array(
            "first_name" => $this->request->getPost("first_name"),
            "last_name" => $this->request->getPost("last_name"),
            "email" => $this->request->getPost("email"),
            "password" => password_hash($this->request->getPost("password"),PASSWORD_DEFAULT),
            "role" => "subscriber",
            "status" => "active"
        );
        $inserted = $authModel->insert($dataToInsert);
        return redirect()->route('subscribers-mgt');
    }

    public function deactivate(){
        $session = session();
        $role = $session->get("role");
        if($role!="admin"){
			return redirect()->route('/');
        }
        $sub_id = $this->request->getPost("id");
        $authModel = new AuthModel();
        $subData = $authModel->find($sub_id);
        if ($subData['status']=="active") {
            $subData["status"] = "disabled";
        }else {
            $subData["status"] = "active";
        }

        $updated = $authModel->update($sub_id,$subData);
        return redirect()->route('subscribers-mgt');
    }

}